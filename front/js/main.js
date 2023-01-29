(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
       // console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);
/* cart */
let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector('#close-cart');

/* open cart */
cartIcon.onclick = () =>{
cart.classList.add("active") ;

}
/* close cart */
closeCart.onclick = () =>{
    cart.classList.remove("active") ;
    
    }


    /* cartWorking */
    if(document.readyState == 'loading'){
        document.addEventListener('DOMContentLoaded', ready);
    }else{
        ready();
    }

    /* making function */
    function ready(){
        /* remove items from cart */
        var removeCartButtons = document.getElementsByClassName("cart-remove");
       // console.log(removeCartButtons);
        for(var i = 0 ;i<removeCartButtons.length ;  i++  ){
            var button = removeCartButtons[i] ; 
            button.addEventListener("click" , removeCartItem);
        }
        /* quantite change */
        var quantityInputs = document.getElementsByClassName("cart-quantity");
        for(var i = 0 ; i< quantityInputs.length ;  i++  ){
            var input = quantityInputs[i]; 
            input.addEventListener("change", quntityChanged);
        }
        /* add to cart */
        var addCart = document.getElementsByClassName("add-cart");
        for(var i = 0 ; i< addCart.length ;  i++  ){
          var button = addCart[i];
          button.addEventListener("click" , addCartClick);
        }
         /* buy button work */
         document.getElementsByClassName("btn-buy")[0].addEventListener("click",buybuttonclick);
        

    }
       function buybuttonclick(){
        alert("your order is placed");
        var cartContent = document.getElementsByClassName('cart-content')[0];
        while(cartContent.hasChildNodes()){
            cartContent.removeChild(cartContent.firstChild);
        }
        updatetotal();
       }



    function removeCartItem(event){
        var buttonClicked = event.target ;
        buttonClicked.parentElement.remove();
        updatetotal() ;
    }
    /* qunatity change */
    function quntityChanged(event){
        var input = event.target;
        if  (isNaN(input.value) || input.value <= 0){
            input.value = 1 ;
        }    
        updatetotal();
    }
    /* add to cart */
    function  addCartClick(event){
     var button = event.target;
     var shopproduct = button.parentElement;
     var title = shopproduct.getElementsByClassName("d-flex justify-content-between border-bottom pb-2")[0].innerText;
     var price = shopproduct.getElementsByClassName("text-primary")[0].innerText;
    /*  var productImg = shopproduct.getElementsByClassName(" flex-shrink-0 img-fluid rounded")[0].src ; */
     addProductsToCart(title,price);
    

     updatetotal();
    }
    function addProductsToCart(title,price){
        var cartShopBox = document.createElement("div");
         cartShopBox.classList.add('cart-box'); 
        cartItems = document.getElementsByClassName('cart-content')[0];
        var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
          for(var i = 0 ; i< cartItemsNames.length ;  i++  ){
            if(cartItemsNames[i].innerText === title){
            alert("You have already add this item to cart");
            return;
            }
          }
          /* sii limage sayee triglett nhotha kbal div */
           /* <img src="${ productImg}" alt="" class="cart-image">  */
    
    var cartBoxContent = `              
                                            <div class="detail-box">
                                                <div class="cart-product-title">${title}</div>
                                                <div class="cart-price">${price}</div>
                                                <input type="number" value="1" class="cart-quantity">
                                            </div>
                                            <!-- remove cart -->
                                            <i class='bx bxs-trash-alt cart-remove'></i>`;

      cartShopBox.innerHTML = cartBoxContent ;
      cartItems.append(cartShopBox);
      cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener('click',removeCartItem);
      cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener('change',quntityChanged);
        }
    /* updeta totale */
    function updatetotal(){
        var cartContent = document.getElementsByClassName("cart-content")[0];
        var cartBoxes = cartContent.getElementsByClassName("cart-box");
        var total = 0;
        for(var i = 0 ; i< cartBoxes.length ;  i++  ){
            var cartBox = cartBoxes[i] ; 
            var priceElement = cartBox.getElementsByClassName("cart-price")[0];
            var quantityElemnt = cartBox.getElementsByClassName("cart-quantity")[0];
           var price = parseFloat(priceElement.innerText.replace("$",""));
            var  quantity = quantityElemnt.value ;
              total = total + (price * quantity) ;
        } 
              /* if price contain some cents value  */
               total = Math.round (total * 100) /100; 


              document.getElementsByClassName('total-price')[0].innerText = "$" + total ;
        
    }
       

