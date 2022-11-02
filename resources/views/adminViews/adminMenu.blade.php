@extends('layouts.app')
@section('content')


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
<div class="content">
    <div class="title-m-b-md">
        <h3>Users</h3>
        @if(session('message'))
        <div class="alert alert-{{ session('message')[0] }}">
            {{ session('message')[1] }}
        </div>
        @endif
        <hr width = 400>
        <br>
    </div>

<div class="panel panel-default">
	<div class="panel-heading">
        @forelse($users as $user)
	    <a id = "Name" > {{ $user->name }} ----</a>

                        @if($user->actived == 0)
                        <form action="{{ route('users.activate', $user->id) }}" method ="POST" style="display : inline-block;" onsubmit="return confirm('Seguro que deseas activar?')">
                            @csrf
                            @METHOD('PUT')
                            <button class="btn btn-info" type = "submit">
                                Activar
                            </button>
                        </form>
                        @endif
                        
                        @if($user->actived == 1)
                        <form action="{{ route('users.desactivate', $user->id) }}" method ="POST" style="display : inline-block;" onsubmit="return confirm('Seguro que deseas desactivar?')">
                            @csrf
                            @METHOD('PUT')
                            <button class="btn btn-info" type = "submit">
                                Desactivar
                            </button>
                        </form>
                        @endif

                        <form action="{{ route('users.delete', $user->id) }}" method ="POST" style="display : inline-block;" onsubmit="return confirm('Seguro que deseas eliminar?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-info" type = "submit">
                                Borrar
                            </button>
                        </form>

                        <form action="{{ route('users.show', $user->id) }}" style="display : inline-block;">
                            @csrf
                            <button class="btn btn-info" type = "submit">
                                Editar
                            </button>
                        </form>

                        <br>
                        <br>
                        <hr width = 400>
                        <br>
                        @empty
                        <div class="alert alert-danger">
	                        {{ __("No hay usuarios en este momento") }}
                        </div>
                        @endforelse
	                </div>
            </div>
        </div>
        @if($users->count())
                        {{$users->links()}}
        @endif
    @endsection
