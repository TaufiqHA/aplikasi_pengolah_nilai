<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\UserCreated;
use App\Models\User;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'role_id' => 'required',
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $validated = $validator->validate();

        $user = User::create($validated);

        event(new UserCreated($user));

        return back()->with([
            'success' => 'User Berhasil Ditambahkan',
        ]);
    }
}
