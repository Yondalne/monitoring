var CONFIG = (function ($, window) {
	
	return {
		
		/* ---------------------------------------------------- */
		/*	Owl Slider										    */
		/* ---------------------------------------------------- */
		
		photo_slider : {
			items: 1,					
			autoplay : true,			
			autoplayTimeout: 5000,		
			smartSpeed: 1200,			
			navigation: false,			
  			rewindNav: false,			
  			loop: true,					
			theme: "carousel-theme",
			dots: false,				
			nav: false,					
			margin:20,
			autoplayHoverPause: true,
			responsive:{
				320: {
				   items:1
				},
				480: {
				   items: 2
				},	
			    769:{
			      items:2
			    },
			    1199:{
			      items:3
			    }
			}
		},

		focus_elmts : {
			items: 1,					
			autoplay : true,			
			autoplayTimeout: 5000,		
			smartSpeed: 1200,			
			navigation: false,			
  			rewindNav: false,			
  			loop: true,					
			theme: "carousel-theme",
			dots: false,				
			nav: false,					
			margin:20,
			autoplayHoverPause: true,
			responsive:{
				320: {
				   items:1
				},
				480: {
				   items: 2
				},	
			    769:{
			      items:2
			    },
			    1199:{
			      items:3
			    }
			}
		},

		structure : {
			items: 1,					
			autoplay : true,			
			autoplayTimeout: 5000,		
			smartSpeed: 1200,			
			navigation: false,			
  			rewindNav: false,			
  			loop: true,					
			theme: "carousel-theme",
			dots: false,				
			nav: false,					
			margin:20,
			autoplayHoverPause: true,
			responsive:{
				320: {
				   items:1
				},
				480: {
				   items: 2
				},	
			    769:{
			      items:3
			    },
			    1199:{
			      items:5
			    }
			}
		},
	}
	
}(jQuery, window));
	
	