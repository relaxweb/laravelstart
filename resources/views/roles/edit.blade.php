@extends('layouts.app2')

@section('title', '| Edit Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
    <hr>

    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Role Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>
    <div class='form-group'>
        <?php $c = 1; $mod = $permissions[0]->module; ?>
        @foreach ($permissions as $permission)
          @if($c == 1 || $mod != $permission->module)
            <h6>
              <b>{{ $permission->module }} Module</b>
            </h6>
            <?php $c++; $mod = $permission->module; ?>
          @endif
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
        @endforeach
    </div>

    <br>
    {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}
        <a href="{{ url('roles') }}" class="btn btn-default">Cancel</a>

    {{ Form::close() }}    
</div>

@endsection