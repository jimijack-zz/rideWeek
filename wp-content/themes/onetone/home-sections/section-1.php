<?php
 global $onetone_animated;
 $i                   = 0 ;
 $section_title       = onetone_option( 'section_title_'.$i );
 
 $section_menu        = onetone_option( 'menu_title_'.$i );
 $parallax_scrolling  = onetone_option( 'parallax_scrolling_'.$i );
 $section_css_class   = onetone_option( 'section_css_class_'.$i );
 $section_content     = onetone_option( 'section_content_'.$i );
 $full_width          = onetone_option( 'full_width_'.$i );
 
 $content_model       = onetone_option( 'section_content_model_'.$i,1);
 $section_subtitle    = onetone_option( 'section_subtitle_'.$i );
 $btn_text    = onetone_option( 'section_btn_text_'.$i );
 $btn_link    = onetone_option( 'section_btn_link_'.$i );
 $btn_target  = onetone_option( 'section_btn_target_'.$i );
 $icons       = onetone_option( 'section_icons_'.$i );
 $color       = onetone_option( 'section_color_'.$i );
 
  if( !isset($section_content) || $section_content=="" ) 
  $section_content = onetone_option( 'sction_content_'.$i );
  
  $section_id      = sanitize_title( onetone_option( 'menu_slug_'.$i ,'section-'.($i+1) ) );
  if( $section_id == '' )
   $section_id = 'section-'.($i+1);
  
  $container_class = "container";
  if( $full_width == "yes" ){
  $container_class = "";
  }
  
  if( $parallax_scrolling == "yes" || $parallax_scrolling == "1" ){
	 $section_css_class  .= ' onetone-parallax';
  }
  
  if( $content_model == '0' ){
	  $section_css_class .= ' fullheight verticalmiddle';
	  }
  
?>
<section id="<?php echo $section_id; ?>" class="home-section-<?php echo ($i+1); ?> <?php echo $section_css_class;?> home-banner">
      <div class="section-content">
    	<div class="home-container <?php echo $container_class; ?> page_container">
        <?php
		if( $content_model == '0' ):
		?>
       <div class="<?php echo $onetone_animated; ?>" data-animationduration="0.9" data-animationtype="bounceInDown" data-imageanimation="no" id="">
        <div style="text-align:center;color:<?php echo $color; ?>;">
          <div style="font-family: 'Lustria',serif;">
            <h1 class="magee-heading section-title heading-border" id=""><span class="heading-inner"><?php echo do_shortcode($section_title);?></span></h1>
          </div>
          <p class="home-section-content" style="margin-top: 40px;"><?php echo do_shortcode($section_subtitle);?></p>
          <p style="font-size: 42px; color: #ffb01b; margin-top: -40px;">October 3-7</p>
          <div style="margin-top: 50px;">
            <br />
            <?php if( $btn_text != ''):?>
            <a href="<?php echo esc_url($btn_link);?>" target="<?php echo esc_attr($btn_target);?>" class=" magee-btn-normal btn-lg btn-line btn-light" style="text-decoration: none;"><?php echo do_shortcode($btn_text);?></a> 
            <?php endif;?>
          </div>
          <div style="background: #033466; padding: 25px 20px 1px 20px;">
            <p id="coolText" ct-sequence="cool56|cool120" style="color: #ffffff; font-size: 25px; text-transform: uppercase;">During Ride Week, commuters are encouraged to pledge to <strong>carpool, vanpool, bike, walk, bus</strong> or <strong>train</strong> to work.</p>
          </div>
          <div style="margin-top: 10px;">
            <br />
            <a href="http://www.ridematch.info" target="_blank" class=" magee-btn-normal btn-lg btn-line btn-light btn-pledge" style="text-decoration: none;"><img src="https://i.imgur.com/US5F6NQ.png" class="animated infinite bounceOut" style="width:25px; margin-right:10px">PLEDGE NOW for a chance to win great prizes!</a>
          </div>
          <div class="banner-sns" style="margin-top: 50px;">
           <ul>
           <?php 
		   for( $s=0;$s<6;$s++ ):
		   
		   $icon       = onetone_option( "section_social_icon_".$i."_".$s );
           $link       = onetone_option( "section_icon_link_".$i."_".$s );
           echo ' <li><a href="'.esc_url($link).'" target="_blank"><i class="fa fa-2 '.esc_attr($icon).'">&nbsp;</i></a></li>';
		   endfor;
		   ?>
           </ul>
          </div>
        </div>
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
        </div>
  <div class="clear"></div>
  </div>
</section>