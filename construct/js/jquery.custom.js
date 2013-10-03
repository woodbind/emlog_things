/*-----------------------------------------------------------------------------------

 	Custom JS - All custom front-end $

-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	Let's dance
/*-----------------------------------------------------------------------------------*/


jQuery(document).ready(function($) {


/*-----------------------------------------------------------------------------------*/
/*	Extras
/*-----------------------------------------------------------------------------------*/

	$(".tabber ul.tabs").tabs(".tabber div.panes > div", {
		effect: 'fade'
	});

	$(".accordion").tabs(".accordion div.pane", {
		tabs: '.trigger', effect: 'slide', initialIndex: null
	});

	$('.toggle .trigger').bind('click', function() {
		var maketoggle = $(this).parent('.toggle').find('.pane');
		$(maketoggle).slideToggle();
		$(this).toggleClass('open');
		return false;
	});

	$('<div class="clear">&nbsp;</div>').insertAfter('.column-last');


/*-----------------------------------------------------------------------------------*/
/*	Superfish Settings - http://users.tpg.com.au/j_birch/plugins/superfish/
/*-----------------------------------------------------------------------------------*/

	$('#primary-menu ul').superfish({
		delay: 0,
		animation: {opacity:'show', height:'show'},
		speed: 'fast',
		autoArrows: false,
		dropShadows: false
	});

	$("#primary-menu ul ul").each(
		function (i) { // Preserves the mouse-over on top-level menu elements when hovering over children
		    $(this).hover(

			    function() {

			    	$(this).parent().find("a").slice(0, 1).addClass("active");

			    }, function () {

			    	$(this).parent().find("a").slice(0, 1).removeClass("active");

			    }
		    );

		    var parent = $(this).parent().outerWidth();

		    if(parent < 140) {
				var diff = 140 - parent;
				$(this).css({
					width: '140px',
					marginLeft: -diff / 2
				});
			}
			else {
				$(this).css('width', '100%');
			}

		}
	);
	
/*-----------------------------------------------------------------------------------*/
/*	FitVids - http://fitvidsjs.com/
/*-----------------------------------------------------------------------------------*/
	
	if($().fitVids) {
		$(".single #page, .page #page").not('.page.page-template-template-showcase-php #page').fitVids();
	}


/*-----------------------------------------------------------------------------------*/
/*	Plus and overlay hover icons
/*-----------------------------------------------------------------------------------*/

	function dt_hovers() {

		$('a').hover(function () {

			$plus = $(this).find('.plus');

			$plus.css({opacity: 0, display: 'inline'});
			$plus.stop().animate({opacity: 1}, 100);

		}, function () {

			$plus = $(this).find('.plus');

			$plus.stop().animate({opacity: 0}, 100);

		});

		$('a.read-more').hover(function () {

			$plus = $(this).find('.plus span');

			$(this).stop().animate({paddingRight: 30}, 200);

			$plus.fadeIn(200);

		}, function () {

			$(this).stop().animate({paddingRight: 20}, 200);

		});

		$image = $('.featured-image, .overlay-icon');

		$image.hover( function() {

			$overlay = $(this).find('.overlay-icon');

			$overlay.css({opacity: 0, display: 'block'});
			$overlay.stop().animate({opacity: 1}, 100);

			$(this).find('a img').animate({
				opacity: 0.9
			}, 200);

		}, function() {

			$overlay = $(this).find('.overlay-icon');
			$overlay.stop().animate({opacity: 0}, 100);

			$(this).find('a img').stop().animate({
				opacity: 1
			}, 200);

		});

		$('.item').hover( function() {

			$(this).find('.meta-published').css({opacity: 0, display: 'inline'});
			$(this).find('.meta-published').stop().animate({opacity: 1}, 100);

		}, function() {

			$(this).find('.meta-published').stop().animate({
				opacity: 0
			}, 200);

		});

	}

	dt_hovers();


/*-----------------------------------------------------------------------------------*/
/*	Lightbox
/*-----------------------------------------------------------------------------------*/

	function dt_lightbox() {

		if($().colorbox) {

			$(".gallery a").not('#slide-controls a').colorbox({
				maxWidth: '90%',
			 	maxHeight: '90%'
			});

			$("a.colorbox-video").colorbox({
				inline: true,
				href: $(this).attr('href')
			});

			$("a.colorbox-image, a.colorbox-gallery").each(function(){
			 	$(this).colorbox({
			 		rel: $(this).attr('data-gallery'),
			 		maxWidth: '90%',
			 		maxHeight: '90%'
			 	});
			});

		}

	}

	dt_lightbox();


/*-----------------------------------------------------------------------------------*/
/*	Header Overlay
/*-----------------------------------------------------------------------------------*/

	function dt_set_responsive() {

		$height = $('#overlay').outerHeight();

		$('#overlay').css({
				marginTop: -$height
		});

		$('#overlay-trigger').toggle( function() {

			$('#overlay').stop().animate({
				marginTop: 0
			}, 500, 'easeInOutExpo');

			return false;

		}, function() {

			$('#overlay').stop().animate({
				marginTop: -$height
			}, 500, 'easeInOutExpo');

			return false;

		});

	}

	dt_set_responsive();



/*-----------------------------------------------------------------------------------*/
/*	Funky Responsive Stuff
/*-----------------------------------------------------------------------------------*/

	$(window).resize(function() {

		dt_set_responsive();

	});


/*-----------------------------------------------------------------------------------*/
/*	Portfolio Filtering
/*-----------------------------------------------------------------------------------*/
	
			
	if($().isotope) {
		
		$container = $('#masonry');
		
		$container.imagesLoaded( function() {
			
			$container.isotope({
	  	    	itemSelector : '.item',
	  	    	masonry: {
	  			    columnWidth: 320
	  			},
	  			getSortData: {
	
		  			order: function($elem) {
		  				return parseInt($elem.attr('data-order'));
		  			}
	
	  			},
	  			sortBy: 'order'
	  	    }, function() {
		    	//dt_getposts();
		   	});


		});


  	    // filter items when filter link is clicked
		$('#filter li').click(function(){

			$('#filter li').removeClass('active');
			$(this).addClass('active');

			var selector = $(this).find('a').attr('data-filter');

			$container.isotope({ filter: selector });

	        return false;

		});


  	}


/*-----------------------------------------------------------------------------------*/
/*	Load More Button
/*-----------------------------------------------------------------------------------*/

	//var dt = false;
	
	var nextLink = $('.post-navigation .next').attr('href');

 	$('#load-more a').click(function() { 
 		
 		console.log(nextLink);
 		
 		$this = $(this);
 	
 		if( $(this).hasClass('clicked') ) { 
 			
 			return false;
 			
 		} else {
	 		
	 		if( parseInt($('.count').text()) > 0 ) {
	 		
	 			$(this).addClass('clicked');
	 			 
	 			$('#detail-holder').fadeOut(200, function(){
					$('#loader').fadeIn(200);
				});
		 		
		 		$('#masonry-new').load(nextLink + ' .item.normal, .next.page-numbers', function() {
	 				
	 				nextLink = $(this).find('.next').attr('href');
	 				
		 			$newItems = $(this).find('.item.normal');
		 			
		 			var added = $newItems.length;
		 			var total = parseInt($('.count').text());
		 			
		 			var remaining = total - added;
		 			
		 			$('.count').text(remaining);
		 			
		 			if( remaining < 1 ) {
		 				$this.parent().addClass('disabled');
		 			}
		 			
		 			
		 			$(this).imagesLoaded( function() {
		 			
		 				$('#masonry').isotope('insert', $newItems);
		 				
		 				dt_hovers();
						dt_lightbox();
		 				
		 				$('#load-more a').removeClass('clicked');
		 				
		 				$('#detail-holder').fadeIn(200, function(){
							$('#loader').fadeOut(200);
						});
			 			
		 			});
		 			
		 		});
	 		
	 		}
 		
 		}

 		return false;
 		
 	});

	

/*-----------------------------------------------------------------------------------*/
/*	Show #backtotop link after scrollTop length
/*-----------------------------------------------------------------------------------*/

	$(window).bind('scroll', function(){
		$('#backtotop').toggle($(this).scrollTop() > 200);
	});


/*-----------------------------------------------------------------------------------*/
/*	Tabber widget
/*-----------------------------------------------------------------------------------*/

	var list = '<ul class="tabs clearfix">';
	$('#sidebar .tabber').find('h3.widget-title').each(function () {
	    var the_title = $(this).html();
	    list += '<li><a href="#">' + the_title + '</a></li>';
	});
	list += '</ul>';
	$('#sidebar .tabber').prepend(list);
	$("#sidebar .tabber .tabs").tabs("#sidebar .tabber .widget", { // requires $tools.js
	    //effect: 'fade'
	});


/*-----------------------------------------------------------------------------------*/
/*	Randomizer
/*-----------------------------------------------------------------------------------*/

    $.fn.randomize = function (childElem) {
        return this.each(function () {
            var $this = $(this);
            var elems = $this.find(childElem);
            elems.sort(function () {
                return (Math.round(Math.random()) - 0.5);
            });
            $this.remove(childElem);
            for (var i = 0; i < elems.length; i++)
            $this.append(elems[i]);
        });
    }

    //RANDOMIZE (ADS)
	$(".ads-inside.random").randomize("a");


/*-----------------------------------------------------------------------------------*/
/*	Contact Form
/*-----------------------------------------------------------------------------------*/

	$.fn.exists = function () { // Check if element exists
	    return $(this).length;
	}
	$('.dt-contactform').submit(function () {
	    var cf = $(this);
	    cf.prev('.alert').slideUp(400, function () {
	        cf.prev('.alert').hide();
	        $.post(ajaxurl, {
	            name: cf.find('.dt-name').val(),
	            email: cf.find('.dt-email').val(),
	            subject: cf.find('.dt-subject').val(),
	            comments: cf.find('.dt-comments').val(),
	            verify: cf.find('.dt-verify').val(),
	            action: 'dt_contact_form'
	        }, function (data) {
	            cf.prev('.alert').html(data);
	            cf.prev('.alert').slideDown('slow');
	            cf.find('img.loader').fadeOut('slow', function () {
	                $(this).remove()
	            });
	            if (data.match('success') != null) cf.slideUp('slow');
	        });
	    });
	    return false;
	});



/*-----------------------------------------------------------------------------------*/
/*	Slides.js Settings - http://slidesjs.com/
/*-----------------------------------------------------------------------------------*/

	function dt_sliderInit() {
	
		if($().slides) {

			$slides = $('#slides');

			$controls = $('.next, .prev');
			
			$slides.slides({
				effect: 'fade',
				fadeSpeed: 600,
				crossfade: false,
				generatePagination: false,
				preload: false,
				autoHeight: false,
				play: parseInt($slides.attr('data-auto')),

				animationStart: function(currrent) {

					$image = $slides.find('.featured-image');

					$image.animate({
						right: -420,
						left: 420
					}, 800, 'easeInOutExpo', function () {

						$image.css({
							right: 420,
							left: -420
						});

					});

				},
				animationComplete: function(currrent) {

					$image = $slides.find('.featured-image');

					$image.animate({
						left: 0,
						right: 0
					}, 800, 'easeInOutExpo');

					//console.log('image put in place');

				}

			});

			$('#single-slides').slides({
				effect: 'fade',
				fadeSpeed: 400,
				crossfade: false,
				generatePagination: false,
				preload: false,
				autoHeight: true,
				slidesLoaded: function () { 
			
					$control = $("#single-slides .slides_control"); 
						
					$('.slides_control').imagesLoaded( function() {
						
						$imageHeight = $('.slides_control div:first img').height();
						
						$('#single-slides .slides_container').css({
							height: 'auto'
						});
						
						$control.css({
							height: $imageHeight,
							opacity: 0
						});
						
						$control.animate({ 
							opacity: 1 
						}, 200,function() {
							
							$('#single-slides .slides_container').css({
								background: 'none'
							});
						
						} );
						
						//console.log('Image Height: '+$imageHeight);
						
					});
					
				}
			});

		}
		
	}

	dt_sliderInit();


/*-----------------------------------------------------------------------------------*/
/*	Plugins
/*-----------------------------------------------------------------------------------*/

/**
 * $.ScrollTo - Easy element scrolling using $.
 * Copyright (c) 2007-2009 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 5/25/2009
 * @author Ariel Flesler
 * @version 1.4.2
 *
 * http://flesler.blogspot.com/2007/10/$scrollto.html
 */
;(function(d){var k=d.scrollTo=function(a,i,e){d(window).scrollTo(a,i,e)};k.defaults={axis:'xy',duration:parseFloat(d.fn.$)>=1.3?0:1};k.window=function(a){return d(window)._scrollable()};d.fn._scrollable=function(){return this.map(function(){var a=this,i=!a.nodeName||d.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!i)return a;var e=(a.contentWindow||a).document||a.ownerDocument||a;return d.browser.safari||e.compatMode=='BackCompat'?e.body:e.documentElement})};d.fn.scrollTo=function(n,j,b){if(typeof j=='object'){b=j;j=0}if(typeof b=='function')b={onAfter:b};if(n=='max')n=9e9;b=d.extend({},k.defaults,b);j=j||b.speed||b.duration;b.queue=b.queue&&b.axis.length>1;if(b.queue)j/=2;b.offset=p(b.offset);b.over=p(b.over);return this._scrollable().each(function(){var q=this,r=d(q),f=n,s,g={},u=r.is('html,body');switch(typeof f){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(f)){f=p(f);break}f=d(f,this);case'object':if(f.is||f.style)s=(f=d(f)).offset()}d.each(b.axis.split(''),function(a,i){var e=i=='x'?'Left':'Top',h=e.toLowerCase(),c='scroll'+e,l=q[c],m=k.max(q,i);if(s){g[c]=s[h]+(u?0:l-r.offset()[h]);if(b.margin){g[c]-=parseInt(f.css('margin'+e))||0;g[c]-=parseInt(f.css('border'+e+'Width'))||0}g[c]+=b.offset[h]||0;if(b.over[h])g[c]+=f[i=='x'?'width':'height']()*b.over[h]}else{var o=f[h];g[c]=o.slice&&o.slice(-1)=='%'?parseFloat(o)/100*m:o}if(/^\d+$/.test(g[c]))g[c]=g[c]<=0?0:Math.min(g[c],m);if(!a&&b.queue){if(l!=g[c])t(b.onAfterFirst);delete g[c]}});t(b.onAfter);function t(a){r.animate(g,j,b.easing,a&&function(){a.call(this,n,b)})}}).end()};k.max=function(a,i){var e=i=='x'?'Width':'Height',h='scroll'+e;if(!d(a).is('html,body'))return a[h]-d(a)[e.toLowerCase()]();var c='client'+e,l=a.ownerDocument.documentElement,m=a.ownerDocument.body;return Math.max(l[h],m[h])-Math.min(l[c],m[c])};function p(a){return typeof a=='object'?a:{top:a,left:a}}})($);




/*-----------------------------------------------------------------------------------*/
/*	We've finished dancing!
/*-----------------------------------------------------------------------------------*/

});