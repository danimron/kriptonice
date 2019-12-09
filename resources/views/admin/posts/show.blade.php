@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>
                            {{ $post->title }} <small>by {{ $post->user->name }}</small>

                            <a href="{{ url('admin/posts') }}" class="btn btn-default pull-right">Go Back</a>
                        </h2>
                    </div>

                    <div class="panel-body">
                        <div>
                        <textarea id="c" class="form-control" name="c" rows="4" cols="50">{{ $post->body }}</textarea>
                        </div>
                        
                        <div>
                        <input id="key" placeholder="Keyword" class="form-control" name="key" size="10" type="text"> 
                        </div>

                        <div>
                        <input id="pc" name="pc"  size="1" value="x" type="hidden">
                        <input name="btnDe" class="btn btn-primary" value="Decrypt" onclick="Decrypt()" type="button">                     
                        </div>
                        
                        <div>
                        <textarea name="p" id="p" class="form-control"  rows="4" cols="50" placeholder="Hasil Decrypt"></textarea>
                        </div>
                        
                        <p><strong>Category: </strong>{{ $post->category->name }}</p>
                        <p><strong>Tags: </strong>{{ $post->tags->implode('name', ', ') }}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
