@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-body" style="margin_bottom:10px;">
        <div class="col-md">
            <div class="card">
                <div class="card-header">{{ __('New Article') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('articles.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                                    <div class="col-md-6">  
                                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>
                                        @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
                                    <div class="col-md-6">
                                        <textarea rows="5" id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>
                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="cicle" class="col-md-4 col-form-label text-md-right">{{ __('Cicle ID') }}</label>
                                    <div class="col-md-6">
                                        <select name="cicle" onChange="combo(this, 'demo')" class="form-control @error('cicle') is-invalid @enderror" name="cicle" required >
                                            <option value="" selected disabled hidden>Cicles</option>
                                            @foreach($cicles as $cicle)
                                                <option value="{{$cicle->id}}" > {{ $cicle->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('cicle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file" name="image" class="@error('image') is-invalid @enderror" required>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                        <!-- <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @METHOD('POST')
                                <div class="form-group row">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file" name="image" class="@error('image') is-invalid @enderror" required>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
