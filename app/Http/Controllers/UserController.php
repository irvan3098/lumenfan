<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use DB;

class UserController extends Controller
{
    public function index($id)
    {
        $data = DB::table('presenece_lists')
            ->where('id_users',$id)
            ->orderBy('created_at', 'desc')->paginate(10);
        return response()->json(['status' => 'success', 'data' => $data]);
    }
    public function getUserLogin(Request $request)
    {
        return response()->json(['status' => 'success', 'data' => $request->user()]);
    }
    

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $user = User::where('email', $request->email)->first();


        if ($user && Hash::check($request->password, $user->password)) {
            $token = Str::random(40);
            $user->update(['api_token' => $token]);
            return response()->json(['status' => 'success', 'data' => $token]);
        }
        return response()->json(['status' => 'error']);
    }

    public function approve($id){
        DB::table('presenece_lists')
            ->where('id',$id)
            ->update([
                'is_prove' => true
            ]);
        return response()->json(['status' => 'success']);
    }

}
