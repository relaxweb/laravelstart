<div id="postsblock">
  <h5>Posts</h5>
  <ul style="list-style:none; margin:0; padding:0;">
  	@foreach($posts as $post)
    <li>
       <h5>
       	<a href="{{ route('posts.show', $post->id ) }}">
        	<b>{{ $post->title }}</b>
        </a>
       </h5> 
    </li>                        
    @endforeach
  </ul>
</div>