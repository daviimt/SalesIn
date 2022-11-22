@extends('layouts.app')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        @if(session('message'))
        <div class="alert alert-{{ session('message')[0] }}">
            {{ session('message')[1] }}
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update</div>
                <div class="card-body">
                    <form action="{{ route('articles.update',$article->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title}}" required autocomplete="title" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $article->description}}" required autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $article->image }}" required autocomplete="image">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cicle_id" class="col-md-4 col-form-label text-md-right">Cicle</label>
                            <div class="col-md-6 input-group{{ $errors->has('cicle') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('cicle_id') ? ' is-invalid' : '' }}" name="cicle_id">
                                    @foreach($cicles as $cicle)
                                    @if($cicle->id==$article->cicle_id)
                                    <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                                    @foreach($cicles as $cicle)
                                    <option value="{{$cicle->id}}">{{$cicle->name}}</option>
                                    @endforeach
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <br>
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection