<div class="p-4 bg-gray-900 rounded-lg shadow text-white">
    <h1 class="text-2xl font-semibold mb-2">Dashboard Guru</h1>
    <p class="mb-4">Anda login sebagai: <span class="font-medium text-blue-400">{{ auth()->user()->name }}</span> ({{ auth()->user()->getRoleNames()->first() }})</p>

    <h2 class="text-2xl font-semibold mb-4 text-center">Laporan Siswa PKL</h2>

    <table class="w-full text-sm text-left text-white border border-gray-700">
        <thead class="bg-gray-800 text-gray-300 uppercase">
            <tr>
                <th class="px-4 py-2 border border-gray-700">No</th>
                <th class="px-4 py-2 border border-gray-700">Nama Siswa</th>
                <th class="px-4 py-2 border border-gray-700">Industri</th>
                <th class="px-4 py-2 border border-gray-700">Bidang Usaha</th>
                <th class="px-4 py-2 border border-gray-700">Mulai</th>
                <th class="px-4 py-2 border border-gray-700">Selesai</th>
                <th class="px-4 py-2 border border-gray-700">Durasi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pkls as $index => $pkl)
                <tr class="bg-gray-800 hover:bg-gray-700 transition">
                    <td class="px-4 py-2 border border-gray-700">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->siswa->nama }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->industri->nama }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->industri->bidang_usaha }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->mulai }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->selesai }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $pkl->durasi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center px-4 py-2 text-gray-400">Belum ada data laporan PKL.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
