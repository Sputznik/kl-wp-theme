<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title('');?></title>
		<?php wp_head();?>
	</head>
	<body <?php body_class(); ?>>
		<?php

			global $kl_customize;

			$option = $kl_customize->get_option();
			if( isset( $option['show_topbar'] ) && $option['show_topbar'] == 1 ){ do_action('kl_topbar'); }

			do_action('kl_header');
		?>
