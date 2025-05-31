<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class APIGuruController extends Controller
{
    public function index()
    {
        return response()->json(Guru::all());
    }

    public function store(Request $request)
    {
        $guru = Guru::create($request->all());
        return response()->json($guru, 201);
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return response()->json($guru);
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        return response()->json($guru);
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
