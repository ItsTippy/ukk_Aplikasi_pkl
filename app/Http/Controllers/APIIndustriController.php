<?php

namespace App\Http\Controllers;
use App\Models\Industri;
use Illuminate\Http\Request;

class APIIndustriController extends Controller
{
    public function index()
    {
        return response()->json(Industri::all());
    }

    public function store(Request $request)
    {
        $industri = Industri::create($request->all());
        return response()->json($industri, 201);
    }

    public function show($id)
    {
        $industri = Industri::findOrFail($id);
        return response()->json($industri);
    }

    public function update(Request $request, $id)
    {
        $industri = Industri::findOrFail($id);
        $industri->update($request->all());
        return response()->json($industri);
    }

    public function destroy($id)
    {
        $industri = Industri::findOrFail($id);
        $industri->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
