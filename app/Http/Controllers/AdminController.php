<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', ['title' => 'Dashbaord']);
    }

    public function addUser()
    {
        $roles = Role::all();
        return view('admin.addUser', ['title' => 'Tambah User', 'roles' => $roles]);
    }
}
