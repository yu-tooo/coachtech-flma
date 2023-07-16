<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Mail\OwnerMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index() 
    {
        $role = Auth::user();
        $users = User::get();
        return view('owner.index', compact('role', 'users'));
    }

    public function detail($user_id)
    {
        $role = Auth::user();
        $user = User::find($user_id);
        return view('owner.user', compact('role', 'user'));
    }

    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return redirect(route('admin.home'));
    }

    public function email(Request $request, $to, $name)
    {
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required',
        ]);
        Mail::to($to)->send(new OwnerMail($request->title, $name, $request->body));
        return back();
    }
}
