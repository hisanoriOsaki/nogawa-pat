<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php the_title(); ?> | 新着情報 | 野河特許事務所</title>
<meta name="description" content="<?php the_title(); ?> | 野河特許事務所は技術と知的財産権に関する専門知識を活かし、クライアントの皆様のパートナーとして企業経営に貢献します。" />
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
					<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url('/') ); ?>info/">お知らせ</a></li>
					<li class="breadcrumb-item clamp1" aria-current="page"><?php the_title(); ?></li>
				</ul>
			</div>

			<div class="container-fluid py-5 my-4">
				<div class="max1000">
					<span class="mb-3 d-inline-block en fs15"><?php the_time('Y.m.d'); ?></span>
					<h2 class="dot_bottom mincho midashi03 pb-3 mb-4 pt-2"><?php the_title(); ?></h2>
					<div class="kiji_frame pb-4">
						<?php the_content(); ?>
					</div>
					<div class="row row5 fs14 page-feed pt-5">
						<div class="col-4 my-2 btn-left"><?php if (get_previous_post(true)):?><?php previous_post_link('%link', 'PREV' , true); ?>
					<?php else: ?><span>PREV</span><?php endif; ?></div>
						<div class="col-4 my-2"><a href="<?php echo esc_url( home_url('/') ); ?>info/">ALL</a></div>
						<div class="col-4 my-2 btn-right"><?php if (get_next_post(true)):?><?php next_post_link('%link', 'NEXT', true,); ?><?php else: ?><span>NEXT</span><?php endif; ?></div>
					</div>
				</div>
			</div>

<?php
wp_footer();
get_footer();
?>
</body>
</html>