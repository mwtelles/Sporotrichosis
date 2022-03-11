<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request){
        $search = $request->search;
        if($search){
            $users = User::
            where('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->orWhere('id',$search)
            ->paginate(4);
        }else{
            $users = User::paginate(5);
        }

        return view('admin.users.index',['users'=>$users]);
    }

    public function show(User $user){
        return view('admin.users.edit',['user'=>$user]);
    }

    public function  create()
    {
        $user = new User;
        return view('admin.users.create',['user'=>$user]);
    }
}
