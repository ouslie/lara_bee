/*! =========================================================
 *
 * Material Dashboard v 1.0.0
 *
 * =========================================================
 *
 * Copyright 2016 Wunder

 * ========================================================= */
"use strict";

(function($) {
    $().ready(function(){
        demo.initFormExtendedDatetimepickers();
        demo.initMaterialWizard();
        demo.checkFullPageBackgroundImage();
        var $sidebar = $('.sidebar');
        var $sidebar_img_container = $sidebar.find('.sidebar-background');

        var $full_page = $('.full-page');

        var $sidebar_responsive = $('body > .navbar-collapse');

        var window_width = $(window).width();

        var fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if( window_width > 767 && fixed_plugin_open === 'Dashboard' ){
            if($('.fixed-plugin .dropdown').hasClass('show-dropdown')){
                $('.fixed-plugin .dropdown').addClass('show');
            }

        }

        $('.fixed-plugin').on('click', 'a',function(){
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if($(this).hasClass('switch-trigger')){
                if(event.stopPropagation){
                    event.stopPropagation();
                }
                else if(window.event){
                   window.event.cancelBubble = true;
                }
            }
        });

        $('.fixed-plugin').on('click', '.active-color span',function(){
            var $topbar_background = $('.navbar');
            var new_color = $(this).data('color');
            $topbar_background.attr('data-topbar-color',new_color);
        });

        $('.fixed-plugin').on('click', '.background-color span',function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            var new_color = $(this).data('color');

            if($sidebar.length !== 0){
                $sidebar.attr('data-background-color',new_color);
            }
        });

        $('.fixed-plugin').on('click', '.img-holder',function(){
            $full_page_background = $('.full-page-background');
            $(this).parent('li').siblings().removeClass('active');
            $(this).parent('li').addClass('active');
            var new_image = $(this).find("img").attr('src');

            if( $sidebar_img_container.length !==0 && $('.switch-sidebar-image input:checked').length !== 0 ){
                $sidebar_img_container.fadeOut('fast', function(){
                   $sidebar_img_container.css('background-image','url("' + new_image + '")');
                   $sidebar_img_container.fadeIn('fast');
                });
            }

            if($full_page_background.length !== 0 && $('.switch-sidebar-image input:checked').length !== 0 ) {
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $full_page_background.fadeOut('fast', function(){
                   $full_page_background.css('background-image','url("' + new_image_full_page + '")');
                   $full_page_background.fadeIn('fast');
                });
            }

            if( $('.switch-sidebar-image input:checked').length === 0 ){
                var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                $sidebar_img_container.css('background-image','url("' + new_image + '")');
                $full_page_background.css('background-image','url("' + new_image_full_page + '")');
            }

            if($sidebar_responsive.length !== 0){
                $sidebar_responsive.css('background-image','url("' + new_image + '")');
            }
        });

        $('.switch-sidebar-image').on('change', 'input', function() {

            var $full_page_background = $('.full-page-background');
            var $input = $(this);
            var background_image;

            if($input.is(':checked')){
                if($sidebar_img_container.length !== 0){
                    $sidebar_img_container.fadeIn('fast');
                    $sidebar.attr('data-image','#');
                }

                if($full_page_background.length !== 0){
                    $full_page_background.fadeIn('fast');
                    $full_page.attr('data-image','#');
                }

                background_image = true;
            } else {
                if($sidebar_img_container.length !== 0){
                    $sidebar.removeAttr('data-image');
                    $sidebar_img_container.fadeOut('fast');
                }

                if($full_page_background.length !== 0){
                    $full_page.removeAttr('data-image','#');
                    $full_page_background.fadeOut('fast');
                }

                background_image = false;
            }
        });

        $('.switch-sidebar-mini').on('change', 'input', function() {

            var $body = $('body');

            var $input = $(this);

            if(demo.misc.sidebar_mini_active === true){
                $body.removeClass('sidebar-mini');
                demo.misc.sidebar_mini_active = false;

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

            }else{

                $('.sidebar .collapse').collapse('hide').on('hidden.bs.collapse',function(){
                    $(this).css('height','auto');
                });

                $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                setTimeout(function(){
                    $body.addClass('sidebar-mini');

                    $('.sidebar .collapse').css('height','auto');
                    demo.misc.sidebar_mini_active = true;
                },300);
            }

            // we simulate the window Resize so the charts will get updated in realtime.
            var simulateWindowResize = setInterval(function(){
                window.dispatchEvent(new Event('resize'));
            },180);

            // we stop the simulation of Window Resize after the animations are completed
            setTimeout(function(){
                clearInterval(simulateWindowResize);
            },1000);

        });

        //faq
        if($('#simple-accordion-alt-2').length) {
          $("#simple-accordion-alt-2").accordion({
              collapsible: true,
              active: false,
              animate: 200
          });
        }
        if($('#simple-accordion-alt-3').length) {
          $("#simple-accordion-alt-3").accordion({
              collapsible: true,
              active: false,
              animate: 200
          });
        }

        //Accordions
        if($("#simple-accordion").length) {
            $("#simple-accordion").accordion({
                collapsible: true,
                animate: 200
            });
        }

        if($("#simple-accordion-colored").length) {
            $("#simple-accordion-colored").accordion({
                collapsible: true,
                animate: 200
            });
        }

        if($("#simple-accordion-alt").length) {
            $("#simple-accordion-alt").accordion({
                collapsible: true,
                active: false,
                animate: 200
            });
        }
    });
})(jQuery);
var demo = {
    misc:{
        navbar_menu_visible: 0,
        active_collapse: true,
        disabled_collapse_init: 0,
    },
    initPickColor: function(){
        $('.pick-class-label').on('click',function(){
            var new_class = $(this).attr('new-class');
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
            }
        });
    },

    checkFullPageBackgroundImage: function(){
      if ( $( ".full-page" ).length ) {
        var $page = $('.full-page');
        var image_src = $page.data('image');

        if(image_src !== undefined){
            var image_container = '<div class="full-page-background" style="background-image: url(' + image_src + ') "/>'
            $page.append(image_container);
        }
      }
    },

    initDocExtendedDatetimepickers: function(){
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });
    },

    initFormExtendedDatetimepickers: function(){
        $('.datetimepicker').datetimepicker({
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });

         $('.datepicker').datetimepicker({
            format: 'MM/DD/YYYY',
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true
            }
         });

         $('.timepicker').datetimepicker({
            format: 'h:mm A',    //use this format if you want the 12hours timpiecker with AM/PM toggle
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true

            }
         });

         $('.timepicker-24').datetimepicker({
            format: 'H:mm',    // use this format if you want the 24hours timepicker
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-chevron-up",
                down: "fa fa-chevron-down",
                previous: 'fa fa-chevron-left',
                next: 'fa fa-chevron-right',
                today: 'fa fa-screenshot',
                clear: 'fa fa-trash',
                close: 'fa fa-remove',
                inline: true

            }
         });
    },

    initMaterialWizard: function(){
        // Code for the Validator
        var $validator = $('.wizard-card form').validate({
          rules: {
            firstname: {
              required: true,
              minlength: 3
            },
            lastname: {
              required: true,
              minlength: 3
            },
            email: {
              required: true,
              minlength: 3,
            }
            },

            errorPlacement: function(error, element) {
                $(element).addClass('form-control-danger');
             }
      });

        // Wizard Initialization
        $('.wizard-card').bootstrapWizard({
            'tabClass': 'nav nav-pills',
            'nextSelector': '.btn-next',
            'previousSelector': '.btn-previous',

            onNext: function(tab, navigation, index) {
              var $valid = $('.wizard-card form').valid();
              if(!$valid) {
                $validator.focusInvalid();
                return false;
              }
            },

            onInit : function(tab, navigation, index){

              //check number of tabs and fill the entire row
              var $total = navigation.find('li').length;
              var $width = 100/$total;
              var $wizard = navigation.closest('.wizard-card');

              var $display_width = $(document).width();

              if($display_width < 600 && $total > 3){
                  $width = 50;
              }

               navigation.find('li').css('width',$width + '%');
               var $first_li = navigation.find('li:first-child a').html();
               var $moving_div = $('<div class="moving-tab">' + $first_li + '</div>');
               $('.wizard-card .wizard-navigation').append($moving_div);
               refreshAnimation($wizard, index);
               $('.moving-tab').css('transition','transform 0s');
           },

            onTabClick : function(tab, navigation, index){
                var $valid = $('.wizard-card form').valid();

                if(!$valid){
                    return false;
                } else{
                    return true;
                }
            },

            onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;

                var $wizard = navigation.closest('.wizard-card');

                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $($wizard).find('.btn-next').hide();
                    $($wizard).find('.btn-finish').show();
                } else {
                    $($wizard).find('.btn-next').show();
                    $($wizard).find('.btn-finish').hide();
                }

                var button_text = navigation.find('li:nth-child(' + $current + ') a').html();

                setTimeout(function(){
                    $('.moving-tab').text(button_text);
                }, 150);

                var checkbox = $('.footer-checkbox');

                if( !index === 0 ){
                    $(checkbox).css({
                        'opacity':'0',
                        'visibility':'hidden',
                        'position':'absolute'
                    });
                } else {
                    $(checkbox).css({
                        'opacity':'1',
                        'visibility':'visible'
                    });
                }

                refreshAnimation($wizard, index);
            }
        });
 

    }}

