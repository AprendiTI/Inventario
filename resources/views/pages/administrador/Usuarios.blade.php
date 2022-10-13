@extends('layouts.app')

@section('tittle', 'Inicio')
    
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <a class="btn btn-dark" href="{{route('user.create')}}">Crear usuario</a>
        </div>
        <div class="col-md-10">

            <div class="card">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Rol</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach($usuarios as $user)
                            <tr>
                                <th scope="row">{{$user['id']}}</th>
                                <td>{{$user['name']}}</td>
                                <td>{{$user['email']}}</td>
                                <td>@foreach($roles as $rol)
                                        @if($rol['Id'] == $user['Rol_id'])    
                                            {{$rol['Rol']}}
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>
@endsection
