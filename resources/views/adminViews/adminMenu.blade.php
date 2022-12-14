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
                                <h4 class="card-title">Users</h4>
                                <p class="card-category">Registered Users</p>
                            </div>
                            @if(session('message'))
                            <div class="alert alert-{{ session('message')[0] }}">
                                    {{ session('message')[1] }}
                            </div>
                            @endif
                            <div class="card-body">
                                @if (session('success'))
                                <div class="alert alert-success" role="success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="text-primary">
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th class="text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            @if($user->deleted == 0)
                                            @if($user->id!=1)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{$user->surname}}</td>
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
                                                    @if($user->email_verified_at != null)
                                                    @if($user->actived == 0)
                                                    <form action="{{ route('users.activate', $user->id) }}"
                                                        method="POST" style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas activar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit" style="background-color:limegreen;border-color: limegreen;">
                                                            Activate
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
                                                            Desactivate
                                                        </button>
                                                    </form>
                                                    @endif
                                                    @else
                                                    <button class="btn btn-warning" type="submit" disabled=true>
                                                            Not actived
                                                        </button>
                                                    @endif

                                                    <form action="{{ route('users.softdel', $user->id) }}" method="POST"
                                                        style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas borrar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-danger" type="submit">
                                                            Delete
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