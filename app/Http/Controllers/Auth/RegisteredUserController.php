<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\ConfirmEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(UserRequest $request, User $user): RedirectResponse
    {
        $userData = $request->validated();

        if ($user->esEstudiante($userData['email']) && $userData['tipo_inscripcion'] === 'gratuita') {
            session()->flash('error', 'Lo sentimos, pero no puedes utlizar la inscripción gratuita.');

            return back();
        }
        $userData['tipo_inscripcion'] = 'gratuita';
        $userData['rol'] = 'estudiante';
        $userData['token_confirmacion'] = Str::random(60);

        $user = User::create($userData);

        Mail::to($user->email)->send(new ConfirmEmail($userData['token_confirmacion']));

        event(new Registered($user));

        return redirect(route('welcome', absolute: false))->with('success', 'Te hemos enviado un correo de confirmación.');
    }

    public function confirmarCuenta($token)
    {
        $user = User::where('token_confirmacion', $token)->first();

        if (! $user) {
            return redirect()->route('login')->with('error', 'Token de confirmación inválido.');
        }

        $user->cuenta_confirmada = true;
        $user->email_verified_at = now();
        $user->token_confirmacion = null;
        $user->remember_token = Str::random(10);
        $user->save();

        return redirect()->route('login')->with('success', 'Cuenta confirmada exitosamente. Ya puedes iniciar sesión.');
    }
}
