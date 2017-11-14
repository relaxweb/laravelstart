{{-- \resources\views\permissions\create.blade.php --}}
@extends('layouts.app2')

@section('title', '| Create Permission')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Permission</h1>
    <br>

    {{ Form::open(array('url' => 'permissions')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>
    <br>
    <div class="form-group">
        {{ Form::label('module', 'Module') }}
        <select id="module" class="form-control" name="module">
        @foreach($modules as $module)
            <option value="{{ $module->id }}">{{ $module->name }}</option>
        @endforeach
        </select>
    </div>
    <br>

    @if(!$roles->isEmpty())
        <h4>Assign Permission to Roles</h4>

        @foreach ($roles as $role) 
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    @endif
    <br>
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
     <a href="{{ url('permissions') }}" class="btn btn-default">Cancel</a>
    {{ Form::close() }}

</div>

@endsection