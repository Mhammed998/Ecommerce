<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{


    public function index(){
        $users=User::paginate(PAGINATION_COUNT);

        return view('layouts.admin.users.index',['users'=>$users]);
    }

    public function delete($id){
        $delete=User::findOrFail($id);
        $delete->delete();

        return redirect()->route('admin.users')->with('success','User has been deleted successfully');
    }







}
