<div>
<h2 class="text-xl font-bold mb-4 text-white text-center">Data Siswa</h2>
<table class="w-full border text-sm mb-6">
            <thead class="bg-gray-800">
                <tr>
                    <th class="border px-2 py-1">No</th>
                    <th class="border px-2 py-1">Nama</th>
                    <th class="border px-2 py-1">NIS</th>
                    <th class="border px-2 py-1">Gender</th>
                    <th class="border px-2 py-1">Alamat</th>
                    <th class="border px-2 py-1">Kontak</th>
                    <th class="border px-2 py-1">Email</th>
                    <th class="border px-2 py-1">Status PKL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswas as $index => $siswa)
                    <tr>
                        <td class="border px-2 py-1">{{ $index + 1 }}</td>
                        <td class="border px-2 py-1">{{ $siswa->nama }}</td>
                        <td class="border px-2 py-1">{{ $siswa->nis }}</td>
                        <td class="border px-2 py-1">{{ $siswa->gender }}</td>
                        <td class="border px-2 py-1">{{ $siswa->alamat }}</td>
                        <td class="border px-2 py-1">{{ $siswa->kontak }}</td>
                        <td class="border px-2 py-1">{{ $siswa->email }}</td>
                        <td class="border px-2 py-1">{{ $siswa->status_pkl }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</div>
