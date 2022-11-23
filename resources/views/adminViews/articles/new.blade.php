@extends('layouts.app')
@section('content')
<div class="card-body" style="margin_bottom:10px;">
                        <div class="col-md">
                            <div class="card card-user">
                            <div class="card-header">{{ __('New Article') }}</div>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                </div>
                                <div class="card-body" style="margin_bottom:10px;">
                                    <div class="col-md">
                                        <div class="card card-user">
                                            <div class="card-body">
                                            <form method="POST" action="{{ route('new') }}">
                                                @csrf
                                                <div class="form-group">
                                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title">
                                                    <label for="title" class="col-md-12 control-label">
                                                        {{ __("Title") }}
                                                    </label>
                                                </div>
                                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image">
                                                    <label for="image" class="col-md-12 control-label">
                                                        {{ __("Imagen") }}
                                                    </label>
                                                </div>
                                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">
                                                    <label for="description" class="col-md-12 control-label">
                                                        {{ __("Imagen") }}
                                                    </label>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="cicle" class="col-md-4 col-form-label text-md-right">{{ __('Cicle ID') }}</label>
                                                    <div class="col-md-6">
                                                        <select name="cicle" onChange="combo(this, 'demo')" class="form-control @error('cicle') is-invalid @enderror" name="cicle">
                                                            <option value="" selected disabled hidden>Cicles</option>
                                                            @foreach($cicles as $cicle)
                                                                <option value="{{$cicle->id}}"> {{ $cicle->name }}</option>
                                                            @endforeach
                                                        </select>  

                                                        @error('cicle')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
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
