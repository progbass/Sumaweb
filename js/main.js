var map;
var marker_latLng ={lat: 19.4005873, lng: -99.1824463};


(function($) {

	//----------------------------------------------------------------------//
	//--------------------------  PORTFOLIO LIST  --------------------------//
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
	//-----------------------------  PORTFOLIO  ----------------------------//
	//----------------------------------------------------------------------//
	$("section.single a.more_button").click( function(){

		if( $("section.single ul.work_list li.info").hasClass('full') ){
			$("section.single ul.work_list li.info").toggleClass('full', false);
			$("section.single ul.work_list li.info a.more_button").toggleClass('open', false);

			$("section.single ul.work_list li.info .content_holder").fadeIn();
			$("section.single ul.work_list li.info .full_content").fadeOut();

		} else {
			$("section.single ul.work_list li.info").toggleClass('full', true);
			$("section.single ul.work_list li.info a.more_button").toggleClass('open', true);

			$("section.single ul.work_list li.info .content_holder").fadeOut();
			$("section.single ul.work_list li.info .full_content").fadeIn();
		}
	} );





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

	



	$('.fancybox').fancybox({
		//autoSize: true,
		//autoHeight: false,
		//maxWidth: '85%',
        padding : 0,
        closeBtn: false
    });




    $(window).on('resize', function(){
    	if(map){
    		map.setCenter(marker_latLng);
    	}
    });



})(jQuery);


function initMap() {
	if(document.getElementById('gMap')){

		// Create a map object and specify the DOM element for display.
		map = new google.maps.Map(document.getElementById('gMap'), {
			center: marker_latLng,
			scrollwheel: false,
			zoom: 16 
		});

        // Create a marker and set its position.
        var marker = new google.maps.Marker({
          map: map,
          position: marker_latLng,
          title: 'Sumaweb'
        });
	}
}