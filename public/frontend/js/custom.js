$(document).ready(function(){

  var $logo= $("#logo");

  if(location.href.indexOf("#") != -1){
  	$logo.show();
  }

  $('.menu .tabs a').click(function(){
  	$logo.fadeIn('slow');
  });

  $('.tab-profile').click(function(){
  	$logo.fadeOut('slow');
  });

  var $content = $('#container');

  $content.easytabs({
  	animate        :true,
  	updateHash     :false,
  	transtionIn      :'slideDown',
  	transtionOut      :'slideUp',
  	animationSpeed : 600,
  	tabs           :'.tmenu',
  	tabACtiveClass :'active'

  });

  $content.find('.tabs li a').hover(
    function(){
      $(this).stop().animate({marginTop: "-7px"},200);
    },
    function(){
      $(this).stop().animate({marginTop: "0px"},300);
    }
  );



// ==============tabs profile==================================================

  var $catfilter = $('.cat_filter');
  $catfilter.find('a').click(function(){
     var currentOption =$(this).attr('data-filter'); 
     $(this).parent().parent().find('a').removeClass('currect');
     $(this).addClass('currect');
  });



  // =============filter items on button click=====================

  var $grid = $('#portfolio_list').isotope({
    // options
  });

  $('#profile_filter').on( 'click', 'a', function() {
    var filterValue = $(this).attr('data-filter');
    $grid.isotope({ filter: filterValue });
  });



  // =====================Scroll Button show ========================
  $(document).ready(function(){
    $(window).scroll(function(){
        if($(this).scrollTop()>300){
          $('.gotoup').fadeIn();
        }else{
          $('.gotoup').fadeOut();
        }
    });
    $('.gotoup').click(function(){
         $('html,body').animate({scrollTop:0},500);
    });
  });

$("#setting").click(function(){
  $(".hideShow").toggle();
});

  // =====================Scroll utton show ========================



$("#blue_btn").click(function(){
  $('p').addClass('nil_button');
});

$("#primary_btn").click(function(){
  $('p').addClass('blue_button');
});

$("#danger_btn").click(function(){
  $('p').addClass('danger_button');
});

$("#warning_btn").click(function(){
  $('p').addClass('warning_button');
});

  // =====================Social Icon show utton show ========================


$("#share").click(function(){
  $("#facebook").toggle('slow');
});

});
