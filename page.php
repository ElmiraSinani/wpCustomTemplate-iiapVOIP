<?php get_header(); ?>

<!-- ============================================= -->
<section class="section-intro breadcrumbs-right bg-img servicesBg stellar" data-stellar-background-ratio="0.4">
    <div class="intro-with-floating-menu-topbar"></div>
    <div class="bg-overlay gradient-1"></div>   
</section>
<section>
    <div class="container">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<div class="post" id="post-<?php the_ID(); ?>">

			<h2><?php the_title(); ?></h2>

			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>

			<div class="entry">

				<?php the_content(); ?>

				<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

			</div>

			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
		
		<?php // comments_template(); ?>

		<?php endwhile; endif; ?>
    </div>

</section>

<?php get_footer(); ?>