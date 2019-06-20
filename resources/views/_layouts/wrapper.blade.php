<!DOCTYPE html>
<html lang="en">

<head>
    <title>GANTIGOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/mfg8mxp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/lightslider.css') }}">
    <script type="https://fonts.googleapis.com/css?family=Proxima+Nova"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/lightslider.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container">
            <ul class="nav navbar-nav pull-sm-left ">
                <li class="nav-item wiki">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">WIKI BOLA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('blog.formasi')}}">FORMASI</a>
                        <a class="dropdown-item" href="{{route('blog.statistik')}}">STATISTIK</a>
                        <a class="dropdown-item" href="{{route('blog.taktik')}}">TAKTIK</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.category', 'game') }}">GAME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.category', 'tokoh') }}">TOKOH</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">LAPAK</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-logo text-center">
                <li class="nav-item">
                    <a href="/"><img id="logo" border="0" alt="logo" src="{{ asset('images\gantigol\logo.svg') }}"></a>
                </li>
            </ul>
            <ul class="nav navbar-nav pull-sm-right">
                <li class="nav-item search">
                    <div class="search">
                        <form action="{{ route('homepage.search') }}" method="post" id="searchForm">@csrf
                            <input type="text" id="searchInput" name="term" class="form-control input-sm" maxlength="64" placeholder="Search" />
                        </form>
                        <a href="#" class="search-btn">
                            <img class="btn input" id="searchImgBtn" src="{{ asset('images\gantigol\search.svg') }}">
                        </a>
                    </div>
                </li>
                <li class="nav-item forgot dropdown login-parent">
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><img class="btn" src="{{ asset('images\gantigol\user.svg') }}"></a>
                    @if (!Session::has('token'))
                        <div class="dropdown-menu login-child login">
                            @if (session('error'))
                                <span class="text-white">{{ session('error') }}</span>
                            @endif
                            <form action="/signin" class="form" id="login-form" method="POST">@csrf
                                <input type="text" name="cart_session" id="cartSession" class="d-none" value="valuee">
                                <div class="form-group user-login">
                                    <input name="username" id="username" placeholder="Email" class="form-control form-control-sm login_inputs" type="text">
                                    <label for="username" generated="true" class="error invalid-feedback"></label>
                                </div>
                                <div class="form-group user-login">
                                    <input name="password" id="password" placeholder="Password" class="form-control form-control-sm login_inputs" type="password">
                                    <label for="password" generated="true" class="error invalid-feedback"></label>
                                </div>
                                <div class="form-group user-login">
                                    <button type="submit" class="btn btn-primary btn-block mb-0">LOGIN</button>
                                    <br>
                                    <a href="/register">
                                        <h6 class="text-light text-center font-weight-bold">
                                            REGISTER
                                        </h6>
                                    </a>
                                </div>
                                <br>
                                <br>
                                <div class="form-group text-center">
                                    <small><a href="/reset"><h6>Forgot password?</h6></a></small>
                                </div>
                            </form>
                        </div>
                    @elseif(Session::has('token'))
                        <div class="dropdown-menu login-child login">
                            <p class="text-light mb-1">Halo,</p>
                            <h5 class="text-light">{{ Session::get('username') }}</h5>
                            <hr class="hr-cart">
                            <a href="/user"><p class="text-light">setting</p></a>
                            <a href="/signout" id="signout-link"><p class="text-light">Logout</p></a>
                        </div>
                    @endif
                </li>
                <li class="nav-item forgot dropdown dropdown-cart">
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><img class="btn chart item_image" src="{{ asset('images\gantigol\chart.svg') }}"></a>
                    <div class="dropdown-menu dropdown-cart login cart">
                        <div class="form-group">

                            <div class="shopping-cart">
                                <span class="empty_card_wrapper text-white empty_cart">Keranjang Anda Kosong</span>
                                <div class="shopping-cart-header">
                                    <div class="shopping-cart-total">
                                        <span class="lighter-text"><h6>Total:</h6></span>
                                        <span class="main-color-text"><h6 class="simpleCart_total">Rp. 0</h6></span>
                                        <hr class="hr-cart">
                                    </div>
                                </div>
                                <!--end shopping-cart-header -->

                                <ul id="cart-wrapper" class="shopping-cart-items mb-0">
                                </ul>

                                <a href="/checkout" class="btn btn-primary btn-block simpleCart_checkout bayar mt-5" style="display:none;">BAYAR</a>
                            </div>
                            <!--end shopping-cart -->

                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!--end container -->
    </nav>

    @yield('heading')

    <!-- post1 < -->
    <div class="post">
        <div class="container">
            @yield('content')
        </div>
    </div>
    
    <br>
    <br>
    <br>

    <footer>
        <div class="footer">
            <img href="{{ asset('images\gantigol\logo.svg') }}"img id="logo" border="0" alt="logo" src="{{ asset('images\gantigol\logo.svg') }}">
        </div>
        <br>
        <div class="footer">
            <p>Adalah sebuah organisasi kreatif yang membahas budaya sepakbola,</p>
            <p>yang percaya bahwa sepakbola, di atas segala urusan skor dan skill,</p>
            <p>adalah soal keriaan dan kerayaan</p>
            <div class="card-deck">
                <div class="card footer"></div>
                    <div class="card mid">
                        <hr class="card-img-top ">
                    </div>
                <div class="card footer"></div>
            </div>
        </div>
        <div class="footer" style="margin-top:7px;">
            <div class="link-footer">
                <div class="row justify-content-md-center" style="margin-top:0;">
                    <div class="col-md-8 col-xs-12">
                        <div class="row">
                            <div class="col-lg-3 col-xs-12">
                                <p><a class="footer" href="{{route('homepage.about-page')}}">Tentang Kami</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <p><a class="footer" href="{{route('homepage.contact-page')}}">Kontak Kami</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <p><a class="footer" href="{{route('homepage.faq-page')}}">FAQ</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12 px-0">
                                <p><a class="footer" href="{{route('homepage.tnc-page')}}">Syarat dan Ketentuan</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @yield('script')

    <script>
        $(document).ready(function () {
            /* Fungsi formatRupiah */
            function formatRupiah(angka){
                var number_string = angka.toString().replace(/[^,\d]/g, ''),
                split       = number_string.split(','),
                sisa        = split[0].length % 3,
                rupiah        = split[0].substr(0, sisa),
                ribuan        = split[0].substr(sisa).match(/\d{3}/gi);
    
                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if(ribuan){
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
    
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return rupiah;
            }

            // Dropdown mechanism
            // First by handling the click on the link to open/close the dropdown
            $('li.dropdown.forgot a[role=button]').on('click', function (event) {
                event.preventDefault()
                $(this).parent().toggleClass('show')
                $(this).parent().children('div.dropdown-menu.login').toggleClass('show')
                if ($(this).parent().hasClass('login-parent')) {
                    $('div.dropdown-menu.dropdown-cart').removeClass('show')
                } else if ($(this).parent().hasClass('dropdown-cart')) {
                    $('div.dropdown-menu.login-child').removeClass('show')
                }
            })
            // and then listening the clicks outside of the dropdown to close it 
            $('body').on('click', function (e) {
                if (!$('li.dropdown.forgot').is(e.target) 
                    && $('li.dropdown.forgot').has(e.target).length === 0 
                    && $('.show').has(e.target).length === 0
                ) {
                    $('li.dropdown.forgot').removeClass('show')
                    $('div.dropdown-menu.login').removeClass('show')
                }
            });

            $('#login-form').validate({
                highlight: function(element, errorClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass) {
                    $(element).removeClass('is-invalid');
                },
                rules: {
                    username: {
                        required: true,
                        email: true
                    },
                    password: 'required'
                }
            });

            // search behavior
            $('#searchImgBtn').click(evt => {
                evt.preventDefault()
                $('#searchForm').submit()
            })

            // when the signout button is clicked then clear all the cart
            $('#signout-link').on('click', function () {
                localStorage.removeItem('cart_id')
                localStorage.removeItem('session')
            })

            // remove cart item
            $('#cart-wrapper').on('click', '.simpleCart_remove', function(evt) {
                evt.preventDefault()
                const id = $(this).data('id')
                const qty = $(this).data('qty')
                const subtotal = $(this).data('price') * qty
                $.ajax({
                    url: '/api/carts/item-delete/' + id,
                    type: 'POST',
                    data: {
                        id: localStorage.getItem('cart_id'),
                        qty: qty,
                        subtotal: subtotal
                    },
                    success: res => {
                        updateTotal(res.total)
                        if (res.amount_items == 0) {
                            hideEmptyEle(false)
                        }
                        $(this).closest('.simpleCart_items').remove()
                        $(`#checkout-item-${id}`).remove()
                        @if (Request::is('checkout'))
                        @endif
                    }
                })
            })
            $('#deleteItemModal').on('click', '.simpleCart_remove', function(evt) {
                // evt.preventDefault()
                const id = $(this).data('id')
                const qty = $(this).data('qty')
                const subtotal = $(this).data('price') * qty
                $.ajax({
                    url: '/api/carts/item-delete/' + id,
                    type: 'POST',
                    data: {
                        id: localStorage.getItem('cart_id'),
                        qty: qty,
                        subtotal: subtotal
                    },
                    success: res => {
                        updateTotal(res.total)
                        if (res.amount_items == 0) {
                            hideEmptyEle(false)
                        }
                        $(this).closest('.checkout-list-items').remove()
                        $(`#checkout-item-${id}`).remove()
                    }
                })
            })

            $('#product-list').on('change', () => {
                $('#variant_id').val($('#product-list').val())
                let max = $('option:selected', this).data('max')
                $('input[name=quantity]').attr('max', max)
                $('input[name=quantity]').val(0)
            })

            function loopSizes() {
                let items = []
                let contained = false
                $('.qty').map((key, inputt) => {
                    if (inputt.value != 0) {
                        contained = true;
                        let itemObj = {}
                        itemObj['size_code'] = inputt.name
                        itemObj['quantity'] = inputt.value
                        items.push(itemObj)
                    }
                })
                if (contained) {
                    // if (localStorage.getItem('cart_id') === null) {
                        // let session = getBrowserSession()
                        // postItemToCart(items, session)
                    // } else if (localStorage.getItem('cart_id') !== null) {
                    //     putItemToCart(items)
                    // }
                }
            }

            function getBrowserSession() {
                let currentSession = localStorage.getItem('session')
                if (currentSession === null) {
                    currentSession = Math.random().toString(36).substring(2, 20) + Math.random().toString(36).substring(2, 20)
                    localStorage.setItem('session', currentSession)
                }
                return currentSession
            }

            /**
            function putItemToCart(items) {
                const cartId = localStorage.getItem('cart_id')
                $.ajax({
                    url: '/api/carts/update/' + cartId,
                    type: 'POST',
                    data: {
                        id: '{{ \Request::segment(3) }}',
                        items: items,
                    },
                    success: function (res) {
                        placeCartItems(res)
                    }
                })
            }
            function postItemToCart(items, session) {
                $.ajax({
                    url: '/api/carts/store',
                    type: 'POST',
                    data: {
                        id: '{{ \Request::segment(3) }}',
                        items: items,
                        user_token: localStorage.getItem('user_token'),
                        session: session
                    },
                    success: function (res) {
                        if (localStorage.getItem('cart_id') === null) {
                            localStorage.setItem('cart_id', res.data.id)
                        }
                        $('.dropdown-cart').toggleClass('show')
                        putSessionWithLogin()
                        getCartItems(res.data.id)
                    }
                })
            }
            function getCartIdBySession(session) {
                $.ajax({
                    url: '/api/carts/get-cart-id',
                    type: 'POST',
                    data: session,
                    success: function (res) {
                    }
                })
            }
            **/

            function storeItem(qty, session) {
                $.ajax({
                    url: '/api/carts/store',
                    type: 'POST',
                    data: {
                        id: $('#variant_id').val(),
                        price: $('.item_price').html(),
                        qty: qty,
                        user_token: localStorage.getItem('user_token'),
                        session: session
                    },
                    success: function (res) {
                        if (localStorage.getItem('cart_id') === null) {
                            localStorage.setItem('cart_id', res.data.id)
                        }
                        $('.dropdown-cart').toggleClass('show')
                        putSessionWithLogin()
                        getCartItems(res.data.id)
                    }
                })
            }

            function init() {
                @if (session('cart_id'))
                    localStorage.setItem("cart_id", "{{ session('cart_id') }}")
                    localStorage.setItem("session", "{{ session('cart_session') }}")
                @endif
                const cartId = localStorage.getItem('cart_id')
                if (cartId !== null) {
                    getCartItems(cartId)
                }
                localStorage.removeItem('user_token')
                putSessionWithLogin()
                @if (session('token'))
                    localStorage.setItem("user_token", "{{ session('token') }}")
                @endif
            }

            function putSessionWithLogin() {
                $('body').find('[name="cart_session"]').val('');
                const session = localStorage.getItem('session')
                if (session !== null) {
                    $('body').find('[name="cart_session"]').val(session);
                }
            }

            init()

            function clearCartDisplay() {
                $('#cart-wrapper').html('')
            }

            function updateTotal(price) {
                $('.simpleCart_total').html('Rp. ' + formatRupiah(price))
                @if (Request::is('checkout'))
                    $('.total_price').html(price)
                    // $('.total_price_text').html(formatRupiah(price))
                    let courier = parseInt($('#courier_type').val())
                    let discount = $('#discount').val()
                    $('.total_price_text').html(formatRupiah(price + courier - discount))
                @endif
            }

            function hideEmptyEle(hide) {
                if (hide) {
                    $('.empty_cart').css('display', 'none')
                    $('.simpleCart_checkout').css('display', 'block')
                } else if (!hide) {
                    $('.empty_cart').css('display', 'block')
                    $('.simpleCart_checkout').css('display', 'none')
                }
            }

            @if (Request::is('checkout'))
            function placeCartItemsOnCheckout(data) {
                data.map(item => {
                    $(
                        `<div id="checkout-item-${item.id}" class="checkout-list-items">` +
                            '<hr class="hr-light top-line">' +
                            '<div class="row barang">' +
                                '<div class="col-7">' +
                                    '<div style="float:left;width:25%;">' +
                                        `<img class="outline" src="${item.product_variant.product.image}" style="width:100%;" />` +
                                    '</div>' +
                                    '<div class="detil-barang">' +
                                        '<div>' +
                                            `<span class="judul-barang">${item.product_variant.product.name}</span>` +
                                        '</div>' +
                                        '<div>' +
                                            '<span class="judul-barang">HARGA  </span>' +
                                            `<span> Rp ${formatRupiah(item.price)}</span>` +
                                        '</div>' +
                                        '<div>' +
                                            '<span class="judul-barang size-cart">SIZE </span>' +
                                            `<span> ${item.product_variant.variant}</span>` +
                                        '</div>' +
                                        '<div>' +
                                            '<span class="judul-barang qty-cart">QTY  </span>' +
                                            `<span>  ${item.qty}</span>` +
                                        '</div>' +
                                        // '<div class="quantity buttons_added">' +
                                        //     `<input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="${item.qty}" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">` +
                                        // '</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-1">' +
                                    '<div>' +
                                        '<div class="diskon">0%</div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class=" col-3">' +
                                    `<div class="harga">Rp. ${formatRupiah(item.qty*item.price)}</div>` +
                                '</div>' +
                                '<div class="col-1">' +
                                    // `<a href="#" class="far fa-trash-alt fa-sm barang simpleCart_remove" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"> </a>` +
                                    `<a href="#" class="far fa-trash-alt fa-sm barang deleteModal" data-toggle="modal" data-target="#deleteItemModal" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"> </a>` +
                                '</div>' +
                            '</div>' +
                        '</div>'
                    ).appendTo('#checkout-item-list')
                })
            }
            @endif

            function appendToCart(item) {
                $(
                    `<li id="cart-item-${item.id}" class="clearfix simpleCart_items">` +
                        `<img src="${item.product_variant.product.image}" style="width:25%;" />` +
                        '<div class="detil">' +
                            '<div class="col">' +
                                `<span class="item-name">${item.product_variant.product.name}</span>` +
                            '</div>' +
                            '<div class="item-price">' +
                                '<span>HARGA  </span>' +
                                `<span class="input-data">Rp. ${formatRupiah(item.price)}</span>` +
                            '</div>' +
                            '<div class="item-price">' +
                                '<span class="size-cart">SIZE </span>' +
                                `<span class="input-data"> ${item.product_variant.variant}</span>` +
                            '</div>' +
                            '<div class="item-price">' +
                                '<span class="qty-cart">QTY  </span>' +
                                `<span class="input-data">  ${item.qty}</span>` +
                            '</div>' +
                            '<div class="main-color-text">' +
                                `<a href="#" class="simpleCart_remove" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"><i class="far fa-trash-alt fa-sm"></i></a>` +
                            '</div>' +
                        '</div>' +
                    '</li>'
                ).appendTo('#cart-wrapper')
            }

            function placeCartItems(data) {
                clearCartDisplay()
                updateTotal(data.data.total)
                data.data.get_items.map(item => {
                    appendToCart(item)
                })
                hideEmptyEle(true)
                @if (Request::is('checkout'))
                    placeCartItemsOnCheckout(data.data.get_items)
                @endif
            }
            
            function getCartItems(id) {
                let url = '/api/carts/items/' + id

                $.ajax({
                    url: url,
                    type: 'GET',
                    data: {
                        session: localStorage.getItem('session')
                    },
                    success: function (res) {
                        if (res.data.get_items.length !== 0) {
                            placeCartItems(res)
                        } else if (res.data.get_items.length === 0) {
                            if (localStorage.getItem('user_token') === null) {
                                localStorage.removeItem('cart_id')
                                localStorage.removeItem('session')
                            }
                        }
                    }
                })
            }

            $('#addToCart').click(() => {
                let qty = $('input[name=quantity]').val()
                let variant = $('#product-list').val()
                if (qty <= $('input[name=quantity]').attr('max') && variant !== 'null') {
                    let session = getBrowserSession()
                    storeItem(qty, session)
                    // loopSizes()
                }
            })
        })
    </script>

</body>
</html>