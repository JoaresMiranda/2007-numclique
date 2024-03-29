<?php get_header(); ?>

	<div id="content">

		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		 <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">Posts de &#8216;<?php single_cat_title(); ?>&#8217;</h2>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">Posts de <?php the_time('j M Y'); ?></h2>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">Posts de <?php the_time('F Y'); ?></h2>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">Posts de <?php the_time('Y'); ?></h2>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Autor</h2>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>

		<?php } ?>


						
		<?php while (have_posts()) : the_post(); ?>
		<div class="entry">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small>Postado em <?php the_time('j M Y') ?> por  <?php the_author() ?> <!-- <?php if(function_exists('the_views')) { the_views(); } ?> --></small>


					<br /><br /><?php the_content_rss('', TRUE, '', 50); ?><br /><br />


				<p class="postmetadata">Postado em <?php the_category(', ') ?> | <?php edit_post_link('Editar', '', ' | '); ?>  <?php comments_popup_link('Sem coment&aacute;rios &#187;', '1 coment&aacute;rio &#187;', '% coment&aacute;rios &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

<div id="navegacao">
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
</div>

	<?php else : ?>
				<div class="entry">
		<h2 class="center">Oops!<br />
		Nada foi encontrado...</h2>
</div>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>