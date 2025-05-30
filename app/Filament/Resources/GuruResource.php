<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Filament\Resources\GuruResource\RelationManagers;
use App\Models\Guru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Imports\GuruImport;
use Illuminate\Support\Facades\DB;

// Tambahan use untuk fitur Import CSV
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nip')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Radio::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required()
                    ->inline(),
                Forms\Components\TextInput::make('alamat')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nip')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->formatStateUsing(fn ($state) 
                    => DB::select("SELECT getGenderCode(?) AS gender", 
                    [$state])[0]->gender),                
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->user()->hasRole('super_admin')), // Hanya superadmin yang bisa edit
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()->hasRole('super_admin')), // Hanya superadmin yang bisa hapus
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->visible(fn () => auth()->user()->hasRole('super_admin')),
                ]),
            ])
            // Tambahan dimulai di sini
            ->headerActions([
                Action::make('Import CSV')
                    ->label('Import CSV')
                    ->color('success')
                    ->icon('heroicon-o-arrow-up-tray')
                    ->form([
                        FileUpload::make('file')
                            ->label('Pilih CSV')
                            ->acceptedFileTypes(['text/csv', 'text/plain', 'application/vnd.ms-excel'])
                            ->disk('public')
                            ->directory('uploads')
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        $filePath = storage_path('app/public/' . $data['file']);
                        Excel::import(new GuruImport, $filePath);
                        Storage::disk('public')->delete($data['file']);

                        Notification::make()
                            ->title('Data guru berhasil diimpor!')
                            ->success()
                            ->send();
                        })
                        ->visible(fn () => auth()->user()->hasRole('super_admin')), // Hanya superadmin yang bisa mengimpor CSV
            ]);
            // Tambahan selesai di sini
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageGurus::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Guru'; // get navigation
    }
}
