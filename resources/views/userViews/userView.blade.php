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
                                <h4 class="card-title">Offers</h4>
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
                                            <th>IMG</th>    
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th class="text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($offers as $offer)
                                            @if($offer->deleted == 0)
                                            <tr>
                                                @foreach ($cicles as $cicle)
                                                    @if($offer->cicle_id == $cicle->id)
                                                    <td>
                                                        @if($cicle->img != "")
                                                                <img src="{{ asset('images/'.$cicle->img) }}" style="width:40px;"></>
                                                        @else
                                                                <img src="{{ asset('images/noimage.png') }}" style="width:40px;"></>
                                                        @endif
                                                    </td>
                                                    @endif
                                                @endforeach
                                                <td>{{ $offer->id }}</td>
                                                <td>{{ $offer->title }}</td>

                                                <td class="td-actions text-right">

                                                    <!-- INICIO PARA SOLO ADMINISTRADOR -->
                                                    <!-- @can('user_show')
                                                    <a href="{{ route('users.show', $offer->id) }}"
                                                        class="btn btn-info"><i class="material-icons">person</i></a>
                                                    @endcan
                                                    @can('user_edit')
                                                    <a href="{{ route('users.edit', $offer->id) }}"
                                                        class="btn btn-warning"><i class="material-icons">edit</i></a>
                                                    @endcan
                                                    @can('user_destroy')
                                                    <form action="{{ route('users.delete', $offer->id) }}" method="POST"
                                                        style="display: inline-block;"
                                                        onsubmit="return confirm('Seguro?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger" type="submit" rel="tooltip">
                                                            <i class="material-icons">close</i>
                                                        </button> -->
                                                    </form>
                                                    @endcan
                                                    <!-- FINAL -->
                                                    <!-- @if($offer->actived == 0)
                                                    <form action="{{ route('users.activate', $offer->id) }}"
                                                        method="POST" style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas activar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit" style="background-color:limegreen;border-color: limegreen;">
                                                            Activate
                                                        </button>
                                                    </form>
                                                    @endif

                                                    @if($offer->actived == 1)
                                                    <form action="{{ route('users.desactivate', $offer->id) }}"
                                                        method="POST" style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas desactivar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit">
                                                            Desactivate
                                                        </button>
                                                    </form>
                                                    @endif -->
                                                    @else
                                                    <button class="btn btn-warning" type="submit" disabled=true>
                                                            Not actived
                                                        </button>
                                                    @endif

                                                    <form action="{{ route('users.softdel', $offer->id) }}" method="POST"
                                                        style="display : inline-block;"
                                                        onsubmit="return confirm('Seguro que deseas borrar?')">
                                                        @csrf
                                                        @METHOD('PUT')
                                                        <button class="btn btn-warning" type="submit">
                                                            VER
                                                        </button>
                                                    </form>

                                                    <form action="{{ route('users.show', $offer->id) }}"
                                                        style="display : inline-block;">
                                                        @csrf
                                                        <button class="btn btn-info" type="submit">
                                                            APLICAR
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer mr-auto">
                                {{$offers->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection