<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class APISiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();

        // Tampilkan URL foto di response
        $siswas->transform(function ($siswa) {
            if ($siswa->foto) {
                $siswa->foto = Storage::url($siswa->foto);
            }
            return $siswa;
        });

        return response()->json($siswas);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'       => 'required|string|max:255',
            'nis'        => 'required|string|max:50|unique:siswas,nis',
            'gender'     => 'required|string',
            'alamat'     => 'required|string',
            'kontak'     => 'required|string',
            'email'      => 'required|email|unique:siswas,email',
            'status_pkl' => 'nullable|string',
            'foto'       => 'nullable|image|max:2048', // max 2MB
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto-siswa', 'public');
        }

        $siswa = Siswa::create($data);

        // Tampilkan URL foto jika ada
        if ($siswa->foto) {
            $siswa->foto = Storage::url($siswa->foto);
        }

        return response()->json($siswa, 201);
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->foto) {
            $siswa->foto = Storage::url($siswa->foto);
        }

        return response()->json($siswa);
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $data = $request->validate([
            'nama'       => 'sometimes|string|max:255',
            'nis'        => 'sometimes|string|max:50|unique:siswas,nis,' . $id,
            'gender'     => 'sometimes|string',
            'alamat'     => 'sometimes|string',
            'kontak'     => 'sometimes|string',
            'email'      => 'sometimes|email|unique:siswas,email,' . $id,
            'status_pkl' => 'nullable|string',
            'foto'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }

            $data['foto'] = $request->file('foto')->store('foto-siswa', 'public');
        }

        $siswa->update($data);

        if ($siswa->foto) {
            $siswa->foto = Storage::url($siswa->foto);
        }

        return response()->json($siswa);
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        // Hapus file foto juga
        if ($siswa->foto) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
