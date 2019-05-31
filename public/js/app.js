window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

    document.getElementById("logo").style.marginTop ="0px";
    document.getElementById("logo").style.width = "70px";
    document.getElementById("logo").style.height = "70px";
  } else {
    document.getElementById("logo").style.marginTop ="30px";
    document.getElementById("logo").style.width = "90px";
    document.getElementById("logo").style.height = "102.53px";
  }
}
// Force a hover to see the effect
// const share = document.querySelector('.share');

// setTimeout(() => {
//   share.classList.add("hover");
// }, 1000);

// setTimeout(() => {
//   share.classList.remove("hover");
// }, 3000);

function wcqib_refresh_quantity_increments() {
    jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
        var c = jQuery(b);
        c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
    })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
    var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
    return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
    wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
    var a = jQuery(this).closest(".quantity").find(".qty"),
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
    b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});


$(document).ready(function () {

    $('#login-form').validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: 'required'
        },
        messages: {
            username: {
                required: 'Please insert your email.',
                email: 'Please use the correct email format.'
            },
            password: 'Password cannot be empty.'
        }
    });

    // $('#login-form').submit(form => {
    //     form.preventDefault();
    //     let postUrl = form.currentTarget.action;
    //     let formData = $('#login-form').serialize();

    //     $.ajax({
    //         url: postUrl,
    //         type: 'POST',
    //         data: formData
    //     }).done(response => {
    //         response = JSON.parse(response);
    //         console.log(response);
    //     }).catch(err => alert(err));
    // });

});