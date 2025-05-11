<x-layouts.app :title="__('Data guru')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daftar Guru Pengampu</h2>
            
            <table class="w-full border-collapse border border-neutral-300 dark:border-neutral-600">
                <thead class="bg-neutral-200 dark:bg-neutral-700">
                    <tr>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Nama Guru</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">NIP</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Gender</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Alamat</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Kontak</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($guru as $guru)
                        <tr class="odd:bg-neutral-100 dark:odd:bg-neutral-700">
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->nama }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->nis }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->gender }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->alamat }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->kontak }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $guru->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>