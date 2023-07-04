<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthTrait;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthTrait;

    /**
     * Show the login form.
     *
     * @param string $type
     * @return \Illuminate\View\View
     */
    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }

    /**
     * Handle the login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $guardName = $this->chekGuard($request);

        if (Auth::guard($guardName)->attempt($credentials)) {
            return $this->redirect($request);
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    /**
     * Logout the user.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $type
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
