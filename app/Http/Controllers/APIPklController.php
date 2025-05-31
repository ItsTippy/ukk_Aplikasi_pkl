<?php

namespace App\Http\Controllers;

use App\Models\Pkl;
use Illuminate\Http\Request;

class APIPklController extends Controller
{
    public function index()
    {
        $pkls = Pkl::with(['siswa', 'guru', 'industri'])->get();
        return response()->json($pkls);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'guru_id' => 'required|exists:gurus,id',
            'industri_id' => 'required|exists:industris,id',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        $pkl = Pkl::create($validated);

        return response()->json($pkl->load(['siswa', 'guru', 'industri']), 201);
    }

    public function show($id)
    {
        $pkl = Pkl::with(['siswa', 'guru', 'industri'])->findOrFail($id);
        return response()->json($pkl);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'siswa_id' => 'sometimes|exists:siswas,id',
            'guru_id' => 'sometimes|exists:gurus,id',
            'industri_id' => 'sometimes|exists:industris,id',
            'mulai' => 'sometimes|date',
            'selesai' => 'sometimes|date|after_or_equal:mulai',
        ]);

        $pkl = Pkl::findOrFail($id);
        $pkl->update($validated);

        return response()->json($pkl->load(['siswa', 'guru', 'industri']));
    }

    public function destroy($id)
    {
        $pkl = Pkl::findOrFail($id);
        $pkl->delete();

        return response()->json(['message' => 'Deleted']);
    }
}
