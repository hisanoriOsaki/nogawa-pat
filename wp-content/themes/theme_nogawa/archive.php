<?php
if (is_category()) {
	$cat = get_the_category();
	$val = $cat[0]->cat_name;
	$cat_slug = $cat[0]->category_nicename;
} elseif (is_day()) {
	$val = get_the_time('Y年m月d日');
} elseif (is_month()) {
	$val = get_the_time('Y年m月');
} elseif (is_year()) {
	$val = get_the_time('Y年');
} else {
	$val = "新着情報";
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $val; ?> | 野河特許事務所</title>
<meta name="description" content="<?php echo $val; ?> | 野河特許事務所は技術と知的財産権に関する専門知識を活かし、クライアントの皆様のパートナーとして企業経営に貢献します。" />
<?php
wp_head();
get_header();
?>
		<div class="contents">
			<div class="first-view child">
				<div id="main_img">
					<div class="of"><img src="<?php echo esc_url( home_url('/') ); ?>images/pages/news.jpg" alt="新着情報"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0">新着情報</h1>
							<p class="mb-0 en text-blue">Information</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-lgray">
				<ul class="breadcrumb fs14">
					<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url('/') ); ?>">HOME</a></li>
					<li class="breadcrumb-item" aria-current="page"><?php echo $val; ?></li>
				</ul>
			</div>

			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">新着情報</p>
					<p class="en midashi02 mb-4 pb-2">Information</p>
<?php
if (have_posts()) : ?>
					<ul class="news-list">
<?php
while(have_posts()): the_post();
$cat = get_the_category();
$cat_name = $cat[0]->cat_name; ?>
						<li>
							<a href="<?php the_permalink(); ?>" class="over d-block d-md-flex align-items-start w-100">
								<div class="flex-shrink-0">
									<span class="text-dark fs15 py-1 mr-3 bold"><?php the_time('Y.m.d'); ?></span><span class="badge mr-3 py-1"><?php echo $cat_name; ?></span>
								</div>
								<span class="text-dark mincho"><?php the_title(); ?></span>
							</a>
						</li>
<?php
endwhile; ?>
					</ul>
					<div class="mt-5 mb-3"><?php wp_pagenavi() ?></div>

<?php
else: ?>
					<p>現在、新着情報は公開されておりません。</p>
<?php
endif; ?>
				</div>
			</div>

<?php
wp_footer();
get_footer();
?>

</body>
</html>