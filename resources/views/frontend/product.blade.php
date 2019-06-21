@extends('_layouts.wrapper')

@section('heading')
@include('_layouts.breadcrumb')
@endsection

@section('content')
<div class="row">
    <div class="col-5">
        {{-- <img class="images-post" src="{{ $data->data->image }}"> --}}
        <ul class="lightSlider">
            {{-- @if (count($data->data->images) == 0) --}}
            <li data-thumb="{{ $data->data->image }}">
                <img class="images-post" src="{{ $data->data->image }}" />
            </li>
            @if (count($data->data->images) > 0)
                @foreach ($data->data->images as $image)
                    <li data-thumb="{{ $image->image }}">
                        <img class="images-post" src="{{ $image->image }}" />
                    </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="col-7">

        <div class="col">

            @if (null != $data->data->pre_order)
            <hr class="hr-produk">
            @endif

            <div class="row">
                <div class="col-9 simpleCart_shelfItem">
                    <input type="text" name="variant_id" id="variant_id" class="d-none"
                        @if ($data->data->variants[0]->variant == "ALL SIZE")
                            value="{{$data->data->variants[0]->id}}"
                        @endif
                        >
                    <span class="d-none">{{$data->data->price}}"></span>
                    <img style="display:none;" class="item_image" src="{{ $data->data->image }}">
                    <h2 class="headline-detail item_name">{{ $data->data->name }}</h2>
                    <h4>Rp. <span>{{ \AppHelper::instance()->rupiah($data->data->price) }}</span></h4>

                    @if (null != $data->data->pre_order)
                        <h5>
                            Tanggal Berakhir
                        </h5>
                        <p>{!! date_format(new DateTime($data->data->pre_order->end_date),'d F')!!}</p>
                    @endif

                    <br>

                    <h5>
                        DESKRIPSI
                    </h5>
                    <div class="text" style="line-height:1.5;">
                        <p>
                            {!! $data->data->description !!}
                        </p>
                    </div>
                    <br>

                    @if (null != $data->data->pre_order)
                        @if ($data->data->variants[0]->variant != 'ALL SIZE')
                            <form action="/checkout-preorder" method="post" id="pre-order-form">@csrf
                                <h5>
                                    PILIH UKURAN
                                </h5>
                                <div class="row col-9 size">
                                    @foreach ($data->data->variants as $key => $item)
                                        @php $key++ @endphp
                                        <div class="quantity buttons_added @if ($key%2 != 0) kiri @endif">
                                            <span class="ukuran"> {{$item->variant}}</span>
                                            <input type="button" value="-" class="minus"><input type="number" data-id="{{$item->id}}" step="1" min="0" max="" name="items[{{$item->id}}]" value="0" title="Quantity" class="input-text qty text" size="4"><input type="button" value="+" class="plus">
                                        </div>
                                        @if ($key%2 == 0 && $key != count($data->data->variants))
                                            </div>
                                            <div class="row col-9 size">
                                        @endif
                                    @endforeach
                                </div>
                                <br>
                                <button type="button" id="sizeChartBtn" data-toggle="modal" data-target="#size_chart_modal" class="btn btn-outline-dark col-8"
                                    @if ($data->data->category->size_chart == null)
                                        disabled
                                    @endif
                                    >
                                    LIHAT TABEL UKURAN
                                </button>
                                <br>
                                <br>

                                <button type="submit" class="btn btn-dark col-8 bayar item_add" id="preOrder">
                                    BAYAR
                                </button>
                            </form>
                        @endif
                    @elseif (null == $data->data->pre_order)
                        @if ($data->data->variants[0]->variant != 'ALL SIZE')
                            <h5>
                                PILIHAN PRODUK 
                            </h5>
                            <div class="form-group">
                                <select class="form-control col-8" id="product-list" name="product-list">
                                    <option value="null">Pilih Produk</option>
                                    @foreach($data->data->variants as $item)
                                        <option data-max="{{$item->quantity_on_hand}}" value="{{$item->id}}">{{$item->variant}}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="row col-9 size">
                            <div class="quantity buttons_added">
                                <span class="ukuran">QTY</span>
                                @if ($data->data->variants[0]->variant != 'ALL SIZE')
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                @elseif ($data->data->variants[0]->variant == 'ALL SIZE')
                                    <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="{{$data->data->variants[0]->quantity_on_hand}}" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
                                @endif
                            </div>
                        </div>
                        <br>
                        <button type="button" id="sizeChartBtn" data-toggle="modal" data-target="#size_chart_modal" class="btn btn-outline-dark col-8"
                            @if ($data->data->category->size_chart == null)
                                disabled
                            @endif
                            >
                            LIHAT TABEL UKURAN
                        </button>
                        <br>
                        <br>

                        <button type="button" class="btn btn-dark col-8 bayar item_add" id="addToCart">
                            BAYAR
                        </button>
                    @endif

                    <br>
                    <br>
                    <br>
                </div>
                @if (null != $data->data->pre_order)
                <div class=" col-3 ">
                    <h2 class="badge-text ">
                        PRE-ORDER
                    </h2>
                </div>
                @endif
            </div>

        </div>

    </div>
</div>

@if(!empty($related->data))
    <!-- related products -->
    <h4 class="section-header_title">PRODUK TERKAIT</h4>
    <hr>
    <div class="card-deck">
        @foreach($related->data as $i=>$row)
        <div class="card col-md-3 px-0">
            <a href="{{ route('products.single-product', $row->id) }}">
                <img class="card-img-top gambar" src="{{$row->image}}">
            </a>
            <div class="card-body produk">
                <a href="{{ route('products.single-product', $row->id) }}">
                    <h5 class="card-title">{{$row->name}}</h5>
                </a>
                <p class="card-text">Rp.{{\AppHelper::instance()->rupiah($row->price)}}</p>
            </div>
        </div>
    @endforeach
    </div>
@endif

<!-- Size Chart Modal -->
<div class="modal fade" id="size_chart_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal_size_chart" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img src="{{$data->data->category->size_chart->image}}" alt="size chart image" style="width:100%;">
            </div>
            <div class="modal-footer border-top-0">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.lightSlider').lightSlider({
        gallery: true,
        item: 1,
        loop:true,
        galleryMargin: 20,
        thumbMargin: 40,
        thumbItem: 5,
        addClass: 'my-lightslider',
    });
</script>
@endsection