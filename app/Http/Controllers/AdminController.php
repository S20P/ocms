<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Companies;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
       
        $total_coupon = Coupon::where("status",1)->count();
        
        $data['total_coupon'] = $total_coupon; 
    
        return view('admin.dashboard',$data);
    }

    public function showChangePasswordForm()
    {
        return view('admin.change_password');
    }

    public function updatePassword(Request $request)
    {

        $request->validate([
            'new_password' => 'required|min:8|confirmed',
        ], [
            'new_password.confirmed' => 'The new password confirmation does not match.',
        ]);

        $user = Auth::guard('admin')->user();
        // Hash the new password
        $hashedPassword = Hash::make($request->input('new_password'));

        // Update the user's password
        $user->update(['password' => $hashedPassword]);

        return redirect()->route('home')->with('success', 'Password updated successfully!');
    }
}
