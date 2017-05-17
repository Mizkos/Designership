jQuery(document).ready(function($) {
	setTimeout(function(){
        $('body').addClass('loaded');
    }, 500);
    
    // Text type
	var
	  words = ['creatives','designers','developers','illustrators','writers','readers','entrepreneurs'],
	  part,
	  i = 0,
	  offset = 0,
	  len = words.length,
	  forwards = true,
	  skip_count = 0,
	  skip_delay = 25,
	  speed = 100;
	
	var wordflick = function(){
	  setInterval(function(){
	      if (forwards) {
	        if(offset >= words[i].length){
	          ++skip_count;
	          if (skip_count == skip_delay) {
	            forwards = false;
	            skip_count = 0;
	          }
	        }
	      }
	      else {
	         if(offset == 0){
	            forwards = true;
	            i++;
	            offset = 0;
	            if(i >= len){
	              i=0;
	            } 
	         }
	      }
	      part = words[i].substr(0, offset);
	      if (skip_count == 0) {
	        if (forwards) {
	          offset++;
	        }
	        else {
	          offset--;
	        }
	      }
	    	$('.word').text(part);
	  },speed);
	};
    
    wordflick();
    
    
    // Video Player
	$('#play-video-1').on('click', function(e){
	  e.preventDefault();
	  $('#video-overlay').addClass('open');
	  $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/d_SK6wCrKK4" frameborder="0" allowfullscreen></iframe>');
	});
	
	$('#play-video-2').on('click', function(e){
	  e.preventDefault();
	  $('#video-overlay').addClass('open');
	  $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/8x2hfCPNOGg" frameborder="0" allowfullscreen></iframe>');
	});
	
	$('.video-overlay, .video-overlay-close').on('click', function(e){
	  e.preventDefault();
	  close_video();
	});
	
	// Carousel split
	if ($("body").hasClass('home')) {
	    var scene = document.getElementById('shapes');
		var parallax = new Parallax(scene,{
			  scalarX: 8,
			  scalarY: 8,
			  frictionX: 0.8,
			  frictionY: 0.8
		});
		
		
		// Profiles
		$('.user-profiles').slick({
		  slidesToShow: 21,
		  slidesToScroll: 1,
		  infinite: true,
		  loop: true,
		  autoplay: true,
		  autoplaySpeed: 2000,
		  variableWidth: true,
		  arrows: false,
		  draggable: true
		});
	}
	
	if ($("body").hasClass('page')) {
		$(window).on("resize", function () {
			var thumbWidth = $('.resource-grid .thumb').width();
			
			$('.resource-grid .thumb, .resource-grid .thumb img').css({
			    'height': thumbWidth
			});
			
		}).resize();
	}
	
	$(document).keyup(function(e){
	  if(e.keyCode === 27) { close_video(); }
	});
	
	function close_video() {
	  $('.video-overlay.open').removeClass('open').find('iframe').remove();
	};

});








