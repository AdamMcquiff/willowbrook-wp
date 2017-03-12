<?php get_header(); ?>

	<div class="content wrap cf">

		<main class="main m-all t-2of3 d-5of7 cf" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">

			<article id="post-not-found" class="hentry cf">

				<header class="article-header">

					<h1>
						<?php echo __('Error 404 - Content Not Found', 'theme_slug'); ?>
					</h1>

				</header>

				<section class="entry-content">

					<p>
						<?php echo __('The content you were looking for was not found, but maybe try looking again!', 'theme_slug'); ?>
					</p>

				</section>

				<section class="search">

					<p><?php get_search_form(); ?></p>

				</section>

			</article>

		</main>

	</div>

<?php get_footer(); ?>
