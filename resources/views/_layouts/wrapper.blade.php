<!DOCTYPE html>
<html lang="en">

<head>
    <title>GANTIGOL</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.typekit.net/mfg8mxp.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{ asset('css/lightslider.css') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script type="https://fonts.googleapis.com/css?family=Proxima+Nova"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset('js/lightslider.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <link type="text/css" rel="stylesheet" href="{{ asset('css/gantigol.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm fixed-top d-none d-sm-flex">
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
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="btn chart item_image" src="{{ asset('images\gantigol\chart.svg') }}">
                        <span id="cart-counter" class="cart_counter" style="display:none;">0</span>
                    </a>
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

    <header class="index-v2 d-lg-none ">
        <div class="container-fluid col-12">
            <div id="topbar" class="row flexer mt-0 ">
                <div class="col-4">
                    <a href="/" class="logo">
                        <img src="{{ asset('images\gantigol\logo.svg') }}" height="70">
                    </a>
                </div>
                <div class="col-8">
                    <div id="mainnav" class="pull-right">
                        <a href=" #" class="hidden-md hidden-lg" id="mainnav-toggle"><i class="zmdi zmdi-menu"></i></a>
                        <nav class="dropdown mt-0">
                            <ul>
                                <li>
                                    <form action="{{ route('homepage.search') }}" method="post" id="searchFormMobile">@csrf
                                    <div class="input-group md-form form-sm form-2 pl-0">
                                        <input class="form-control my-0 py-1 lime-border" type="text" name="term" placeholder="Search" aria-label="Search">
                                        <div class="input-group-append">
                                            <span class="input-group-text lime lighten-2" id="searchImgBtnMobile"><i class="fas fa-search text-grey" aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                    </form>
                                </li>
                                <li>
                                    <a id="menu-toggle" class="main-page" href="#">WIKI BOLA</a>
                                </li>
                                <li>
                                    <a class="main-page" href="{{ route('blog.category', 'game') }}">GAME</a>
                                </li>
                                <li>
                                    <a class="main-page" href="{{ route('blog.category', 'tokoh') }}">TOKOH</a>
                                </li>
                                <li>
                                    <a class="main-page" href="{{ route('products.index') }}">LAPAK</a>
                                </li>
                                <li class="hidden-lg hidden-md">
                                    <a id="cart-toggle-sm" class="main-page" href=" #">
                                        <i class="zmdi zmdi-shopping-cart"></i> &nbsp;CART
                                    </a>
                                </li>
                                <li class="hidden-lg hidden-md">
                                    <a id="account-toggle-sm" class="main-page" href=" #">
                                        <i class="zmdi zmdi-account-circle"></i> &nbsp;ACCOUNT
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        {{-- <a id="account-toggle" href="#">
                            <img src="./Starcross_files/account-of-checkered-design.png" alt="Account toggle">
                        </a> --}}

                        {{-- <a id="cart-toggle" href="#">
                            <img src="./Starcross_files/shopping-cart-of-checkered-design.png" alt="Cart toggle">
                            <span id="cart-count" class="text-center hidden">1</span>
                        </a> --}}

                    </div>
                </div>
            </div>
        </div>

        <div id="hover-account" class="account-form">
            @if (!Session::has('token'))
                <form method="POST" action="/signin" accept-charset="UTF-8">@csrf
                    <div class="youraccount">
                        <label for="email" class="italics">Email Address :</label>
                        <input class="italics" name="username" type="email" id="email">
                        <label for="password" class="italics">Password :</label>
                        <input name="password" type="password" value="" id="password">
                    </div>
                    <div class="youraccount">
                        <a href="/reset" class="forgot-password-nav pull-right text-dark">Forgot your password?</a>
                    </div>
                    <input class="button brownbutton acc-login" style="border:none;" type="submit" value="LOGIN">
                    <a href="/register" class="button brownbutton acc-register">REGISTER</a>
                </form>
            @elseif (Session::has('token'))
                <h5 class="mb-1">Halo,</h5>
                <h5 class="">{{ Session::get('username') }}</h5>
                <a href="/user">setting</a><br>
                <a href="/signout" id="signout-link">Logout</a>
            @endif
        </div>

        <div id="hover-menu">
            <div class="hidden-lg hidden-md">
                <h6><a href="{{route('blog.formasi')}}">FORMASI</a></h6>
                
            </div>
            
            <div class="hidden-lg hidden-md">
                <h6><a href="{{route('blog.statistik')}}">STATISTIK</a></h6>
                
            </div>
            
            <div class="hidden-lg hidden-md">
                <h6><a href="{{route('blog.taktik')}}">TAKTIK</a></h6>
                
            </div>
            
        </div>

        <div id="hover-cart">
            <div class="shopping-cart">
                <span class="empty_card_wrapper text-dark empty_cart">Keranjang Anda Kosong</span>
                <div class="shopping-cart-header">
                    <div class="shopping-cart-total">
                        <span class="lighter-text text-body"><h6 class="text-body">Total:</h6></span>
                        <span class="main-color-text text-body"><h6 class="text-body simpleCart_total">0 </h6></span>
                        <hr class="hr-cart">
                    </div>
                </div>
                <!--end shopping-cart-header -->

                <ul id="mobile-cart-wrapper" class="shopping-cart-items">
                </ul>

                <a href="/checkout" class="btn btn-dark btn-block simpleCart_checkout bayar mt-5" style="display:none;">BAYAR</a>
            </div>
            <!--end shopping-cart -->
        </div>
    </header>

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
            <div class="container">
                <div class="link-footer">
                    <div class="justify-content-md-center" style="margin-top:0;">
                        <div class="col-md-8 col-xs-12 mx-auto">
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
                                <div class="col-lg-3 col-xs-12 px-lg-0">
                                    <p><a class="footer" href="{{route('homepage.tnc-page')}}">Syarat dan Ketentuan</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/gantigol.js') }}"></script>

    <!-- global ajax request header -->
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
            $('#searchImgBtnMobile').click(evt => {
                evt.preventDefault()
                $('#searchFormMobile').submit()
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
                        @if (Request::is('checkout'))
                            $(`#checkout-item-${id}`).remove()
                        @endif
                    }
                })
            })
            $('#mobile-cart-wrapper').on('click', '.simpleCart_remove', function(evt) {
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
                        @if (Request::is('checkout'))
                            $(`#checkout-item-${id}`).remove()
                        @endif
                    }
                })
            })
            $('#deleteItemModal').on('click', '.simpleCart_remove', function(evt) {
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
                        $(`#checkout-item-${id}`).remove()
                        $(`#cart-item-${id}`).remove()
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
                        contained = true
                        let itemObj = {}
                        itemObj['id'] = inputt.dataset.id
                        itemObj['size_code'] = inputt.name
                        itemObj['quantity'] = inputt.value
                        items.push(itemObj)
                    }
                })
                if (contained) {
                    let session = getBrowserSession()
                    items.map(item => {
                        storeItem(item.id, item.quantity, session)
                    })
                    setTimeout(() => {
                        window.location = '/checkout-preorder'
                    }, 3000)
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
            **/

            function storeItem(id, qty, session) {
                $.ajax({
                    url: '/api/carts/store',
                    type: 'POST',
                    data: {
                        id: id,
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
                @if (Request::is('checkout') || Request::is('checkout-preorder'))
                    $('.total_price').html(price)
                    // $('.total_price_text').html(formatRupiah(price))
                    let courier = parseInt($('#courier_type').val())
                    let discount = $('#discount').val()
                    let total = price + courier
                    if (total >= discount) {
                        $('.total_price_text').html(formatRupiah(price + courier - discount))
                    } else if (total < discount) {
                        $('.total_price_text').html(formatRupiah(0))
                    }
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
            function updateWeight(weight) {
                $('#weight').val((i, oldVal) => {
                    return weight+oldVal
                })
            }
            function placeCartItemsOnCheckout(data) {
                let regularTotal = 0
                let weight = 0
                data.map(item => {
                    if (item.product_variant.product.pre_order === null) {
                        weight = weight + item.product_variant.product.weight
                        regularTotal += item.subtotal
                        let qty = item.qty
                        let stock = item.product_variant.quantity_on_hand
                        let show = qty
                        if (stock === 0) {
                            show = '<b class="text-danger text-uppercase">Stok Habis</b>'
                        }
                        else if (stock - qty < 0) {
                            show = '<b class="text-danger text-uppercase">Stok Limit</b>'
                        }
                        $(
                            `<div id="checkout-item-${item.id}" class="checkout-list-items">` +
                                '<hr class="hr-light top-line">' +
                                '<div class="row barang">' +
                                    '<div class="col-lg-7">' +
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
                                                `<span class="checkout-qty-items" data-val="${stock-qty}"> ${show}</span>` +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="col-lg-1">' +
                                        '<div>' +
                                            '<div class="diskon">0%</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class=" col-lg-3">' +
                                        `<div class="harga">Rp. ${formatRupiah(item.qty*item.price)}</div>` +
                                    '</div>' +
                                    '<div class="col-lg-1">' +
                                        `<a href="#" class="far fa-trash-alt fa-sm barang deleteModal" data-toggle="modal" data-target="#deleteItemModal" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"> </a>` +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        ).appendTo('#checkout-item-list')
                    }
                })
                updateTotal(regularTotal)
                updateWeight(weight)
            }
            @elseif (Request::is('checkout-preorder'))
            function updateWeight(weight) {
                $('#weight').val((i, oldVal) => {
                    return weight+oldVal
                })
            }
            function placePreOrderItemsOnCheckout(data) {
                let totalPreOrder = 0
                let weight = 0
                data.map(item => {
                    if (item.product_variant.product.pre_order !== null) {
                        weight = weight + item.product_variant.product.weight
                        totalPreOrder += item.subtotal
                        $(
                            `<div id="checkout-item-${item.id}" class="checkout-list-items">` +
                                '<hr class="hr-light top-line">' +
                                '<div class="row barang">' +
                                    '<div class="col-lg-7">' +
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
                                                `<span class="checkout-qty-items" data-val="${item.qty}"> ${item.qty}</span>` +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class="col-lg-1">' +
                                        '<div>' +
                                            '<div class="diskon">0%</div>' +
                                        '</div>' +
                                    '</div>' +
                                    '<div class=" col-lg-3">' +
                                        `<div class="harga">Rp. ${formatRupiah(item.qty*item.price)}</div>` +
                                    '</div>' +
                                    '<div class="col-lg-1">' +
                                        `<a href="#" class="far fa-trash-alt fa-sm barang deleteModal" data-toggle="modal" data-target="#deleteItemModal" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"> </a>` +
                                    '</div>' +
                                '</div>' +
                            '</div>'
                        ).appendTo('#checkout-item-list')
                    }
                })
                updateTotal(totalPreOrder)
                updateWeight(weight)
            }
            @endif

            function appendToCart(item) {
                let qty = item.qty
                let stock = item.product_variant.quantity_on_hand
                if (stock === 0) {
                    qty = '<b class="text-danger text-uppercase">Stok Habis</b>'
                }
                else if (stock - qty < 0) {
                    qty = '<b class="text-danger text-uppercase">Stok Limit</b>'
                }
                $(
                    `<li id="cart-item-${item.id}" class="clearfix simpleCart_items" style="margin-bottom:20px;">` +
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
                                `<span class="input-data"> ${qty}</span>` +
                            '</div>' +
                            '<div class="main-color-text">' +
                                `<a href="#" class="simpleCart_remove" data-qty="${item.qty}" data-price="${item.price}" data-id="${item.id}"><i class="far fa-trash-alt fa-xs"></i></a>` +
                            '</div>' +
                        '</div>' +
                    '</li>'
                ).appendTo('#cart-wrapper')
                $(`#cart-item-${item.id}`).clone().appendTo("#mobile-cart-wrapper")
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
                @elseif (Request::is('checkout-preorder'))
                    placePreOrderItemsOnCheckout(data.data.get_items)
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
                            $('#cart-counter').css('display', 'block')
                            $('#cart-counter').html(res.data.get_items.length)
                            placeCartItems(res)
                        } else if (res.data.get_items.length === 0) {
                            $('#cart-counter').css('display', 'none')
                            if (localStorage.getItem('user_token') === null) {
                                localStorage.removeItem('cart_id')
                                localStorage.removeItem('session')
                            }
                        }
                    }
                })
            }

            $('#addToCart').click(() => {
                let qty = parseInt($('input[name=quantity]').val())
                let variant = $('#product-list').val()
                let variantId = $('#variant_id').val()
                if (variant === 'null') {
                    $('#product-list').addClass('is-invalid')
                    return;
                }
                if (qty === 0) {
                    $('#qty_input_wrapper').addClass('border border-danger')
                    $('.qty-invalid-feedback').css('display', 'block')
                    return;
                }
                if (qty <= $('input[name=quantity]').attr('max')) {
                    let session = getBrowserSession()
                    storeItem(variantId, qty, session)
                }
            })
            $('#preOrder').click(() => {
                loopSizes()
            })
        })
    </script>

</body>
</html>