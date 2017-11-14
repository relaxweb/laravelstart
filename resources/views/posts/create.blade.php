@extends('layouts.app2')

@section('title', '| Create New Post')

@section('content')
  @if($global['modules']['posts']->active)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create New Post</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'posts.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('body', 'Post Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br>
            
            <div class="form-control">
              {!! Form::file('image', array('class' => 'image')) !!}
            </div>
            
            <br>

            {{ Form::submit('Create Post', array('class' => 'btn btn-success btn-lg btn-block')) }}
            <a href="{{ url('posts') }}" class="btn btn-default">Cancel</a>

            {{ Form::close() }}
        </div>
        </div>
    </div>
 @endif
@endsection