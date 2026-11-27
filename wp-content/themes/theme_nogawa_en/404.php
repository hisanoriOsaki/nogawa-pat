<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>404 Not found | NOGAWA PATENT OFFICE</title>
<meta name="description" content="Page not found">
<?php
wp_head();
get_header();
?>

		<div class="contents">
			<div class="first-view child">
				<div id="main_img">
					<div class="of"><img src="<?php echo network_home_url(); ?>images/pages/guide.jpg" alt="404"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0">404</h1>
							<p class="mb-0 en text-blue">Not Found</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-lgray">
				<ul class="breadcrumb fs14">
					<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url('/') ); ?>">HOME</a></li>
					<li class="breadcrumb-item" aria-current="page">Not Found</li>
				</ul>
			</div>
			<div class="container py-5 my-5">
				<h2 class="dot_bottom h2 mb-5 pb-3">404 NOT FOUND</h2>
				<p class="mb-4">Please return to the <a href="<?php echo esc_url( home_url('/') ); ?>">TOP page</a> of the website to find the page you are looking for.</p>
			</div>

<?php
wp_footer();
get_footer(); ?>

</body>
</html>