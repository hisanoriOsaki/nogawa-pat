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
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4 pt-3">募集要項</h3>
<?php
if (have_posts()):
while(have_posts()): the_post();
$job_image = get_field('job_image'); ?>
					<div class="py-4 px-3 px-sm-4 bg-lgray mb-4">
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
									<p class="clamp2 line15 fs14 mb-3"><?php echo strip_tags(strip_shortcodes(get_the_content(''))); ?></p>
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
endif;
if(have_rows('voice', 'option')): ?>
					<div class="dot_top pt-5">
						<div class="d-sm-flex align-items-end justify-content-between mb-4">
							<div class="mb-4 mb-sm-0">
								<h2 class="mb-2 fs16">所員からのひとこと</h2>
								<p class="en midashi02 mb-0">Voice from our staff</p>
							</div>
							<a href="../voice/" class="btn_detal mb-2">View More</a>
						</div>
						
					</div>
					<div class="row flex-gchild">
<?php
$count = 1;
while(have_rows('voice', 'option')): the_row();
$copy = get_sub_field('copy');
$plofile = get_sub_field('plofile');
$pic = get_sub_field('photo');
$alternative = get_sub_field('alternative'); ?>
						<div class="col-md-6">
							<a href="<?php echo esc_url( home_url('/') ); ?>voice/#anc<?php echo $count; ?>" class="border-top w-100 d-flex align-items-center text-dark py-3 px-2 px-md-3">
								<div class="width100 mr-3 flex-shrink-0">
									<div class="of pict-1-1"><?php if($pic){ echo '<img src="'. $pic['sizes']['large'] .'">'; } elseif($alternative == '男性シルエット'){ echo '<img src="'. esc_url(home_url('/')) .'images/pages/silhouette_m.jpg">'; } else { echo '<img src="'. esc_url(home_url('/')) .'images/pages/silhouette_f.jpg">'; } ?></div>
								</div>
								<div>
<?php
if($copy): ?>
									<p class="mincho bold midashi05 line15 mb-2"><?php echo $copy; ?></p>
<?php
endif;
if($plofile): ?>
									<p class="bold fs14 mb-0"><?php echo $plofile; ?></p>
<?php
endif; ?>
								</div>
							</a>
						</div>
<?php
$count++;
endwhile; ?>
					</div>
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