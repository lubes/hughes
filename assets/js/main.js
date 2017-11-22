/* 
	Author: Eat.Sleep.Work. Inc.
	Name: Custom javascript for Hughes Estate Sales
	Date: 08/20/2013
	Version: 1.0
*/
jQuery(document).ready(function($) {
  /* for the cart top nav */
  function newDoc() {
    window.location.assign("/shop/")
  }
  //Equal Height
  (function($) {
    "use strict";
    $.fn.equalHeights = function(widthThreshold) {
      var self = this,
        nodeObjects = [],
        heights = [],
        tallest;
      $(window).on("load resize", function() {
        self.children().each(function(i) {
          $(this).css("height", "");
          var height = $(this).height(),
            paddingTop = Math.ceil(parseFloat($(this).css("padding-top"))),
            paddingBottom = Math.ceil(parseFloat($(this).css("padding-bottom"))),
            borderTop = Math.ceil(parseFloat($(this).css("border-top-width"))),
            borderBottom = Math.ceil(parseFloat($(this).css("border-bottom-width"))),
            totalHeight = height + paddingTop + paddingBottom + borderBottom + borderTop;
          nodeObjects[i] = {
            height: height,
            paddingTop: paddingTop,
            paddingBottom: paddingBottom,
            borderTop: borderTop,
            borderBottom: borderBottom,
            totalHeight: totalHeight
          };
          heights[i] = totalHeight;
        });
      });
      $(window).on("load resize", function() {
        if (widthThreshold && $(window).width() < widthThreshold) {
          return false;
        }
        self.children().each(function(i) {
          var diff,
            oldHeight = $(this).height(),
            newHeight;
          tallest = Math.max.apply(Math, heights);
          diff = tallest - nodeObjects[i].totalHeight;
          newHeight = oldHeight + diff;
          $(this).height(newHeight);
        });
      });
    };
  }(jQuery));
  //EQ Hieghts        
  $("#blocks").equalHeights();
  //
  //Equal Height
  (function($) {
    "use strict";
    $.fn.equalHeight = function(widthThreshold) {
      var self = this,
        nodeObjects = [],
        heights = [],
        tallest;
      $(window).on("load resize", function() {
        self.children().each(function(i) {
          $(this).css("height", "");
          var height = $(this).height(),
            paddingTop = Math.ceil(parseFloat($(this).css("padding-top"))),
            paddingBottom = Math.ceil(parseFloat($(this).css("padding-bottom"))),
            borderTop = Math.ceil(parseFloat($(this).css("border-top-width"))),
            borderBottom = Math.ceil(parseFloat($(this).css("border-bottom-width"))),
            totalHeight = height + paddingTop + paddingBottom + borderBottom + borderTop;
          nodeObjects[i] = {
            height: height,
            paddingTop: paddingTop,
            paddingBottom: paddingBottom,
            borderTop: borderTop,
            borderBottom: borderBottom,
            totalHeight: totalHeight
          };
          heights[i] = totalHeight;
        });
      });
      $(window).on("load resize", function() {
        if (widthThreshold && $(window).width() < widthThreshold) {
          return false;
        }
        self.children().each(function(i) {
          var diff,
            oldHeight = $(this).height(),
            newHeight;
          tallest = Math.max.apply(Math, heights);
          diff = tallest - nodeObjects[i].totalHeight;
          newHeight = oldHeight + diff;
          $(this).height(newHeight);
        });
      });
    };
  }(jQuery));
  //EQ Hieghts        
  setTimeout(function() {
    $(".equalHt").equalHeight();
  }, 3000);
  $("#add-to-cart").hover(function() {
    $(this).find('.cart_list').addClass("active");
  }, function() {
    $(this).find('.cart_list').removeClass("active");
  });

  function setHover() {
    console.log('new');
    $('.cart_list').addClass('hovered');
    setTimer();
    setTimeout(function() {
      $('.cart_list').removeClass('hovered');
    }, 4000);
    //   $('#add-to-cart ul.mini-cart li:hover ul').addClass('hovered');
  }

  function changeColorScheme(text) {
    setTimeout(function() {
      $('.container').removeClass(text);
    }, 10000);
  };
  /*$(document).ready(function () {
        var column_height = $("body").height();
      
        column_height = column_height + "px";
        $("body.highlight .menu.collapse").css("min-height",column_height);
    });

*/
  //Grid for About page
  //moved to plugins.js
  $(function() {
    Grid.init();
  });
  (function($) {
    var $window = $(window),
      $html = $('.nav-container');

    function resize() {
      if ($window.width() < 976) {
        return $html.addClass('width');
      }
      $html.removeClass('width').removeAttr("style");
    }
    $window.resize(resize).trigger('resize');
  })(jQuery);
  $(window).resize(function() {
    if ($(window).width() < 976) {
      $(".pp_close").click();
    }
  });
  var panel = $('.mobl-time');
  var originalPos = panel.css("width");
  panel.toggle(function() {
    $(this).stop().animate({
      width: '242px'
    }, 1000);
    $(this).find(".non-active").fadeToggle(2000);
  }, function() {
    $(this).stop().animate({
      width: '30px'
    }, 1000);
    $(this).find(".non-active").fadeToggle(200);
  });
  //Fancybox
  var expand = $('.expand');
  var ogPos = expand.css("height");
  expand.toggle(function() {
    $(this).stop().animate({
      height: '300px'
    }, 1000);
    $(this).find(".non-active").fadeToggle(1000);
  }, function() {
    $(this).stop().animate({
      height: '30px'
    }, 1000);
    $(this).find(".non-active").fadeToggle(200);
  });
  // Cache selectors outside callback for performance. 
  var $window = $(window),
    $stickyEl = $('#main-nav'),
    elTop = $stickyEl.offset().top;
  $window.scroll(function() {
    $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);
  });
  $(window).load(function() {
    //Homepage gallery Slider
    $('.flexslider').flexslider({
      animation: "slide",
      start: function(slider) {
        $('body').removeClass('loading');
      }
    });
  });
  $(window).load(function() {
    //Homepage gallery Slider
    $('.shop_slider').flexslider({
      animation: "slide",
      touch: false,
      start: function(slider) {
        $('body').removeClass('loading');
      }
    });
  });
  //Service Sliders
  $('.flexslider_1').flexslider({
    animation: "fade",
    controlNav: false,
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });
  $('.flexslider_2').flexslider({
    animation: "fade",
    initDelay: 1000,
    controlNav: false,
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });
  $('.flexslider_3').flexslider({
    animation: "fade",
    initDelay: 2000,
    controlNav: false,
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });
  $('.flexslider_4').flexslider({
    animation: "fade",
    initDelay: 3000,
    controlNav: false,
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });
  $('.flexslider_5').flexslider({
    animation: "fade",
    initDelay: 4000,
    controlNav: false,
    start: function(slider) {
      $('body').removeClass('loading');
    }
  });
  $('.mini-cart').toggle(function() {
    $(this).find('.cart_list').addClass("active");
  }, function() {
    $(this).find('.cart_list').removeClass("active");
  });
  $(".btn-navbar").click(function() {
    if ($('body').is('.highlight')) {
      $('body').removeClass('highlight');
    } else {
      $('body').addClass('highlight');
    }
  });
  //player.api('pause');
  $(document).ready(function() {
    var iframe = $('.video_wrapper iframe')[0];
    var player = $f(iframe);
    $('#videoModal').on('shown', function() {
      if ($(window).width() < 1024) {
        //less than
      } else {
        //more than
        player.api('play');
      }
    });
    $('#videoModal').on('hidden', function() {
      player.api('pause');
    });
    //about pg.
    $('.js-dropdown-item').dropdownLayer({
      'elemSelector': "js-dropdown-item",
      'containerClass': "js-dropdown-items",
      'descriptionClass': "js-description",
      'arrowClass': "js-dropdown-arrow",
      'dropdownClass': "js-dropdown",
      'dropdownContentClass': "js-dropdown-content",
      'disableDropdownClass': "js-dropdown-disable",
      'useSlideUp': true,
      'slideUpSpeed': 200,
      'useSlideDown': true,
      'slideDownSpeed': 200,
      'callOnCompleteHide': function() {
        console.log('your custom function which will be called on complete after hiding');
      },
      'callOnCompleteShow': function() {
        console.log('your custom function which will be called on complete after showing');
      }
    });
    $(".navigation a").click(function() {
      fixThumbnailMargins();
    });
  });
  // swopFade image on the about page
  $('.fadein').each(function() {
    var std = $(this).attr("src");
    var hover = std.replace("img1", "img2");
    $(this).clone().insertAfter(this).attr('src', hover).removeClass('fadein').siblings().css({
      position: 'absolute'
    });
    $(this).mouseenter(function() {
      $(this).stop().css({
        'opacity': '0',
      });
    }).mouseleave(function() {
      $(this).stop().css({
        'opacity': '1'
      });
    });
  });
  // swapFade image on the single-product page
  $('a.small-thumb').click(function() {
    var src = $(this).attr('href');
    if (src != $('#lrg').attr('src').replace(/\?(.*)/, '')) {
      $('#lrg').stop().animate({
        opacity: 1
      }, 100, function() {
        $(this).attr('src', src + '?' + Math.floor(Math.random() * (10 * 100)));
      }).load(function() {
        $(this).stop().animate({
          display: 'block',
          opacity: '1'
        });
      });
    }
    return false;
  });
  // swapFade A href on the single-product page
  $("a.exchange").click(function(e) {
    e.preventDefault();
    $('.swap').toggle();
    $('.swap').removeClass('swap');
    $imgURL = $(this).attr("href");
    $('.images').find('a[href$="' + $imgURL + '"]').addClass('swap').toggle();
    // console.log($imgURL)
    /*$(".swap")
      .fadeOut(100, function() {
          $(".swap").attr('href',$imgURL);
      })
      .fadeIn(100);*/
  });
  // Text Expander used on the ABOUT section  
  // you can override default options globally, so they apply to every .expander() call
  //$.expander.defaults.slicePoint = 120;
  /*
  $(document).ready(function() { 

    // override default options (also overrides global overrides)
    $('div.expandable p').expander({
      slicePoint:       155,  // default is 100
      expandPrefix:     '...', // default is '... '
      expandText:       '<br>read more +', // default is 'read more'
      collapseTimer:    0, // re-collapses after 5 seconds; default is 0, so no re-collapsing
      userCollapseText: 'read less -'  // default is 'read less'
    });

  });*/
});
// Function to be called after 5 seconds
/**
 * Adds 0 left margin to the first thumbnail on each row that don't get it via CSS rules.
 * Recall the function when the floating of the elements changed.
 */
function fixThumbnailMargins() {
  $('.row-fluid .thumbnails').each(function() {
    var $thumbnails = $(this).find('> li'),
      previousOffsetLeft = $thumbnails.first().offset().left;
    $thumbnails.removeClass('first-in-row');
    $thumbnails.first().addClass('first-in-row');
    $thumbnails.each(function() {
      var $thumbnail = $(this),
        offsetLeft = $thumbnail.offset().left;
      if (offsetLeft < previousOffsetLeft) {
        $thumbnail.addClass('first-in-row');
      }
      previousOffsetLeft = offsetLeft;
    });
  });
}
// Fix the margins when potentally the floating changed
//$(window).resize(fixThumbnailMargins);
//fixThumbnailMargins();