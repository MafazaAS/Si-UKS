<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index() { return response()->json(Obat::all()); }

    public function store(Request $r) {
        return response()->json(Obat::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(Obat::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = Obat::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        Obat::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
