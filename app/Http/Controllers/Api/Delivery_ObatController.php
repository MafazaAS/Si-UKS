<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Delivery_Obat;
use Illuminate\Http\Request;

class Delivery_ObatController extends Controller
{
    public function index() {
        return response()->json(Delivery_Obat::all());
    }

    public function store(Request $r) {
        return response()->json(Delivery_Obat::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(Delivery_Obat::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = Delivery_Obat::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        Delivery_Obat::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
