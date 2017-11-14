@extends('layouts.app2')
@section('content')
    <div class="container">
        <?php //print_r($global['modules']); ?><!-- Auth::user()->hasPermissionTo('Administer roles & permissions') -->
        @if($global['modules']['posts']->active)
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Posts</h3></div>
                    <div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>
                    @foreach ($posts as $post)
                        <div class="panel-body">
                            <ul style="list-style:none; margin:0; padding:0;">
	                            <li>
	                                <a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>
	                                    <p class="teaser">
	                                       {{  str_limit($post->body, 100) }} {{-- Limit teaser to 100 characters --}}
	                                    </p>
	                                </a>
	                            </li>
                            </ul>
                        </div>
                    @endforeach
                </div>
                <div class="text-center">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
        @endif

    </div>
@endsection