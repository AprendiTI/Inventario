<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ValidarRol']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::select('select * from Users');
        $usuarios = json_decode( json_encode( $usuarios),true);
        $roles = DB::select('select * from Roles');
        $roles = json_decode( json_encode( $roles),true);
        return view('pages.administrador.Usuarios.Usuarios', compact('usuarios', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $roles = DB::select('select * from Roles');
        $roles = json_decode( json_encode( $roles),true);

        return view('pages.administrador.Usuarios.Crearusuario', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $input = $request->all();
        // dd($input);
        
        $create = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'Rol_id' => $input['Rol_id'],
            'State' => 1,
            'password' => Hash::make($input['password']),
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::find($id);
        // dd($usuario);

        return view('pages.perfil.Perfil', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, $id)
    {
        $inputs = $request->all();
        // dd($inputs);
        $usuario = User::find($id);

        $usuario->update([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
        ]);
        Alert::success('Perfil', 'Perfil personal actualizado exitosamente.');
        return redirect()->route('user.edit', $id);

    }

    public function updatePass(ChangePasswordRequest $request, $id)
    {
        $inputs = $request->all();

        $user = User::find($id);
        if (Hash::check($inputs['pass_last'], $user['password'])) {
            $user->update([
                'password' => Hash::make($inputs['newPassword']),
            ]);

            Alert::success('Contraseña', 'Contraseña cambiada exitosamente');
            return redirect()->route('user.edit', $id);
        }else{
            Alert::error('Error', 'La contraseña actual no counside.');
            return redirect()->route('user.edit', $id);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
