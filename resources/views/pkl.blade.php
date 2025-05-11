<x-layouts.app :title="__('Data PKL')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 bg-white dark:bg-neutral-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Daftar Praktik Kerja Lapangan (PKL)</h2>
            
            <table class="w-full border-collapse border border-neutral-300 dark:border-neutral-600">
                <thead class="bg-neutral-200 dark:bg-neutral-700">
                    <tr>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Nama Siswa</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Industri</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Guru Pembimbing</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Tanggal Mulai</th>
                        <th class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pkl as $pkl)
                        <tr class="odd:bg-neutral-100 dark:odd:bg-neutral-700">
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $pkl->siswa->nama }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $pkl->industri->nama }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $pkl->guru->nama }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $pkl->mulai }}</td>
                            <td class="border border-neutral-300 dark:border-neutral-600 px-4 py-2">{{ $pkl->selesai }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.app>