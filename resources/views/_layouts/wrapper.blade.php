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
    <script type="https://fonts.googleapis.com/css?family=Proxima+Nova"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.1.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm fixed-top">
        <div class="container">
            <ul class="nav navbar-nav pull-sm-left ">
                <li class="nav-item wiki">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">WIKI BOLA</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">FORMASI</a>
                        <a class="dropdown-item" href="#">SATISTIK</a>
                        <a class="dropdown-item" href="#">TAKTIK</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.category') }}">GAME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.category') }}">TOKOH</a>
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
                        <input type="text" class="form-control input-sm" maxlength="64" placeholder="Search" />
                        <a href="#" class="search-btn"><img class="btn input" src="{{ asset('images\gantigol\search.svg') }}"></a>
                    </div>
                </li>
                <li class="nav-item dropdown forgot login-parent">
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><img class="btn" src="{{ asset('images\gantigol\user.svg') }}"></a>
                    @if (!Session::has('token'))
                        <div class="dropdown-menu login">
                            @if (session('error'))
                                <span class="text-white">{{ session('error') }}</span>
                            @endif
                            <form action="/signin" class="form" id="login-form" method="POST">@csrf
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
                        <div class="dropdown-menu login">
                            <p class="text-light mb-1">Halo,</p>
                            <h5 class="text-light">{{ Session::get('username') }}</h5>
                            <hr class="hr-cart">
                            <a href="/user"><p class="text-light">setting</p></a>
                            <a href="/signout"><p class="text-light">Logout</p></a>
                        </div>
                    @endif
                </li>
                <li class="nav-item forgot dropdown dropdown-cart">
                    <a href="#" role="button" aria-haspopup="true" aria-expanded="false"><img class="btn chart item_image" src="{{ asset('images\gantigol\chart.svg') }}"></a>
                    @if (!Request::is('checkout'))
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
                                        {{-- <li id="main_cart_items" class="clearfix simpleCart_items"></li> --}}
                                    </ul>

                                    <form action="/checkout" method="post" class="simpleCart_checkout" style="display:none;">@csrf
                                        <input type="text" name="cart_id" id="cart_id" style="display:none;">
                                        <button type="submit" class="btn btn-primary btn-block bayar">BAYAR</button>
                                    </form>
                                </div>
                                <!--end shopping-cart -->

                            </div>
                        </div>
                    @endif
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
                                <p><a class="footer" href="#">Tentang Kami</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <p><a class="footer" href="#">Kontak Kami</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12">
                                <p><a class="footer" href="#">FAQ</a></p>
                            </div>
                            <div class="col-lg-3 col-xs-12 px-0">
                                <p><a class="footer" href="#">Syarat dan Ketentuan</a></p>
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
            
            // dropdown mechanism
            // First by handling the click on the link to open/close the dropdown
            $('li.dropdown.forgot a[role=button]').on('click', function (event) {
                event.preventDefault()
                $(this).parent().toggleClass('show')
                $(this).parent().children('div.dropdown-menu.login').toggleClass('show')
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
                        updateTotal(res.data.total)
                        if (res.data.amount_items == 0) {
                            hideEmptyEle(false)
                        }
                        $(this).closest('#main_cart_items').remove()
                        window.location.reload()
                    }
                })
            })

            function loopSizes() {
                let items = []
                // let session = ''
                let session = getBrowserSession()
                let contained = false
                $('.qty').map((key, inputt) => {
                    if (inputt.value != 0) {
                        contained = true;
                        // session = Math.random().toString(36).substring(2, 20) + Math.random().toString(36).substring(2, 20)
                        let itemObj = {}
                        itemObj['size'] = inputt.name
                        itemObj['quantity'] = inputt.value
                        items.push(itemObj)
                    }
                })
                if (contained) {
                    // if (localStorage.getItem('cart_id') === null) {
                        postItemToCart(items, session)
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
                        console.log(res)
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
                        session: session
                    },
                    success: function (res) {
                        if (localStorage.getItem('cart_id') === null) {
                            localStorage.setItem('cart_id', res.data.id)
                            $('#cart_id').val(localStorage.getItem('cart_id'))
                        }
                        $('.dropdown-cart').toggleClass('show')
                        getCartItems(res.data.id)
                    }
                })
            }

            /**
            function getCartIdBySession(session) {
                $.ajax({
                    url: '/api/carts/get-cart-id',
                    type: 'POST',
                    data: session,
                    success: function (res) {
                        console.log(res)
                    }
                })
            }
            **/

            function init() {
                // $session = getBrowserSession()
                const cartId = localStorage.getItem('cart_id')
                if (cartId !== null) {
                    getCartItems(cartId)
                    $('#cart_id').val(cartId)
                }
            }

            init()

            function clearCartDisplay() {
                $('#cart-wrapper').html('')
            }

            function updateTotal(price) {
                $('.simpleCart_total').html('Rp. ' + price)
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

            function placeCartItems(data) {
                clearCartDisplay()
                updateTotal(data.data.total)
                data.data.get_items.map(item => {
                    $(
                        '<li id="main_cart_items" class="clearfix simpleCart_items">' +
                            `<img src="{{ asset('images/produk/1a.jpg') }}" />` +
                            '<div class="detil">' +
                                '<div class="col">' +
                                    `<span class="item-name">${item.product_id}</span>` +
                                '</div>' +
                                '<div class="item-price">' +
                                    '<span>HARGA  </span>' +
                                    `<span class="input-data"> ${item.price}</span>` +
                                '</div>' +
                                '<div class="item-price">' +
                                    '<span class="size-cart">SIZE </span>' +
                                    `<span class="input-data"> XL</span>` +
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
                })
                hideEmptyEle(true)
            }

            function getCartItems(id) {
                $.ajax({
                    url: '/api/carts/items/' + id,
                    type: 'GET',
                    success: function (res) {
                        console.log(res)
                        if (res.data.get_items.length !== 0) {
                            placeCartItems(res)
                        } else if (res.data.get_items.length === 0) {
                            localStorage.removeItem('cart_id')
                        }
                    }
                })
            }

            $('#addToCart').click(() => {
                loopSizes()
            })
        })
    </script>

</body>
</html>