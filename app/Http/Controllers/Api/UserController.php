<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() { $users = User::all();

    return response()->json([
        'success' => true,
        'data' => $users
    ]);
    }

    public function store(Request $r) {
        return response()->json(User::create($r->all()),201);
    }

    public function show($id) {
        return response()->json(User::findOrFail($id));
    }

    public function update(Request $r,$id) {
        $data = User::findOrFail($id);
        $data->update($r->all());
        return response()->json($data);
    }

    public function destroy($id) {
        User::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
