@extends('layouts.app2')
@section('content')
    <div class="container">
        <?php //print_r($posts); ?>
        <div class="row">
            <div class="col-md-12">
                <h3>Dashboard</h3>    
            </div>

            <div class="col-md-9">
              
              <div class="panel panel-default panelpadding">
                 More content here
              </div> 
               
            </div>

            <div class="col-md-3">
              @if($global['modules']['posts']->active)  
                <div class="panel panel-default panelpadding">
                 @include('layouts.posts_block')
                </div>
              @endif
            </div>

        </div>
    </div>
@endsection