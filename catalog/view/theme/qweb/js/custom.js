

var $navbar = $(".new_header");
var $body = $("body");
$body.css("padding-top", $navbar.outerHeight());

$(window).on('load', function () {
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ) {
		$('body').addClass('ios');
	} else{
		$('body').addClass('web');
	};
    
});

$(document).ready(function(){
    $(".mob-btn-search").click(function(){
        $("#search").toggleClass("active");
    });
      
      
	
    $('body').on('click','.footer-lang a',function (event) {
        event.preventDefault();
        var href = $(this).attr('href');
        var code = $(this).attr('data-code');
        $.ajax({
            url: 'index.php?route=common/language/changeLang',
            type: 'post',
            data: { href: href,code:code },
            dataType: 'json',
            success: function(json) {
                window.location=href;
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log('error');
            }
        });

    });
    
    if($(window).innerWidth()>991){
        
        $('.navbar .dropdown > a').click(function(){
            
        });
        var inputTitle = $( ".navbar .dropdown > a" );
        inputTitle.removeAttr( "data-toggle" );
        inputTitle.removeAttr( "aria-expanded" );
        inputTitle.removeAttr( "role" );
        inputTitle.removeClass( "dropdown-toggle" );
        
        $(window).scroll(function() {    
            var scroll = $(window).scrollTop();
        
            if (scroll >= 5) {
                $(".new_header").addClass("new_header_fixed");
            } else {
                $(".new_header").removeClass("new_header_fixed");
            }
        });
        $('.navs-menus .dropdown, .navs-menus .dropdown-menu').hover(function() {
            $('.content').addClass('active');
        }, function() {
            $('.content').removeClass('active');
        });
    }
    /*$(window).on("load resize", function (event) {
        
    });*/
    $('#main-subnav-wrapper-2').html($('#navbarNavDropdown').html());
    
    /*$('.main-nav__link').click(function() {   
        $('.main-subnav-wrapper').toggle();
        $('.nav-link').removeClass('nav-link_hover');        
        
        if($(window).innerWidth()>991){
            $('.nav-item:first-child .nav-link').addClass('nav-link_hover');
            var subnav=$('.nav-item:first-child .subnav').html();
            $('.main-subnav__right .subnav').html(subnav);
        }
        
        return false;
    });
    
    
    $('.nav-link').on({
        mouseenter: function () {
            if($(window).innerWidth()>991){
                $('.main-subnav__right').hide();
                $('.nav-link').removeClass('nav-link_hover');
                $(this).addClass('nav-link_hover');
                var subnav=$(this).next('.subnav').html();
                $('.main-subnav__right .subnav').html(subnav);
                $('.main-subnav__right').fadeIn(200);
            } 
        },
        mouseleave: function () {
           
        }
    });
    
    $('.nav-link').click(function() {  
        
        if($(window).innerWidth()<992){
            $(this).parents('.nav-item').find('.subnav').slideToggle(100, function() {
                if ($(this).is(':visible'))
                    $(this).css('display','flex');
            });
            $(this).toggleClass('nav-link_hover');    
        }
        
        return false;
    });
    
    $(document).bind("click touchstart",function(event) {
        if($(window).innerWidth()>991){
            if ($(event.target).closest(".nav, .main-nav, .main-subnav-wrapper").length) return;
            $('.main-subnav-wrapper').slideUp();
            event.stopPropagation();
        }
     });*/
    
    
    $('.js-slider-main').slick({
        infinite: true,
        arrows:false,
        autoplay:true,
        autoplaySpeed: 8000,
        dots:true,
        slidesToShow:1,
        slidesToScroll: 1,
        fade:true,
        speed: 2000
    });
    
    $('.js-link-more').click(function() {   
        $(this).parents('.text').find('.text-hidden').slideToggle();
        $(this).toggleClass('active');
        return false;
    });
    
    $('.mobile-trigger').on('click', function(event) {
        if(!$('body').hasClass('menu-open')){
            event.preventDefault();		
            $('body').addClass('menu-open');
            $('.sidebar').fadeIn(300);
            $(this).addClass('is-active');
        }else{
            $('body').removeClass('menu-open');
            $('.sidebar').fadeOut(300); 
            $(this).removeClass('is-active');
        }
        return false;
	});
    
    $('.aside-nav-item__link').click(function() {
        if($(this).attr('data-go') != undefined){
        }else{
            $(this).next('.aside-subnav').slideToggle();
            $(this).toggleClass('active');
            return false;
        }
    });
    
    (function($){
        $(window).resize(function(){
            if($(this).width()>767){
                $(".filter-item__content").mCustomScrollbar(); 
            }else{
                $(".filter-item__content").mCustomScrollbar("destroy"); 
            }
        }).trigger("resize");
    })(jQuery);
  
    
    $('.filter-item__title').click(function() {   
        $(this).next('.filter-item__content').slideToggle();
        $(this).toggleClass('active');
        if($(window).innerWidth()>767){
            setTimeout(function(){
                $(this).next('.filter-item__content').mCustomScrollbar("update");
            }, 2000);
            
        }
        return false;
    });
    
    
    $('.js-btn-aside-catalog').click(function() {   
        $(this).next('.aside-nav').slideToggle();
        $(this).toggleClass('active');
        return false;
    });
    
    
    $('.js-btn-aside-filter').click(function() {   
        $(this).next('.filter').slideToggle();
        $(this).toggleClass('active');
        return false;
    });
    
    $('.info__title').click(function() {   
        $(this).next('.info__content').slideToggle();
        $(this).toggleClass('active');
        return false;
    });
    
    
     if($('#map').length){
        window.onload = loadScript;
    }
    
 });


function initMap() {
    if($('#map').length){
        
      const myLatLng = { lat:50.0019849, lng: 36.2960103 };
      const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: myLatLng,
            disableDefaultUI: true,
          
      });
  
      new google.maps.Marker({
        position: myLatLng,
        map
      });
    }
}

function loadScript() {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAyXAJNEvQPZcZAxNHixA3k5fwEwiBu3MM&callback=initMap&libraries=&v=weekly';
    document.body.appendChild(script);
}



