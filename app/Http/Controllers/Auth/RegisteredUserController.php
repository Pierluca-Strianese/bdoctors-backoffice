<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Specialization;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {   
        $specializations = Specialization::all();

        return view('auth.register', compact('specializations'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store( Request $request): RedirectResponse
    {
        $request->validate([

            'email'                 => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password'              => ['required', 'confirmed', Rules\Password::defaults()],
            'name'                  => ['required', 'string', 'max:255'],
            'lastname'              => ['required', 'string', 'max:255'],
            'address'               => ['required', 'string', 'max:255'],
            'specializations. *'    => ['required', 'integer', 'exists:specializations,id'],
        ]);
        
        $user = [
            'required' => 'il campo :attribute è obbligatorio',
            'min' => 'il campo :attribute deve avere minimo :min caratteri',
            'max' => 'il campo :attribute non può superare i :max caratteri',
            'url' => 'il campo deve essere un url valido',
            'exists' => 'Valore non valido'
        ];
        
        $data = $request->all();
        

        $user = User::create([

            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'name'          => $request->name,
            'lastname'      => $request->lastname,
            'address'       => $request->address,
            'slug'          => Str::slug($request->name),
        ]);

        $user->specializations()->sync($data['specializations'] ?? []);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
