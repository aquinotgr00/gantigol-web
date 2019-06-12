<div class="card-deck">
    @foreach ($products->data as $key => $product)
        @php $key++ @endphp
        <div class="col-md-4 px-0">
            <div class="card overflow-hidden">
                <div class="card-badge">Pre Order</div>
                <a href="products/item/{{$product->id}}">
                    <img class="card-img-top gambar" src="{{ asset('images\produk\2.png') }}">
                </a>
                <div class="card-body produk">
                    <a href="#">
                        <h5 class="card-title">{{ $product->name }}</h5>
                    </a>
                    <p class="card-text">Rp. {{ $product->price }}</p>
                </div>
            </div>
        </div>
        @if (0 === ($key%3))
            </div>
            <div class="card-deck">
        @endif
    @endforeach
</div>