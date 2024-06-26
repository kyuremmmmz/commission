<?php

namespace App\Http\Controllers;


use App\Models\Committee;
use App\Models\User;
use App\Notifications\EmailIDAndPassword;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;


class ComitteeAuthControllerr extends Controller
{
    public function Creater(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'comitteeID' => ['required', 'string', 'max:255', 'unique:committees', 'regex:/^04[\s-]*\d+[\s-]*\d+[\s-]*\d+$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' =>['required', 'string',],
        ]);

        $user = Committee::create([
            'name' => $request->name,
            'comitteeID' => $request->comitteeID,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $comitteeID = $request->comitteeID ?? 'N/A'; // Default value if null
        $password = $request->password ?? 'N/A';
        $users = Committee::where('comitteeID', $request->comitteeID)->get();


        $details = [
            'greeting' => 'Good Day University of Perpetual Help System Dalta - Molino Campus Comittee member',
            'body' => 'This is your Account Details
                        Comittee ID:'.$comitteeID.'
                        Password:'.$password.'',
            'action' => route('admin.seeLogin'),
            'lastline' => 'No reply'
        ];


        try {
            if ($users->isNotEmpty()) {
                Notification::send($users, new EmailIDAndPassword($details));
                event(new Registered($user));
                Auth::login($user);

                return redirect(route('user', absolute: false));
            }
        } catch (Exception $e) {
                return redirect()->withErrors([$e])->back();
        }

        Auth::guard('comittee')->login($user);

        return redirect()->back();
    }

    public function seeLogin()
    {
        return view('comitteeAuth.adminLogin');
    }

    public function login(Request $request): RedirectResponse
    {
        $request->validate([
            'comitteeID' =>'required|string|max:70',
            'password' => 'required|string|max:8',
        ]);

        if (Auth::guard('committees')->attempt($request->only('comitteeID', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('top3');
        }

        return back()->withErrors([
            'auth_error' =>'Invalid credentials'
        ])->withInput([$request->only('comitteeID')])->with('status', 'Credentials are invalid');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->intended(route('admin.seeLogin'));
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
    }

    public function users(){
        $selectUsers = Committee::select('*')
                                    ->where('role', 'like', '%committee%')
                                    ->get();

        return view('comitteeAuth/users', compact('selectUsers'));
    }

    public function deleteUsers(Committee $adminID)
    {
        $adminID->delete();

        return redirect(route('game1.index'))->with('adminID', 'Deleted Successfully');
    }
}
