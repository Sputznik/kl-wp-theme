<div class="item">
	<?php get_template_part('partials/post', 'format');  ?>
	<a href="<?php the_permalink() ?>" class="overlay"></a>
	<div class="post-desc">
		<span class="category">
			<?php foreach ( ( get_the_category() ) as $category ){ echo '<a class="kl-cat-name" href="'.get_category_link( $category->term_id ).'">'.$category->name.'</a>'; }?>
		</span>
		<h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
		<span class="date"><?php the_time('F j, Y'); ?></span>
	</div>
</div>
