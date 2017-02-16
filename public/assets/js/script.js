$(document).ready(function(){
    var lastScrollTop = 0;

    $(".action-btn").click(function(){
        var section =  $(this).attr('data-href');
        $(section).show();
        $(this).parent().hide();
    });

    $('.save-info').click(function(){
        var section =  $(this).attr('data-href');
        var parent =  $(this).attr('parent-href');
        $(section).show();
        $(parent).hide();
    });

    $(window).scroll(function(event){
        var st = $(this).scrollTop();
        if (st > lastScrollTop)
        {
            if(lastScrollTop>=300)
            {
                if($(window).height() + $(window).scrollTop()+$(".footer").height() >= $(document).height())
                {
                    $(".vendor-header").addClass('navbar-fixed-top ');                
                }
        
                if($(document).scrollTop() + window.innerHeight < $('.footer').offset().top - 300)
                { 
                    $(".vendor-header").addClass('navbar-fixed-top ');
                }    
            }
        } 
        else 
        {
            if($(window).scrollTop() <= $(".vendor-banner").height()+150){
                $(".vendor-header").removeClass('navbar-fixed-top ');
            }
            else{
               $(".vendor-header").addClass('navbar-fixed-top ');
            }
            
        }
        lastScrollTop = st;
    });

    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    },
    function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });

     
});