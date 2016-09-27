/*!
 * Bare Bones Slider
 * http://www.bbslider.com/
 *
 * Author
 * Richard Hung
 * http://www.magicmediamuse.com/
 *
 * Version
 * 1.2.2
 * 
 * Copyright (c) 2015 Richard Hung.
 * 
 * License
 * Bare Bones Slider by Richard Hung is licensed under a Creative Commons Attribution-NonCommercial 3.0 Unported License.
 * http://creativecommons.org/licenses/by-nc/3.0/deed.en_US
 */


(function($) {
	'use strict';
	
	var methods = {
		init : function(settings) {

			// Set default parameters
			var defaultSettings = {
				page:           1,                   // Page to start on
				duration:       1000,                // Duration of transition
				controls:       false,               // Display next / prev controls
				pager:          true,                // Create clickable pagination links
				pagerWrap:      '.pager-wrap',       // Container for pagination (Created externally)
				pageInfo:       true,                // Display current panel information
				infoWrap:       '.info-wrap',        // Container for page information (Created externally)
				onDemand:       false,               // Create placeholder image and load on-demand
				placeholder:    '/images/blank.gif', // Location of placeholder image
				auto:           true,                // Pages play automatically
				timer:          8000,                // Amount of time for autoplay
				loop:           true,                // Loop back to the beginning
				transition:     'blind',             // Fade, slide, slideVert, or none
				callbackStart:  null,                // Callback function when slider is setup
				callbackBefore: null,                // Callback function before new slide transition
				callbackAfter:  null,                // Callback function after new slide complete
				callbackUpdate: null,                // Callback function after update function
				easing:         'swing',             // Easing transition
				autoHeight:     false,               // Automatically set height 
				dynamicHeight:  false,               // Height of slider changes with current panel
				pauseOnHit:     true,                // Pause autoplay when controls or pagers used 
				randomPlay:     false,               // Autoplay goes to random slides
				loopTrans:      true,                // Use backward and forward transition for loop
				touch:          false,               // Allow touchscreen controls
				touchoffset:    50,                  // Amount of pixels to swipe for touch controls
				css3:           true,                // Use CSS3 transitions instead of jQuery animate
				carousel:       false,               // Number of items per slide
				carouselMove:   1                    // Amount of slides to move per carousel prev / next
			}; // End options
			
			// Override default options
			settings = $.extend({}, defaultSettings, settings);
			
			return this.each(function(){
				
				// Create variables
				var wrapper = $(this);
				var panel   = wrapper.children();
				var pIndex  = settings.page - 1; // New index
				var cIndex  = settings.page - 1; // Current index (for animating out the current panel)
				var pCount  = panel.length; // number of pages
				
				// Bind variables to object
				wrapper.data({
					autoPlay: false,
					pIndex:   pIndex,
					cIndex:   cIndex,
					pCount:   pCount,
					settings: settings
				});
				
				// Apply basic CSS
				wrapper.addClass('bbslider-wrapper');
				panel.addClass('panel');
				
				// image load on demand
				if (settings.onDemand) {
					// Create placeholder 
					wrapper.bbslider('placeholder');
					
					// Only show one image
					panel.eq(pIndex).bbslider('loadImg');
				} // End onDemand check
			
				// Create page numbers info function
				if (settings.pageInfo) {
					wrapper.bbslider('infoParse');
				} // End infoParse
				
	
				// Create pager if true
				if (settings.pager) {
					wrapper.bbslider('pager',settings.pagerWrap);			
				} // End pager check
				
				// create prev/next controls if true
				if (settings.controls) {
					var x = wrapper.bbslider('controls');
					var next = x.next;
					var prev = x.prev;

					next.click(function(e) {
						wrapper.bbslider('next');
						e.preventDefault();
				
						if (settings.pauseOnHit) {
							wrapper.bbslider('pause');
						}
					});// End next click
					
					prev.click(function(e) {
						wrapper.bbslider('prev');
						e.preventDefault();
				
						if (settings.pauseOnHit) {
							wrapper.bbslider('pause');
						}
					});// End prev click
					
				}// End controls check
				
				// Touch controls
				if (settings.touch) {
					
					var getX;
					var getN;
					var offset;
					
					wrapper.on('touchstart',function(e) {
						e.preventDefault();
						var touch  = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
						
						getX = touch.pageX;
						// console.log(touch.pageY+' '+touch.pageX);
						// alert('Touch on: '+touch.pageY+' '+touch.pageX);
					}); // end touchstart
					/*
					wrapper.on('touchmove',function(e) {
						e.preventDefault();
						var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
						// console.log(touch.pageY+' '+touch.pageX);
						alert('Touch move: '+touch.pageY+' '+touch.pageX);
					}); // end touchmove
					*/
					wrapper.on('touchend',function(e) {
						e.preventDefault();
						var touch  = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
						
						getN   = touch.pageX;
						offset = settings.touchoffset;

						if (getN > getX + offset) {
							wrapper.bbslider('prev');
							
							if (settings.pauseOnHit) {
								wrapper.bbslider('pause');
							}
						} else if (getN < getX - offset) {
							wrapper.bbslider('next');
							
							if (settings.pauseOnHit) {
								wrapper.bbslider('pause');
							}
						}
						// alert('Touch off: '+touch.pageY+' '+touch.pageX);
						// console.log(touch.pageY+' '+touch.pageX);
					}); // end touchend
				}// End touch
				
				// auto play
				if (settings.auto) {
					wrapper.bbslider('play');
				} // End autoplay
			
				// Setup the slider
				wrapper.bbslider('setup');
				
				// Create autoheight 
				if (settings.autoHeight) {
					wrapper.bbslider('recalcHeight',true);
				}// End autoheight
				
				
				// callback start function
				var callbackStart = settings.callbackStart;
				if ($.isFunction(callbackStart)) {
					callbackStart.call(this);
				}
			}); // End object loop
			
	
		}, // End init
		update : function() {
			return this.each(function(){
				
				// Create variables
				var wrapper       = $(this);
				var panel         = wrapper.children(':not(.control-wrapper)');
				var pCount        = panel.length; // number of pages
				var settings      = wrapper.data('settings'); 
				var pIndex        = wrapper.data('pIndex');
				var onDemand      = settings.onDemand; 
				var pageInfo      = settings.pageInfo; 
				var pager         = settings.pager;
				var autoHeight    = settings.autoHeight;
				var callback      = settings.callbackUpdate;
				
				
				// Set data
				wrapper.data('pCount',pCount);
				
				// Apply basic CSS
				panel.addClass('panel');
				
				// on-demand image loading
				if (onDemand) {
					// Create placeholder 
					wrapper.bbslider('placeholder');
				
					// Only show one image
					panel.eq(pIndex).bbslider('loadImg');
				} // End onDemand check
				
				// Create page numbers info function
				if (pageInfo) {
					wrapper.bbslider('infoParse');
				} // End infoParse
				
				// Create pager if true
				if (pager) {
					wrapper.bbslider('pager');			
				} // End pager check
				
				// remove css3 class
				// will check and reapply again in the setup function
				wrapper.removeClass('css');
			
				// Setup the slider
				wrapper.bbslider('setup');
				
				// Create autoheight 
				if (autoHeight) {
					wrapper.bbslider('recalcHeight',true);
				} // End autoheight
				
				// callback update function
				if ($.isFunction(callback)) {
					callback.call(this);
				}
			}); // End object loop
		}, // End update
		destroy : function() {
			return this.each(function(){
				
				var wrapper  = $(this);
				var panel    = wrapper.children('.panel');
				var settings = wrapper.data('settings');
				
				// Remove CSS
				wrapper.removeClass('bbslider-wrapper css3 carousel');
				panel.removeClass('panel active slide fade blind none slideVert');
				
				// remove autoheight 
				wrapper.css('height','');
				
				// Show all images 
				if (wrapper.data('onDemand')) {
					panel.bbslider('loadImg');
				} // End onDemand check
			
				// Remove page numbers info function
				if (wrapper.data('pageInfo')) {
					var infoWrap = wrapper.data('infoWrap');
					infoWrap.empty();
				} // End infoParse
				
				// Hide panels and show first panel
				var transition = settings.transition;
				switch (transition) {
					case 'fade':
						panel.removeClass('fade');
						break;
					case 'slide':
						panel.removeClass('slide');
						break;
					case 'slideVert':
						panel.removeClass('slideVert');
						break;
					case 'blind':
						// Hide panels and show opening panel
						panel.removeClass('blind');
						wrapper.find('.panel-inner').contents().unwrap();
						break;
					case 'none':
					default:
						panel.removeClass('none');
				} // End transition switch
				
				// Remove pager
				$('#'+wid+'-pager').remove();			
				
				// Remove controls 
				wrapper.children('.prev-control-wrapper').remove();
				wrapper.children('.next-control-wrapper').remove();
				
				// auto play
				var autoPlay = wrapper.data('autoPlay');
				if (autoPlay) {
					wrapper.bbslider('pause');
				}// End autoplay
				
				// Remove data
				wrapper.removeData();
			});
		}, // End destroy
		recalcHeight : function(init) {
			return this.each(function() {
				var wrapper       = $(this);
				var panel         = wrapper.children('.panel');
				var settings      = wrapper.data('settings'); 
				var pIndex        = wrapper.data('pIndex');
				var autoHeight    = settings.autoHeight;
				var dynamicHeight = settings.dynamicHeight;
				var css3          = settings.css3;
				var duration      = settings.duration;
				var easing        = settings.easing;
				var hi;
				
				if (init && autoHeight) { // Initial slider creation or update
					if (dynamicHeight) {
						
						// Get current panel height
						hi = panel.eq(pIndex).outerHeight(true);
	
					} else { // no dynamic height, use max panel height
						// Get max panel height and width
						hi = 0;
						panel.each(function(){
							var h = $(this).outerHeight(true);
							if(h > hi){
								hi = h;
							}
						});
					} // end dynamic height check
					wrapper.height(hi);
				} else if (dynamicHeight && autoHeight) { // not initialized, update on dynamic height
					// Get current panel height
					hi = panel.eq(pIndex).outerHeight(true);
					
					if (css3) {
						wrapper.height(hi);
					} else {
						wrapper.animate({
							height: hi
						},duration,easing);
					}
				}
				
			});
		}, // end recalculate height
		play : function() { 
			return this.each(function() {
				var wrapper    = $(this);
				var settings   = wrapper.data('settings'); 
				var autoPlay   = wrapper.data('autoPlay');
				var randomPlay = settings.randomPlay;
				
				// check if slider is already playing
				if (!autoPlay) {
					var duration = settings.duration;
					var timer    = settings.timer;
					
					var tid = setInterval(function() {
						// Check for random play
						if (randomPlay) {
							wrapper.bbslider('randomSlide');
						} else {
							wrapper.bbslider('next');
						}
					}, timer + duration); // End setinterval
					
					wrapper.data('tid',tid);
					wrapper.data('autoPlay',true);
				}
			});
 	    }, // End play
		pause : function() { 
			return this.each(function() {
				var wrapper  = $(this);
				var tid      = wrapper.data('tid');
				var autoPlay = wrapper.data('autoPlay');
				if (autoPlay) {
					clearInterval(tid);
					wrapper.data('autoPlay',false);
				}
			});
 	    }, // End pause
		randomSlide : function() {
			return this.each(function() {
				var wrapper   = $(this);
				var settings  = wrapper.data('settings'); 
				var pCount    = wrapper.data('pCount');
				var pIndex    = wrapper.data('pIndex');
				var loopTrans = settings.loopTrans;
				
				var x = Math.round(1 + Math.floor(Math.random() * pCount));
				var y = x - 1;
				
				// Check if to keep using forward animation
				if (loopTrans) {
					wrapper.data('cIndex',pIndex);
					wrapper.data('pIndex',y);
					
					wrapper.bbslider('forPage',y);
				} else {
					wrapper.bbslider('travel',y);
				}
			});
		}, // End randomSlide
		setup : function() {
			// Hide panels and show first panel
			var wrapper    = this;
			var panel      = wrapper.children('.panel');
			var settings   = wrapper.data('settings'); 
			var pIndex     = wrapper.data('pIndex');
			var pCount     = wrapper.data('pCount');
			var transition = settings.transition;
			var css3       = settings.css3;
			var duration   = settings.duration;
			var easing     = settings.easing;
			var carousel   = settings.carousel;
			
			if (carousel) {
				
				wrapper.addClass('carousel');
				var itemWidth = 100 / parseInt(carousel);
				var end       = pIndex + parseInt(carousel);					
				
				var left = 0;
				
				panel.css({
					width: itemWidth+'%',
					left:  '100%'
				});
				
				// loop through and show multiple slides
				for ( var i = pIndex; i < end; i++ ) {
					if (i < pCount) {
						
						panel.eq(i).css('left',left+'%');
					} else {
						// end is higher than number of slides
						// loop back to beginning
						var x = i - pCount;
						
						panel.eq(x).css('left',left+'%');
					}
					left = left + itemWidth;
				} // end carousel item loop
					
				if (css3) {
					panel.addClass('init');
				}
			} else {
				switch (transition) {
					case 'fade':
						panel.addClass('fade');
						if (css3) {
							panel.addClass('init').eq(pIndex).show().css('opacity',1);
						} else {
							panel.eq(pIndex).fadeIn();
						}
						break;
					case 'slide':
						panel.addClass('slide');
						if (css3) {
							panel.addClass('init').css('left','100%').eq(pIndex).css('left',0);
						} else {
							panel.eq(pIndex).show();
						}
						break;
					case 'slideVert':
						panel.addClass('slideVert');
						if (css3) {
							panel.addClass('init').css('top','-100%').eq(pIndex).css('top',0);
						} else {
							panel.eq(pIndex).show();
						}
						break;
					case 'blind':
						// Hide panels and show opening panel
						var width  = wrapper.width();
	
						panel.children('.panel-inner').contents().unwrap();
						panel.wrapInner('<div class="panel-inner" />');
						panel.addClass('blind init').eq(pIndex).css({
							width:'100%'
						});
						panel.children('.panel-inner').width(width);
						
						var hi = 0;
						panel.children('.panel-inner').each(function(){
							var h = $(this).wrapInner('<div>').children().outerHeight(true);
							if(h > hi){
								hi = h;
							}
							$(this).children().contents().unwrap();
						});
						panel.height(hi);
						panel.children('.panel-inner').height(hi);
						break;
					case 'none':
					default:
						panel.addClass('none');
				} // End transition switch
			} // end carousel check
			
			// add active class to panel
			panel.eq(pIndex).addClass('active');
			
			if (css3) {
				wrapper.addClass('css3').add(panel).css({
					WebkitTransitionDuration: duration / 1000 + 's',
					msTransitionDuration: duration / 1000 + 's',
					MozTransitionDuration: duration / 1000 + 's',
					OTransitionDuration: duration / 1000 + 's',
					transitionDuration: duration / 1000 + 's',
					WebkitTransitionTimingFunction: easing,
					msTransitionTimingFunction: easing,
					MozTransitionTimingFunction: easing,
					OTransitionTimingFunction: easing,
					transitionTimingFunction: easing
				});
			}
		}, // End setup
		placeholder : function() { 
			var settings    = this.data('settings');
			var placeholder = settings.placeholder;
			var images      = this.children('.panel').find('img');
			images.each(function() {
				if(!$(this).attr('data-placeholder')) {
					//Write the original source to a temporary location
					$(this).attr('data-placeholder', $(this).attr('src'));
					//Change the image source to the loading image
					$(this).attr('src', placeholder);
				}
			});
 	    }, // End placeholder
 	    loadImg : function() {
			var images = this.find('img');
			// loop through images in panel
			$(images).each(function() {
				//alert('image found');
				$(this).attr('src', $(this).attr('data-placeholder')).removeAttr('data-placeholder');
			});
			
		}, // End load image
 	    infoParse : function() { 
			var wrapper  = this;
			var settings = wrapper.data('settings'); 
			var pCount   = wrapper.data('pCount');
			var pIndex   = wrapper.data('pIndex');
			var infoWrap = $(settings.infoWrap);
			var page     = pIndex + 1;
			
			infoWrap.text(page + ' of ' + pCount);
		}, // End infoParse
		pager : function() {
			var wrapper   = this;
			var panel     = wrapper.children('.panel');
			var pCount    = wrapper.data('pCount');
			var settings  = wrapper.data('settings');
			// var pagerList = pagerWrap.children('.page-list');
			var wid       = wrapper.attr('id');
			var pagerWrap = $(settings.pagerWrap);
			
			// remove any previous pager-list
			pagerWrap.find('#'+wid+'-pager').remove();
			
			var pagerList = $('<ul class="page-list" id="'+wid+'-pager" />').appendTo(pagerWrap);
			
			for (var pageNum = 1; pageNum <= pCount; pageNum++) {
				// Check whether to give a title to pager
				var title;
				if (panel.eq(pageNum - 1).attr('title')) { // Title attribute not empty
					title = panel.eq(pageNum - 1).attr('title');
				} else {
					title = pageNum;
				}// End title check
				$('<li><a href="#' + pageNum + '" data-link="' + wid + '" class="bb-pager-link">' + title + '</a></li>' ).appendTo(pagerList);
			}// End for loop
			
			pagerList.find('a').bbslider('bindpager');
			
			wrapper.bbslider('pagerUpdate');
		}, // End pager
		pagerUpdate : function() {
			var wid    = this.attr('id');
			var pIndex = this.data('pIndex');
			
			$('#'+wid+'-pager').children().removeClass('activePanel').eq(pIndex).addClass('activePanel');
			
		}, // End pagerUpdate
		bindpager : function() {
				
			return this.on('click',function(e) {
				

				// Remove # from href and get index
				// pagerIndex = parseInt($(this).attr('href').replace('#','')) - 1;
				var href       = $(this).attr('href');
				var hash       = href.substring(href.indexOf('#'));
				var pagerIndex = parseInt(hash.substring(1)) - 1;
				// alert(hash.substring(1));
				
				var wid        = $(this).attr('data-link');
				var wrapper    = $('#'+wid);
				var pIndex     = wrapper.data('pIndex');
				var settings   = wrapper.data('settings');
				var pauseOnHit = settings.pauseOnHit;
				
				if (pagerIndex > pIndex) { // New page is after current page, show next animation
					
					wrapper.data('cIndex',pIndex);
					pIndex = pagerIndex;
					wrapper.data('pIndex',pIndex);
					
					wrapper.bbslider('forPage',pIndex);
				} else if (pagerIndex < pIndex) { // New page is before current page, show previous animation
					
					wrapper.data('cIndex',pIndex);
					pIndex = pagerIndex;
					wrapper.data('pIndex',pIndex);
					
					wrapper.bbslider('backPage',pIndex);

				}// End pager check
				
				if (pauseOnHit) {
					wrapper.bbslider('pause');
				}
				
				e.preventDefault();
			}); // End bind
		}, // End bindpager
		controls : function() {
			var settings = this.data('settings'); 
			var pIndex   = this.data('pIndex');
			var pCount   = this.data('pCount');
			var loop     = settings.loop;
			
			// Create variables for wrapper
			var prev = $('<a class="prev control" href="#">Prev</a>').prependTo(this);
			var next = $('<a class="next control" href="#">Next</a>').prependTo(this);
			prev.wrap('<div class="prev-control-wrapper control-wrapper" />');
			next.wrap('<div class="next-control-wrapper control-wrapper" />');
			var prevWrap = this.children('.prev-control-wrapper');
			var nextWrap = this.children('.next-control-wrapper');
			
			// Check if on first page
			if (pIndex === 0 && !loop) {
				// hide previous button
				prevWrap.css('display','none');
			}
			// check if on last page
			if (pCount <= pIndex + 1 && !loop) {
				// hide next button

				nextWrap.css('display','none');
			}
			
			var x = {};
			x.next = next;

			x.prev = prev;
			return x;
			
		}, // End controls 
		prev : function() {
			return this.each(function() {
				var wrapper      = $(this);
				var settings     = wrapper.data('settings'); 
				var loop         = settings.loop;
				var pCount       = wrapper.data('pCount');
				var pIndex       = wrapper.data('pIndex');
				var loopTrans    = settings.loopTrans;
				var carousel     = settings.carousel;
				var carouselMove = settings.carouselMove;
				var cIndex       = pIndex;
				var before       = settings.callbackBefore;
				
				if ($.isFunction(before) && before.call(this) === false) {
					return false;
				}
				
				wrapper.data('cIndex',cIndex);
				
				// reset autoplay timer
				if (wrapper.data('autoPlay')) {
					wrapper.bbslider('pause').bbslider('play');
				}

				// check if first / last
				if (carousel) {
					pIndex = cIndex - carouselMove;
					if (pIndex < 0) {
						pIndex = pIndex + pCount;
					}
					wrapper.data('pIndex',pIndex);
					wrapper.bbslider('backPage',pIndex);
				} else if (pIndex > 0) { // It is not the first panel, move backward
					pIndex = cIndex - 1;
					
					wrapper.data('pIndex',pIndex);
					
					wrapper.bbslider('backPage',pIndex);
				} else if (loop) { // It is first panel, loop to end
					pIndex = pCount - 1;
					
					wrapper.data('pIndex',pIndex);
					
					if (loopTrans) {
						// use backward animation
						wrapper.bbslider('backPage',pIndex);
					} else {
						// use forward animation
						wrapper.bbslider('forPage',pIndex);
					}
				}
			
			});
		}, // End prev 
		next : function() {
			return this.each(function() {
				var wrapper      = $(this);
				var settings     = wrapper.data('settings');
				var pCount       = wrapper.data('pCount');
				var pIndex       = wrapper.data('pIndex');
				var loop         = settings.loop;
				var loopTrans    = settings.loopTrans;
				var carousel     = settings.carousel;
				var carouselMove = settings.carouselMove;
				var cIndex       = pIndex;
				var before       = settings.callbackBefore;
				
				if ($.isFunction(before) && before.call(this) === false) {
					return false;
				}
				
				wrapper.data('cIndex',cIndex);
				
				// reset autoplay timer
				if (wrapper.data('autoPlay')) {
					wrapper.bbslider('pause').bbslider('play');
				}
				
				// check if first / last
				if (carousel) {
					pIndex = cIndex + carouselMove;
					if (pCount < pIndex + carousel + 1) {
						pIndex = pIndex - pCount;
					}
					wrapper.data('pIndex',pIndex);
					wrapper.bbslider('forPage',pIndex);
					
				} else if (pCount > pIndex + 1) { // It is not the last panel, move forward
					pIndex = cIndex + 1;
					
					wrapper.data('pIndex',pIndex);
					
					wrapper.bbslider('forPage',pIndex);
					
				} else if (loop) { // It is last panel, loop to beginning
					pIndex = 0;
					
					wrapper.data('pIndex',pIndex);
					
					if (loopTrans) {
						// use forward animation
						wrapper.bbslider('forPage',pIndex);
					} else {
						// use backward animation
						wrapper.bbslider('backPage',pIndex);
					}
				}
			});
		}, // End next 
		travel : function(xIndex) {
			return this.each(function() {
				var wrapper  = $(this);
				var settings = wrapper.data('settings');
				var pIndex   = wrapper.data('pIndex');
				var pCount   = wrapper.data('pCount');
				var carousel = settings.carousel;
				var before   = settings.callbackBefore;
				var cIndex;
				
				if ($.isFunction(before) && before.call(this) === false) {
					return false;
				}
				
				// reset autoplay timer
				if (wrapper.data('autoPlay')) {
					wrapper.bbslider('pause').bbslider('play');
				}
				
				if (carousel) {
					cIndex = pIndex;
					pIndex = xIndex;
					
					wrapper.data('pIndex',pIndex);
					wrapper.data('cIndex',cIndex);
					
					// get the number of panels that we will have to move
					var low, high;
					if (pIndex > cIndex) {
						low  = pIndex - pCount;
						high = pIndex;
					} else {
						low  = pIndex;
						high = pIndex + pCount;
					}
					
					var array   = [ low, high ];
					var goal    = cIndex;
					var closest = null;
					
					// determine which direction is the shorter distance in the carousel
					$.each(array, function(){
						if (closest === null || Math.abs(this - goal) < Math.abs(closest - goal)) {
							closest = this;
						}
					});
					if (closest > goal) {
						wrapper.bbslider('forPage',pIndex);
					} else {
						wrapper.bbslider('backPage',pIndex);
					}
					
				} else if (pIndex < xIndex) { // New page is after current page, show next animation
					cIndex = pIndex;
					pIndex = xIndex;
					
					wrapper.data('pIndex',pIndex);
					wrapper.data('cIndex',cIndex);
					
					wrapper.bbslider('forPage',pIndex);
				} else if (pIndex > xIndex) { // New page is before current page, show previous animation
					cIndex = pIndex;
					pIndex = xIndex;
					
					wrapper.data('pIndex',pIndex);
					wrapper.data('cIndex',cIndex);
					
					wrapper.bbslider('backPage',pIndex);
				}// End carousel check
				
				
			}); // end each
		}, // End travel 
		backPage : function() {
			return this.each(function() {
				var wrapper       = $(this);
				var panel         = wrapper.children('.panel');
				var settings      = wrapper.data('settings');
				var pIndex        = wrapper.data('pIndex');
				var loop          = settings.loop;
				var transition    = settings.transition;
				var carousel      = settings.carousel;
				var autoHeight    = settings.autoHeight;
				var dynamicHeight = settings.dynamicHeight;
				var css3          = settings.css3;
				var duration      = settings.duration;
				
				// Add active class to panel
				panel.removeClass('active').eq(pIndex).addClass('active');
				
				// Load new image
				if (settings.onDemand) {
					panel.eq(pIndex).bbslider('loadImg');
				} // End onDemand check
				
				// Stop current animations
				wrapper.children('.panel').stop(true,true);
				
				if (carousel) {
					switch (transition) {
						case 'fade':
							wrapper.bbslider('carFade');
							break;
						case 'slide':
							wrapper.bbslider('carSlideBack');
							break;
						case 'none':
						default:
							wrapper.bbslider('carToggle');
					} // End transition switch
					
				} else {
					switch (transition) {
						case 'fade':
							wrapper.bbslider('fade');
							break;
						case 'slide':
							wrapper.bbslider('slideBack');
							break;
						case 'slideVert':
							wrapper.bbslider('slideVertBack');
							break;
						case 'blind':
							wrapper.bbslider('blindBack');
							break;
						/*
						case 'none':
						default:
							wrapper.bbslider('toggle');
						*/
					} // End transition switch
				} // end carousel check
				
				// Check if on first page and hide control
				if (pIndex === 0 && !loop) {
					wrapper.find('.prev-control-wrapper').css('display','none');
				}//  End hide control check
				
				// Display the next control
				wrapper.find('.next-control-wrapper').css('display','block');
				
				// Create page numbers info function
				if (settings.pageInfo) {
					wrapper.bbslider('infoParse');
				} // End infoParse
				

				wrapper.bbslider('pagerUpdate');
				
				// dynamically change height
				if (dynamicHeight && autoHeight) {
					wrapper.bbslider('recalcHeight',false);
				}
				
				// No real "callback" functionality for css3 transitions
				// Plugin animates all panels on transition; no single "complete" check
				// Use settimeout for after callback
				var after = settings.callbackAfter;
				if ($.isFunction(after) && css3) {
					setTimeout(function() {
						after.call(this);
					},duration);
				}
				
			});
		}, // End back page 
		forPage : function() {
			return this.each(function() {
				var wrapper       = $(this);
				var panel         = wrapper.children('.panel');
				var settings      = wrapper.data('settings');
				var pCount        = wrapper.data('pCount');
				var pIndex        = wrapper.data('pIndex');
				var loop          = settings.loop;
				var carousel      = settings.carousel;
				var transition    = settings.transition;
				var autoHeight    = settings.autoHeight;
				var dynamicHeight = settings.dynamicHeight;
				var css3          = settings.css3;
				var duration      = settings.duration;
				
				// Add active class to panel
				panel.removeClass('active').eq(pIndex).addClass('active');
				
				// Load new image
				if (settings.onDemand) {
					panel.eq(pIndex).bbslider('loadImg');
				} // End onDemand check
				
				// Stop current animations
				wrapper.children('.panel').stop(true,true);
				
				if (carousel) {
					switch (transition) {
						case 'fade':
							wrapper.bbslider('carFade');
							break;
						case 'slide':
							wrapper.bbslider('carSlideFor');
							break;
						case 'none':
						default:
							wrapper.bbslider('carToggle');
					} // End transition switch
					
				} else {
					switch (transition) {
						case 'fade':
							wrapper.bbslider('fade');
							break;
						case 'slide':
							wrapper.bbslider('slideFor');
							break;
						case 'slideVert':
							wrapper.bbslider('slideVertFor');
							break;
						case 'blind':
							wrapper.bbslider('blindFor');
							break;
						/*
						case 'none':
						default:
							wrapper.bbslider('toggle');
						*/
					} // End transition switch
				} // end carousel check
				
				// Check if on last page and hide control
				if (pCount <= pIndex + 1 && !loop) {
					wrapper.find('.next-control-wrapper').css('display','none');
				} //  End prev control check
				
				// Display the prev control
				wrapper.find('.prev-control-wrapper').css('display','block');
				
				// Create page numbers info function
				if (settings.pageInfo) {
					wrapper.bbslider('infoParse');
				} // End infoParse
				
				wrapper.bbslider('pagerUpdate');
				
				// dynamically change height
				if (dynamicHeight && autoHeight) {
					wrapper.bbslider('recalcHeight',false);
				}
				
				// No real "callback" functionality for css3 transitions
				// Plugin animates all panels on transition; no single "complete" check
				// Use settimeout for after callback
				var after = settings.callbackAfter;
				if ($.isFunction(after) && css3) {
					setTimeout(function() {
						after.call(this);
					},duration);
				}
				
				
			});
		}, // End forward page 
		carToggle : function() {
			var wrapper   = this;
			var panel     = wrapper.children('.panel');
			var settings  = wrapper.data('settings');
			var pCount    = wrapper.data('pCount');
			var pIndex    = wrapper.data('pIndex');
			// var cIndex    = wrapper.data('cIndex');
			var carousel  = settings.carousel;
			// var css3      = settings.css3;
			var itemWidth = 100 / parseInt(carousel);
			var end       = pIndex + parseInt(carousel);	
			
			// remove all panels
			panel.css('left','100%');
			
			var left = 0;
			// loop through and show multiple slides
			for ( var i = pIndex; i < end; i++ ) {
				var x;
				if (i < pCount) {
					x = i;
				} else {
					// end is higher than number of slides
					// loop back to beginning
					x = i - pCount;
					
				}
				
				panel.eq(x).css('left',left+'%');
				
				left  = left + itemWidth;
			}
			
		}, // End carToggle
		carFade : function() {
			var wrapper   = this;
			var panel     = wrapper.children('.panel');
			var settings  = wrapper.data('settings');
			var pCount    = wrapper.data('pCount');
			var pIndex    = wrapper.data('pIndex');
			// var cIndex    = wrapper.data('cIndex');
			var duration  = settings.duration;
			var easing    = settings.easing;
			var carousel  = settings.carousel;
			var css3      = settings.css3;
			var itemWidth = 100 / parseInt(carousel);
			var end       = pIndex + parseInt(carousel);	
			
			// console.log(pIndex);
			if (css3) {
								
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				// hide panels
				panel.removeClass('init').css('opacity',0);
				
				// reset active slide
				resetSlides = function() {
					// remove all panels
					panel.addClass('init').css('left','100%');
					panel.css('display');
					
					var start = 0;
					// loop through and show multiple slides
					for ( var i = pIndex; i < end; i++ ) {
						var x;
						if (i < pCount) {
							x = i;
						} else {
							// end is higher than number of slides
							// loop back to beginning
							x = i - pCount;
							
						}
						
						// hide panels
						panel.eq(x).css('left',start+'%');
						panel.eq(x).css('display');
						panel.eq(x).removeClass('init').css('opacity',1);
						
						start = start + itemWidth;
					}
				
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
				
			} else { // no css3, use jQuery
				
				panel.stop(true,true).animate({
					opacity: 0
				},duration,easing,function() {
					var start = 0;
					// loop through and show multiple slides
					for ( var i = pIndex; i < end; i++ ) {
						var x;
						if (i < pCount) {
							x = i;
						} else {
							// end is higher than number of slides
							// loop back to beginning
							x = i - pCount;
							
						}
						
						panel.eq(x).css('left',start+'%').animate({
							opacity: 1
						},duration,easing);
						
						start = start + itemWidth;
					}
				});
				
			} // end css3 check
			
		}, // End carFade
		carSlideFor : function() {
			var wrapper      = this;
			var panel        = wrapper.children('.panel');
			var settings     = wrapper.data('settings');
			var pIndex       = wrapper.data('pIndex');
			var cIndex       = wrapper.data('cIndex');
			var pCount       = wrapper.data('pCount');
			// var easing       = settings.easing;
			var duration     = settings.duration;
			var carousel     = settings.carousel;
			var css3         = settings.css3;
			var slideSkip    = pIndex - cIndex;
			var itemWidth    = 100 / parseInt(carousel);
			var movement     = itemWidth * slideSkip;
			var end          = pIndex + parseInt(carousel);	
			var start, left, x, i;
			
			// check if end slide is before current slide
			// extend the end to loop all slides
			if (pIndex < cIndex) {
				slideSkip = pIndex - cIndex + pCount;
				movement  = itemWidth * slideSkip;
				end       = end + pCount;
			}
			// console.log(pIndex);
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				start = 0;
				left  = start - movement;
				
				// loop through and show multiple slides
				for ( i = cIndex; i < end; i++ ) {
					if (i < pCount) {
						x = i;
					} else {
						// end is higher than number of slides
						// loop back to beginning
						x = i - pCount;
						
					}
					
					panel.eq(x).css('left',start+'%');
					panel.eq(x).css('display');
					panel.eq(x).removeClass('init').css('left',left+'%');
					
					start = start + itemWidth;
					left  = left + itemWidth;
				}
				
				
				// reset active slide
				resetSlides = function() {
					
					
				panel.addClass('init');
				resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
				
				start = 0;
				left  = start - movement;
				
				// loop through and show multiple slides
				for ( i = cIndex; i < end; i++ ) {
					if (i < pCount) {
						x = i;
					} else {
						// end is higher than number of slides
						// loop back to beginning
						x = i - pCount;
						
					}
					
					panel.eq(x).css('left',start+'%').animate({
						left: left+'%'
					});
					
					start = start + itemWidth;
					left  = left + itemWidth;
				}
			} // end css3 check
			
		}, // End carSlideFor
		carSlideBack : function() {
			var wrapper      = this;
			var panel        = wrapper.children('.panel');
			var settings     = wrapper.data('settings');
			var pCount       = wrapper.data('pCount');
			var pIndex       = wrapper.data('pIndex');
			var cIndex       = wrapper.data('cIndex');
			// var easing       = settings.easing;
			var duration     = settings.duration;
			var carousel     = settings.carousel;
			var css3         = settings.css3;
			var itemWidth    = 100 / parseInt(carousel);
			var slideSkip    = cIndex - pIndex;
			var movement     = itemWidth * slideSkip;
			var end          = cIndex + carousel;
			var start, left, x, i;
			//alert(end);
			
			
			// check if target slide is after last slide
			// loop back to end
			if (slideSkip < 0) {
				slideSkip = slideSkip + pCount;
				movement  = itemWidth * slideSkip;
				end       = end + pCount;
			}
			//console.log(movement);
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				start = 0 - movement;
				left  = 0;
				// loop through and show multiple slides
				for ( i = pIndex; i < end; i++ ) {
					if (i < pCount) {
						x = i;
					} else {
						// target is before first slide
						// loop back to end
						x = i - pCount;
						
					}
					//console.log(start);
					panel.eq(x).addClass('init').css('left',start+'%');
					panel.eq(x).css('display');
					panel.eq(x).removeClass('init').css('left',left+'%');
					
					left  = left + itemWidth;
					start = start + itemWidth;
				}
				
				
				// reset active slide
				resetSlides = function() {
					
					panel.addClass('init');
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
				
				start = 0 - movement;
				left  = 0;
				// loop through and show multiple slides
				for ( i = pIndex; i < end; i++ ) {
					if (i < pCount) {
						x = i;
					} else {
						// end is higher than number of slides
						// loop back to beginning
						x = i - pCount;
						
					}
					
					panel.eq(x).css('left',start+'%').animate({
						left: left+'%'
					});
					
					left  = left + itemWidth;
					start = start + itemWidth;
				}
			} // end css3 check
			
		}, // End carSlideBack
		/*
		toggle : function() {
			var wrapper  = this;
			var settings = wrapper.data('settings');
			var pIndex   = wrapper.data('pIndex');
			var cIndex   = wrapper.data('cIndex');
			var panel    = wrapper.children('.panel');
			var css3     = settings.css3;
			
			if (!css3) {
				
				// Remove current page
				panel.eq(cIndex).hide();
							
				// display new page
				panel.eq(pIndex).show();
			}
					
		}, // End toggle
		*/
		fade : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				// Remove current page
				panel.eq(cIndex).css('display');
				panel.eq(cIndex).removeClass('init').css('opacity',0);
				
				// display the page
				panel.eq(pIndex).show();
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css('opacity',1); 
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).css('display');
					panel.eq(cIndex).addClass('init').hide();
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
				
			} else {
				// Remove current page
				panel.eq(cIndex).fadeOut(duration, easing);
				
				// display the page
				panel.eq(pIndex).fadeIn(duration, easing); 
			} // end css3 check

		}, // End fade
		blindFor : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var pWrap    = panel.children('.panel-inner');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var width    = wrapper.width();
			var css3     = settings.css3;
			
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// setup current page
				panel.eq(cIndex).css({
					left:0,
					right:''
				});
			
				// Remove current page
				panel.eq(cIndex).css('display');
				panel.eq(cIndex).removeClass('init').css({
					width: 0
				}); // End animation
				
				// move new page into position
				// panel.eq(pIndex).css('display');
				panel.eq(pIndex).addClass('init').css({
					marginLeft:'',
					left:'',
					right:0
				});
				pWrap.eq(pIndex).css('display');
				pWrap.eq(pIndex).css({
					marginLeft:-(width)
				});
				
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					width:'100%'
				}); // End animation
				
				pWrap.eq(pIndex).css('display');
				pWrap.eq(pIndex).css({
					marginLeft:0
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init').css({
						marginLeft:'',
						right: '',
						left: '',
						width:'100%'
					});
					pWrap.eq(pIndex).css({
						marginLeft:0
					}); // End animation
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
			
				// Remove all animation queues
				pWrap.stop(true,true);
				panel.stop(true,true);
				
				// Remove current page
				panel.eq(cIndex).css({
					left:0,
					right:''
				}).animate({
					width: 0
				}, duration, easing); // End animation
				
				// display the page
				panel.eq(pIndex).css({
					marginLeft:'',
					left:'',
					right:0
				}).animate({
					width:'100%'
				}, duration, easing); // End animation
				
				pWrap.eq(pIndex).css({
					marginLeft:-(width)
				}).animate({
					marginLeft:0
				}, duration, easing); // End animation
			} // end css3 check
			
		}, // End blindFor
		blindBack : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var pWrap    = panel.children('.panel-inner');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var width    = wrapper.width();
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// setup current page
				panel.eq(cIndex).addClass('init').css({
					left:'',
					right:0
				});
				
				pWrap.eq(cIndex).css('display');
				pWrap.eq(cIndex).css({
					marginLeft:''
				});
				
			
				// Remove current page
				panel.eq(cIndex).css('display');
				panel.eq(cIndex).removeClass('init').css({
					width: 0
				});
				
				pWrap.eq(cIndex).css('display');
				pWrap.eq(cIndex).css({
					marginLeft:-(width)
				});
				
				// move new page into position
				// panel.eq(pIndex).css('display');
				panel.eq(pIndex).addClass('init').css({
					left:0,
					right:''
				});
				pWrap.eq(pIndex).css('display');
				pWrap.eq(pIndex).css({
					marginLeft:0
				}); // End animation
				
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					width:'100%'
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init').css({
						marginLeft:'',
						right: '',
						left: '',
						width:'100%'
					});
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
			
				
				// Remove all animation queues
				pWrap.stop(true,true);
				panel.stop(true,true);
				
				// Remove current page
				panel.eq(cIndex).css({
					left:'',
					right:0
				}).animate({
					width:0
				}, duration, easing); // End animation
				pWrap.eq(cIndex).css({
					marginLeft:''
				}).animate({
					marginLeft:-(width)
				}, duration, easing); // End animation
				
				// display the page
				panel.eq(pIndex).css({
					left:0,
					right:''
				}).animate({
					width:'100%'
				}, duration, easing); // End animation
				
				pWrap.eq(pIndex).css({
					marginLeft:''
				}); // End animation
			} // end css3 check
		}, // End blindBack
		slideFor : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// Remove current page
				// panel.eq(cIndex).css('display');
				panel.eq(cIndex).removeClass('init').css({
					left: '-100%'
				}); // End animation
				
				// move new page into position
				// panel.eq(pIndex).css('display');
				panel.eq(pIndex).css({
					left: '',
					right:'-100%'
				});
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					right: 0
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init').css({
						right: '',
						left: 0
					});
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
				// Remove current page
				panel.eq(cIndex).animate({
					left: '-100%',
					right: ''
				}, duration, easing); // End animation
				
				// display new page
				panel.eq(pIndex).show().css({
					left: '',
					right:'-100%'
				}).animate({
					right: 0
				}, duration, easing); // End animation
			} // end css3 check
			
		}, // End slideFor
		slideBack : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// Remove current page
				panel.eq(cIndex).removeClass('init').css({
					left: '100%'
				}); // End animation
				
				// reset past slide
				
				// move new page into position
				panel.eq(pIndex).addClass('init').css({
					right: '',
					left:'-100%'
				});
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					left: 0
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init');
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
				
			} else { // no css3, use jQuery
				// Remove current page
				panel.eq(cIndex).animate(
					{
						left: '100%'
					}, duration, easing
				); // End animation
				
				// display the page
				panel.eq(pIndex).show().css({
					right: '',
					left:'-100%'
				}).animate({
					left: 0
				}, duration, easing); // End animation
						
			} // end css3 check
		}, // End slideBack
		slideVertFor : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// Remove current page
				// panel.eq(cIndex).css('display');
				panel.eq(cIndex).removeClass('init').css({
					top: '-100%'
				}); // End animation
				
				// move new page into position
				// panel.eq(pIndex).css('display');
				panel.eq(pIndex).css({
					top: '100%'
				});
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					top: 0
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init').css({
						top: 0
					});
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
			} else { // no css3, use jQuery
				// Remove all animation queues
				panel.stop(true,true);
				// Remove current page
				panel.eq(cIndex).css({
					top:0
				}).animate({
					top: '-100%'
				}, duration, easing, function() {
					$(this).hide();
				}); // End animation
				
				// display the page
				panel.eq(pIndex).show().css({
					top: '100%'
				}).animate({
					top: 0
				}, duration, easing); // End animation
				
			} // end css3 check
		}, // End slideVertFor
		slideVertBack : function() {
			var wrapper  = this;
			var panel    = wrapper.children('.panel');
			// var pWrap    = panel.children('.panel-inner');
			var settings = wrapper.data('settings');
			var cIndex   = wrapper.data('cIndex');
			var pIndex   = wrapper.data('pIndex');
			var easing   = settings.easing;
			var duration = settings.duration;
			var css3     = settings.css3;
			
			if (css3) {
				
				var resetSlides  = wrapper.data('resetSlides');
				var resetTimeout = wrapper.data('resetTimeout');
				
				if (resetTimeout) {
					resetSlides();
					clearTimeout(resetTimeout);
				}
				
				panel.eq(pIndex).css('display');
				
				// Remove current page
				panel.eq(cIndex).removeClass('init').css({
					top: '100%'
				}); // End animation
				
				// reset past slide
				
				// move new page into position
				panel.eq(pIndex).addClass('init').css({
					top: '-100%'
				});
				
				// transition new page
				panel.eq(pIndex).css('display');
				panel.eq(pIndex).removeClass('init').css({
					top: 0
				}); // End animation
				
				// reset active slide
				resetSlides = function() {
					panel.eq(cIndex).addClass('init');
					panel.eq(pIndex).addClass('init');
					
					resetTimeout = false;
				};
				resetTimeout = setTimeout(resetSlides,duration);
				
				wrapper.data({
					resetSlides:  resetSlides,
					resetTimeout: resetTimeout
				});
				
				
			} else { // no css3, use jQuery
				
				// Remove all animation queues
				panel.stop(true,true);
				
				// Remove current page
				panel.eq(cIndex).css({
					top:0
				}).animate({
					top: '100%'
				}, duration, easing, function() {
					$(this).hide();
				}); // End animation
				
				// display the page
				panel.eq(pIndex).show().css({
					top: '-100%'
				}).animate({
					top: 0
				}, duration, easing); // End animation
			} // end css3 check
			
		} // End slideVertVack
	}; // End method
    
	
	$.fn.bbslider = function(method) {
		
		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.bbslider' );
		}		
		
	}; // End slider
	
	$('.bb-pager-link').bbslider('bindpager'); 
	
})(jQuery); 

