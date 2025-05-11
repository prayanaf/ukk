<x-layouts.app :title="__('Data industri')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daftar Industri PKL</h2>
            
            <table class="w-full border-collapse border border-neutral-300 dark:border-neutral-600">
                <thead class="bg-neutral-200 dark:bg-neutral-700">
                    <tr>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Nama industri</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">NIP</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Gender</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Alamat</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Kontak</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($industri as $industri)
                        <tr class="odd:bg-neutral-100 dark:odd:bg-neutral-700">
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->nama }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->nis }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->gender }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->alamat }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->kontak }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $industri->email }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>