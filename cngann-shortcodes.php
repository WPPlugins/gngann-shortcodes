<?php
/**
 * Plugin Name: C.N.Gann Shortcodes
 * Plugin URI:
 * Description: Shortcodes used by C.N.Gann Technology Group in their WordPress sites.
 * Version: 1.2
 * Author: Mike Flynn, C.N.Gann Technology Group, LLC
 * Author URI: http://cngann.com
 * License: GPL2
 */
	add_action( 'wp_enqueue_scripts', function(){
		wp_enqueue_script('cngann_tabs', 	plugins_url( '/js/tabs.js',	__FILE__ ), array('jquery'), '1.0');
		wp_enqueue_script('cngann_more', 	plugins_url( '/js/more.js',	__FILE__ ), array('jquery'), '1.0');
		wp_enqueue_script('cngann_slider',	plugins_url( '/js/slider.js',	__FILE__ ), array('jquery'), '1.0');
		wp_enqueue_script('cngann_splits',	plugins_url( '/js/splits.js',	__FILE__ ), array('jquery'), '1.0');
		wp_enqueue_style('cngann_style',	plugins_url( '/css/style.css',	__FILE__ ), array(), '1.0' );
	},11);

	/* Splits */

	add_shortcode('splits', function($atts, $content){
		return "<div class='splits'>".do_shortcode($content).do_shortcode('[clear]')."</div>";
	});

	add_shortcode('one_half', function($atts, $content){
		extract(shortcode_atts(array( 'right' =>false, 'left' => false ),$atts));
		return "<div class='split half one ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('one_third', function($atts, $content){
		extract(shortcode_atts(array( 'right' => false, 'left' => false ),$atts));
		return "<div class='split third one ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('two_thirds', function($atts, $content){
		extract(shortcode_atts(array( 'right' =>false, 'left' => false ),$atts));
		return "<div class='split third two ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('one_fourth', function($atts, $content){
		extract(shortcode_atts(array( 'right' =>false, 'left' => false ),$atts));
		return "<div class='split fourth one ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('two_fourths', function($atts, $content){
		extract(shortcode_atts(array( 'right' =>false, 'left' => false ),$atts));
		return "<div class='split fourth two ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('three_fourths', function($atts, $content){
		extract(shortcode_atts(array( 'right' =>false, 'left' => false ),$atts));
		return "<div class='split fourth three ". ( $left ? "l" : "" ) ." ".($right ? "r" : "")." '>".do_shortcode(wpautop($content, true))."</div>";
	});

	/* Clear */

	add_shortcode('clear', function(){
		return "<div style='clear:both;'></div>";
	});

	/* More */

	add_shortcode('more', function($atts, $content){
		extract(shortcode_atts(array('title'=>"More..."),$atts));
		return "<div class='more'><a href='#'>{$title}</a><div style='display:none;' class='the_more'>".do_shortcode(wpautop($content, true))."</div></div>";
	});

	/* Tabs */

	add_shortcode('tabs', function($atts, $content){
		return "<div class='tabs'>".do_shortcode($content)."</div>";
	});

	add_shortcode('tab', function($atts, $content){
		extract(shortcode_atts(array('ttl'=>""),$atts));
		return "<div class='tab' ttl='{$ttl}'>".do_shortcode(wpautop($content, true))."</div>";
	});

	/* Slider */

	add_shortcode('slider', function($atts, $content){
		extract(shortcode_atts(array('first'=>"","h"=>""),$atts));
		return "<div class='slider ".( $first != '' ? 'first' : '' )."' hh='".( $h ? $h : "" )."' >".do_shortcode($content)."</div>";
	});

	add_shortcode('slide', function($atts, $content){
		extract(shortcode_atts(array('href'=>""),$atts));
		return "<div class='slide' href='{$href}'>".do_shortcode($content)."</div>";
	});

	/* Hover */

	add_shortcode('hover', function($atts, $content){
		return "<div class='hover'>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('on', function($atts, $content){
		return "<div class='on'>".do_shortcode(wpautop($content, true))."</div>";
	});

	add_shortcode('off', function($atts, $content){
		return "<div class='off'>".do_shortcode(wpautop($content, true))."</div>";
	});

	/* Person */

	add_shortcode('person', function($atts, $content){
		return "
			<div class='person'>
				<img src='".($atts['image'] ? $atts['image'] : get_template_directory_uri() . '/images/def_person.png')."'>".
				( $atts['name'] ? "<strong>{$atts['name']}</strong><br>" : "").
				( $atts['jobtitle'] ? "<em>{$atts['jobtitle']}</em><br>" : "").
				( $atts['email'] ? "<a href='mailto:{$atts['email']}'>Contact by Email</a><br>" : "").
				( $atts['phone'] ? "<a href='tel:{$atts['phone']}'>{$atts['phone']}</a><br>" : "").
				"
			</div>
		";
	});

	/* TODO: Add new shortcode called "div".  pass it an object of css vars and it'll flatten it into a string.  This is for the special backgrounds john wants. */

?>