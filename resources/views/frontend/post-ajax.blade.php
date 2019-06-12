<div class="card-deck">
    @foreach ($data->post->data as $key => $post)
        @if (0 !== $key && 0 === ($key%3))
            </div>
            <div class="card-deck">
        @endif
        <div class="card col-md-4 px-0">
            <a href="{{ route('blog.post', $post->id) }}">
                <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
            </a>
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{{strip_tags($post->body)}}</p>
            </div>
            <div class="card-footer">
                <small class="text-muted">Last updated 3 mins ago</small>
            </div>
        </div>
    @endforeach
</div>