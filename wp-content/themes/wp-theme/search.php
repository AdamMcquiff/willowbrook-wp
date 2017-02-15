<?php get_header(); ?>

	<div class="content wrap cf">

	<main class="mainm-all t-2of3 d-5of7 cf" role="main">
		<h1 class="archive-title">
			<span>
				Search Results for:
			</span>

			<?php echo esc_attr(get_search_query()); ?>
		</h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('cf'); ?> role="article">

				<header class="entry-header article-header">

					<h3 class="search-title entry-title">
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>

					<p class="byline entry-meta vcard">
						<time class="updated entry-time" datetime="<?php the_time('Y-m-d') ?>" itemprop="datePublished">
							<?php the_time(get_option('date_format')) ?>
						</time>

						<span class="by">
							by
						</span>

						<span class="entry-author author" itemprop="author" itemscope itemptype="http://schema.org/Person">
							<?php the_author_link(); ?>
						</span>
					</p>

				</header>

				<section class="entry-content">
					<span class="read-more">
						<?php the_excerpt('Read more &raquo;'); ?>
					</span>
				</section>

				<footer class="article-footer">

					<?php if(get_the_category_list(', ') != ''): ?>
							Filed under <?php echo get_the_category_list(', '); ?>
						<?php endif; ?>

						<?php the_tags( '<p class="tags"><span class="tags-title">' . __( 'Tags:', 'wp-theme' ) . '</span> ', ', ', '</p>' ); ?>

				</footer>

			</article>

		<?php endwhile; ?>

				<?php page_navi(); ?>

			<?php else : ?>

				<article id="post-not-found" class="cf">
					<header class="article-header">
						<h1><?php _e('Oops, Post Not Found!', 'wp-theme'); ?></h1>
					</header>

					<section class="entry-content">
						<p><?php _e('Uh Oh. Something is missing. Try double checking things.', 'wp-theme'); ?></p>
					</section>

					<footer class="article-footer">
						<p><?php _e('This is the error message in the index.php template.', 'wp-theme'); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</main>

		<aside class="sidebar m-all t-1of3 d-2of7 last-col cf" role="complementary">

			<?php get_sidebar(); ?>

		</aside>

	</div>

<?php get_footer(); ?>
