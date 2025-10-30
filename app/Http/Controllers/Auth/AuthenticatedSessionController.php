<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     */

    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);


        $user = Auth::user();
        if($user->role=='admin'){
            return redirect()->intended(route('admin.deshboard',absolute:false));
        }elseif($user->role=='vendor'){
             return redirect()->intended(route('vendor.deshboard',absolute:false));
        }elseif ($user->role=='user'){
            return redirect()->intended(route('user.deshboard',absolute:false));
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    protected function username()
    {
        return 'username'; // বা 'name'
    }

}
