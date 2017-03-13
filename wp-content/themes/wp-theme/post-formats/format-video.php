
	<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article" itemscope itemtype="http://schema.org/VideoObject">

		<header class="article-header entry-header">

			<h1 class="entry-title single-title" itemprop="name"><?php the_title(); ?></h1>

			<p class="byline entry-meta vcard">
				<time class="updated entry-time" datetime="<?php the_time('Y-m-d') ?>" itemprop="datePublished">
					<?php the_time(get_option('date_format')) ?>
				</time>

				<span class="by">
					<?php echo __('by', 'theme_slug'); ?>
				</span>

				<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">
					<?php the_author_link(); ?>
				</span>
			</p>

		</header>

		<section class="entry-content cf" itemprop="description">
			<?php the_content(); ?>
		</section>

		<footer class="article-footer">
			<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'theme_slug' ) . '</span> ', ', ', '</p>' ); ?>
		</footer>

		<?php // comments_template(); ?>

	</article>
