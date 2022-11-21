@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center text-mute"> {{ __("Articles") }} </h1>

    	@foreach($articles as $article)
		@if($article->deleted == 0)
	        <div class="panel panel-default">
	            <div class="panel-heading">
	            	<a href="articles/{{ $article->id }}"> {{ $article->name }} </a>
	            </div>

	            <div class="panel-body">
	                {{ $article->description }}
	            </div>
	        </div>
    	@empty
	    <div class="alert alert-danger">
	        {{ __("No hay ningún article en este momento") }}
	    </div>
		@endif
    	@endforeach
        </div>
    </div>
@endsection
