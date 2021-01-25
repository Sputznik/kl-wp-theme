<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
$img_path = get_stylesheet_directory_uri().'/images';
?>

<div class="container">
	<div class="kl-notfound">
		<div class="kl-error-image">
			<img src="<?php echo esc_url( get_template_directory_uri() . '/images/404.png' ); ?>" alt="404" />
		</div>
		<h5 class="kl-error-text"><?php _e('माफ़ कीजिये! जिस पृष्ठ को आप ढूंढ रहे हैं वह मौजूद नहीं है। कृपया मदद के लिए खोज (search) का उपयोग करें', 'kl'); ?></h5>
		<?php get_search_form();?>
		<p class="kl-home"><a href="<?php bloginfo('url'); ?>"><?php _e( 'वापस मुख्य पृष्ठ पर', 'kl' ); ?></a></p>
	</div>
</div>
<?php get_footer(); ?>
