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
                                                <form action="{{ route('articles.store')}}" method="POST" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="title" class="col-md-12 control-label">{{ __("Title") }}</label>
                                                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required autocomplete="title"> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="image" class="col-md-12 control-label">{{ __("Imagen") }}</label>
                                                                <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image">
                                                    </div>
                                                    <div class="form-group">{{ __("Description") }}</label>
                                                        <label for="description" class="col-md-12 control-label">
                                                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cicle" class="col-md-4 col-form-label text-md-right">{{ __('Cicle ID') }}</label>
                                                            <div class="col-md-6">
                                                                <select name="cicle" onChange="combo(this, 'demo')" class="form-control @error('cicle') is-invalid @enderror" name="cicle" required>
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
                                                        </label>
                                                    </div>

                                                        
                                                            
                                                    

                                                        <div class="form-group row mb-0">
                                                            <div class="col-md-6 offset-md-6">
                                                               
                                                                    <br>
                                                                    <button style="cursor:pointer" type="submit" class="btn btn-primary">Submit</button>
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
