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

    $("#owl-product").owlCarousel({

        items : 4,
        margin: 5,
        autoWidth: true,
        loop: true,
        checkVisible: true,
        nav : true,

    });

    $("#owl-brand").owlCarousel({

        autoplay: true, //Set AutoPlay to 3 seconds
        autoplayTimeout: 3000,
        items : 8,
        /*itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3]*/

    });

    $("#owl-newProduct").owlCarousel({

        autoplay: true, //Set AutoPlay to 3 seconds
        autoplayTimeout: 5000,
        margin: 20,
        stagePadding: 10,
        items : 3,
        /*itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],*/

        nav : true,
        /*navigationText : true,*/

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

        autoplay: true, //Set AutoPlay to 3 seconds
        autoplayTimeout: 5000,
        margin: 20,
        stagePadding: 10,
        items : 3,
        /*itemsDesktop : [1199,3],
        itemsDesktopSmall : [979,3],*/

        nav : true,
        loop: true,
        autoplayHoverPause: true,
        lazyLoad: true
    });

    var owlSoldProduct = $('#owl-soldProduct');
    owlSoldProduct.owlCarousel();

    $('.owl-next-custom').click(function() {
        owlSoldProduct.trigger('next.owl.carousel');
    })

    $('.owl-prev-custom').click(function() {
        owlSoldProduct.trigger('prev.owl.carousel', [300]);
    })

    var owlNewProduct = $('#owl-newProduct');
    owlNewProduct.owlCarousel();

    $('.owl-next-custom').click(function() {
        owlNewProduct.trigger('next.owl.carousel');
    })

    $('.owl-prev-custom').click(function() {
        owlNewProduct.trigger('prev.owl.carousel', [300]);
    })

    new Splide( '#test_splide', {
        perPage: 4,
        arrows: false,
        pagination: false,
        gap: 5
    } ).mount();
});
