jQuery(document).ready(function(){

	var $topbar = jQuery('.kl-top-bar'),
			topbarHeight = $topbar.innerHeight(),
			headerHeight = 0,
			headerType 	 = jQuery('.kl-header').data('kl-header'),
			stickyTop  	 = ( headerType == 'header1' ) ? '60px' : ( topbarHeight ? '100px' : '160px' );

 function fix_header(){
	 if( topbarHeight ){

		 if( headerType === 'header1'){
			 headerHeight = jQuery('.header1 .inner-header').innerHeight() + topbarHeight;
		 }
		 if( headerType === 'header2' ){
			 headerHeight = topbarHeight;
		 }
	 }

	 else {
		 if( headerType === 'header1'){
			 headerHeight = jQuery('.header1 .inner-header').innerHeight();
		 }
		 if( headerType === 'header2' ){
			 headerHeight = 0;
		 }
	 }
 }

	function stickyHeader(){

		if( jQuery(window).scrollTop() > headerHeight ){
			jQuery('#kl-navigation').addClass('sticky');
			jQuery('body').css('margin-top', stickyTop);
		}
		else {
			jQuery('#kl-navigation').removeClass('sticky');
			jQuery('body').css('margin-top', '0px');
		}

	}

	/* BACK TO TOP */
	jQuery('.scroll-top .back-to-top').on( 'click', function (e) {
		e.preventDefault();
		jQuery( 'html, body' ).animate( { scrollTop: 0 }, 700 );
	});

	jQuery(window).scroll(function() {

		/* STICKY HEADER */
		stickyHeader();

		/* SHOWS BACK TO TOP BUTTON */
		if( jQuery(this).scrollTop() > 100 ){
			jQuery('.scroll-top').addClass('show');
		}
		else { jQuery('.scroll-top').removeClass('show'); }

	});

	// HEADER 1 SEARCH BAR
	jQuery('.kl-search').on( 'click', '.btn-search',function (e){
		e.preventDefault();
		jQuery('.search-field').fadeToggle();
		jQuery('.search-field input.search-input').focus();
	});

	/* RELATED POSTS SLIDER */
	jQuery('[data-behaviour~=kl-related-posts]').each( function () {
		var $this = jQuery( this ),
			slide = 3,
			infinity = true,
			autoplay = $this.data('auto'),
			dots_show = $this.data('dots'),
			arrows_show = $this.data('arrows');
			$this.slick({
				infinite      : infinity,
				slidesToShow  : slide,
				slidesToScroll: slide,
				dots          : dots_show,
				autoplay      : autoplay,
				autoplaySpeed : 5000,
				speed         : 300,
				arrows        : arrows_show,
				nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
				prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>',
				responsive    : [
					{
						breakpoint: 1169,
						settings  : {
							slidesToShow  : 2,
							slidesToScroll: 2
						}
					},
					{
						breakpoint: 480,
						settings  : {
							slidesToShow  : 1,
							slidesToScroll: 1
						}
					}
				]
			});	// slick

			$this.addClass( 'loaded' );
	});

	/* KL FEATURED SLIDER */
	jQuery( '.kl-featured-slider' ).each( function () {
    var $this = jQuery( this ),
      autoplay = $this.data( 'auto' ),
      autotime = $this.data( 'autotime' ),
      autospeed = $this.data( 'speed' );

      $this.slick( {
        dots          : false,
        infinite      : true,
        speed         : autospeed,
				autoplaySpeed : autotime,
        slidesToShow  : 1,
        slidesToScroll: 1,
        autoplay      : false,
        centerMode    : false,
        variableWidth : false,
        adaptiveHeight: true,
        nextArrow     : '<button type="button" class="slick-next slick-nav"><i class="fa fa-angle-right"></i></button>',
        prevArrow     : '<button type="button" class="slick-prev slick-nav"><i class="fa fa-angle-left"></i></button>'
      } );

      $this.parent().addClass( 'loaded' );
  } ); // each

	/* HEADER 1 MOBILE NAVBAR */
	jQuery( '#mobile-nav.header-1 .menu .dropdown > a, #mobile-nav.header-1 .topbar-menu .dropdown > a' ).append( '<span class="menu-toggler"><i class="fa fa-angle-down"></i></span>' );

	// TOGGLE MOBILE MENU
	jQuery('.button-menu-mobile').on('click', function(){
		jQuery('body' ).addClass('show-mobile-nav');
	});

	// MENU TOGGLER
	jQuery('#mobile-nav.header-1 .menu-toggler').on('click', function(e){
		e.preventDefault();
		var $this = jQuery( this );

		if($this.children().hasClass('fa-angle-down')){
			$this.children().removeClass('fa-angle-down').addClass('fa-angle-up');
		}
		else{
			$this.children().removeClass('fa-angle-up').addClass('fa-angle-down');
		}

		$this.parent().next().slideToggle( 'fast' );
	});

	// CLOSE MOBILE NAV
	jQuery('#close-mobile-nav.header-1').on('click', function(){
		jQuery('body').removeClass('show-mobile-nav');
	});

	// EXECUTED ON PAGE LOAD
	fix_header();
	stickyHeader();

});
