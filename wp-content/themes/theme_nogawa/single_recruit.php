<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php the_field('job_title'); ?> | 採用情報（募集要項） | 野河特許事務所</title>
<meta name="description" content="<?php the_field('job_title'); ?> | 採用情報（募集要項） | 野河特許事務所は技術と知的財産権に関する専門知識を活かし、クライアントの皆様のパートナーとして企業経営に貢献します。" />
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
					<li class="breadcrumb-item"><a href="<?php echo esc_url( home_url('/') ); ?>recruitment/">採用情報</a></li>
					<li class="breadcrumb-item" aria-current="page"><?php the_field('job_title'); ?></li>
				</ul>
			</div>

			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">募集要項</p>
					<p class="en midashi02 mb-4 pb-2">Recruitment Guidelines</p>
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4 pt-3"><span class="bg-primary text-white fs14 py-1 px-3 mr-3"><?php echo get_field('status')['label']; ?></span><?php the_field('job_title'); ?></h3>
					<div class="row justify-content-center pb-4">
<?php
$job_image = get_field('job_image'); ?>
						<div class="<?php if(!empty($job_image)){echo 'col-md-8';}else{echo 'col-12';} ?>">
							<div class="kiji_frame pb-3 pb-md-0">
								<?php the_content(); ?>
							</div>
						</div>
<?php
if(!empty($job_image)): ?>
						<div class="col-sm-10 col-md-4 text-center mb-4">
							<div class="img_max"><img src="<?php echo $job_image['sizes']['large']; ?>" alt="<?php the_field('job_title'); ?>"></div>
						</div>
<?php
endif; ?>
					</div>
					<table class="table mb-5">
<?php
$shikaku = get_field('shikaku'); if($shikaku) : ?>
						<tr>
							<th>応募資格</th>
							<td><?php echo nl2br($shikaku); ?></td>
						</tr>
<?php
endif; ?>
						<tr>
							<th>給与</th>
							<td><?php $salary = get_field('salary'); echo nl2br($salary); ?></td>
						</tr>
<?php
$teate = get_field('teate'); if($teate) : ?>
						<tr>
							<th>諸手当</th>
							<td><?php echo nl2br($teate); ?></td>
						</tr>
<?php
endif; ?>
						<tr>
							<th>勤務地</th>
							<td>大阪市北区西天満5丁目16-3　西天満ファイブビル<br>
								<div class="mt-3"><span class="marker">アクセス</span><br>
								大阪メトロ堺筋線・谷町線「南森町駅」①号出口より西へ徒歩5分<br>
								JR東西線「大阪天満宮駅」より西へ徒歩6分</div>
							</td>
						</tr>
						<tr>
							<th>勤務時間</th>
							<td><?php $time = get_field('time'); echo nl2br($time); ?></td>
						</tr>
<?php
$holiday = get_field('holiday'); if($holiday) : ?>
						<tr>
							<th>休日・休暇</th>
							<td><?php echo nl2br($holiday); ?></td>
						</tr>
<?php
endif;
$bonus = get_field('bonus'); if($bonus) : ?>
						<tr>
							<th>昇給・賞与</th>
							<td><?php echo nl2br($bonus); ?></td>
						</tr>
<?php
endif;
$welfare = get_field('welfare'); if($welfare) : ?>
						<tr>
							<th>待遇・福利厚生</th>
							<td><?php echo nl2br($welfare); ?></td>
						</tr>
<?php
endif;
if(have_rows('add')):
while(have_rows('add')): the_row(); ?>
						<tr>
							<th><?php the_sub_field('add_t'); ?></th>
							<td><?php the_sub_field('add_c'); ?></td>
						</tr>
<?php
endwhile; endif; ?>
					</table>

					<h4 class="mincho mb-3">応募方法</h4>
					<p class="mb-4">下記の「応募する」ボタンをクリックし、必要事項を入力の上、ご応募ください。<br>
					電話でのご応募やお問い合わせも受け付けております。</p>

					<div class="row justify-content-center align-items-center mb-4">
						<div class="col-sm-8 col-md-6 mb-4 mb-md-0">
							<a href="<?php echo esc_url( home_url('/') ); ?>entry/?division=<?php the_field('job_title'); ?>" class="btn btn-primary btn-lg d-block py-3">応募する</a>
						</div>
						<div class="col-sm-8 col-md-6 d-flex justify-content-center justify-content-md-start">
							<div class="pl-lg-5">
								<p class="bold mb-0 h1 en line10"><span class="h2 mr-2 bold">TEL</span>06-6365-0718</p>
								<p class="mb-0"><span class="badge bg-dark text-white fs14 mr-2 py-1 px-2">電話受付</span>9:00～17:30（土日祝除く）</p>
							</div>
						</div>
					</div>
				</div>
			</div>
<?php
wp_footer();
get_footer();
?>

</body>
</html>