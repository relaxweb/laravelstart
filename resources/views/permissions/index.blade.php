{{-- \resources\views\permissions\index.blade.php --}}
@extends('layouts.app2')

@section('title', '| Permissions')

@section('content')

<div class="col-lg-10 col-lg-offset-1">
    <h1>
        <i class="fa fa-key"></i> Available Permissions
        <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right" style="margin: 0 0.3rem;">Roles</a>
        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success pull-right">Add Permission</a>
	</h1>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php $c = 1; $mod = $permissions[0]->module; ?>
              @foreach ($permissions as $permission)
                @if($c == 1 || $mod != $permission->module)
                <tr>
                    <td colspan="2"><b>{{ $permission->module }}</b></td>
                </tr>
                <?php $c++; $mod = $permission->module; ?>
                @endif
                <tr>
                    <td style="padding-left:2rem;">  {{ $permission->name }}</td> 
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection