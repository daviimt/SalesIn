@extends('layouts.app')
@section('content')
<div class="card-body" style="margin_bottom:10px;">
                        <div class="col-md">
                            <div class="card card-user">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                    <div class="card-header card-header-primary">
                                        <div class="card-title">Nuevo Articulo</div>
                                    </div>  
                                </div>
                                <div class="card-body" style="margin_bottom:10px;">
                                    <div class="col-md">
                                        <div class="card card-user">
                                            <div class="card-body">
                                            <form method="POST" action="ar  ticles">
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
                                    </div>
                                </div>
                        </div>

@endsection
