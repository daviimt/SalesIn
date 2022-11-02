@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <div class="card-title">Usuarios</div>
                        <p class="card-category">Vista detallada del usuario {{ $user->name }}</p>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                        <div class="alert alert-success" role="success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="col-md">
                            <div class="card card-user">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <th>ID</th>
                                                <td>{{ $user->id }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td><span class="badge badge-primary">{{ $user->email }}</span></td>
                                            </tr>
                                            <tr>
                                                <th>Created at</th>
                                                <td><a href="#" target="_blank">{{  $user->created_at  }}</a></td>
                                            </tr>
                                            <tr>
                                                <th>Deleted?</th>
                                                <td>{{$user->deleted}}
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <div class="button-container">
                                        <a href="/admin" class="btn btn-info"> Volver </a>
                                        <form action="{{ route('users.edit', $user->id) }}"
                                            style="display : inline-block;">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">
                                                Edit
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection