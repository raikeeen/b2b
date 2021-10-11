$( document ).ready(function() {

    $('#payment_select').change(function () {
        let payment = $('#payment_select').find(":selected").val();
        $('input[id=payment]').val(payment);

        if($('#payment_select').val() === "") {
            $('#btn-order').attr("disabled", true).removeClass('c-btn').addClass('c-btn-grey');

        } else {
            $('#btn-order').attr("disabled", false).removeClass('c-btn-grey').addClass('c-btn');

        }
    })

    $('#delivery_select').change(function () {
        let delivery = $('#delivery_select').find(":selected").val();

        if (delivery === '2') {
            $('#transport_price').text('3.84')
            let total = $('#total-cart')
            total.text(parseFloat(total.text())+ 3.84)
            let totalSub = $('#subtotal-cart')
            totalSub.text(parseFloat(totalSub.text())+ 3.84)


        } else {
            $('#transport_price').text('0.00')
            let total = $('#total-cart')
            total.text(parseFloat(total.text())- 3.84)
            let totalSub = $('#subtotal-cart')
            totalSub.text(parseFloat(totalSub.text())- 3.84)
        }

        $('input[id=delivery]').val(delivery);

        if($('#delivery_select').val() === "") {
            $('#payment_select').attr("disabled", true);
        } else {
            $('#payment_select').attr("disabled", false);
        }
    })

        $("#owl-brand").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items : 8,
            itemsDesktop : [1199,3],
            itemsDesktopSmall : [979,3]

        });

    $("#owl-newProduct").owlCarousel({

        autoPlay: 5000, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],

        navigation : true,
        navigationText : true,

        responsive: {'0': {'items': 1}, '576': {'items': 2}, '992': {'items': 3}, '1280': {'items': 3}},

        loop: true,
        autoplayHoverPause: true,
        lazyLoad: true

    });

    var owlMewProduct = $("#owl-newProduct");
    owlMewProduct.owlCarousel();

    $('.owl-next-custom').click(function() {
        owlMewProduct.trigger('owl.prev');
    })

    $('.owl-prev-custom').click(function() {
        owlMewProduct.trigger('owl.next');
    })


    $("#owl-soldProduct").owlCarousel({

        autoPlay: 5000, //Set AutoPlay to 3 seconds

        items : 3,
        itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],

        navigation : true,
        navigationText : true,

    });

    var owlSoldProduct = $("#owl-soldProduct");
    owlSoldProduct.owlCarousel();

    $('.owl-next-custom').click(function() {
        owlSoldProduct.trigger('owl.prev');
    })

    $('.owl-prev-custom').click(function() {
        owlSoldProduct.trigger('owl.next');
    })


});
