<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index() { return response()->json(Pasien::all()); }

    public function store(Request $r) {
        return response()->json(Pasien::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(Pasien::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = Pasien::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        Pasien::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
