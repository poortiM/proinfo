var base_url = $('body').attr('base-url');
var auth = $('body').attr('auth');
var auth_id = $('body').attr('auth-id');
var auth_type = $('body').attr('auth-type');
var segment1 = $('body').attr('segment1');
var segment2 = $('body').attr('segment2');
var segment3 = $('body').attr('segment3');
var csrf = $('body').attr('csrf-token');
var x ;
var addblogcount = 1;
var uploadImageCount = 0;

var result_category = $("#hidden_keyword").val();
var result_location = $("#hidden_location").val();
var result_property_type = $("#hidden_property_type").val();
var result_frbudget = $("#hidden_budget").val();
var result_frkms = $("#hidden_kms").val();
var result_frpro = $("#hidden_select_pros").val();

var loader = base_url+"/images/ring.gif";

var placeSearch, autocomplete;

var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
};

$(window).load(function() {
    $(".loader-wrapper").fadeOut("slow");
});

if(segment1=='profile'){
    var __slice = [].slice;
    (function($, window) {
      var Starrr;

      Starrr = (function() {
        Starrr.prototype.defaults = {
          rating: void 0,
          numStars: 5,
          change: function(e, value) {}
        };

        function Starrr($el, options) {
          var i, _, _ref,
            _this = this;

          this.options = $.extend({}, this.defaults, options);
          this.$el = $el;
          _ref = this.defaults;
          for (i in _ref) {
            _ = _ref[i];
            if (this.$el.data(i) != null) {
              this.options[i] = this.$el.data(i);
            }
          }
          this.createStars();
          this.syncRating();
          this.$el.on('mouseover.starrr', 'span', function(e) {
            return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
          });
          this.$el.on('mouseout.starrr', function() {
            return _this.syncRating();
          });
          this.$el.on('click.starrr', 'span', function(e) {
            return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
          });
          this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function() {
          var _i, _ref, _results;

          _results = [];
          for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
            _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
          }
          return _results;
        };

        Starrr.prototype.setRating = function(rating) {
          if (this.options.rating === rating) {
            rating = void 0;
          }
          this.options.rating = rating;
          this.syncRating();
          return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function(rating) {
          var i, _i, _j, _ref;

          rating || (rating = this.options.rating);
          if (rating) {
            for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
              this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
            }
          }
          if (rating && rating < 5) {
            for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
              this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
          }
          if (!rating) {
            return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
          }
        };

        return Starrr;

      })();
      return $.fn.extend({
        starrr: function() {
          var args, option;

          option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
          return this.each(function() {
            var data;

            data = $(this).data('star-rating');
            if (!data) {
              $(this).data('star-rating', (data = new Starrr($(this), option)));
            }
            if (typeof option === 'string') {
              return data[option].apply(data, args);
            }
          });
        }
      });
    })(window.jQuery, window);

    $(function() {
      return $(".starrr").starrr();
    });

    $('#stars-efficiency').starrr({
      change: function(e, value){
        $(".submit_review").attr('efficiency',value);
      }
    });

    $('#stars-quality').starrr({
      change: function(e, value){
        $(".submit_review").attr('quality',value);
      }
    });

    $('#stars-helpfulness').starrr({
      change: function(e, value){
        $(".submit_review").attr('helpfulness',value);
      }
    });

    $('#stars-experience').starrr({
      change: function(e, value){
        $(".submit_review").attr('experience',value);
      }
    });

    $('#stars-effectiveness').starrr({
      change: function(e, value){
        $(".submit_review").attr('effectiveness',value);
      }
    });
}

$(document).ready(function(){  

    $(".nav-tabs a").click(function(){
        $(this).tab('show');
    });

    var retrievedGeoLocation = localStorage.getItem("location");
    
    if(segment2 != 'add' && segment2 != 'dashboard'){
      if(localStorage.getItem("location") != null){
          // $("#autocomplete").val(retrievedGeoLocation);
      }  
    }
    
    $('.gallery-img').Am2_SimpleSlider();

    $('.property_type').click(function() {
        $(".property_type").css({"background":"#fff","color":"#555555"});
        $(this).css({"background":"#f9b412","color":"#fff","border":"2px solid #f9b412"});

        $(".searchbutton").attr('property_type',$(this).attr('value'));
        var property_type = $(this).attr('value');
        if( property_type == "") {
            $(".percent").html("10% Complete");
            $(".question-complete-percent").css({"width":"10%"});
        }
        else {
            $(".percent").html("28% Complete");
            $(".question-complete-percent").css({"width":"28.57%"});
            $("#budget").removeClass('hide');
            var contactTopPosition = $("#budget").position().top;
            $(".questions").animate({scrollTop: contactTopPosition});
        }
    });

    $('.budget').click(function() {
        $(".budget").css({"background":"#fff","color":"#555555"});
        $(this).css({"background":"#f9b412","color":"#fff","border":"2px solid #f9b412"});
        $(".searchbutton").attr('budget',$(this).attr('value'));
        var budget = $(this).attr('value');
        if( budget == "") {
            $(".percent").html("28% Complete");
            $(".question-complete-percent").css({"width":"28.57%"});
        }
        else {
            $(".percent").html("57% Complete");
            $(".question-complete-percent").css({"width":"57.12%"});
            $("#pincode").removeClass('hide');
            var contactTopPosition = $("#pincode").position().top;
            $(".questions").animate({scrollTop: contactTopPosition});
        }
    });

   /* $('.location').change(function() {
        var location = $(this).val();
        $(".searchbutton").attr('location',location);

        if( location == "") {
            $(".percent").html("42% Complete");
            $(".question-complete-percent").css({"width":"42.84%"});
        }
        else {
            $(".percent").html("57% Complete");
            $(".question-complete-percent").css({"width":"57.12%"});
            $("#pincode").removeClass('hide');
            var contactTopPosition = $("#pincode").position().top;
            $(".questions").animate({scrollTop: contactTopPosition});
        }
    });*/

    $('.getPincode').click(function() {
        var pincode = $(".pincode").attr('value');

        $(".searchbutton").attr('pincode',pincode);
        if( pincode == "") {
            $(".percent").html("57% Complete");
            $(".question-complete-percent").css({"width":"57.12%"});
        }
        else {
            $(".percent").html("71% Complete");
            $(".question-complete-percent").css({"width":"71.4%"});

            $("#kms").removeClass('hide');
            var contactTopPosition = $("#kms").position().top;
            $(".questions").animate({scrollTop: contactTopPosition});
        }
    });

    $('.kms').click(function() {
        $(".kms").css({"background":"#fff","color":"#555555"});
        $(".searchbutton").attr('kms',$(this).attr('value'));
        $(this).css({"background":"#f9b412","color":"#fff","border":"2px solid #f9b412"});
        var kms = $("#kms").attr('value');
        if( kms == "") {
            $(".percent").html("71% Complete");
            $(".question-complete-percent").css({"width":"71.4%"});
        }
        else{
            $(".percent").html("85% Complete");
            $(".question-complete-percent").css({"width":"85.8%"});
            $("#vendorType").removeClass('hide');
            var contactTopPosition = $("#vendorType").position().top;
            $(".questions").animate({scrollTop: contactTopPosition});
        }
    });

    $('.select_pros').click(function() {
        $(".select_pros").css({"background":"#fff","color":"#555555"});
        $(".searchbutton").attr('select_pros',$(this).attr('value'));
        $(this).css({"background":"#f9b412","color":"#fff","border":"2px solid #f9b412"});
        var select_pros = $("#kms").attr('value');
        if( select_pros == "") {
            $(".percent").html("85% Complete");
            $(".question-complete-percent").css({"width":"85.8%"});
        }
        else {
            $(".percent").html("100% Complete");
            $(".question-complete-percent").css({"width":"100%"});
        }
    });

    $(".searchbutton").click(function(){

        var category = $(this).attr('category');
        var property_type = $(this).attr('property_type');
        var budget = $(this).attr('budget');
        var location = $(this).attr('pincode');
        var pincode = $(this).attr('pincode');
        var kms = $(this).attr('kms');
        var select_pros = $(this).attr('select_pros');


        var data = "category="+category+"&property_type="+property_type+"&budget="+budget+"&location="+location+"&pincode="+pincode+"&kms="+kms+"&super_pros="+select_pros;

        $.ajax({
            type : "post",
            url: base_url+"/web/ajax/analytics",
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            data: data,
            success: function(res)
            {
              if(res == 1){
                window.location=base_url+"/search?type=listing&element=category&keyword="+category+"&location="+location+"&budget="+budget+"&property_type="+property_type+"&select_pros="+select_pros+"&kms="+kms+"&pincode="+pincode;

              }
            }
        });
    });

    $(".set-location").click(function(){
        var location = $("#autocomplete").val();

        localStorage.setItem("location", location);
        $(".get-location").html(location);
        $("#changelocation").modal('hide');
    });

    $(".description_read_more").click(function() {
        var status = $(this).attr('status');
        if(status == 0){
          $(".about_us_show").hide();
          $(".about_us_hide").show();
          $(".description_read_more").attr('status',1);
          $(this).html('Show less');
        }else {
          $(".about_us_show").show();
          $(".about_us_hide").hide();
          $(".description_read_more").attr('status',0);
          $(this).html('Show more');
        }
    });

    $(".search_result").click(function(){
      var keyword = $(".search-keyword").val();
      var location = $(this).attr('data-location');

      var retrievedCoordinates = localStorage.getItem("location");

      if(segment2 == 'pros'){

        if(location==undefined){
          window.location = base_url+"/search?type=listing&element=category&keyword="+keyword;
        }else{
          $.ajax({
              type : "post",
              url: base_url+"/user/ajax/validZipcode",
              headers: {
                  'X-CSRF-Token': csrf ,
                  "Accept": "application/json"
              },
              data: "zipcode="+location,
              dataType: 'json',
              success: function(res)
              {
                console.log(location)
                if(res.success == true){
                  window.location = base_url+"/search?type=listing&element=category&keyword="+keyword+"&lat="+res.data.lat+"&lng="+res.data.lon+"&location="+storagelocation;
                }else{
                  window.location = base_url+"/search?type=listing&element=category&keyword="+keyword;
                }
              }
          });
        }

      }else{
        if(retrievedCoordinates!=null){
           storagelocation = retrievedCoordinates;
           $.ajax({
              type : "post",
              url: base_url+"/user/ajax/validZipcode",
              headers: {
                  'X-CSRF-Token': csrf ,
                  "Accept": "application/json"
              },
              data: "zipcode="+storagelocation,
              dataType: 'json',
              success: function(res)
              {
                console.log(storagelocation);
                if(res.success == true){
                  window.location = base_url+"/search?type=listing&element=category&keyword="+keyword+"&lat="+res.data.lat+"&lng="+res.data.lon+"&location="+storagelocation;
                }else{
                  window.location = base_url+"/search?type=listing&element=category&keyword="+keyword;
                }
              }
          });
        }
        else{
          storagelocation = '';
          window.location = base_url+"/search?type=listing&element=category&keyword="+keyword;
        }
      }

    });

    $(".claimyourprofile").click(function() {
        var username = $(this).attr('data-username');
        var action = base_url+'/claim-profile';
        $.ajax({
            type : "post",
            url: action,
            data : "username="+username,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {}
        });
    });

    $(".verify-claim-otp").click(function(){
      var code = $("#claim-code").val();
      var username = $(this).attr('data-username');
      var action = base_url+'/postClaimProfile';
      if(code!=''){
        $.ajax({
            type : "post",
            url: action,
            data : "code="+code+"&username="+username,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
              console.log(res.success);
              if(res.success == true){
                toastr.warning('Done...', 'Message', {timeOut: 10000});
                window.location=base_url+'/pro/update-password';
              }else{
                toastr.warning('Invalid Claim OTP', 'Message', {timeOut:10000});
              }
            }
        });
      }
    });

    $('#claim-form-terms').change(function() {
      if($(this).is(":checked")) {
            $(".verify-claim-otp").prop("disabled", false);
        }else{
            $(".verify-claim-otp").prop("disabled", true);
        }
    });

    $(".get_started").click(function(){

        var name = $("#register-form-name").val();
        var email = $("#register-form-email").val();
        var mobile_number = $("#register-form-mobile_number").val();
        var password = $("#register-form-password").val();

        var state = $("#register-form-state").val();

        var user_type = 'vendor';
        var data = "name="+name+"&email="+email+"&mobile_number="+mobile_number+"&user_type="+user_type;
        
        var action = base_url+"/pro/ajax/postGetStarted";

        $.ajax({
            type : "post",
            url: action,
            data : data,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
                var data = JSON.parse(res);
                $(".get_started").html("Next");
                $(".get_started").prop("disabled", false);

                if(data.name != '' && typeof data.name !== 'undefined')
                {
                    $("#name_error").html("<font color='red'>"+data.name+"</font>");
                }
                else{
                    $("#name_error").html("");
                }

                if(data.email != '' && typeof data.email !== 'undefined')
                {
                    $("#email_error").html("<font color='red'>"+data.email+"</font>");
                }
                else{
                    $("#email_error").html("");
                }

                if(data.mobile_number != '' && typeof data.mobile_number !== 'undefined')
                {
                    $("#mobile_number_error").html("<font color='red'>"+data.mobile_number+"</font>");
                }
                else{
                    $("#mobile_number_error").html("");
                }

                if(typeof data.message !== 'undefined'){
                    $(".registerform").hide();
                    $(".otpform").show();

                    $(".create_account").attr('auth',data.otp);
                }

            },
            beforeSend: function() 
            { 
              console.log("sending")
              $(".get_started").prop("disabled", true);
              $(".get_started").html("Please wait ...");
            }
        });
    });

    $(".create_account").click(function(e){
        e.preventDefault();

        var otp = $("#register-form-otp").val();
        var verify_otp = $(this).attr('auth');

        var name = $("#register-form-name").val();
        var email = $("#register-form-email").val();
        var mobile_number = $("#register-form-mobile_number").val();
        var password = $("#register-form-password").val();

        var user_type = 'vendor';
        var data = "name="+name+"&email="+email+"&mobile_number="+mobile_number+"&user_type="+user_type;
        
        var action = base_url+"/pro/ajax/registerVendorOnVerifyOTP";

        if(otp == verify_otp){
          $.ajax({
            type : "post",
            url: action,
            data : data,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
              var data = JSON.parse(res);
              if(data.message == 1){
                window.location = base_url+"/pro/signup?vid="+data.vendor_id;
              }
            }
          });
          
        }
        else{
          alert("Wrong OTP")
        }
    });

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });

    $("#showmore").click(function(){
        $(this).hide();
        $("#showless").show();
        var x = $(this).attr("id");
        $(".category-section").attr('style','display:none;');
        if(x == "showmore")
        {
            $('.improve-section').toggleClass('hide');
            $("#showmore").html("Show Less");
            universal("showless");
            console.log(x);
        }
    });

    $("#showless").click(function(){
        $(this).hide();
        $("#showmore").show();
        $('.improve-section').toggleClass('hide');
        $(".category-section").attr('style','display:block;');
            $("#showmore").html("Show More");
            universal("showmore");
    });

    $(".about_business_save").click(function(){
        var about_us = $("#about_us").val();
        var founding_year = $("#founding_year").val();
        var website = $("#website").val();
        var token = "{{ csrf_token() }}";
        var user_id = $("#user_id").val();

        var facebook = $("#facebook").val();
        var twitter = $("#twitter").val();
        var googleplus = $("#googleplus").val();
        var linkedin = $("#linkedin").val();
        var instagram = $("#instagram").val();
        var tumblr = $("#tumblr").val();
        var pinterest = $("#pinterest").val();
        var youtube_channel = $("#youtube_channel").val();
        var award = $("#award").val();
        var category = $("#category").val();

        var data = "about_us="+about_us+"&founding_year="+founding_year+"&website="+website+"&user_id="+user_id+"&facebook="+facebook+"&twitter="+twitter+"&googleplus="+googleplus+"&linkedin="+linkedin+"&instagram="+instagram+"&tumblr="+tumblr+"&award="+award+"&pinterest="+pinterest+"&youtube_channel="+youtube_channel+"&category="+category;

        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/aboutBusiness",
            data : data,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
              if(res == 1){
                $(".about_us").html(about_us);
                
                if(facebook != ''){
                  $(".fb-link").html('<a href="'+facebook+'" target="_blank"><i class="fa fa-facebook"></i></a>');
                }

                if(twitter != ''){
                  $(".twitter-link").html('<a href="'+twitter+'" target="_blank"><i class="fa fa-twitter"></i></a>');
                }

                if(googleplus != ''){
                  $(".googleplus-link").html('<a href="'+googleplus+'" target="_blank"><i class="fa fa-google-plus"></i></a>');
                }

                if (instagram != '') {
                  $(".instagram-link").html('<a href="'+instagram+'" target="_blank"><i class="fa fa-instagram"></i></a>');
                }

                if(tumblr != ''){
                  $(".tumblr-link").html('<a href="'+tumblr+'" target="_blank"><i class="fa fa-tumblr"></i></a>');
                }

                if(linkedin != ''){
                  $(".linkedin-link").html('<a href="'+linkedin+'" target="_blank"><i class="fa fa-linkedin"></i></a>');
                }

                if(website != ''){
                  $(".website-link").html('<a href="'+website+'" target="_blank">'+website+'</a>');
                }
                
                if(youtube_channel != ''){
                  $(".youtube-link").html('<a href="'+youtube_channel+'" target="_blank"><i class="fa fa-youtube"></i></a>');
                }
                
                if(pinterest != ''){
                  $(".pinterest-link").html('<a href="'+pinterest+'" target="_blank"><i class="fa fa-pinterest"></i></a>');
                }

                if(category != ''){
                  $(".service-provide").html(category.replace(/\n/g, "<br />"));
                }

                if(award != ''){
                  console.log(award.replace(/\n/g, "<br />"))
                  $(".award-area").html(award.replace(/\n/g, "<br />"));
                }
                $('#formMessagePopup').modal('show');
              }
            }
        });
    });

    $(".business_name_save").click(function() {
        var business_name = $("#business_name").val();
        var user_id = $("#user_id").val();

        var data = "business_name="+business_name+"&user_id="+user_id;

        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/businessNameSave",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              $('#editbusinessname').modal('hide');
              // $('#formMessagePopup').modal('show');
              $(".vendor-business").html(business_name);
              // setTimeout(function(){location.reload();},5000);
            }
        });
    });

    $(".delete_service").click(function(){

        var deleteid = $(this).attr("deleteid");
        var csrf = $(this).attr("csrf");
        var user_id = $("#user_id").val();

        $(this).parents('button').fadeOut();

        var data = "deleteid="+deleteid+"&user_id="+user_id+"&csrf="+csrf;

        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/serviceDelete",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              //alert(res)
            }
        });
    });

    if(auth != ''){
        if(auth_type == 'vendor'){
            if(segment2 == 'dashboard'){
                setInterval(function(){
                  var avatar_url = base_url+"/uploads/avatar";
                  var cover_url = base_url+"/uploads/cover";

                  $.ajax({
                    type : "post",
                    url: base_url+'/pro/ajax/getVendor',
                    data: "id="+auth_id,
                    headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
                    dataType: 'json',
                    success: function(res)
                    {
                      $(".vendor-services").html('');
                      $(".servicelist").html('');
                      
                      $(".award-area").html(res.awards);

                      $(".property-value").html(res.type_of_property);
                      
                      $(".accreditation").html(res.accreditation);
                      $(".license").html(res.license);
                      $(".license_expiry").html(res.license_expiry);

                      $.each(res.service, function(index) {
                        $(".vendor-services").append("<li>"+res.service[index].service_name+"</li>");
                        
                        $(".servicelist").append('<button class="btn btn-sm" type="button">'+res.service[index].service_name+' <i class="fa fa-times delete_service" deleteid="'+res.service[index].id+'"></i></button> ');

                        $(".delete_service").click(function(){

                            var deleteid = $(this).attr("deleteid");
                            var user_id = $("#user_id").val();

                            $(this).parents('button').fadeOut();

                            var data = "deleteid="+deleteid+"&user_id="+user_id;

                            $.ajax({
                                type : "post",
                                url: base_url+"/pro/ajax/serviceDelete",
                                data : data,
                                headers: {
                                        'X-CSRF-Token': csrf ,
                                        "Accept": "application/json"
                                    },
                                success: function(res)
                                {
                                  //alert(res)
                                }
                            });
                        });
                      });
                    }

                  });
                }, 9000);
            }
        }
    }

    $(".licenses_save").click(function(){
        var accreditation = $("#accreditation").val();

        var user_id = $("#user_id").val();

        var data = "accreditation="+accreditation+"&user_id="+user_id;
        $(".accreditation").html(accreditation.replace(/\n/g, "<br />"));

        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/license",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              /*if(res == 1){
                $(".accreditation").html(accreditation.replace(/\n/g, "<br />"));
              }*/
            }
        });
    });


    $(".professional_information_save").click(function () {
        var name = $("#name").val();
        var mobile_number = $("#mobile_number").val();
        var area = $(".area").val();
        var zipcode = $("#zipcode").val();
        var street = $("#street").val();
        var user_id = $("#user_id").val();
        var type_of_property = $("#type_of_property").val();
        var scope_of_work = $("#scope_of_work").val();
        var area_served = $("#area_served").val();

        var data = "name="+name+"&mobile_number="+mobile_number+"&area="+area+"&zipcode="+zipcode+"&user_id="+user_id+"&type_of_property="+type_of_property+"&scope_of_work="+scope_of_work+"&street="+street+"&area_served="+area_served;
        
        $('#formMessagePopup').modal('show');

        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/personalInfoEdit",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              //alert(res)
              if(res == 1){
                
                $(".location-value").html(location);
                $(".scope-value").html(scope_of_work);
                $(".area-served-value").html(area_served.replace(/\n/g, "<br />"));
              }
            }
        });

    });

    $('.image-editor').cropit();

    if(segment2 == 'dashboard' || segment2 == 'analytics'){
        $("form#avatar-upload").submit(function() {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);

            var formValue = $(this).serialize();

            var action = base_url+"/pro/ajax/uploadVendorAvatar";

            if(imageData != undefined){

                $(".profileView").attr('src',imageData);

                $.ajax({
                    type : "post",
                    url: action,
                    data : formValue,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
                    success: function(res)
                    {
                      console.log(res);
                    }
                });

                $("#avatar-modal").modal('hide');
            }
            return false;
        });

        $("form.cover-upload").submit(function(e) {
            e.preventDefault();
            var imageData = $('#image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);

            var formValue = $(this).serialize();

            var action = base_url+"/pro/ajax/uploadVendorCover";

            if(imageData != undefined){

              $(".detail-banner").attr('style','background-image: url("'+imageData+'")');

              toastr.warning('File uploading Please wait...', 'Message', {timeOut: 30000});

              $.ajax({
                  type : "post",
                  url: action,
                  data : formValue,
                  dataType: 'json',
                  headers: {
                      'X-CSRF-Token': csrf ,
                      "Accept": "application/json"
                  },
                  success: function(res)
                  {
                    if(res.success == true){
                       toastr.warning('Cover uploaded..', 'Message', {timeOut: 5000})
                    }
                  }
              });

              $("#cover-modal").modal('hide');
            }


            e.preventDefault();
            return false;
        });   
    }

    /*$('#featured_image').on('change',function(){
     var pic = 1;
     var projectId = $("#projectImageId").val();
     var formData = new FormData($("#project-image")[0]);
     formData.append('projectId', projectId);

     var directory = base_url+"/uploads/project/";
     var loader = base_url+"/images/ring.gif";

     var uploaded_count = $('#project-image input[type=file]').get(0).files.length;

     $.ajax({
        url:base_url+"/pro/ajax/projectImage",
        data:formData,
        dataType:'json',
        type:'post',
        headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
        beforeSend: function() {
           console.log("Uploading in progress");
           for (var i = 0; i < uploaded_count; i++) {
             $('.create-project-image').append('<div class="photo-pod col-xs-4 project-loader"> <div class="project-image-status-container">  <img class="project-photo" src="'+loader+'" style="height: 200px;width: 200px;margin-left: 25px;"> </div><div class="project-image-phases"> <div class="btn-group" data-toggle="buttons"> <label class="phase-type btn btn-xs btn-default"> <input type="radio" value="Before"> Before </label> <label class="phase-type btn btn-xs btn-default"> <input type="radio" class="DURING" value="During"> During </label> <label class="phase-type btn btn-xs btn-default"> <input type="radio" class="AFTER" value="After"> After </label> </div></div></div>');
           }
        },
        
        success:function(response){
          if(response.success == 'true'){
            $('.create-project-image').html('');
            $.each(response.data, function(id, value) {
              console.log(id+" "+response.data[id].image);
                $('.create-project-image').append('<div class="photo-pod col-xs-4 project-image-section-'+response.data[id].id+'"> <div class="photo-actions-container"> <span class="make-cover'+response.data[id].id+' photo-action-btn pull-left unsetcover" onclick="setProjectCoverImage('+response.data[id].id+','+projectId+')"> <i class="fa fa-check-circle photo-action-icon"></i> cover photo </span> <span class="delete-project-photo photo-action-btn pull-right" onclick=deleteProject('+response.data[id].id+')> delete <i class="fa fa-times-circle photo-action-icon"></i> </span> </div><div class="project-image-status-container"> <div class="image-status btn btn-black-opaque"> <span style="color:white">Published</span> </div>  <input type="hidden" name="project_photo[]" value='+response.data[id].image+'"><input type="hidden" class="project_cover'+id+'" name="project_cover[]" value="0">  <img class="project-photo" src="'+directory+response.data[id].image+'"> </div><div class="project-image-phases"> <div class="btn-group" data-toggle="buttons"> <label class="phase-type btn btn-xs btn-default" onclick=setAfterImage('+response.data[id].id+',1)> <input type="radio" value="Before"> Before </label> <label class="phase-type btn btn-xs btn-default" onclick=setAfterImage('+response.data[id].id+',2)> <input type="radio" class="DURING" value="During"> During </label> <label class="phase-type btn btn-xs btn-default"  onclick=setAfterImage('+response.data[id].id+',3)> <input type="radio" class="AFTER" value="After"> After </label> </div></div></div>');
            });
          }
          else{
            toastr.warning(response.message+' ...', 'Message Alert', {timeOut: 5000})
          }

           $(".project-loader").hide();
        },
        processData: false,
        contentType: false,
     });
    });*/

    /*$('#featured_image_product').on('change',function(){
        var productId = $("#product_id").val();
        var formData = new FormData($("#product-image")[0]);
        formData.append('productId', productId);

        var directory = base_url+"/uploads/product/";
        var loader = base_url+"/images/ring.gif";

        var uploaded_count = $('#product-image input[type=file]').get(0).files.length;

        $.ajax({
            url:base_url+"/pro/ajax/productImage",
            data:formData,
            dataType:'json',
            type:'post',
            headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
            beforeSend: function() {
               console.log("Uploading in progress");
               for (var i = 0; i < uploaded_count; i++) {
                 $('.create-project-image').append('<div class="photo-pod col-xs-4 project-loader"> <div class="project-image-status-container"> <img class="project-photo" src="'+loader+'" style="height: 200px;width: 200px;margin-left: 7px;"> </div>');
               }
            },
            
            success:function(response){
              $('.create-project-image').html('');
              $.each(response.data, function(id, value) {
                  console.log(id+" "+response.data[id].image);
                  $('.create-project-image').append('<div class="photo-pod col-xs-4 project-image-section-'+response.data[id].id+'"> <div class="photo-actions-container"> <span class="delete-project-photo photo-action-btn pull-right" onclick=deleteProduct('+response.data[id].id+')> delete <i class="fa fa-times-circle photo-action-icon"></i> </span> </div><div class="project-image-status-container"> <div class="image-status btn btn-black-opaque"> <span style="color:white">Published</span> </div>  <input type="hidden" name="project_photo[]" value='+response.data[id].image+'"><input type="hidden" class="project_cover'+id+'" name="project_cover[]" value="0">  <img class="project-photo" src="'+directory+response.data[id].image+'"> </div></div>');
              });

              $(".project-loader").hide();
            },
            processData: false,
            contentType: false,
         });
    });*/

    $(".update_youtube").click(function(){
        var link = $("#youtube_link").val();
        var vendor_id = $(this).attr('vendor_id');

        var data="link="+link+"&vendor_id="+vendor_id;
        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/updateYoutube",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              $('#youtubeMessage').html('Updated successfully...');
            }
        });

        $("#vendorvid").modal('hide');
    });

    $(".delete-whole-project").click(function(e) {
      var project_id = $(this).attr("project-id");
      var r = confirm("Are you sure??!");
      if (r == true) {

        $(".project-section"+project_id).hide();
        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/deleteProject",
            data : "project_id="+project_id,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              //alert(res)
            }
        });

        return false;
      }
    });

    $(".saveProjectName").click(function(){
        var editable = $("#editable").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;
        $(".project_title").html(editable);
        $("#projectnameModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".saveLocation").click(function(){
        var editable = $("#autocomplete").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".project_location").html(editable);
        $("#projectlocationModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".saveDate").click(function(){
        var editable = $("#project-date").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".project_date").html(editable);
        $("#projectdateModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".saveType").click(function(){
        var editable = $("#project-type").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".project_type").html(editable);
        $("#projecttypeModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".areaSquare").click(function(){
        var editable = $("#area-sq-ft").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".area_type").html(editable);
        $("#areaSquareModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    /*$(".saveCurrency").click(function(){
        var editable = $("#currency").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".currency_type").html(editable);
        $("#currencyModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });*/

    $(".saveCost").click(function(){
        var from = $("#from").val();
        var to = $("#to").val();
        var currency = $("#currency").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "from="+from+"&project_id="+project_id+"&type="+type+"&to="+to+"&currency="+currency;
        
        $(".min_cost_type").html(currency+" "+from+"-"+to);
        $("#minCostModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".saveVideo").click(function(){
        var editable = $("#project-video").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;
        $("#projectvideo").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".saveDescription").click(function(){
        var editable = $("#project-description").val();
        var action = base_url+"/pro/ajax/saveProject";
        var project_id = $(this).attr('project-id');
        var type = $(this).attr('edit-type');

        var data = "editable="+editable+"&project_id="+project_id+"&type="+type;

        $(".project_description").html(editable);
        $("#projectDescriptionModal").modal('hide');

        $.ajax({
            type : "post",
            url: action,
            data : data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {
            }
        });
    });

    $(".contact_vendor").click(function() {
        var url = $(this).attr('redirecturl');
        window.location = url;
    });

    $(".view_phone").click(function(){
        var phone = $(this).attr('phone');
        var vendor_id = $(this).attr('vendor_id');
        $(this).html(phone);
        $(this).css({"background-color": "white", "border": "1px solid #F9B412","color":"black"});
        var action = base_url+"/pro/ajax/setClick";
        $.ajax({
            type : "post",
            url: action,
            data : "vendor_id="+vendor_id,
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(res)
            {}
        });
    });

    if(segment2 ==  'edit' && segment3 == 'project'){

        $("form.cover-upload").submit(function(e) {

            e.preventDefault();
            var imageData = $('#image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);

            var formValue = $(this).serialize()+"&projectid="+"{{$projectid}}";

            var action = base_url+"/pro/ajax/uploadProjectBanner";

            if(imageData != undefined){
                $(".detail-banner").attr('style','background-image: url("'+imageData+'")');

                toastr.warning('File uploading Please wait...', 'Message', {timeOut: 35000});

                $.ajax({
                    type : "post",
                    url: action,
                    data : formValue,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
                    success: function(res)
                    {
                      console.log(res);
                    }
                });

                $("#cover-modal").modal('hide');
            }

            e.preventDefault();
            return false;
        });

        var projectId = $(".projectId").val();
        
        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/postGetProjectImage",
            data : "projectId="+projectId,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            success: function(response)
            {
                var directory = base_url+"/uploads/project/";
                var loader = base_url+"/images/ring.gif";
                $.each(response.data, function(id, value) {
                  $('.create-project-image').append('<div class="photo-pod col-xs-4 project-image-section-'+response.data[id].id+'"> <div class="photo-actions-container"> <span class="make-cover'+response.data[id].id+' photo-action-btn pull-left unsetcover" onclick="setProjectCoverImage('+response.data[id].id+','+projectId+')"> <i class="fa fa-check-circle photo-action-icon"></i> cover photo </span> <span class="delete-project-photo photo-action-btn pull-right" onclick=deleteProject('+response.data[id].id+')> delete <i class="fa fa-times-circle photo-action-icon"></i> </span> </div><div class="project-image-status-container"> <div class="image-status btn btn-black-opaque"> <span style="color:white">Published</span> </div>  <input type="hidden" name="project_photo[]" value='+response.data[id].image+'"><input type="hidden" class="project_cover'+id+'" name="project_cover[]" value="0">  <img class="project-photo" src="'+base_url+"/contentimage?file=uploads/project/"+response.data[id].image+"&l=350&w=250"+'"> </div><div class="project-image-phases"> <div class="btn-group" data-toggle="buttons"> <label class="phase-type btn btn-xs btn-default" onclick=setAfterImage('+response.data[id].id+',1)> <input type="radio" value="Before"> Before </label> <label class="phase-type btn btn-xs btn-default" onclick=setAfterImage('+response.data[id].id+',2)> <input type="radio" class="DURING" value="During"> During </label> <label class="phase-type btn btn-xs btn-default"  onclick=setAfterImage('+response.data[id].id+',3)> <input type="radio" class="AFTER" value="After"> After </label> </div></div></div>');
              });
            }
        });
    }

    $(".userSignUpProcessform").submit(function(e) {
        e.preventDefault();
        var action = $(this).attr('action');
        var data = $(this).serialize();

        $.ajax({
            type: "post",
            url: action,
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            beforeSend: function() {
                $(".continuebtn").prop("disabled", true);
            },
            success: function(res) {
                $(".continuebtn").prop("disabled", false);
                $(".signupLoader").hide();
                $("#reg-name-error,#reg-email-error,#reg-mobile-number-error,#reg-password-error").html('');
                if (res.success == false) 
                {
                    if (res.errors != '') 
                    {
                        $.each(res.errors, function(index, value) {
                            $("#reg-" + index + "-error").html('<span>' + value + '</span>');
                        });
                    }
                    if (res.message != '') {
                        $('.ajax-alert').html(res.message).show();
                    }
                } 
                else 
                {
                    if (res.next != '') {
                        window.location.href = res.next;
                    } else if (res.message != '') {
                        $('.success-msg').html(res.message).show();
                    } else if (res.rld != '') {
                        $(".userSignUpOTP").show();
                        $(".userSignUpProcessform").hide();
                        // location.reload();
                        console.log(res.otp);
                        $(".verify-otp-button").attr('auth',res.otp);
                    }
                }
            }
        });
    });

    $(".userSignUpOTP").submit(function(e) {
        e.preventDefault();
        var otp = $(".verify-otp-button").attr('auth');
        var entered_otp = $("#user-otp").val();
        if(otp == entered_otp){
          location.reload();
        }else{
          alert("Wrong OTP")
        }
    });

    $(".userLoginProcessform").submit(function(e) {
        e.preventDefault();
        var action = $(this).attr('action');
        var data = $(this).serialize();

        $.ajax({
            type: "post",
            url: action,
            data: data,
            dataType: 'json',
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            beforeSend: function() {
                $(".continuebtn").prop("disabled", true);
            },
            success: function(res) {
                $(".continuebtn").prop("disabled", false);
                $("#login-error").html('');
                if (res.success == false) 
                {
                    $("#login-error").html('<span>' + res.message + '</span>');
                } 
                else 
                {
                    location.reload();
                }
            }
        });
    });

    $(".follow-user").click(function(){

          var following_id = $(this).attr('following_id');
          var redirecturl = $(".project-featured").attr('redirect-url');
          var data = "auth_id="+auth_id+"&following_id="+following_id;

          if(auth_id != ''){
            $.ajax({
                type : "post",
                url: base_url+"/user/ajax/follow",
                data : data,
                headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
                success: function(res)
                {
                  if(res.is_followed == 1){
                    $(".follow-response-"+following_id).html(res.data_template);
                    toastr.success(res.message+' ...', 'Message Alert', {timeOut: 5000})
                  }else{
                    $('#sigUp-Login').modal('show');
                  }
                }
            });
          }else{
            $('#sigUp-Login').modal('show');
          }
        });

    if(segment3 == 'add-blog' || segment3 == 'story'){
        window.onload = function(){
          if(window.File && window.FileList && window.FileReader)
          {
              var filesInput = document.getElementById("blog_image");

              filesInput.addEventListener("change", function(event){

                  var files = event.target.files; //FileList object

                  for(var i = 0; i< files.length; i++)
                  {
                      var file = files[i];

                      //Only pics
                      if(!file.type.match('image'))
                        continue;

                      var picReader = new FileReader();

                      picReader.addEventListener("load",function(event){

                          var picFile = event.target;
                          var count = addblogcount++;

                          $('.blog-image').append('<div class="project-photos-container project-image-section-'+count+'"><div class="photo-pod col-xs-4"><div class="photo-actions-container"> <span class="delete-stories-image" onclick="deleteAddBlogImage('+count+')"><i class="fa fa-trash"></i></span> </div><div class="project-image-status-container"><img class="project-photo" src="'+picFile.result+'" ><input type="hidden" name="image_data_image[]" value="'+picFile.result+'"><textarea class="form-control" placeholder="Write a caption" name="image_description[]"></textarea></div></div></div>');

                      });
                       //Read the image
                      picReader.readAsDataURL(file);
                  }

              });
          }
          else
          {
              console.log("Your browser does not support File API");
          }
        }
    }

    $('form#blog-form').ajaxForm({
         url : base_url+"/user/ajax/addBlogAction",
         type : 'post',
         beforeSubmit : function(arr, $form, options){
            console.log('Sending data');
            $(".add-story").prop("disabled", true);
            $(".add-story").html("Please wait ...");
         },
         success : function(response, statusText, xhr, $form){
            console.log('Getting response');
            $(".add-story").prop("disabled", false);
            $(".add-story").html("Submit");

            $("#title_error,#location_error,#description_error").html('');
            if(response.success == false){
              $.each(response.errors,function(index,value) {
                $("#" + index + "_error").html('<span>' + value + '</span>');
                toastr.warning(value, 'Message Alert', {timeOut: 5000})
              });
            }
            else{
              if(response.success == true){
                window.location = base_url+"/user/dashboard/newsfeed";
              }
            }
         }
     });

    $('form#edit-blog-form').ajaxForm({
         url : base_url+"/user/ajax/editBlogAction",
         type : 'post',
         beforeSubmit : function(arr, $form, options){
            console.log('Sending data');
            $(".edit-story").prop("disabled", true);
            $(".edit-story").html("Please wait ...");
         },
         success : function(response, statusText, xhr, $form){
            console.log('Getting response');
            $(".edit-story").prop("disabled", false);
            $(".edit-story").html("Submit");

            $("#title_error,#location_error,#description_error").html('');
            
            if(response.success == false){

              $.each(response.errors,function(index,value) {
                $("#" + index + "_error").html('<span>' + value + '</span>');
                toastr.warning(value, 'Message Alert', {timeOut: 5000});
              });
            }
            else{
              if(response.success == true){
                // window.location = base_url+"/user/dashboard/newsfeed";
                toastr.success('You have successfully updated...', 'Success Alert', {timeOut: 5000})
              }
            }
         }
     });

    $(".like-stories").click(function() {
      var stories_id = $(".project-featured").attr('stories-id');
      var auth = $(".project-featured").attr('auth');
      var auth_id = $(".project-featured").attr('auth-id');
      var redirecturl = $(".project-featured").attr('redirect-url');

      var data = "auth_id="+auth_id+"&stories_id="+stories_id;

      if(auth == 1){
        $.ajax({
            type : "post",
            url: base_url+"/user/ajax/likestories",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              if(res.is_liked == 1){
                $(".like-count").html(res.total_liked);
                $(".like-stories i").attr('class',res.like_template);
                toastr.success(res.message+' ...', 'Message Alert', {timeOut: 5000})
              }
              else{
                $('#sigUp-Login').modal('show');
              }
            }
        });
      }else{
        $('#sigUp-Login').modal('show');
      }
    });

    $(".comment-stories").click(function(){
      $(".comment-input").focus();
    });

    $(".comment-button").click(function(){
      var comment = $(".comment-input").val();
      var stories_id = $(".project-featured").attr('stories-id');
      var auth = $(".project-featured").attr('auth');
      var auth_id = $(".project-featured").attr('auth-id');
      var redirecturl = $(".project-featured").attr('redirect-url');

      var data = "auth_id="+auth_id+"&stories_id="+stories_id+"&comment="+comment;

      if(auth == 1){
        if(comment != ''){
          $.ajax({
              type : "post",
              url: base_url+"/user/ajax/commentstories",
              data : data,
              headers: {
                      'X-CSRF-Token': csrf ,
                      "Accept": "application/json"
                  },
              success: function(res)
              {
                if(res.is_commented == 1){
                  $(".comment-area").append('<div class="s-cmt-card"><div class="img"><a class="rp-p-img" title="" rel="author" href="#"><div class="rp-p-img-cont"><div class="rp-p-img-src" style="background-image: url('+res.avatar+');"></div></div></a></div><div class="txt-a"><a class="n fw400" title="#" rel="author" href="#">'+res.name+'</a><div class="tx fw300">'+res.data+'</div><span class="r-icon r-icon-dots del-c link"></span></div></div>');

                  $(".comment-input").val('');
                }
                else{
                    $('#sigUp-Login').modal('show');
                }
              }
          });
        }
        else{
            toastr.error('Please fill comment area...', 'Inconceivable!', {timeOut: 5000})
        }

      }else{
        $('#sigUp-Login').modal('show');
      }
    });

    $(".comment-share").click(function(){
      $(".share-tab").toggle();
    });

    // $('#changeCoordinates').modal('show');
    $(".changeCoordinates").click(function() {
        initializedraggablemap();
        $('#changeCoordinates').modal('show');
    });

    $(".repost-stories").click(function(){
      var stories_id = $(".project-featured").attr('stories-id');
      var auth = $(".project-featured").attr('auth');
      var auth_id = $(".project-featured").attr('auth-id');
      var redirecturl = $(".project-featured").attr('redirect-url');

      var data = "auth_id="+auth_id+"&stories_id="+stories_id;

      if(auth == 1){
        $.ajax({
            type : "post",
            url: base_url+"/user/ajax/repoststories",
            data : data,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              if(res.is_reposted == 1){
                $(".repost-stories").html(res.data_template);
                toastr.success(res.message+' ...', 'Message Alert', {timeOut: 5000})
              }
              else{
                $('#sigUp-Login').modal('show');
              }
            }
        });
      }else{
        $('#sigUp-Login').modal('show');
      }
    });

    $(".select-scrapbook").click(function(){
      var name = $(this).val();
      if(name == '0new-scrapbook0'){
        $(".new-scrapbook").show();
      }else{
        $(".new-scrapbook").hide();
      }
    });

    $('form#add-to-scrapbook').ajaxForm(function(response) {

        var redirecturl = $(".project-featured").attr('redirect-url');

        if(response.is_saved == 0){
          $(".post-heart-filled-"+response.image_id).html('<i class="fa fa-heart"></i>');
          // $('#myModal'+response.image_id).modal('hide');
          console.log('#myModal-'+response.image_id)
        }else if(response.is_saved == 1){
          $(".post-heart-filled-"+response.image_id).html('<i class="fa fa-heart"></i>');
          $('#myModal-'+response.image_id).modal('hide');
        }else if(response.is_saved == 2){
          // window.location = "{{url('login')}}?redirect="+redirecturl;
          $('#sigUp-Login').modal('show');
        }
    });

    $(".delete-stories").click(function() {
      var stories_id = $(this).attr('stories-id');
      var r = confirm("Are you sure??");
      if (r == true) {
         $.ajax({
            type : "post",
            url: base_url+"/user/ajax/deleteStories",
            data : "stories_id="+stories_id,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              if(res.is_deleted == 1){
                location.reload();
              }
            }
        });
      }
    });

    $(".delete-stories-image").click(function () {
      // body...
      var image_id = $(this).attr('image-id');
      var r = confirm("Are you sure??");
      if (r == true) {
         $.ajax({
            type : "post",
            url: base_url+"/user/ajax/deleteStoriesImage",
            data : "image_id="+image_id,
            headers: {
                    'X-CSRF-Token': csrf ,
                    "Accept": "application/json"
                },
            success: function(res)
            {
              if(res.success == true){
                $(".blog-image-container-"+image_id).remove();
              }
            }
        });
      }
    });

    $("#description").summernote({
        height: 300,
        callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                }
            }
        /*toolbar: [
            [ 'style', [ 'style' ] ],
            [ 'font', [ 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
            [ 'fontname', [ 'fontname' ] ],
            [ 'fontsize', [ 'fontsize' ] ],
            [ 'color', [ 'color' ] ],
            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
            [ 'insert', [ 'link'] ],
            [ 'view', [ 'undo', 'redo' ] ]
        ]*/
    });

    $(".delete-whole-collection").click(function() {
      var collection_id = $(this).attr('collection-id');

      var r = confirm("Are you sure??");
      if (r == true) {
        $.ajax({
              type : "post",
              url: base_url+"/user/ajax/deleteWholeCollection",
              headers: {
                  'X-CSRF-Token': csrf ,
                  "Accept": "application/json"
              },
              data: "collection_id="+collection_id,
              dataType: 'json',
              success: function(res)
              {
                window.location = base_url+"/user/dashboard/collections";
              }
          });
      }
    });

    $(".redefine_search").click(function(){
      var keyword= $(this).attr('keyword');
      var location= $(this).attr('location');

      var select_keyword= $(".category").val();
      var select_location= $("#zipcode").val();

      localStorage.setItem("location", select_location);

      if(select_location==''){
        window.location = base_url+"/search?type=listing&element=category&keyword="+select_keyword+"&location="+select_location+"&budget=&property_type=&select_pros=&kms=&pincode=";
      }else{
        $.ajax({
            type : "post",
            url: base_url+"/user/ajax/validZipcode",
            headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
            data: "zipcode="+select_location,
            dataType: 'json',
            success: function(res)
            {
              if(res.success == true){
                window.location = base_url+"/search?type=listing&element=category&keyword="+select_keyword+"&location="+select_location+"&budget=&property_type=&select_pros=&kms=&pincode=&lat="+res.data.lat+"&lng="+res.data.lon;
              }else{
                toastr.warning(res.message+' ...', 'Message Alert', {timeOut: 5000})
              }
            }
        });
      }

      // window.location = base_url+"/search?type=listing&element=category&keyword="+select_keyword+"&location="+select_location+"&budget=&property_type=&select_pros=&kms=&pincode=";
    });

    $(".frproperty-type").change(function(){
        var frproperty = $(".frproperty-type").val();

        window.location = base_url+"/search?type=listing&element=category&keyword=&location="+result_location+"&budget="+result_frbudget+"&property_type="+frproperty+"&select_pros="+result_frpro+"&kms="+result_frkms+"&pincode=";
    });

    $(".frkms").change(function(){
        var frkms = $(".frkms").val();

        var retrievedCoordinates = localStorage.getItem("coordinates");
        var latitude = JSON.parse(localStorage.getItem("coordinates"))[0];
        var longitude = JSON.parse(localStorage.getItem("coordinates"))[1];
        
        if(latitude!=undefined && longitude!=undefined){
          window.location = base_url+"/search?type=listing&element=category&keyword=&location="+result_location+"&budget="+result_frbudget+"&property_type="+result_property_type+"&select_pros="+result_frpro+"&kms="+frkms+"&pincode="+"&latitude="+latitude+"&longitude="+longitude;  
        }
        
    });

    $(".frbudget").change(function(){
        var frbudget = $(".frbudget").val();

        window.location = base_url+"/search?type=listing&element=category&keyword=&location="+result_location+"&budget="+frbudget+"&property_type="+result_property_type+"&select_pros="+result_frpro+"&kms="+result_frkms+"&pincode=";
    });

    $(".frpro").change(function(){
        var frpro = $(".frpro").val();

        window.location = base_url+"/search?type=listing&element=category&keyword=&location="+result_location+"&budget="+result_frbudget+"&property_type="+result_property_type+"&select_pros="+frpro+"&kms="+result_frkms+"&pincode=";
    });

    if(segment1 == 'product'){
        /*$(window).scroll(function() {
            if($(this).scrollTop() > 961){
                $("#pb-right-column").hide();
            }
            else{
                $("#pb-right-column").show();
            }
        });*/
    }

    $('[id^=carousel-selector-]').click( function(){
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });

    // When the carousel slides, auto update the text
    $('#myCarousel').on('slid.bs.carousel', function (e) {
        var id = $('.item.active').data('slide-number');
    });

    $(".category").change(function() {
        var category = $(this).val();
        $(".subcategory").html("<option val=''>Select Subcategory</option>");
        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/selectCategory",
            headers: {
              'X-CSRF-Token': csrf ,
              "Accept": "application/json"
            },
            data: "category="+category,
            dataType: 'json',
            success: function(res)
            {
            $.each(res, function(index) {
                $(".subcategory").append("<option val="+res[index].subcategory+">"+res[index].subcategory+"</option>");
            });
            }
        });
    })

    $(".delete-product").click(function() {
        var product_id = $(this).attr('product-id');
        $.ajax({
            type : "post",
            url: base_url+"/pro/ajax/deleteProduct",
            headers: {
              'X-CSRF-Token': csrf ,
              "Accept": "application/json"
            },
            data: "product_id="+product_id,
            dataType: 'json',
            success: function(res)
            {
                if(res.success){
                    $(".product-section"+product_id).remove();
                }
            }
        });
    });

    $(".edit-product").click(function() {
        var url_link = $(this).attr('url');
        window.location = url_link;
    })

    if(segment2 == 'edit-image'){
        var directory = base_url+"/uploads/product/";
        var loader = base_url+"/images/ring.gif";

        $.ajax({
            url:base_url+"/pro/ajax/postGetProductImage",
            data:"product_id="+segment3,
            dataType:'json',
            type:'post',
            headers: {
                        'X-CSRF-Token': csrf ,
                        "Accept": "application/json"
                    },
            success:function(response){
              $('.create-project-image').html('');
              $.each(response.data, function(id, value) {
                  console.log(id+" "+response.data[id].image);
                  $('.create-project-image').append('<div class="photo-pod col-xs-4 project-image-section-'+response.data[id].id+'"> <div class="photo-actions-container"> <span class="delete-project-photo photo-action-btn pull-right" onclick=deleteProduct('+response.data[id].id+')> delete <i class="fa fa-times-circle photo-action-icon"></i> </span> </div><div class="project-image-status-container"> <div class="image-status btn btn-black-opaque"> <span style="color:white">Published</span> </div>  <input type="hidden" name="project_photo[]" value='+response.data[id].image+'"><input type="hidden" class="project_cover'+id+'" name="project_cover[]" value="0">  <img class="project-photo" src="'+base_url+"/contentimage?file=uploads/product/"+response.data[id].image+"&l=350&w=250"+'"> </div></div>');
              });

              $(".project-loader").hide();
            },
        });
    }

    $(".post-heart-filled-product").click(function() {
        var product_id = $(this).attr('product-id');
        $.ajax({
            type : "post",
            url: base_url+"/user/dashboard/wishlistProduct",
            headers: {
              'X-CSRF-Token': csrf ,
              "Accept": "application/json"
            },
            data: "product_id="+product_id,
            dataType: 'json',
            success: function(res)
            {
                if(res.success){
                    toastr.success(res.message+' ...', 'Message Alert', {timeOut: 5000})
                }else{
                    toastr.warning(res.message+' ...', 'Message Alert', {timeOut: 5000})
                }
            }
        });
    });

    $('.seeMore').click(function(e){
        e.preventDefault();
        var target = $(this).attr('target');
        var state = $(target).attr('target-state');
        console.log(state) 
        if (state=="close") {
            $(target).attr('target-state','open'); 
            $(target).removeClass('limitedH'); 
            $(this).html('See Less');
        }
        else{
            $(target).attr('target-state','close');
            $(target).addClass('limitedH'); 
            $(this).html('See More');
        }
    });

    $("#superPros").submit(function(e) {
        
        e.preventDefault();
        var actionurl = e.currentTarget.action;
        var data = $("#superPros").serialize();

        toastr.warning('Successfully Requested ...', 'Message Alert', {timeOut: 5000});
        $.ajax({
                url: actionurl,
                type: 'POST',
                dataType: 'json',
                data: data,
                success: function(data) {
                    
                }
        });
    });

    $('.project-section').hover(
       function () {
          var project_id = $(this).attr('project_id');
          $(".photo-number-"+project_id).show();
          $("#project-view-"+project_id).css({"display": "block", "margin-top": "4px", "padding": "13px", "text-transform": "uppercase", "text-align": "center!important", "background": "#616469", "color": "#ffffff"});
       }, 
       function () {
        var project_id = $(this).attr('project_id');
          $(".photo-number-"+project_id).hide();
          $("#project-view-"+project_id).css({"display": "block", "margin-top": "4px", "padding": "13px", "text-transform": "uppercase", "text-align": "center!important", "background": "#ffffff", "color": "#616469"});
       }
    );

    $(".submit_review").click(function(){
        var efficiency = $(this).attr('efficiency');
        var quality = $(this).attr('quality');
        var helpfulness = $(this).attr('helpfulness');
        var effectiveness = $(this).attr('effectiveness');
        var experience = $(this).attr('experience');

        var vendor_id = $(this).attr('vendorid');

        var reviewer_name = $(".reviewer_name").val();
        var reviewer_email = $(".reviewer_email").val();
        var reviewer_phone = $(".reviewer_phone").val();
        var review_description = $(".review_description").val();

        var data = "efficiency="+efficiency+"&quality="+quality+"&helpfulness="+helpfulness+"&effectiveness="+effectiveness+"&experience="+experience+"&review_description="+review_description+"&vendor_id="+vendor_id+"&reviewer_name="+reviewer_name+"&reviewer_email="+reviewer_email+"&reviewer_phone="+reviewer_phone;

        var action = base_url+'/pro/ajax/review_description';

        $.ajax({
          type : "post",
          url: action,
          data : data,
          dataType: 'json',
          headers: {
              'X-CSRF-Token': csrf ,
              "Accept": "application/json"
          },
          success: function(res)
          {
            if(res.success == "true"){
                var reviewer_name = $(".reviewer_name").val('');
                var reviewer_email = $(".reviewer_email").val('');
                var reviewer_phone = $(".reviewer_phone").val('');
                var review_description = $(".review_description").val('');

                toastr.warning(res.message, 'Message Alert', {timeOut: 5000});
                $('#review_result').show();
                $('.writereview').modal('hide');

                location.reload();
            }
            else
            {
                if(res.message.effectiveness !== undefined){
                  $("#effectiveness_error").html('<font color="red" size="3">The effectiveness field is required.</font>');
                }
                else{
                  $("#effectiveness_error").html('');
                }

                if(res.message.quality !== undefined){
                  $("#quality_error").html('<font color="red" size="3">The quality field is required.</font>');
                }
                else
                {
                  $("#quality_error").html('');
                }

                if(res.message.experience !== undefined){
                  $("#experience_error").html('<font color="red" size="3">The experience field is required.</font>');
                }
                else{
                  $("#experience_error").html('');
                }

                if(res.message.helpfulness !== undefined){
                  $("#helpfulness_error").html('<font color="red" size="3">The helpfulness field is required.</font>');
                }
                else{
                  $("#helpfulness_error").html('');
                }

                if(res.message.efficiency !== undefined){
                  $("#efficiency_error").html('<font color="red" size="3">The efficiency field is required.</font>');
                }
                else
                {
                  $("#efficiency_error").html('');
                }

                if(res.message.reviewer_name !== undefined){
                  $("#reviewer_name_error").html('<font color="red" size="3">The name field is required.</font>');
                }
                else
                {
                  $("#reviewer_name_error").html('');
                }

                if(res.message.reviewer_email !== undefined){
                  $("#reviewer_email_error").html('<font color="red" size="3">The email field is required.</font>');
                }
                else
                {
                  $("#reviewer_email_error").html('');
                }

                if(res.message.reviewer_phone !== undefined){
                  $("#reviewer_phone_error").html('<font color="red" size="3">The phone field is required.</font>');
                }
                else
                {
                  $("#reviewer_phone_error").html('');
                }

                if(res.message.review_description !== undefined){
                  $("#review_description_error").html('<font color="red" size="3">The description field is required.</font>');
                }
                else
                {
                  $("#review_description_error").html('');
                }
            }

          },
          beforeSend: function() {
              console.log("setTimeout");
          },
        });
    });

    $(".click-reviews").click(function() {
       var review_id = $(this).attr('review-id');
       var status = $(this).attr('status');
       if(status == 0){
          $("#comment-read-more-"+review_id).attr('status',1);
          $(".show-review-"+review_id).show();
          $("#comment-read-more-"+review_id).html('Read less');

       }
       else{
          $("#comment-read-more-"+review_id).attr('status',0);
          $(".show-review-"+review_id).hide();
          $("#comment-read-more-"+review_id).html('Read more');
       }

    })
});

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}


function showPosition(position) {
    var retrievedLocation = localStorage.getItem("location");
    if(localStorage.getItem("location") == null){
        var url = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+position.coords.latitude+","+position.coords.longitude+"&sensor=true";
        var retrievedLocation = localStorage.getItem("location");
        $.ajax
        ({
            type : "GET",
            url: url,
            success: function(result)
            {
                var coordinate = [position.coords.latitude, position.coords.longitude];
                localStorage.setItem("coordinates", JSON.stringify(coordinate));
                localStorage.setItem("location", result.results[0].formatted_address);
                var retrievedCoordinates = localStorage.getItem("coordinates");
                var coords = JSON.parse(retrievedCoordinates);
            }
        });
    }
    $(".get-location").html(retrievedLocation);
    // $("#autocomplete").html(retrievedLocation);
}

function setProjectCoverImage(imageid,projectid) {

  $(".unsetcover").addClass('make-cover-deactive');

  $(".make-cover"+imageid).removeClass('make-cover-deactive');
  $(".make-cover"+imageid).addClass('make-cover-active');
  
  $.ajax({
        type : "post",
        url: base_url+"/pro/ajax/setProjectCoverImage",
        data : "id="+imageid+"&projectid="+projectid,
        headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
        success: function(res)
        {
          console.log(res.featured_image)
          $(".project-feature-image").css('background-image','url("'+base_url+"/uploads/project/"+res.featured_image+'")');
        }
    });
}

function setAfterImage(projectid,type) {
  
  $.ajax({
        type : "post",
        url: base_url+"/pro/ajax/setProjectStatus",
        data : "id="+projectid+"&type="+type,
        headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
        success: function(res)
        {
          //alert(res)
        }
    });
}

function deleteProject(projectid) {
  $(".project-image-section-"+projectid).remove();
  $.ajax({
        type : "post",
        url: base_url+"/pro/ajax/projectImageDelete",
        data : "id="+projectid,
        headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
        success: function(res)
        {
          //alert(res)
        }
    });
}

function deleteProduct(productid) {
  $(".project-image-section-"+productid).remove();
  $.ajax({
        type : "post",
        url: base_url+"/pro/ajax/productImageDelete",
        data : "id="+productid,
        headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
        success: function(res)
        {
          //alert(res)
        }
    });
}

function universal(val){
    window.x= val;
}

function deleteAddBlogImage(id) {
    $(".project-image-section-"+id).remove();
}

function removetoscrapbook(id) {
  $.ajax({
        type : "post",
        url: base_url+"/user/ajax/removeToScrapbook",
        data : "id="+id,
        headers: {
                'X-CSRF-Token': csrf ,
                "Accept": "application/json"
            },
        success: function(res)
        {
          window.location = base_url+"/user/dashboard/collections";
        }
    });
}


function initialize() {
  autocomplete = new google.maps.places.Autocomplete(
      (document.getElementById('autocomplete')),
      { types: ['geocode'] });
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    fillInAddress();
  });
}

function fillInAddress() {
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
  }

  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
    }
  }
}

function editRedirectPage(url) {
    // alert(url)
}

function uploadImage(image) {
    var data = new FormData();
    data.append("image", image);

    $.ajax({
        url: base_url+"/user/ajax/postMedia",
        cache: false,
        contentType: false,
        processData: false,
        data: data,
        type: "post",
        headers: {
            'X-CSRF-Token': csrf ,
            "Accept": "application/json"
        },
        success: function(url) {
            var image = $('<img>').attr('src', '' + url);
            $('#description').summernote("insertNode", image[0]);
        }
    });
}

function initializedraggablemap() 
{
// Set static latitude, longitude value
var latlng = new google.maps.LatLng(28.60720113452449, 77.21258024121698);
// Set map options
var myOptions = {
  zoom: 16,
  center: latlng,
  panControl: true,
  zoomControl: true,
  scaleControl: true,
  mapTypeId: google.maps.MapTypeId.ROADMAP
}
// Create map object with options
map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
// Create and set the marker
marker = new google.maps.Marker({
  map: map,
  draggable:true, 
  position: latlng
});

// Register Custom "dragend" Event
google.maps.event.addListener(marker, 'dragend', function() {
  
  // Get the Current position, where the pointer was dropped
  var point = marker.getPosition();
  // Center the map at given point
  map.panTo(point);
  
  var data = 'lat='+point.lat()+'&lng='+point.lng();
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     // document.getElementById("demo").innerHTML = this.responseText;
     toastr.warning('Successfully updated ...', 'Message Alert', {timeOut: 5000});
    }
  };
  xhttp.open("GET", base_url+"/pro/ajax/coordinatesUpdate?"+data, true);
  xhttp.send();
});
}