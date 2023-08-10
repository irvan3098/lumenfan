<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Presenece_lists;

class PreseneceController extends Controller
{
    public function tambah(Request $request)
    {
        Presenece_lists::create([
            'id_users' => $request->id_users,
            'type' => $request->type,
            'is_prove' => $request->is_prove
        ]);
        return response()->json(['status' => 'success']);
    }

}
