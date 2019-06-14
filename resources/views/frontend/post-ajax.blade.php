<div class="card-deck">
    @foreach ($data->post->data as $key => $post)
        @if (0 !== $key && 0 === ($key%3))
            </div>
            <div class="card-deck">
        @endif
        <div class="col-md-4 px-0">
            <div class="card">
                <a href="{{ route('blog.post', $post->id) }}">
                    <img class="card-img-top" src="{{ asset('images\content\2.png') }}" alt="Card image cap">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$post->title}}</h5>
                    <p class="card-text">{{substr(strip_tags($post->body), 0, 140)}}</p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
    @endforeach
</div>