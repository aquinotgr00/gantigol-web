var t = $("#hover-cart"),
        e = $("#hover-account");
    $("#hover-search");
    $("#menu-toggle").on("click", function(i) {
        t.slideUp(200), e.slideUp(200), $("#hover-menu").slideToggle(200), i.preventDefault()
    }), $("#account-toggle").on("click", function(e) {
        $("#hover-menu").slideUp(200), t.slideUp(200), $("#hover-account").slideToggle(200), e.preventDefault()
    }), $("#account-toggle-sm").on("click", function(e) {
        $("#mainnav-toggle>i").removeClass("zmdi-close").addClass("zmdi-chevron-left"), $("#hover-menu").slideUp(200), t.slideUp(200), $("nav").slideUp(200), $("#hover-account").slideToggle(200), e.preventDefault()
    }), $("#cart-toggle").on("click", function(t) {
        $("#hover-menu").slideUp(200), e.slideUp(200), $("#hover-cart").slideToggle(200), t.preventDefault()
    }), $("#cart-toggle-sm").on("click", function(t) {
        $("#mainnav-toggle>i").removeClass("zmdi-close").addClass("zmdi-chevron-left"), $("#hover-menu").slideUp(200), e.slideUp(200), $("nav").slideUp(200), $("#hover-cart").slideToggle(200), t.preventDefault()
    }), $("#cart-close").on("click", function(e) {
        $("#mainnav-toggle>i").removeClass("zmdi-chevron-left").addClass("zmdi-menu"), t.slideUp(200), e.preventDefault()
    }), $("#account-close").on("click", function(t) {
        $("#mainnav-toggle>i").removeClass("zmdi-chevron-left").addClass("zmdi-menu"), e.slideUp(200), t.preventDefault()
    }), $("#mainnav-toggle").on("click", function(i) {
        $children = $(this).children(), $inactivemenu = $children.hasClass("zmdi-menu"), $submenu = $children.hasClass("zmdi-close"), $activemenu = $children.hasClass("zmdi-chevron-left"),
            function(t, e, i) {
                $children = $("#mainnav-toggle").children(), 1 == t && $children.removeClass("zmdi-menu").addClass("zmdi-close");
                1 == e && $children.removeClass("zmdi-close").addClass("zmdi-menu");
                1 == i && $children.removeClass("zmdi-chevron-left").addClass("zmdi-close")
            }($inactivemenu, $submenu, $activemenu), e.slideUp(200), t.slideUp(200), i.preventDefault(), $(this).siblings("nav").slideToggle(100), $("#hover-menu").slideUp(200)
    });


    