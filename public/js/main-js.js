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
