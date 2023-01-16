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
                                            <th>Title</th>
                                            <th class="text-right">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($offers as $offer)
                                            @if($offer->deleted == 0)
                                            <tr>                                        
                                                <td>
                                                    @foreach ($cicles as $cicle)
                                                        @if($offer->cicle_id == $cicle->id) 
                                                            @if(str_contains($cicle->img, ".png"))
                                                                <img src="{{ asset('images/'.$cicle->img) }}" style="width:40px;"></>
                                                                @else
                                                                <img src="{{ asset('images/noimage.png') }}" style="width:40px;"></>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </td>

                                                <td>{{ $offer->title }}</td>

                                                <td class="td-actions text-right">
                                                   
                                                    </form>

                                                    @else
                                                    <button class="btn btn-warning" type="submit" disabled=true>
                                                        Not actived
                                                    </button>
                                                    @endif

                                                    <form action="{{ route('users.offerApply', $offer->id)}}" method="POST" class="float-right">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="submit" class="btn btn-primary btm-sm float-right"> Apply</button>
                                                    </form>

                                                    <!-- Show -->
                                                    <a style="visibility: hidden" class="float-right">
                                                            <a class="float-right">
                                                                <button type="button" class="btn btn-primary ttm-sm" data-toggle="modal" data-target="#modal-show-{{$offer->id}}">
                                                                    Show
                                                                </button>
                                                            </a>
                                                            <!-- {{-- Show - Modal --}} -->
                                                            <div class="modal fade" id="modal-show-{{$offer->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <form action="{{ route('users.offerShow', $offer->id)}}" method="GET" class="float-right">
                                                                        @csrf
                                                                        @method('GET')
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title" id="exampleModalLabel">Offer details</h1>
                                                                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <strong>{{$offer->title}}</strong>
                                                                                <br>
                                                                                {{$offer->description}}
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <!-- {{-- End Show Modal --}} -->
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="float-left">
                            <a href="{{ route('pdf') }}">
                                <button type="button" class="btn btn-primary ttm-sm float-left">PDF</button>
                            </a>
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