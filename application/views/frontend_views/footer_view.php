  <footer class="mastfoot">
      <a id="foot-logo" href="#"><img  alt="EDUPUBLIC" title="EDUPUBLIC" src="{base}images/logo.png"/></a>
      <p class="add-top-half">Copyright &copy; 2013 EDUPUBLIC.</p>
  </footer>
	
	


	<!-- JS
	================================================== -->
	<script src="{base}assets/javascripts/jquery-1.7.2.min.js"></script>
	<script src="{base}assets/js/bootstrap-transition.js"></script>
    <script src="{base}assets/js/bootstrap-alert.js"></script>
    <script src="{base}assets/js/bootstrap-modal.js"></script>
    <script src="{base}assets/js/bootstrap-dropdown.js"></script>
    <script src="{base}assets/js/bootstrap-scrollspy.js"></script>
    <script src="{base}assets/js/bootstrap-tab.js"></script>
    <script src="{base}assets/js/bootstrap-tooltip.js"></script>
    <script src="{base}assets/js/bootstrap-popover.js"></script>
    <script src="{base}assets/js/bootstrap-button.js"></script>
    <script src="{base}assets/js/bootstrap-collapse.js"></script>
    <script src="{base}assets/js/bootstrap-carousel.js"></script>
    <script src="{base}assets/js/bootstrap-typeahead.js"></script>
    <script src="{base}assets/js/bootstrap-affix.js"></script>
  	<script src="{base}javascripts/jquery.localscroll-1.2.7-min.js"></script>
  	<script src="{base}javascripts/jquery.scrollTo-1.4.2-min.js"></script>
    <script src="{base}javascripts/jquery.prettyPhoto.js"></script> 
	  <script src="{base}javascripts/jquery.easing.1.3.js"></script>
    <script src="{base}javascripts/jquery.isotope.min.js"></script>
    <script src="{base}javascripts/fake-element.js"></script>
    <script src="{base}javascripts/form-validation.js"></script>
    <script src="{base}javascripts/waypoints.min.js"></script>
  	<script src="{base}javascripts/scroll.js"></script>

    <!--
    <script src="javascripts/raphael.js"></script>
    <script src="javascripts/skill-diagram.js"></script>
-->
  <script src="javascripts/jquery.nivo.slider.js"></script>
  <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
  </script>


    <!-- jQuery KenBurn Slider  -->
  <script type="text/javascript" src="javascripts/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="javascripts/jquery.themepunch.revolution.min.js"></script>

  	<!-- Mobile Navigation Scroll Setup -->
	<script type="text/javascript">
    	function moveTo(contentArea){
        	var goPosition = $(contentArea).offset().top;
        	$('html,body').animate({ scrollTop: goPosition}, 'slow');
        }
    </script>


	<!-- Sticky nav -->
	<script>

  $(document).ready(function() {

if ($.fn.cssOriginal!=undefined)
  $.fn.css = $.fn.cssOriginal;

  $('.fullwidthbanner').revolution(
    {
      delay:5000,
      startwidth:960,
      startheight:500,

      onHoverStop:"off",            // Stop Banner Timet at Hover on Slide on/off

      thumbWidth:100,             // Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
      thumbHeight:50,
      thumbAmount:3,

      hideThumbs:0,
      navigationType:"bullet",          //bullet, thumb, none, both  (No Shadow in Fullwidth Version !)
      navigationArrows:"verticalcentered",    //nexttobullets, verticalcentered, none
      navigationStyle:"round",        //round,square,navbar

      touchenabled:"on",            // Enable Swipe Function : on/off

      navOffsetHorizontal:0,
      navOffsetVertical:20,

      stopAtSlide:-1,             // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
      stopAfterLoops:-1,            // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic



      fullWidth:"on",

      shadow:0                //0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

    });

    
    
    


});



	$(document).ready(function(){

      //NAVIGATION MENU COLOR CHANGE ON CLILCK
      $('.desktop-nav a').click(function(){
        var colIndex = $(this).attr('title');
        $('.desktop-nav a').addClass('def-link');
        $(this).removeClass('def-link');
        $(this).addClass(colIndex+'-link');
      })

  	
			//PORTFOLIO IMAGE HOVER
			$('.element').mouseenter(function(){
				$(this).find('img').stop().animate({opacity:'0'},'slow')
				$(this).find('.gallery-caps').stop().animate({opacity:'1'},'slow')
			})

			$('.element').mouseleave(function(){
				$('.element').find('.gallery-caps').stop().animate({opacity:'0'},'slow')
				$('.element').find('img').stop().animate({opacity:'1'},'slow')
			})

			//PORTFOLIO FILTER ON CLICK
			$('.inner-link').find('a').click(function(){
				$('.inner-link').find('a').removeClass('.selected');
				$(this).addClass('.selected');
			})

			//Services More Content triggering
			$('.services-more').click(function(){
				var servIndex = $(this).attr('data-services');
				//alert(servIndex);
				$('#'+servIndex+'-content').slideToggle();
			})

		});
	</script>
	
	<script>

// Initialize prettyPhoto plugin
	$(".portfolio a[data-gal^='prettyPhoto']").prettyPhoto({
		theme:'light_square', 
		autoplay_slideshow: false, 
		overlay_gallery: false, 
		show_title: true
	});


  
		
//MASONRY PORTFOLIO INIT:
    $(function(){
      
      var $container = $('#container');

      $container.isotope({
        itemSelector : '.element',
        layoutMode : 'masonry' 
      });
      
      
      var $optionSets = $('#options .option-set'),
          $optionLinks = $optionSets.find('a');

      $optionLinks.click(function(){
        var $this = $(this);
        // don't proceed if already selected
        if ( $this.hasClass('selected') ) {
          return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
  
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
          // changes in layout modes need extra logic
          changeLayoutMode( $this, options )
        } else {
          // creativewise, apply new options
          $container.isotope( options );
        }
        
        return false;
      });

      
    });
  </script>	

<!-- End Document
================================================== -->