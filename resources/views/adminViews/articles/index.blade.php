@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h1 class="text-center text-mute"> {{ __("Articles") }} </h1>

        @foreach($articles as $article)
        @if($article->deleted==0)
        <div class="panel panel-default">
            <div class="panel-heading panel-heading-article">
                <a href="{{route('articles.edit', $article->id)}}"> {{ $article->title }} </a>
                <!-- <span class="pull-right">
                        {{ __("Articles") }}: {{ $article->title }}
                    </span> -->
            </div>

            <div class="panel-body">
                {{ $article->description }}
            </div>
            <a class="btn btn-primary btm-sm" href="{{ route('articles.edit', $article->id ) }}"> Edit</a>
            <form action="{{ route('articles.softdel', $article->id) }}" method="POST" style="display : inline-block;" onsubmit="return confirm('Seguro que deseas borrar?')">
                @csrf
                @METHOD('PUT')
                <button class="btn btn-danger" type="submit">
                    SoftDelete
                </button>
            </form>
        </div>
        <hr />
        @endif
        @endforeach

        {{ $articles->links() }}


        <h2>{{ __("Añadir un nuevo Article") }}</h2>

        <hr />

        <!-- <form method="POST" action="articles">
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
        </form> -->


    </div>
</div>
@endsection