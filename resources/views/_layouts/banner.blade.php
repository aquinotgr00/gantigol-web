<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="min-height: 70px;">
    <div class="carousel-inner" role="listbox">
        @if (count($banners) >= 1)
            @foreach ($banners as $key => $banner)
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item {{ $key == 0 ? 'active':'' }}" style="background-image: url('http://fcwallpaper.com/wp-content/uploads/2018/07/Wallpaper-Desktop-CR7-Juventus-HD.jpg')">>
                    <div class="carousel-caption d-none d-md-block">
                        <h3 class="display-4">{{$banner['title']}}</h3>
                        <a class="btn btn-primary" href="{{ route('blog.post', $banner['url']) }}">SELENGKAPNYA</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<br>