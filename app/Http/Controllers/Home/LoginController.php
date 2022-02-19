<?php

namespace App\Http\Controllers\Home;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Página de acesso.
     *
     * @return view wilcome
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Verificação de acesso.
     *
     * @return view home
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.home');
        }

        return back()->withError('As credenciais fornecidas não correspondem aos nossos registros.');
    }

    /**
     * Deslogar usuário.
     *
     * @return view home
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
