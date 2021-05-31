<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//here is the problem
class LoginController extends Controller
{
    //
    use Authenticatable;

    /**
     * Where to redirect admins after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
{
    $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
    ]);
    if (Auth::guard('admin')->attempt([
        'email' => $request->email,
        'password' => $request->password
    ], $request->get('remember'))) {
        return redirect()->intended(route('admin.dashboard'));
    }
    return back()->withInput($request->only('email', 'remember'));
}
/**
 * @param Request $request
 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
 */
public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    return redirect()->route('admin.login');
}
}
