@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
    	<h1 class="text-center text-mute"> {{ __("Articles") }} </h1>

    	@foreach($articles as $article)
	        <div class="panel panel-default">
	            <div class="panel-heading panel-heading-article">
	            	<a href="{ route('admin.articles.edit, $article->id') }}"> {{ $article->title }} </a>
                    <span class="pull-right">
                        {{ __("Articles") }}: {{ $article->title }}
                    </span>
	            </div>

	            <div class="panel-body">
	                {{ $article->description }}
	            </div>
	        </div>
			<hr/>
    	@endforeach
        
    	{{ $articles->links() }}
        

        <h2>{{ __("Añadir un nuevo Article") }}</h2>

        <hr />

        <form method="POST" action="articles">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name" class="col-md-12 control-label">
                    {{ __("Title") }}
                </label>
                <input id="name" class="form-control" name="name" value="{{ old('name') }}"/>
            </div>
            <div class="form-group">
                <label for="description" class="col-md-12 control-label">
                    {{ __("Description") }}
                </label>
                <input id="description" class="form-control" name="description" value="{{ old('description') }}"/>
            </div>
            <button type="submit" name="addArticle" class="btn btn-default">
                {{ __("New Article") }}
            </button>
        </form>


        </div>
    </div>
@endsection