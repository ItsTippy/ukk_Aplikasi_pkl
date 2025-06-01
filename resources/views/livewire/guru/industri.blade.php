<div class="p-4 bg-gray-900 rounded-lg shadow text-white">
    <h2 class="text-2xl font-semibold mb-4 text-center">Daftar Mitra Industri</h2>

    <div class="flex justify-between items-center mb-4">
        <input wire:model.live="search" type="text" placeholder="Cari..." 
        class="bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 w-full max-w-xs">
    </div>
    <table class="w-full text-sm text-left text-white border border-gray-700">
        <thead class="bg-gray-800 text-gray-300 uppercase">
            <tr>
                <th class="px-4 py-2 border border-gray-700">No</th>
                <th class="px-4 py-2 border border-gray-700">Nama</th>
                <th class="px-4 py-2 border border-gray-700">Bidang Usaha</th>
                <th class="px-4 py-2 border border-gray-700">Alamat</th>
                <th class="px-4 py-2 border border-gray-700">Kontak</th>
                <th class="px-4 py-2 border border-gray-700">Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($industris as $index => $industri)
                <tr class="bg-gray-800 hover:bg-gray-700 transition">
                    <td class="px-4 py-2 border border-gray-700">{{ $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->nama }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->bidang_usaha }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->alamat }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->kontak }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $industri->email }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center px-4 py-2 text-gray-400">Belum ada data industri.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="mt-4">
        {{ $industris->links() }}
    </div>
</div>
