var map;
var marker_latLng ={lat: 19.4005873, lng: -99.1824463};


(function($) {

	//----------------------------------------------------------------------//
	//-----------------------------  PRELOADER  ----------------------------//
	//----------------------------------------------------------------------//
	var images_array = Array();
	$('img').each(function(_index, _target){
		images_array.push( $(_target).attr('src') );
	});
	new preLoader(images_array, {
	    onProgress: function(img, imageEl, index){
	        var percent = Math.floor((100 / this.queue.length) * this.completed.length);
	    }, 
	    onComplete: function(loaded, errors){
	        //console.log('done', loaded);
	        
	        // Show content
	        $('#app_preloader').addClass('outro');

			setTimeout(function(){
				$('body').removeClass('loading');
			}, 160);
	    }
	});



	


	//----------------------------------------------------------------------//
	//-----------------------------  MAIN MENU  ----------------------------//
	//----------------------------------------------------------------------//
	//  Enable Click on <li> item
	$('header a.mobile_icon').click( function( e ){
		e.preventDefault();
		$('#main_menu').toggleClass('active');
	} );






	//----------------------------------------------------------------------//
	//-------------------------------  ABOUT  ------------------------------//
	//----------------------------------------------------------------------//
	// Open / Close Suma Info
	$("section.about .content_holder").slideUp(0);
	$("section.about .team_photo a.more_button").data('open', false);
	$("section.about .team_photo a.more_button").click(function(_e){
		_e.preventDefault();

		// Open/Close Module
		if( $("section.about .team_photo a.more_button").data('open') )
			$("section.about .content_holder").slideUp(320);
		else
			$("section.about .content_holder").slideDown(320);

		// Toggle State Mode
		$("section.about .team_photo a.more_button").data('open', !$("section.about .team_photo a.more_button").data('open'));
	});




	//----------------------------------------------------------------------//
	//------------------------  PORTFOLIO MAIN LIST  -----------------------//
	//----------------------------------------------------------------------//
	//  Enable Click on <li> item
	$('ul.main_list li').each( function(_index, _target){
		$(_target).click(function(e){
			e.preventDefault();
			var project_link = $(this).find('a.project_link').attr('href');
			if(project_link != '#'){
				window.location = project_link;
			}
		});
	} );

	$('table.main_list td').each( function(_index, _target){
		$(_target).click(function(e){
			e.preventDefault();
			var project_link = $(this).find('a.project_link').attr('href');
			if(project_link != '#'){
				window.location = project_link;
			}
		});
	} );






	//----------------------------------------------------------------------//
	//------------------------------  ARTICLE  -----------------------------//
	//----------------------------------------------------------------------//
	$("section.single a.more_button").click( function(e){
		e.preventDefault();


		/* if( $("section.single ul.work_list li.info").hasClass('full') ){
			$("section.single ul.work_list li.info").toggleClass('full', false);
			$("section.single ul.work_list li.info a.more_button").toggleClass('open', false);

			$("section.single ul.work_list li.info .content_holder").fadeIn();
			$("section.single ul.work_list li.info .full_content").fadeOut();

		} else {
			$("section.single ul.work_list li.info").toggleClass('full', true);
			$("section.single ul.work_list li.info a.more_button").toggleClass('open', true);

			$("section.single ul.work_list li.info .content_holder").fadeOut();
			$("section.single ul.work_list li.info .full_content").fadeIn();
		} */
	} );


	//////////////
	/// FANCYBOX
	$('.fancybox').fancybox({
		//autoSize: true,
		//autoHeight: false,
		//maxWidth: '85%',
        padding : 0,
        closeBtn: false
    });





	





	//----------------------------------------------------------------------//
	//------------------------------  CLIENTS  -----------------------------//
	//----------------------------------------------------------------------//
	var max_clients = 5;
	var clients_interval = 0;
	var clients_slide = 0;
	if($("section.clients .slider li").length >= max_clients){
		var init_width = $("section.clients .slider_holder").width();
		var clients_slides_total = Math.round($("section.clients .slider li").length / max_clients);
		$("section.clients .slider").css('width', (clients_slides_total * 100)+'%');
		$("section.clients .slider li").width(init_width);

		clients_interval = setInterval(function(){
			clients_slide++;
			clients_slide = clients_slide > clients_slides_total-1 ? 0 : clients_slide;
			$("section.clients .slider").css('margin-left', -(100 * clients_slide)+'%');
		}, 3000);
	}







	//----------------------------------------------------------------------//
	//-------------------------------  OFFICE  -----------------------------//
	//----------------------------------------------------------------------//
	// Map Height
	var mapDifference = $('header').outerHeight(true) + $('footer').outerHeight(true) + $("section.office .address_holder").outerHeight(true);
	$("section.office .map_holder").css('height', 'calc(100vh - '+mapDifference+'px)')

	






	//----------------------------------------------------------------------//
	//-------------------------------  RESIZE  -----------------------------//
	//----------------------------------------------------------------------//
    $(window).on('resize', function(){
    	if(map){
    		map.setCenter(marker_latLng);
    	}
    });









    ////////////////////////////////////////////////////////
	/// FORMAT IMAGES (VERTICAL/HORIZONTAL)
	////////////////////////////////////////////////////////
	function formatThumbnails(_target){
		$(_target).each(function(_index, _target){
			var target = $(this);
			var holder_ratio = target.height()/target.width();

			var image = target.find('img');
			var image_ratio = image.height()/image.width(); 
			var image_class = image_ratio <= holder_ratio ? 'vertical' : 'horizontal';
			image.removeClass('vertical horizontal').addClass(image_class);			
		});
	}
	setTimeout(function(){
		formatThumbnails( $('section.single .cover') );
	}, 1000);
 


})(jQuery);










/////////////////////////////////////////////////////////////
// INIT MAP
/////////////////////////////////////////////////////////////
function initMap() {
	var drag_flag = true;
	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		drag_flag =  false;
	}

	if(document.getElementById('gMap')){

		// Create a map object and specify the DOM element for display.
		map = new google.maps.Map(document.getElementById('gMap'), {
			center: marker_latLng,
			scrollwheel: false,
			zoom: 16,
			draggable: drag_flag,
		});

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: marker_latLng,
          title: 'Sumaweb'
        });

        // Reposition Marker on change
        map.addListener('center_changed', function() {
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        // Marker Click Event
        marker.addListener('click', function() {
        	// Got to gMaps Link
        	window.location = 'https://goo.gl/maps/9FM61L1gsnp';
        });
	}


}




/////////////////////////////////////////////////////////////
// SOCIAL SHARE
/////////////////////////////////////////////////////////////
function socialShare(id, urlpost, titles){
	//properties
	var source = urlpost;
	var url="";
	
	
	//Choose Social Network
	switch(id){
		case 'facebook':
			url = 'https://www.facebook.com/sharer/sharer.php?u=' + source;
			break;
			
		case 'twitter':
			title = encodeURIComponent(titles);
			url = 'https://twitter.com/intent/tweet?text='+title+'&url='+source;
			break;
			
		default:
			break;
	}
	
	
	//Pop up settings
	var w = 500;
	var h = 250;
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	
	//open popup
	myWindow = window.open (url, 'win_share','width='+w+',height='+h+', top='+top+', left='+left);

	//
	return false;
};






