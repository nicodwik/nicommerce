<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Category::all();
        
        return view('pages.dashboard-settings', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();
        return view('pages.dashboard-account', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        if($request->has('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
        }
        $item = Auth::user()->update($data);

        return redirect()->route($redirect);
    }
}
