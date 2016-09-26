<?php
global $onetone_animated;
 $i                   = 4 ;
 $section_title       = onetone_option( 'section_title_'.$i );
 $section_menu        = onetone_option( 'menu_title_'.$i );
 $parallax_scrolling  = onetone_option( 'parallax_scrolling_'.$i );
 $section_css_class   = onetone_option( 'section_css_class_'.$i );
 $section_content     = onetone_option( 'section_content_'.$i );
 $full_width          = onetone_option( 'full_width_'.$i );
 
 $content_model       = onetone_option( 'section_content_model_'.$i,1);
 $section_subtitle    = onetone_option( 'section_subtitle_'.$i );
 $color               = onetone_option( 'section_color_'.$i );
 $columns             = absint(onetone_option('section_team_columns',4));
 $col                 = $columns>0?12/$columns:3;
 
	
  if( !isset($section_content) || $section_content=="" ) 
  $section_content = onetone_option( 'sction_content_'.$i );
  
  $section_id      = sanitize_title( onetone_option( 'menu_slug_'.$i ,'section-'.($i+1) ) );
  if( $section_id == '' )
  $section_id      = 'section-'.($i+1);
  
  $container_class = "container";
  if( $full_width == "yes" ){
  $container_class = "";
  }
  
  if( $parallax_scrolling == "yes" || $parallax_scrolling == "1" ){
	 $section_css_class  .= ' onetone-parallax';
  }
  
?>
<section id="<?php echo $section_id; ?>" class="home-section-<?php echo ($i+1); ?> <?php echo $section_css_class;?>">
    <div class="home-container <?php echo $container_class; ?> page_container">
		 <?php
		if( $content_model == '0' ):
		?>
        <div style="color:<?php echo $color; ?>;">
         <?php if( $section_title != '' ):?>
       		<?php  

		   $section_title_class = '';

		   if( $section_subtitle == '' )

		   $section_title_class = 'no-subtitle';

		?>

       <h1 class="section-title <?php echo $section_title_class; ?>"><?php echo $section_title; ?></h1>
        <?php endif;?>
        <?php if( $section_subtitle != '' ):?>
        <div class="section-subtitle"><?php echo do_shortcode($section_subtitle);?></div>
         <?php endif;?>
         
        <?php
	 $team_item = '';
	 $team_str  = '';
	 for( $j=0; $j<28; $j++ ){
	   
	  $avatar      =  esc_url(onetone_option('section_avatar_'.$i.'_'.$j));
	  $link        =  esc_url(onetone_option('section_link_'.$i.'_'.$j));
	  $name        =  esc_attr(onetone_option('section_name_'.$i.'_'.$j));
	  $byline      =  esc_attr(onetone_option('section_byline_'.$i.'_'.$j));
	  $description = onetone_option('section_desc_'.$i.'_'.$j);
	 
	  
	  if( $avatar != '' ):
      if( $link!='' )
	  $image = '<a href="'.$link.'" target="_blank"><img src="'.$avatar.'" alt="'.$name.'" style="border-radius: 0; display: inline-block;border-style: solid;" />
        <div class="img-overlay primary">
          <div class="img-overlay-container" style="display:block; padding-top:20%">
          	<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">'.$name.'</h3>
          	<div class="img-overlay-content" style="display:block"><i class="fa fa-download"></i></div>	
          </div>
        </div>
        </a>';
		else
		$image = '<img src="'.$avatar.'" alt="" />';
	 $icons = '';
	for( $k=0;$k<4;$k++){
		$icon = str_replace('fa-','',esc_attr(onetone_option('section_icon_'.$i.'_'.$j.'_'.$k)));
		$link = esc_url(onetone_option('section_icon_link_'.$i.'_'.$j.'_'.$k));
		if( $icon != '' ){
		$icons .= '<li><a href="'.$link.'"><i class="fa fa-'.$icon.'"></i></a></li>';
		}
		}
	
	  $team_item .= '<div class="col-md-'.$col.'">
	  <div class="'.$onetone_animated.'" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no">
						<div class="magee-person-box" id="">
						  <div class="person-img-box">
							<div class="img-box figcaption-middle text-center fade-in">'.$image.'</div>
						  </div>
						  <div class="person-vcard text-center">
							<h3 class="person-name" style="text-transform: uppercase;">'.$name.'</h3>
							<h4 class="person-title" style="text-transform: uppercase;">'.$byline.'</h4>
							<p class="person-desc">'.do_shortcode($description).'</p>
							<ul class="person-social">
							 '.$icons.'
							</ul>
						  </div>
						</div>
						</div>
					  </div>';
	  $m = $j+1;
	  if( $m % $columns == 0 ){
	        $team_str .= '<div class="row">'.$team_item.'</div>';
	        $team_item = '';
	   }
	   endif;
	   
	 }
	 if( $team_item != '' ){
		    $team_str .= '<div class="row">'.$team_item.'</div>';
	      
		   }
		
	 echo $team_str;
	?>
    </div>
           <?php
		else:
		?>
            <?php if( $section_title != '' ):?>
        <div class="section-title"><?php echo do_shortcode($section_title);?></div>
        <?php endif;?>
            <div class="home-section-content">
            <?php 
			if(function_exists('Form_maker_fornt_end_main'))
             {
                 $section_content = Form_maker_fornt_end_main($section_content);
              }
			 echo do_shortcode($section_content);
			?>
            </div>
             <?php 
		endif;
		?>
<!-- <hr> -->

<div class="section-subtitle">Hello all Employee Transportation Coordinators! Please find the downloadable media files below for your campaign.</div>

<!-- PLEDGE FORMS START -->

[ms_accordion style="boxed" type="1"  class="pledgeAccordion" id=""]
[ms_accordion_item title="PLEDGE FORMS" color="#e2e2e2" background_color="rgba(3, 52, 102, 0.5)" close_icon="" open_icon="" status="close"]	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Ride-Week-Pledge-Form-English-9_26.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Ride-Week-Pledge-Form-English-9_26_thumb.jpg" alt="Rideweek Pledge Form English" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Pledge Form English</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Pledge Form English</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Ride-Week-Pledge-Form-Spanish-9_26-1.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Ride-Week-Pledge-Form-Spanish-9_26_thumb.jpg" alt="Rideweek Pledge Form Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Pledge Form Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>
[/ms_accordion_item]
[/ms_accordion]

<!-- PLEDGE FORMS END -->

<hr />

<!-- EMAILS START -->

[ms_accordion style="boxed" type="1"  class="emailAccordion" id=""]
[ms_accordion_item title="EMAILS" color="#e2e2e2" background_color="rgba(3, 52, 102, 0.5)" close_icon="" open_icon="" status="close"]    

	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/RideWeek-Employee-Email-English.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/RideWeek-Employee-Email-English_thumb.jpg" alt="RideWeek Employee Email - English" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">RideWeek Employee Email - English</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">RideWeek Employee Email - English</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideweek-Employee-Email-Spanish.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideweek-Employee-Email-Spanish_thumb.jpg" alt="Rideweek Pledge Form Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Employee Email - Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Employee Email - Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

[/ms_accordion_item]
[/ms_accordion]

<!-- EMAILS END -->

<hr />

<!-- FLYERS START -->

[ms_accordion style="boxed" type="1"  class="flyersAccordion" id=""]
[ms_accordion_item title="FLYERS" color="#e2e2e2" background_color="rgba(3, 52, 102, 0.5)" close_icon="" open_icon="" status="close"]    

	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-F_thumb.jpg" alt="Rideweek Flyer - Carpool" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Carpool</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Carpool</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Bike-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Bike-F_thumb.jpg" alt="Rideweek Flyer - Bike" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bike</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bike</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Walk-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Walk-F_thumb.jpg" alt="Rideweek Flyer Walk" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer Walk</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer Walk</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Bus-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Bus-F_thumb.jpg" alt="Rideweek Flyer - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bus</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bus</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-Spanish_F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-Spanish_F_thumb.jpg" alt="Rideweek Flyer - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bike_thumb.jpg" alt="Rideweek Flyer - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Walk_thumb.jpg" alt="Rideweek Flyer - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bus_thumb.jpg" alt="Rideweek Flyer - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

[/ms_accordion_item]
[/ms_accordion]

<!-- FLYERS END -->

<hr />

<!-- POSTERS START -->

[ms_accordion style="boxed" type="1"  class="postersAccordion" id=""]
[ms_accordion_item title="POSTERS" color="#e2e2e2" background_color="rgba(3, 52, 102, 0.5)" close_icon="" open_icon="" status="close"]    

	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-F_thumb.jpg" alt="Rideweek Poster - Carpool" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Carpool</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Carpool</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bike-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bike-F_thumb.jpg" alt="Rideweek Poster - Bike" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bike</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bike</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Walk-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Walk-F_thumb.jpg" alt="Rideweek Poster - Walk" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Walk</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Walk</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bus-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bus-F_thumb.jpg" alt="Rideweek Poster - Bus" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bus</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bus</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-Spanish-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-Spanish-F_thumb.jpg" alt="Rideweek Poster - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bike_thumb.jpg" alt="Rideweek Poster - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Walk_thumb.jpg" alt="Rideweek Poster - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bus_thumb.jpg" alt="Rideweek Poster - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

[/ms_accordion_item]
[/ms_accordion]

<!-- POSTERS END -->

<hr />

<!-- INSTAGRAM START -->

[ms_accordion style="boxed" type="1"  class="instagramAccordion" id=""]
[ms_accordion_item title="INSTAGRAM GRAPHICS" color="#e2e2e2" background_color="rgba(3, 52, 102, 0.5)" close_icon="" open_icon="" status="close"]    

<!-- ENGLISH INSTAGRAM GRAPHICS START -->

    <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/RideWeek-Insta-8_18.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/RideWeek-Insta-8_18.jpg" alt="Rideweek Instagram Graphic - Carpool" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Carpool</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Carpool</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bike.jpg" alt="Rideweek Instagram Graphics - Bike" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphics - Bike</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphics - Bike</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Walk.jpg" alt="Rideweek Instagram Graphic - Walk" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Walk</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Walk</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bus.jpg" alt="Rideweek Instagram Graphic - Bus" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bus</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bus</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

<!-- ENGLISH INSTAGRAM GRAPHICS END -->

<!-- SPANISH INSTAGRAM GRAPHICS -->

    <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Spanish-Rideshare-Insta.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Spanish-Rideshare-Insta_thumb.jpg" alt="Rideweek Instagram Graphic - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bike.jpg" alt="Rideweek Instagram Graphic - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Walk.jpg" alt="Rideweek Instagram Graphic - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bus.jpg" alt="Rideweek Instagram Graphic - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color:#e2e2e2">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div>

<!-- SPANISH INSTAGRAM END -->

[/ms_accordion_item]
[/ms_accordion]

<!-- INSTAGRAM END -->

<hr />


<!-- SPANISH FLYERS -->

<!--     <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-Spanish_F-1.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Flyer-Spanish_F_thumb.jpg" alt="Rideweek Flyer - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bike_thumb.jpg" alt="Rideweek Flyer - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Walk_thumb.jpg" alt="Rideweek Flyer - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Flyer-Spanish_F-Bus_thumb.jpg" alt="Rideweek Flyer - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Flyer - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Flyer - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">8.5 x 11 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div> -->

<!-- SPANISH FLYERS END -->	
<!-- <hr> -->
<!-- ENGLISH POSTERS -->

<!--     <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-F_thumb.jpg" alt="Rideweek Poster - Carpool" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Ridewek Poster - Carpool</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Carpool</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bike-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bike-F_thumb.jpg" alt="Rideweek Poster - Bike" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bike</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bike</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Walk-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Walk-F_thumb.jpg" alt="Rideweek Poster - Walk" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Walk</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Walk</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bus-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Bus-F_thumb.jpg" alt="Rideweek Poster - Bus" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bus</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bus</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div> -->

<!-- ENGLSIH POSTERS END -->	

<!-- SPANISH POSTERS -->

<!-- 	<div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-Spanish-F.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Rideshare-Makesiteasy-Poster-Spanish-F_thumb.jpg" alt="Rideweek Poster - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bike_thumb.jpg" alt="Rideweek Poster - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Walk_thumb.jpg" alt="Rideweek Poster - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Makesiteasy-Poster-Spanish-F-Bus_thumb.jpg" alt="Rideweek Poster - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Poster - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Poster - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">11 x 17 - Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div> -->

<!-- SPANISH POSTERS END -->
<!-- <hr> -->
<!-- ENGLISH INSTAGRAM GRAPHICS -->

<!--     <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/RideWeek-Insta-8_18.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/RideWeek-Insta-8_18.jpg" alt="Rideweek Instagram Graphic - Carpool" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Carpool</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Carpool</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bike.jpg" alt="Rideweek Instagram Graphics - Bike" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphics - Bike</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphics - Bike</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Walk.jpg" alt="Rideweek Instagram Graphic - Walk" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Walk</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Walk</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideshare-Insta-English-Bus.jpg" alt="Rideweek Instagram Graphic - Bus" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bus</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bus</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div> -->

<!-- ENGLISH INSTAGRAM GRAPHICS END -->

<!-- SPANISH INSTAGRAM GRAPHICS -->

<!--     <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Spanish-Rideshare-Insta.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Spanish-Rideshare-Insta_thumb.jpg" alt="Rideweek Instagram Graphic - Carpool Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Carpool Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Carpool Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bike.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bike.jpg" alt="Rideweek Instagram Graphic - Bike Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bike Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bike Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Walk.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Walk.jpg" alt="Rideweek Instagram Graphic - Walk Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Walk Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Walk Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bus.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Spanish-Rideshare-Insta-Bus.jpg" alt="Rideweek Instagram Graphic - Bus Español" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Instagram Graphic - Bus Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center" style="color: #033466">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Instagram Graphic - Bus Español</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>

	</div> -->

<!-- SPANISH INSTAGRAM GRAPHICS END -->
<!-- <hr> -->
<!-- PLEDGE FORMS -->

<!--     <div class="row">
	
		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Ride-Week-Pledge-Form-English-1.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Ride-Week-Pledge-Form-English_thumb.jpg" alt="Rideweek Pledge Form" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Pledge Form</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Pledge Form</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/08/Ride-Week-Pledge-Form-Spanish.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/08/Ride-Week-Pledge-Form-Spanish_thumb.jpg" alt="Rideweek Pledge Form Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Pledge Form Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Pledge Form</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div> -->

<!-- PLEDGE FORMS END -->

<!-- EMPLOYEE EMAILS FORMS -->
	
<!-- 		<div class="col-md-3">
			<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/RideWeek-Employee-Email-English.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/RideWeek-Employee-Email-English_thumb.jpg" alt="Rideweek Employee Email" style="border-radius: 0px; display: inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Employee Email - English</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Employee Email</h3>
						<h4 class="person-title" style="text-transform: uppercase;">English Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-md-3">
		  	<div class="magee-animated animated fadeInDown" data-animationduration="0.9" data-animationtype="fadeInDown" data-imageanimation="no" style="visibility: visible; animation-duration: 0.9s;">
				<div class="magee-person-box" id="">
					<div class="person-img-box">
						<div class="img-box figcaption-middle text-center fade-in">
							<a href="http://rideweek.org/wp-content/uploads/2016/09/Rideweek-Employee-Email-Spanish.pdf" target="_blank">
								<img src="http://rideweek.org/wp-content/uploads/2016/09/Rideweek-Employee-Email-Spanish_thumb.jpg" alt="Rideweek Pledge Form Español" style="border-radius: 0px; display:inline-block; border-style: solid; visibility: visible;">
    	    					<div class="img-overlay primary">
    	      						<div class="img-overlay-container" style="display:block; padding-top:20%">
    	      							<h3 class="img-overlay-content" style="text-transform: uppercase; display:block; color:white">Rideweek Employee Email - Español</h3>
    	      							<div class="img-overlay-content" style="display:block"><i class="fa fa-download" style="visibility: visible;"></i></div>	
    	      						</div>
    	    					</div>
    	    				</a>
    	    			</div>
					</div>
					<div class="person-vcard text-center">
						<h3 class="person-name" style="text-transform: uppercase;">Rideweek Employee Email</h3>
						<h4 class="person-title" style="text-transform: uppercase;">Spanish Version</h4>
						<p class="person-desc"></p>
						<ul class="person-social"></ul>
					</div>
				</div>
			</div>
		</div>
	</div> -->

<!-- EMPLOYEE EMAILS END -->

  </div>


  <div class="clear"></div>

</section>