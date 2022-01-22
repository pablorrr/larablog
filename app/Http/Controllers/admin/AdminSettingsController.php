<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function index()
    {
        return view('admin/articles');
    }

    public function update(Request $request)
    {

        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->input('name');
        if ($request->input('password')) {
            $user->password = $request->input('password');
        }

        $user->save();

        return back()->with([
            'status' => [
                'type' => 'success',
                'content' => 'Zmiany zostały zapisane',
            ]
        ]);
    }
}
