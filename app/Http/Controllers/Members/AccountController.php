<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    //Show account page
    public function index()
    {
        return view('members.account')->with('member', Auth::user());
    }

    //We use the store method to update vendor's details
    public function updateDetails(Request $request)
    {
//        dd($request->all());

        $rules = [
            'firstname' => 'required|alpha|string|min:2|max:30',
            'lastname' => 'required|alpha|string|min:2|max:50',
            'email' => 'required|email|max:255|' . Rule::unique('users')->ignore(Auth::id(), 'staff_id')
        ];

        $this->validate($request, $rules);

        $member = Auth::user();
        $member->update($request->all());

        $toast = [
            'type' => 'success',
            'title' => 'Personal Details Updated',
            'message' => 'Your personal details have been successfully updated'
        ];

        return redirect('/account')->with('toast', $toast);
    }

    //We use the update method to update member's password
    public function updatePassword(Request $request, User $member)
    {
//        dd($request->new_password);
        $rules = [
            'current-password' => ['required', 'alpha_num', 'min:8', 'current_password'],
            'new_password' => ['required', 'alpha_num', 'min:8', 'confirmed']
        ];

        $messages = [
            'current-password.current_password' => 'Your entered current password is incorrect',
            'new_password.confirmed' => 'Your new password doesn\'t match its confirmation'
        ];

        $this->validate($request, $rules, $messages);

        $member = Auth::user();

//        dd($request->all());
        $member->password = Hash::make($request->new_password);
        $member->save();

        $toast = [
            'type' => 'success',
            'title' => 'Password Updated',
            'message' => 'Your password has been changed successfully'
        ];

        return redirect('/account')->with('toast', $toast);
    }
}
