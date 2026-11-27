<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>採用情報 | 野河特許事務所</title>
<meta name="description" content="採用情報 | 野河特許事務所は技術と知的財産権に関する専門知識を活かし、クライアントの皆様のパートナーとして企業経営に貢献します。" />
<?php
wp_head();
get_header();
?>
		<div class="contents">
			<div class="first-view child">
				<div id="main_img">
					<div class="of"><img src="<?php $head_img = get_field('rec_head_img', 'option'); echo $head_img['url']; ?>" alt="採用情報"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0">採用情報</h1>
							<p class="mb-0 en text-blue">Recruit</p>
						</div>
					</div>
				</div>
			</div>
			<div class="bg-lgray">
				<ul class="breadcrumb fs14">
					<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url('/') ); ?>">HOME</a></li>
					<li class="breadcrumb-item" aria-current="page">採用情報</li>
				</ul>
			</div>

			<div class="container-fluid pt-4 pb-5 section02">
				<div class="max1200 py-5">
					<div class="row">
						<div class="col-md-6 pl-lg-5">
							<p class="en mb-2">Message</p>
							<p class="en midashi02"><?php the_field('rec_copy_e', 'option'); ?></p>
						</div>
						<div class="col-md-6 mt-md-3 pt-4 pr-lg-5">
							<p class="mincho midashi03"><?php the_field('rec_copy', 'option'); ?></p>
							<p class="mincho mb-4 pb-2"><?php the_field('rec_body', 'option'); ?></p>
							<div class="of pict16-9">
								<img src="<?php $img = get_field('rec_img', 'option'); echo $img['sizes']['large']; ?>" alt="">
							</div>
						</div>
					</div>
				</div>
				<div class="max1000 mt-4 pb-5">
<?php
if(have_rows('voice', 'option')): ?>
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4 pt-3">所員からのひとこと</h3>
					<div class="mb-1 voice">
<?php
while(have_rows('voice', 'option')): the_row();
$copy = get_sub_field('copy');
$plofile = get_sub_field('plofile');
$pic = get_sub_field('photo'); ?>
						<div class="pb-4 mb-5">
<?php
if($copy): ?>
							<h4 class="mincho midashi03 mb-1"><?php echo $copy; ?></h4>
<?php
endif;
if($plofile): ?>
							<p class="bold fs14"><?php echo $plofile; ?></p>
<?php
endif; ?>
							<div class="d-sm-flex">
<?php
if($pic): ?>
								<div class="mx-auto mb-3 mb-sm-0 ml-sm-4 order-sm-2 img_max max250 flex-shrink-0"><img src="<?php echo $pic['sizes']['large']; ?>"<?php if($plofile){echo ' alt=".$plofile."';} ?> alt=""></div>
<?php
endif; ?>
								<div class="order-sm-1">
									<p class="mb-3 mincho"><?php the_sub_field('body'); ?></p>
								</div>
							</div>
						</div>
<?php
endwhile; ?>
					</div>
<?php
endif; ?>
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4 pt-3">募集要項</h3>
<?php
if (have_posts()):
while(have_posts()): the_post();
$job_image = get_field('job_image'); ?>
					<div class="py-4 px-3 px-sm-4 bg-lgray mb-5">
						<h4 class="dot_bottom mincho midashi04 pb-3 mb-3 position-relative"><span class="bg-primary text-white fs14 py-1 px-3 mr-3"><?php echo get_field('status')['label']; ?></span><?php the_field('job_title'); ?></h4>
						<div class="row flex-gchild">
<?php
if(!empty($job_image)): ?>
							<div class="col-md-4 order-md-2 mb-4 mb-md-0 justify-content-center">
								<div class="of"><img src="<?php echo $job_image['sizes']['large']; ?>" alt=""></div>
							</div>
<?php
endif; ?>
							<div class="<?php if(!empty($job_image)){echo 'col-md-8';}else{echo 'col-12';} ?>">
								<div>
									<p class="clamp2 fs14 mb-2">ここに仕事内容が入ります。ここに仕事内容が入ります。ここに仕事内容が入ります。</p>
<?php
$cf_salary = get_field('salary');
if($cf_salary){
	$salary = str_replace(array("\r\n", "\r", "\n"), "", $cf_salary);
}
$cf_time = get_field('time');
if($cf_time){
	$time = str_replace(array("\r\n", "\r", "\n"), "", $cf_time);
} ?>
									<ul class="ul-job bold mb-4">
										<li class="clamp1"><?php echo $salary; ?></li>
										<li class="clamp1"><?php echo $time; ?></li>
									</ul>
									<a href="<?php the_permalink(); ?>" class="btn_detal">募集要項を見る</a>
								</div>
							</div>
						</div>
					</div>
<?php
endwhile; else: ?>
					<p class="mb-5">現在、採用活動は実施しておりません。<br>
					採用活動を再開した際には、こちらのページで募集要項をご案内いたします。</p>
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