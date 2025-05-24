
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">Nama Industri</th>
                            <th scope="col" class="px-6 py-3">Guru Pembimbing</th>
                            <th scope="col" class="px-6 py-3">Mulai</th>
                            <th scope="col" class="px-6 py-3">Selesai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pkls as $pkl)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                                <td class="px-6 py-4">{{ $pkl->siswa->nama }}</td>
                                <td class="px-6 py-4">{{ $pkl->industri->nama }}</td>
                                <td class="px-6 py-4">{{ $pkl->guru->nama }}</td>
                                <td class="px-6 py-4">{{ $pkl->mulai }}</td>
                                <td class="px-6 py-4">{{ $pkl->selesai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


