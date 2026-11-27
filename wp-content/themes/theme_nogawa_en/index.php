<!doctype html>
<html lang="ja">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>NOGAWA PATENT OFFICE</title>
<meta name="description" content="We strive to contribute to our clients’ business achievement as their partner... NOGAWA PATENT OFFICE, Osaka, Japan" />
<?php
wp_head();
get_header(); ?>

	<div class="contents">
		<div class="first-view">
			<div id="main_img">
				<div class="of"><img src="<?php echo network_home_url(); ?>images/common/main_img_en.jpg" alt=""></div>
				<div class="copy en d-md-flex justify-content-end">
					<div>
						<h2 class="mincho mb-0">Intellectual Property <br class="d-non d-xl-block">Shaping Tomorrow</h2>
						<p class="mb-0 en">High Quality, Timely Action & Aggressive Approach</p>
					</div>
				</div>
<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 5,
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) : ?>
				<div class="tips bg-white">
					<div class="position-relative d-md-flex flex-gchild">
						<div class="tips_title py-md-4"><span>NEWS</span></div>
						<ul class="ticker mb-0 flex-column">
<?php
while($my_query->have_posts()): $my_query->the_post(); ?>
							<li class="d-md-flex"><a href="<?php the_permalink(); ?>" class="d-flex flex-column flex-md-row align-items-md-center over p-3 py-md-4 w-100 text-black pr-5"><span class="mr-3 fs15 bold"><?php the_time('Y.m.d'); ?></span><span class="clamp1 mt-2 mt-md-0"><?php the_title(); ?></span></a></li>
<?php
endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
<?php
endif; ?>
			</div>
		</div>


		<div class="container-fluid py-5 section01">
			<div class="max1200 py-5">
				<div class="row">
					<div class="col-md-6 pl-lg-5">
<?php
$get_page_id = get_page_by_path("office");
$page_id = $get_page_id->ID; ?>
						<p class="en mb-2">About us</p>
						<p class="en midashi02"><?php the_field('en_g_copy', $page_id); ?></p>
					</div>
					<div class="col-md-6 mt-md-3 pt-4 pr-lg-5">
						<p class="mincho mb-4 pb-2"><?php the_field('aboutus', 'option'); ?></p>
						<a href="office/" class="btn_detal">View More</a>
					</div>
				</div>
			</div>
		</div>
		<div class="position-relative overflow-hidden d-md-flex">
			<div class="feature_img of">
				<img src="<?php echo network_home_url(); ?>images/common/top_img10.jpg" alt="Our Features">
				<img src="<?php echo network_home_url(); ?>images/common/top_img11.jpg" alt="Our Features">
				<img src="<?php echo network_home_url(); ?>images/common/top_img12.jpg" alt="Our Features">
			</div>
			<div class="feature_frame en">
				<div class="feature_body">
					<p class="en mb-2">Our Features</p>
					<p class="en midashi02"><?php the_field('feature_copy', 'option'); ?></p>
					<p class="mincho mb-2"><?php the_field('feature_body', 'option'); ?></p>
<?php
$hosoku = get_field('feature_add', 'option');
if($hosoku): ?>
					<p class="fs14 mb-4 pb-2"><?php echo $hosoku; ?></p>
<?php
endif; ?>
					<a href="service/" class="btn_detal">View More</a>
				</div>
			</div>
		</div>
		<div class="container-fluid py-5 section02">
			<div class="max1200 py-5">
				<div class="row flex-gchild">
					<div class="col-md-4 pl-lg-5 newsnavi">
						<div class="w-100 d-flex flex-column justify-content-between align-items-start">
							<p class="en midashi02 mt-md-2">Information</p>
							<a href="info/" class="btn_detal d-none d-md-inline-block">View All</a>
						</div>
					</div>
					<div class="col-md-8 pr-lg-5">
						<div class="w-100">
<?php
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 5,
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) : ?>
							<ul class="news-list mb-5 mb-md-0">
<?php
while($my_query->have_posts()): $my_query->the_post();
$cat = get_the_category();
$cat_name = $cat[0]->cat_name; ?>
								<li>
									<a href="<?php the_permalink(); ?>" class="over d-block d-md-flex align-items-start w-100">
										<div class="flex-shrink-0"><span
												class="text-dark fs15 py-1 mr-3 bold"><?php the_time('Y.m.d'); ?></span><span
												class="badge mr-3 py-1"><?php echo $cat_name; ?></span>
										</div>
										<span class="text-dark mincho"><?php the_title(); ?></span>
									</a>
								</li>
<?php
endwhile; wp_reset_postdata(); ?>
							</ul>
<?php
else: ?>
							<p>Currently, No new information is available.</p>
<?php
endif; ?>
							<a href="info/" class="btn_detal d-md-none">View All</a>
						</div>
					</div>
				</div>
			</div>
		</div>

<?php
wp_footer();
get_footer();
?>

<script>
	let vh = window.innerHeight * 0.01;
	document.documentElement.style.setProperty('--vh', `${vh}px`);

	function ticker() {
		if ($('.ticker li').length <= 1) return false;
		$('.ticker li:first').fadeOut(function () {
			$(this).appendTo($('.ticker')).fadeIn();
		});
	}
	setInterval(function () { ticker() }, 5000);
</script>
</body>
</html>
