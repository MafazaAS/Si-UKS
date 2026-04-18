<?php

namespace App\Http\Controllers\Api;

use App\Models\Users;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() { return response()->json(Users::all()); }

    public function store(Request $r) {
        return response()->json(Users::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(Users::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = Users::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        Users::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
