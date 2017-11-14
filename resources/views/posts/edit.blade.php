@extends('layouts.app2')

@section('title', '| Edit Post')

@section('content')
@if($global['modules']['posts']->active)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Edit Post</h1>
            <hr>
                {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}
                <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

                {{ Form::label('body', 'Post Body') }}
                {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

                {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>

                {{ Form::close() }}
        </div>
        </div>
    </div>
@endif
@endsection