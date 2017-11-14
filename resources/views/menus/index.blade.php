@extends('layouts.app2')

@section('title', '| Menu')

@section('content')
    <div class="container">
      <div class="panel panel-default" style="padding:0 2rem;">
        <div><h3>Menu</h3></div>
        <div class="row" style="margin-top:1rem;">
            <div class="col-md-12">
            <table class="table table-bordered table-striped">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Link</th>
            			<!-- <th>Class</th> -->
            			<th>Has Child</th>
            			<th>Parent</th>
            			<th>Part</th>
            			<th>Weight</th>
            			<th>Active</th>
            			<!-- <th>Permission</th> -->
            		</tr>
            	</thead>
            	<tbody>
            		@foreach($menu as $m)
            			<tr>
            				<td>{{ $m->name }}</td>
            				<td>{{ $m->link }}</td>
            				<!-- <td>{{ $m->class }}</td> -->
            				<td>{{ $m->has_child }}</td>
            				<td>{{ $m->parent_id }}</td>
            				<td>{{ $m->part }}</td>
            				<td>{{ $m->weight }}</td>
            				<td>{{ $m->active }}</td>
            				<!-- <td>{{ $m->permission_id }}</td> -->
            			</tr>
            		@endforeach
            	</tbody>
            </table>
            </div>
        </div>
     </div>
    </div>

@endsection