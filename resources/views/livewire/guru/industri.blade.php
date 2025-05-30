<div>
<h2 class="text-xl font-bold mb-4 text-white text-center">Daftar Mitra Industri</h2>
<table class="w-full border text-sm mb-6">
            <thead class="bg-gray-800">
                <tr>
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">Bidang Usaha</th>
                    <th class="border px-2 py-1">Alamat</th>
                    <th class="border px-2 py-1">Kontak</th>
                    <th class="border px-2 py-1">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($industris as $index => $industri)
                    <tr>
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border px-2 py-1">{{ $industri->nama }}</td>
                        <td class="border px-2 py-1">{{ $industri->bidang_usaha }}</td>
                        <td class="border px-2 py-1">{{ $industri->alamat }}</td>
                        <td class="border px-2 py-1">{{ $industri->kontak }}</td>
                        <td class="border px-2 py-1">{{ $industri->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
