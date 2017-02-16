jQuery(window).load(function () {
    "use strict";
   	jQuery("#status").fadeOut();
	jQuery("#preloader").delay(350).slideUp("slow");
});


 // select
 $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });
          // $('.selectpicker').selectpicker('hide');
  });
  
  
  $(document).ready(function(e) {
	"use strict";
  
	$('.rock_logo:after').addClass('animated fadeInDownBig');
	
	//smooth scrolling
	// $.smoothScroll();
	
	// single page
	// $("#rockon_single").single({
	// 	speed: 1000
	// });
	
	// tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	//
	var bg_w = window.innerWidth;
	var bg_h = window.innerHeight;
	
	$('rock_single_page_slider_bg').css('width', bg_w);
	$('rock_single_page_slider_bg').css('height', bg_h);
	
	 //active menu on scroll single page
	 $(window).scroll(function() {
		var windscroll = $(window).scrollTop();
			if (windscroll >= 100) {
				$('.rockon_section').each(function(i) {
					if ($(this).position().top <= windscroll + 10 ) {
						$('.rock_menu_single ul li').removeClass('active');
						$('.rock_menu_single ul li').eq(i).addClass('active');
					}
				});
			} else {
		
				$('.rock_menu_single ul li').removeClass('active');
				$('.rock_menu_single ul li:first').addClass('active');
			}
		}).scroll();		
			
	
	
	// fixed menu on scroll
	/*var hig = window.innerHeight - 130;
	$(window).bind('scroll', function() {
             if ($(window).scrollTop() > hig) {
                 $('#rock_header').addClass('rock_header_fixed');
             }
             else {
                 $('#rock_header').removeClass('rock_header_fixed');
             }
        });
	
	$(window).bind('scroll', function() {
             if ($(window).scrollTop() > 0) {
                 $('#rock_header_otherpage').addClass('rock_header_fixed');
             }
             else {
                 $('#rock_header_otherpage').removeClass('rock_header_fixed');
             }
        });
	
	$(window).bind('scroll', function() {
             if ($(window).scrollTop() > hig) {
                 $('#rock_header_single_page').addClass('rock_header_fixed');
             }
             else {
                 $('#rock_header_single_page').removeClass('rock_header_fixed');
             }
        });	*/
		
	 //Check if the jQuery object contains any element before you try to get its offset
	/*if($("#rock_header").length){	
		var headertop = $("#rock_header").offset().top;
		var headerheight = $("#rock_header").height();
		$(document).scroll(function(){
			if($(window).scrollTop() >= headertop + headerheight) {
				$("#rock_header").addClass("affix");
			}else{
				$("#rock_header").removeClass("affix"); 
			}
		});
	}*/
	
	//Check if the jQuery object contains any element before you try to get its offset
	/*if($("#rock_header_otherpage").length){
		var headertop1 = $("#rock_header_otherpage").offset().top;
		var headerheight1 = $("#rock_header_otherpage").height();
		$(document).scroll(function(){
			if($(window).scrollTop() >= headertop1 + headerheight1) {
				$("#rock_header_otherpage").addClass("affix");
			}else{
				$("#rock_header_otherpage").removeClass("affix"); 
			}
		});
	}*/
	
	/* contact mail function */
	$('#em_sub').click(function(){
		$('input,textarea').removeClass('errorinp');
		$('#err-form2').fadeOut('slow');
		var error=false;
		var name=$('#name').val();
		var email=$('#email').val();
		var phone=$('#phone_number').val();
		var subject=$('#subject').val();
		var message=$('#message').val();
		if(name==""||name==" "){$('input#name').addClass('errorinp');error=true;}
		var email_compare=/^([a-z0-9_.-]+)@([da-z0-9.-]+).([a-z.]{2,6})$/;
		if(email==""||email==" "){$('input#email').addClass('errorinp');error=true;}
		else if(!email_compare.test(email)){$('input#email').addClass('errorinp');error=true;}
		if(phone==""||phone==" "){$('input#phone_number').addClass('errorinp');error=true;}
		if(subject==""||subject==" "){$('input#subject').addClass('errorinp');error=true;}
		if(message==""||message==" "){$('textarea#message').addClass('errorinp');error=true;}
		if(error==true){$('#err-form2').slideDown('slow');return false;}
		var data_string=$('#contact-form').serialize();$.ajax({type:"POST",url:$("#contact-form").attr('action'),data:data_string,timeout:6000,error:function(request,error){if(error=="timeout"){$('#err-timedout2').slideDown('slow');}
else{$('#err-state2').slideDown('slow');$("#err-state2").html('An error occurred');}},success:function(){$('#contact-form').slideUp('slow');$('#ajaxsuccess2').slideDown('slow');}});return false;});
	
	/* joinus mail function */
	$('#joinage').bind('keypress', function (event) {
			var regex = new RegExp("^[0-9]+$");
			var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
			if (!regex.test(key)) {
			   event.preventDefault();
			   return false;
			}
		});
	$('#em_joinsubmit').on("click",function(){
		$('input,textarea').removeClass('errorinp');
		$('#join-err-form').fadeOut('slow');
		var error=false;
		var name=$('#joinname').val();
		var email=$('#joinemail').val();
		var phone=$('#joincontact').val();
		var address=$('#joinaddress').val();
		var age=$('#joinage').val();
		var pets=$('#joinpets').val();
		var why=$('#joinwhy').val();
		if(name==""||name==" "){$('input#joinname').addClass('errorinp');error=true;}
		var email_compare=/^([a-z0-9_.-]+)@([da-z0-9.-]+).([a-z.]{2,6})$/;
		if(email==""||email==" "){$('input#joinemail').addClass('errorinp');error=true;}
		else if(!email_compare.test(email)){$('input#joinemail').addClass('errorinp');error=true;}
		if(phone==""||phone==" "){$('input#joincontact').addClass('errorinp');error=true;}
		if(address==""||address==" "){$('input#joinaddress').addClass('errorinp');error=true;}
		if(age==""||age==" "){$('input#joinage').addClass('errorinp');error=true;}
		if(pets==""||pets==" "){$('input#joinpets').addClass('errorinp');error=true;}
		if(why==""||why==" "){$('textarea#joinwhy').addClass('errorinp');error=true;}
		if(error==true){$('#join-err-form').slideDown('slow');return false;}
		var data_string=$('#joinus-form').serialize();$.ajax({type:"POST",url:$("#joinus-form").attr('action'),data:data_string,timeout:6000,error:function(request,error){if(error=="timeout"){$('#join-err-timedout').slideDown('slow');}
else{$('#join-err-state').slideDown('slow');$("#join-err-state").html('An error occurred');}},success:function(){$('#joinus-form').slideUp('slow');$('#join-ajaxsuccess').slideDown('slow');}});return false;});	
	
    //accordion
	jQuery(function ($) {
		var $active = $('#accordion .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
		$('#accordion .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
		$('#accordion').on('show.bs.collapse', function (e) {
			$('#accordion .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
			$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		})
	});
	jQuery(function ($) {
		var $active = $('#accordion2 .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
		$('#accordion2 .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
		$('#accordion2').on('show.bs.collapse', function (e) {
			$('#accordion2 .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
			$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		})
	});
	jQuery(function ($) {
		var $active = $('#accordion3 .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
		$('#accordion3 .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
		$('#accordion3').on('show.bs.collapse', function (e) {
			$('#accordion3 .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
			$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		})
	});
	jQuery(function ($) {
		var $active = $('#accordion4 .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
		$('#accordion4 .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
		$('#accordion4').on('show.bs.collapse', function (e) {
			$('#accordion4 .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
			$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		})
	});
	jQuery(function ($) {
		var $active = $('#accordion5 .panel-collapse.in').prev().addClass('active');
		$active.find('a').prepend('<i class="glyphicon glyphicon-minus"></i>');
		$('#accordion5 .panel-heading').not($active).find('a').prepend('<i class="glyphicon glyphicon-plus"></i>');
		$('#accordion5').on('show.bs.collapse', function (e) {
			$('#accordion5 .panel-heading.active').removeClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
			$(e.target).prev().addClass('active').find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
		})
	});
	
	
	// drop down menu
	$('.rock_menu ul li').children('ul').addClass('animated fadeInDown');
	$('.rock_menu ul li ul li').children('ul').addClass('animated fadeInLeft');
	
	
	// event tab
	$('.rock_event_tab > ul').each(function(){
			// For each set of tabs, we want to keep track of
			// which tab is active and it's associated content
			var $active, $content, $links = $(this).find('a');

		
			// If the location.hash matches one of the links, use that as the active tab.
			// If no match is found, use the first link as the initial active tab.
			$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
			$active.addClass('active');
		
			$content = $($active[0].hash);
		
			// Hide the remaining content
			$links.not($active).each(function () {
			  $(this.hash).hide();
			});
		
			// Bind the click event handler
			$(this).on('click', 'a', function(e){
			
			  // Make the old tab inactive.
			  $active.removeClass('active');
			  $content.hide();
		
			  // Update the variables with the new link and content
			  $active = $(this);
			  $content = $(this.hash);
		
			  // Make the tab active.
			  $active.addClass('active');
			  $content.fadeIn().addClass('animated fadeIn');
		
			  // Prevent the anchor's default click action
			  e.preventDefault();
			});
		  });
	
		
		
	 // date time picker	
	     var logic = function( currentDateTime ){
			if( currentDateTime ){
				if( currentDateTime.getDay()==6 ){
					this.setOptions({
						minTime:'11:00'
					});
				}else
					this.setOptions({
						minTime:'8:00'
					});
			}
		};
		// $('#datetimepicker').datetimepicker({
		// 	onChangeDateTime:logic,
		// 	onShow:logic
		// });
		
		
	
	// slider autoplay
	/*$(function(){
      $('.carousel').carousel({
      interval: 3000,
	  pause: "false"
		});
	});*/
	// slider background
/*	$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					rows : 3,
					columns : 6,
					maxStep : 4,
					interval : 2000,
					w1024 : {
						rows : 5,
						columns : 6
					},
					w768 : {
						rows : 5,
						columns : 5
					},
					w480 : {
						rows : 6,
						columns : 4
					},
					w320 : {
						rows : 7,
						columns : 4
					},
					w240 : {
						rows : 7,
						columns : 3
					},
				} );
			
			});*/
			
		
		
		
		
		// footer copyright background
		/*$(function() {
			
				$( '#ri-grid2' ).gridrotator( {
					rows : 1,
					columns : 8,
					maxStep : 2,
					interval : 2000,
					w1024 : {
						rows : 1,
						columns : 6
					},
					w768 : {
						rows : 1,
						columns : 5
					},
					w480 : {
						rows : 2,
						columns : 4
					},
					w320 : {
						rows : 2,
						columns : 4
					},
					w240 : {
						rows : 3,
						columns : 3
					},
				} );
			
			});*/
			
		
		
		// page title background
		/*$(function() {
			
				$( '#rock_page_title_bg' ).gridrotator( {
					rows : 1,
					columns : 8,
					maxStep : 2,
					interval : 2000,
					w1024 : {
						rows : 1,
						columns : 6
					},
					w768 : {
						rows : 1,
						columns : 5
					},
					w480 : {
						rows : 2,
						columns : 4
					},
					w320 : {
						rows : 2,
						columns : 4
					},
					w240 : {
						rows : 3,
						columns : 3
					},
				} );
			
			});	*/
		
			
	
	
		// club photo hover overlay
		$('.rock_club_photo_item').hover(function(){
			$(this).children('.rock_club_photo_overlay').fadeToggle();
			});


	
		// footer and rock-track
		var track_height = $(".rock_club_track").innerHeight() - 100;
		var half_of_track_height = track_height / 2 ;
		$('.rock_footer').css('margin-top', half_of_track_height);
		$('.rock_footer').css('padding-top', half_of_track_height + 30);
	
		
		
		//player
		/*$(function(){
		  $('.rock_player').mediaelementplayer({
			alwaysShowControls: true,
			features: ['playpause','progress','volume'],
			audioVolume: 'horizontal',
			audioWidth: 450,
			audioHeight: 70,
			iPadUseNativeControls: true,
			iPhoneUseNativeControls: true,
			AndroidUseNativeControls: true
		  });
		});*/
		
	
	/*$('.bxslider').bxSlider({
	  mode: 'vertical',
	  slideMargin: 5,
	  minSlides: 2,
	  auto: true,
	  default: 500,
	  controls: false,
	  pager: false,
	  autoHover: true
    });*/
	
	
	// club photo image popup
	/*$(".fancybox").fancybox({
          openEffect	: 'elastic',
		  closeEffect	: 'elastic',
		  helpers : 
			{
				overlay: 
				{ 
					locked: false 
				} 
			}
      });*/
	
	//player poster hover
	$('.rock_audio_player').hover(function(){
		$('.rock_audio_player_track_image_overlay').toggle().addClass('animated fadeInUp');
	});
	
	//play list slider 
	/*$('.rock_track_playlist_slider').bxSlider({
	  mode: 'vertical',
	  slideMargin: 0,
	  minSlides: 2,
	  auto: true,
	  default: 500,
	  controls: true,
	  pager: false,
	  autoHover: true,
	  nextSelector: '#rock_track_playlist_slider_next',
      prevSelector: '#rock_track_playlist_slider_prev',
	  nextText: '<i class="fa fa-angle-up"></i>',
      prevText: '<i class="fa fa-angle-down"></i>'
    });	*/
	
	//Rockon Club Track share button hover
	 $('.rock_share_track').hover(function(){
		var id=$(this).attr('id');
		 $('.'+id).show();
		 $('.'+id+' li').addClass('animated fadeInLeft');
	  });
	 $('.rock_track_playlist ul li .rock_track_detail').mouseleave(function(){
		$('.rock_track_playlist ul li .rock_track_detail .rock_social').hide();
	  });
	  
	  
	 // sidebar categories dropdown
	 $('.rock_categories ul li').click(function(){
		 $(this).children('ul').slideToggle();
		 });
	 
	  // book table
	  $('.rock_table_1').click(function(){
	    var existno = $('#booking_table_no').val();
		var id = $(this).attr('id');
		
		if(existno == '')
			$('#booking_table_no').val(id);
		else
			$('#booking_table_no').val(existno+','+id);
		
		  $(this).addClass('active');
		  $(this).children('.table_overlay').children('p').html('<p>Reserve</p>');
		  $(this).children('.table_overlay').children('p').css('margin-left','-27px');
		  $(this).children('.table_overlay').css('cursor','not-allowed');
		  $('#cls_'+id).css('display','block');
		  });
	 
		
	 
	 
	 
	 $('.main_gallery_tab > ul').each(function(){
			// For each set of tabs, we want to keep track of
			// which tab is active and it's associated content
			var $active, $content, $links = $(this).find('a');
		
			// If the location.hash matches one of the links, use that as the active tab.
			// If no match is found, use the first link as the initial active tab.
			$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
			$active.addClass('active');
		
			$content = $($active[0].hash);
		
			// Hide the remaining content
			$links.not($active).each(function () {
			  $(this.hash).hide();
			});
		
			// Bind the click event handler
			$(this).on('click', 'a', function(e){
			  // Make the old tab inactive.
			  $active.removeClass('active');
			  $content.hide();
		
			  // Update the variables with the new link and content
			  $active = $(this);
			  $content = $(this.hash);
		
			  // Make the tab active.
			  $active.addClass('active');
			  $content.fadeIn();
		
			  // Prevent the anchor's default click action
			  e.preventDefault();
			});
		  });
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 // gallery item click
	 $('.main_gallery_item_link').click(function(){
		 $('.main_gallery_item_popup').each(function(){
			 $(this).hide();
			 });
		 var shaid=$(this).attr('id');
		 
		 $('.'+shaid).slideDown();
		 
	});
	 
	 $('.main_gallery_item_popup_close').click(function(){
		 $('.main_gallery_item_popup').slideUp();
	 });	 
  
		
});
$(document).ready(function(){
$("#recruiting").on("click",function(){
$("#showrecruiting").slideDown('slow');
}); });

// club photo slider
/*$(document).ready(function() {
 
  var owl = $("#rock_club_photo_slider");
 
  owl.owlCarousel({
      items : 3,
      itemsDesktop : [1000,3], 
      itemsDesktopSmall : [900,2], 
      itemsTablet: [600,2], 
      itemsMobile : false 
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

 
});*/


// club photo slider
/*$(document).ready(function() {
 
  var owl = $("#rock_disc_jockcy_slider");
 
  owl.owlCarousel({
      items : 2, 
      itemsDesktop : [1000,2], 
      itemsDesktopSmall : [900,2], 
      itemsTablet: [600,1], 
      itemsMobile : false ,
	  autoPlay : true
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

 
});
*/

	
	
		
	function rock_table_close(clsid)
{
	$('#'+clsid).removeClass('active');
	$('#cls_'+clsid).css('display','none');
	$('#'+clsid).children('.table_overlay').children('p').children('p').html(clsid);
    $('#'+clsid).children('.table_overlay').children('p').children('p').css('margin-left','5px');
    $(this).children('.table_overlay').css('cursor','not-allowed');

	var curval = $('#booking_table_no').val();
	var newclsid = ','+clsid;
	var newtextval = curval.replace(newclsid, '');	
	//console.log(newtextval);
	var clsid1 = clsid+',';
	var newtextval1 = newtextval.replace(clsid1, '');
	
	var newtextval2 = newtextval.replace(clsid, '');
	//console.log(newtextval1);
	
	var newtextval12 = newtextval2.replace(/^,/,'');	
	$('#booking_table_no').val(newtextval12);
} 


$(function(){
    var lastScrollTop = 0, delta = 5;
    $(window).scroll(function(event){
       var st = $(this).scrollTop();
       
       if(Math.abs(lastScrollTop - st) <= delta)
          return;
       
       if (st > lastScrollTop){
           // downscroll code
           $(".rock_header_fixed").slideUp();
       } else {
          // upscroll code
          $(".rock_header_fixed").slideDown();
       }
       lastScrollTop = st;
    });
}); 