<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\Action;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required()->maxLength(255),
                Forms\Components\TextInput::make('nis')->required()->maxLength(255),
                Forms\Components\Radio::make('gender')
                    ->label('Jenis Kelamin')
                    ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                    ->required()
                    ->inline(),
                Forms\Components\TextInput::make('alamat')->required()->maxLength(255),
                Forms\Components\TextInput::make('kontak')->required()->maxLength(255),
                Forms\Components\TextInput::make('email')->email()->required()->maxLength(255),
                FileUpload::make('foto_siswa')
                    ->label('Foto Siswa')
                    ->image()
                    ->disk('public')
                    ->directory('siswa-photos')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('nis')->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->formatStateUsing(fn ($state) => DB::select("SELECT getGenderCode(?) AS gender", [$state])[0]->gender),
                Tables\Columns\TextColumn::make('alamat')->searchable(),
                Tables\Columns\TextColumn::make('kontak')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\IconColumn::make('status_pkl')->boolean(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ImageColumn::make('foto_siswa')
                    ->label('Foto')
                    ->circular(),
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
                        Excel::import(new SiswaImport, $filePath);
                        Storage::disk('public')->delete($data['file']);

                        Notification::make()
                            ->title('Data siswa berhasil diimpor!')
                            ->success()
                            ->send();
                    })
                    ->visible(fn () => auth()->user()->hasRole('super_admin')), // Hanya superadmin yang bisa mengimpor CSV
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSiswas::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Data Siswa';
    }
}
