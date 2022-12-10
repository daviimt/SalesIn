@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header sd-flex justify-content-between align-items-center">
                    <a style="font-size:150%;font-weight: bold;"> {{ __('ARTICLES') }} </a>
                    <a href="articles/newArticle" class="btn btn-primary btn-sm">New</a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @forelse($articles as $article)
                    @if($article->deleted==0)
                    <div class="panel panel-default">
                        <div class="panel-heading panel-heading-article">
                            <a href="{{route('articles.edit', $article->id)}}" style="font-size:140%;font-weight: bold;"> {{ $article->title }} </a>
                        </div>
                        <div class="panel-body">
                            <label><img src="{{ asset('images/'.$article->image) }}" style="width:200px;"></></label>
                            {{ $article->description }}
                            <br>
                            <a class="btn btn-primary btm-sm float-right" href="{{ route('articles.edit', $article->id ) }}"> Edit</a>
                            <a>    </a>
                            <form class="float-right" action="{{ route('articles.softdel', $article->id) }}" method="POST" style="display : inline-block;" onsubmit="return confirm('Seguro que deseas borrar?')">
                                @csrf
                                @METHOD('PUT')
                                <button class="btn btn-danger" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                    <hr />
                    @endif
                    @empty
                    <div class="alert alert-danger">
                        {{ __("There isn't any new at the moment") }}
                    </div>
                    

                    @endforelse
                    <div class="card-footer mr-auto">
                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection