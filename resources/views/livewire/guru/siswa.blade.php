<div class="p-4 bg-gray-900 rounded-lg shadow text-white">
    <h2 class="text-2xl font-semibold mb-4 text-center">Data Siswa</h2>

    <div class="flex justify-between items-center mb-4">
        <input wire:model.live="search" type="text" placeholder="Cari..." 
        class="bg-gray-800 text-white border border-gray-700 rounded px-4 py-2 w-full max-w-xs">
    </div>
    
    <table class="w-full text-sm text-left text-white border border-gray-700">
        <thead class="bg-gray-800 text-gray-300 uppercase">
            <tr>
                <th class="px-4 py-2 border border-gray-700">No</th>
                <th class="px-4 py-2 border border-gray-700">Nama</th>
                <th class="px-4 py-2 border border-gray-700">NIS</th>
                <th class="px-4 py-2 border border-gray-700">Gender</th>
                <th class="px-4 py-2 border border-gray-700">Alamat</th>
                <th class="px-4 py-2 border border-gray-700">Kontak</th>
                <th class="px-4 py-2 border border-gray-700">Email</th>
                <th class="px-4 py-2 border border-gray-700">Status PKL</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $index => $siswa)
                <tr class="bg-gray-800 hover:bg-gray-700 transition">
                    <td class="px-4 py-2 border border-gray-700">{{ ($siswas->currentPage() - 1) * $siswas->perPage() + $index + 1 }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->nama }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->nis }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->gender }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->alamat }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->kontak }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->email }}</td>
                    <td class="px-4 py-2 border border-gray-700">{{ $siswa->status_pkl }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center px-4 py-2 text-gray-400">Data tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $siswas->links() }}
    </div>
</div>
