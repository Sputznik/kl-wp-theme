<?php

//Creates a meta field
add_filter( 'orbit_meta_box_vars', function( $meta_box ){
	$meta_box['post'] = array(
		array(
			'id'			=> 'kl-post-video-meta-field',
			'title'		=> 'Additional Information',
			'fields'	=> array(
				'_format_video_embed'	=> array(
					'type' => 'text',
					'text' => 'Youtube Video Url',
					'help' => 'Select Post Format Video'
				)
			)
		)
	);
	return $meta_box;

});
