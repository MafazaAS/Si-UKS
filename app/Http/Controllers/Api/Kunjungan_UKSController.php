<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kunjungan_UKS;
use Illuminate\Http\Request;
use Carbon\Carbon;

class Kunjungan_UKSController extends Controller
{
    public function index() {
        return response()->json(Kunjungan_UKS::with(['pasien','user'])->get());
    }

    public function store(Request $r) {
        return response()->json(Kunjungan_UKS::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(Kunjungan_UKS::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = Kunjungan_UKS::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        Kunjungan_UKS::destroy($id);
        return response()->json(['message'=>'deleted']);
    }

    public function filter(Request $request)
{
    $query = Kunjungan_UKS::query();

    // 🔹 Filter per minggu
    if ($request->week) {
        $start = Carbon::parse($request->week)->startOfWeek();
        $end = Carbon::parse($request->week)->endOfWeek();

        $query->whereBetween('jam_masuk', [$start, $end]);
    }

    // 🔹 Filter per bulan
    if ($request->month) {
        $query->whereMonth('jam_masuk', $request->month);
    }

    return response()->json($query->get());
}
}
