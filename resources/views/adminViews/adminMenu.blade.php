@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Usuarios</h4>
                                <p class="card-category">Usuarios registrados</p>
                            </div>
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-12 text-right">
                                        @can('user_create')
                                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-facebook">Añadir
                                            usuario</a>
                                        @endcan
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th class="text-right">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            @if($user->deleted == 0)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td class="td-actions text-right">

                                                    <!-- INICIO PARA SOLO ADMINISTRADOR -->
                                                    @can('user_show')
                                                    <a href="{{ route('users.show', $user->id) }}"
                                                        class="btn btn-info"><i class="material-icons">person</i></a>
                                                    @endcan
                                                    @can('user_edit')
                                                    <a href="{{ route('users.edit', $user->id) }}"
                                                        class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                    @endcan
                                                    @can('user_destroy')
                                                    <form action="{{ route('users.delete', $user->id) }}" method="POST"
                                                        style="display: inline-block;"
                                                        onsubmit="return confirm('Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>
                                                    @endcan
                                                    <!-- FINAL -->

                                                    
                                                    @if($user->actived == 0)
                                                    <form action="{{ route('users.activate', $user->id) }}"
                                                        method="POST" style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas activar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit" style="background-color:limegreen;border-color: limegreen;">
                                                            Activar
                                                        </button>
                                                    </form>
                                                    @endif

                                                    @if($user->actived == 1)
                                                    <form action="{{ route('users.desactivate', $user->id) }}"
                                                        method="POST" style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas desactivar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit">
                                                            Desactivar
                                                        </button>
                                                    </form>
                                                    @endif

                                                    <form action="{{ route('users.softdel', $user->id) }}" method="POST"
                                                        style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas borrar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-danger" type="submit">
                                                            SoftDelete
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('users.show', $user->id) }}"
                                                        style="display : inline-block;">
                                                        @csrf
                                                        <button class="btn btn-info" type="submit">
                                                            Details
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection