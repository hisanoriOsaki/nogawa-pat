<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
$parent_id = get_page_parent( $post->post_parent , false );
$parent_slug = get_post($parent_id)->post_name;
$parent_title = get_post($parent_id)->post_title;
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php the_title(); ?> | 野河特許事務所</title>
<meta name="description" content="野河特許事務所の<?php the_title(); ?> | 私たちは技術と知的財産権に関する専門知識を活かし、クライアントの皆様のパートナーとして企業経営に貢献します。" />
<?php
wp_head();
get_header();
?>
		<div class="contents">
			<div class="first-view child">
				<div id="main_img">
<?php
if ( is_page() && $post->post_parent ):
$head_img = get_field('head_img', $parent_id); ?>
					<div class="of"><img src="<?php echo $head_img['url']; ?>" alt="<?php echo $parent_title; ?>"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0"><?php echo $parent_title; ?></h1>
							<p class="mb-0 en text-blue"><?php the_field('en_title', $parent_id); ?></p>
						</div>
					</div>
<?php
else:
$under = get_field('under');
$head_img = get_field('head_img'); ?>
					<div class="of<?php if($under){ echo ' of_bottom'; } ?>"><img src="<?php echo $head_img['url']; ?>" alt="<?php the_title(); ?>"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0"><?php if(is_page(array('voice', 'entry')) || $parent_slug == 'entry'){ echo '採用情報'; } else { the_title();} ?></h1>
							<p class="mb-0 en text-blue"><?php the_field('en_title'); ?></p>
						</div>
					</div>
<?php
endif; ?>
				</div>
			</div>
			<div class="bg-lgray">
				<ul class="breadcrumb fs14">
					<?php
						echo '<li class="breadcrumb-item"><a href="'. esc_url( home_url('/') ).'">HOME</a></li>';
						if ( is_page('voice')){
							echo '<li class="breadcrumb-item"><a href="'. esc_url( home_url('/') ).'recruitment/">採用情報</a></li>';
						}
						if ( is_page() && $post->post_parent ) {
							$ancestors = array_reverse( $post->ancestors ); 
							foreach($ancestors as $ancestor){ 
							echo '<li class="breadcrumb-item"><a href="'.get_permalink($ancestor).'">'.get_the_title($ancestor).'</a></li>';
							}
						}
						echo '<li class="breadcrumb-item" aria-current="page">'.wp_trim_words( get_the_title(), 24, '...' ).'</li>'; 
					?>
				</ul>
			</div>

<?php
if(is_page('service')): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1200">
					<h2 class="mb-2 fs16">私たちの活動分野</h2>
					<p class="en midashi02 mb-4 pb-2">Our fields of activity</p>
					<p class="mincho">当事務所は、ケミカル・バイオ、電子、電気、機械等の各分野の技術に精通した専門スタッフを擁しており、殆どの技術分野の特許出願に対応できる体制を整えています。</p>
					<p class="mincho mb-5 pb-4">特に多い取扱い分野は以下の分野であり、この傾向は国内外のクライアントに共通しております。<br>
					また、意匠、商標についても、経験豊かなスタッフを擁しています。</p>
<?php
if(have_rows('field')): ?>
					<div class="row">
<?php
while(have_rows('field')): the_row();
$ipc = get_sub_field('ipc');
$ipc_child = strtolower($ipc);
$icon = get_sub_field('icon'); ?>
						<div class="col-md-6 col-lg-4 pb-5">
							<div class="d-flex mb-4">
								<div class="d-flex align-items-center rounded-sm bg-<?php echo $ipc_child; ?>">
									<img src="<?php echo $icon['url']; ?>" alt="" class="py-2">
								</div>
								<div class="pl-3 w-100">
									<p class="mb-1 centerline"><span class="mincho fs14 bg-white pr-3">IPC分類：<?php echo $ipc; ?></span></p>
									<h4 class="fs17 bold mb-0"><?php the_sub_field('title'); ?></h4>
								</div>
							</div>
<?php
$list = get_sub_field('list');
$parts = explode("\n", $list);
$i = 0; ?>
							<ul class="sub-ul fs14">
								<?php
foreach ($parts as $part){
if ( $part ){
	echo '<li>' . $part . '</li>';
}
$i++;
} ?>
							</ul>
						</div>
<?php
endwhile; ?>
					</div>
<?php
endif; ?>
				</div>
			</div>

			<div class="container-fluid pb-5 section02">
				<div class="max1000">
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4">IPC分類別特許出願の状況</h3>
					<div class="row align-items-center pb-5">
						<div class="col-md-6 d-flex justify-content-center">
							<div>
								<canvas id="myChart" style="width: 290px; height: 300px;"></canvas>
								<p class="text-center mt-3 mb-0 fs14"><?php the_field('s_hosoku'); ?></p>
							</div>
						</div>
						<div class="col-md-6 mt-4">
							<div class="border p-3 px-lg-4 mb-4">
								<div class="column2">
<?php
$total = 0;
while(have_rows('field')): the_row();
$ipc = get_sub_field('ipc');
$ipc_child = strtolower($ipc);
$num = get_sub_field('per');
$total += $num; ?>
									<div class="class-<?php echo $ipc_child; ?>">IPC分類：<?php echo $ipc; ?></div>
<?php
endwhile;
if($total < 100): ?>
									<div class="class-o">その他</div>
<?php
endif; ?>
								</div>
							</div>
							<p class="mincho"><?php the_field('s_body'); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="recruit_img of"><img src="../images/pages/service10.jpg" alt="Recruit"></div>
			<div class="container-fluid mb-5 pb-5">
				<div class="recruit_body">
<?php
the_content();
?>
				</div>
			</div>

<?php
elseif(is_page('office')): ?>
			<div class="container-fluid pt-4 pb-5 section02">
				<div class="max1200 py-5">
					<div class="row">
						<div class="col-md-6 pl-lg-5">
							<p class="en mb-2">Greeting</p>
							<p class="en midashi02"><?php the_field('en_g_copy'); ?></p>
						</div>
						<div class="col-md-6 mt-md-3 pt-4 pr-lg-5">
							<p class="mincho midashi03"><?php the_field('g_copy'); ?></p>
							<p class="mincho mb-4 pb-2">
								<?php the_field('g_body'); ?>
							</p>
							<div class="img_max position-relative max350 representative_img">
<?php
$g_photo = get_field('g_photo');
$img_photo = get_field('img_photo'); ?>
								<img src="<?php echo $g_photo['sizes']['large']; ?>" alt="">
								<div class="representative">
									<p class="mincho line14 fs18 mb-0"><span class="fs14 d-block"><?php the_field('g_position'); ?></span><?php the_field('g_name'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="position-relative overflow-hidden d-md-flex">
				<div class="guide_img of">
					<img src="<?php echo $img_photo['url']; ?>" alt="Our Features">
				</div>
				<?php the_content(); ?>
			</div>

<?php
$page_id = get_the_ID();
$args = array(
'posts_per_page' => -1,
'post_type' => 'page',
'orderby' => 'menu_order',
'order' => 'ASC',
'post_parent' => $page_id,
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) : ?>
			<div class="container-fluid mb-5 pb-5">
				<div class="break-top">
					<div class="row row20">
<?php
while($my_query->have_posts()): $my_query->the_post();
$thum = get_field('child_thum'); ?>
						<div class="col-md-6 pl-lg-5 mb-5 mb-md-0">
							<p class="en mb-2"><?php the_field('child_en'); ?></p>
							<h3 class="mincho midashi03"><?php the_title(); ?></h3>
							<a href="<?php the_permalink(); ?>" class="d-block text-dark">
								<div class="d-flex align-items-start">
									<div class="pr-4">
										<p class="mincho mb-4 pb-2"><?php the_field('child_lead'); ?></p>
										<div class="btn_detal">View More</div>
									</div>
									<div class="width120 mt-1 flex-shrink-0">
										<div class="of pict-1-1 ">
											<img src="<?php echo $thum['sizes']['medium']; ?>" alt="<?php the_title(); ?>">
										</div>
									</div>
								</div>
							</a>
						</div>
<?php
endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
<?php
endif; ?>

<?php
elseif(is_page('outline')): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">事務所概要</p>
					<p class="en midashi02 mb-4 pb-2">Office Profile</p>
					<div class="row row20 mb-5">
						<div class="col-md-6 pb-4 pb-md-0">
							<p class="mincho"><?php the_field('o_body'); ?></p>
						</div>
						<div class="col-md-6">
<?php
$img = get_field('o_photo'); ?>
							<div class="img_max text-center"><img src="<?php echo $img['sizes']['large']; ?>" alt="野河特許事務所"></div>
						</div>
					</div>
<?php
if(have_rows('outline')): ?>
					<table class="table mb-5">
<?php
while(have_rows('outline')): the_row(); ?>
						<tr>
							<th><?php the_sub_field('title'); ?></th>
							<td><?php the_sub_field('body'); ?></td>
						</tr>
<?php
endwhile; ?>
					</table>
<?php
endif;
$images = get_field('o_album');
if( $images ):
?>
					<div class="row mb-5">
<?php
foreach( $images as $image ): ?>
						<div class="col-sm-4 mb-3 mb-sm-0">
							<div class="of pict3-2"><img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"></div>
						</div>
<?php
endforeach; ?>
					</div>
<?php
endif;
if(have_rows('history')): ?>
					<hr>
					<p class="mt-5 mb-2">沿革</p>
					<p class="en midashi02 mb-4 pb-2">History</p>
					<table class="table history mb-5">
<?php
while(have_rows('history')): the_row();
$photo = get_sub_field('photo'); ?>
						<tr>
							<th><?php the_sub_field('year'); ?></th>
							<td>
								<div class="d-md-flex justify-content-between">
									<div><?php the_sub_field('body'); ?></div>
<?php
if($photo):
$caption = $photo['caption']; ?>
									<div class="img_max flex-shrink-0 max300 mt-3 mt-md-0 ml-md-4 mx-auto"><img src="<?php echo $photo['sizes']['medium']; ?>" alt=""><?php
if($caption) {
	echo '<div class="mt-2 fs14 text-center">'.$caption.'</div>';
} ?></div>
<?php
endif; ?>
								</div>
							</td>
						</tr>
<?php
endwhile; ?>
					</table>
<?php
endif; ?>
				</div>
			</div>

<?php
elseif(is_page('access')): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">アクセスマップ</p>
					<p class="en midashi02 mb-4 pb-2">Access map</p>
					<div class="map mb-5">
						<?php $map = get_field('map'); echo $map; ?>
					</div>
<?php
if(have_rows('address')): ?>
					<table class="table mb-5">
<?php
while(have_rows('address')): the_row(); ?>
						<tr>
							<th><?php the_sub_field('title'); ?></th>
							<td><?php the_sub_field('body'); ?></td>
						</tr>
<?php
endwhile; ?>
					</table>
<?php
endif; ?>
				</div>
			</div>

<?php
elseif(is_page('staff')): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">NPOのスタッフ</p>
					<p class="en midashi02 mb-4 pb-2">Staff of NPO</p>
					<div class="row mb-5">
						<div class="col-md-6 pb-4 pb-md-0">
							<p class="mincho"><?php the_field('s_body'); ?></p>
						</div>
<?php
$img = get_field('s_photo'); ?>
						<div class="col-md-6">
							<div class="img_max text-center"><img src="<?php echo $img['sizes']['large']; ?>" alt="NPOのスタッフ"></div>
						</div>
					</div>
<?php
if(have_rows('s_number')): ?>
					<table class="table staff_num mb-5">
<?php
while(have_rows('s_number')): the_row(); ?>
						<tr>
							<th><?php the_sub_field('title'); ?></th>
							<td><?php the_sub_field('body'); ?></td>
						</tr>
<?php
endwhile; ?>
					</table>
<?php
endif; ?>
					<a href="patent/" class="border d-block over text-dark mb-5">
						<div class="row flex-gchild row0">
<?php
$get_page_id = get_page_by_path("staff/patent");
$patient_id = $get_page_id->ID;
if(have_rows('agent', $patient_id)):
$count = 1;
while(have_rows('agent', $patient_id)): the_row();
$photo = get_sub_field('photo');
if($count < 5): ?>
							<div class="col-6 col-sm-3 col-md-2 order-md-<?php if($count >= 3) {echo $count + 1;} else {echo $count;} ?>">
								<div class="of"><img src="<?php echo $photo['sizes']['medium']; ?>" alt="<?php the_sub_field('name'); ?>"></div>
							</div>
<?php
endif;
$count++;
endwhile;
endif; ?>
							<div class="col-md-4 py-3 order-md-3 align-items-center">
								<div class="w-100 text-center btn_benrishi position-relative">
									<p class="mincho midashi03 mb-0 bold">弁理士紹介</p>
									<p class="fs13 en mb-0">Patent Attorney</p>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>

<?php
elseif(is_page('patent')): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<p class="mb-2">弁理士紹介</p>
					<p class="en midashi02 mb-4 pb-4">Patent Attorney</p>
<?php
if(have_rows('agent')):
while(have_rows('agent')): the_row();
$photo = get_sub_field('photo'); ?>
<div class="row justify-content-center mb-5">
							<div class="col-sm-10 col-md-5 col-lg-4 text-center mb-4 mb-md-0">
								<div class="img_max"><img src="<?php echo $photo['sizes']['large']; ?>" alt="<?php the_sub_field('name'); ?>"></div>
							</div>
							<div class="col-sm-10 col-md-7 col-lg-8 mincho pl-lg-5">
							<h4 class="h5 border-bottom pb-2 d-flex flex-column flex-sm-row align-items-start align-items-sm-center justify-content-sm-between mb-3">
<?php
$position = get_sub_field('position');
if(!empty($position)): ?>
								<span class="bg-gray fs14 rounded-pill px-3 order-sm-1 d-inline-block mb-1 mb-sm-0"><?php echo $position; ?></span>
<?php
endif; ?>
								<span><?php the_sub_field('name'); ?><span class="fs18">（<?php the_sub_field('kana'); ?>）</span></span>
							</h4>
<?php
if(have_rows('tables')):
while(have_rows('tables')): the_row(); ?>
								<div class="d-flex align-items-start mb-2">
									<div class="bg-primary text-white text-center width80 flex-shrink-0"><?php the_sub_field('title'); ?></div>
									<div class="ml-3"><?php the_sub_field('body'); ?></div>
								</div>
<?php
endwhile;
endif; ?>
								<p><?php the_sub_field('profile'); ?></p>
<?php
if(have_rows('lists')): ?>
								<ul class="basic-ul">
<?php
while(have_rows('lists')): the_row(); ?>
									<li><?php the_sub_field('item'); ?></li>
<?php
endwhile; ?>
								</ul>
<?php
endif; ?>
						</div>
					</div>
<?php
endwhile;
endif; ?>
				</div>
			</div>

<?php
elseif(is_page('voice')): ?>
			<div class="container-fluid pt-4 pb-5 section02">
				<div class="max1200 py-5">
					<div class="row">
						<div class="col-12 pl-lg-5">
							<h2 class="mb-2 fs16 mt-2 bold">所員からのひとこと</h2>
							<p class="en midashi02 mb-4">Voice from our staff</p>
						</div>
						<div class="col-md-6 pl-lg-5">
							<p class="mincho midashi03">スタッフが語る、私たちの仕事の魅力</p>
							<p class="mincho mb-4 pb-2 pr-md-4">
								野河特許事務所では、弁理士、特許技術者や法務のプロフェッショナルが一堂に会し、共に成長し合う環境を整えています。私たちがなぜこの仕事に誇りを持ち、やりがいを感じているのか、現場の声を通して仕事や働き方についての本音を探ります。
							</p>
						</div>
						<div class="col-md-6 pr-lg-5">
							<!-- <p class="mincho midashi03">スタッフが語る、私たちの仕事の魅力</p>
							<p class="mincho mb-4 pb-2">
								野河特許事務所では、スタッフ一人一人が日々の業務を通じて、 専門知識やノウハウを習得し、プロフェッショナルとして自立できる実力・素養を身につけるための環境を提供致します。
							</p> -->
							<div class="of pict16-9">
								<img src="../images/pages/recruit10.jpg" alt="">
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
$count = 1;
while(have_rows('voice', 'option')): the_row();
$copy = get_sub_field('copy');
$plofile = get_sub_field('plofile');
$pic = get_sub_field('photo'); ?>
						<div class="pb-4 mb-5">
							<div class="anchor" id="anc<?php echo $count; ?>">
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
						</div>
<?php
$count++;
endwhile; ?>
					</div>
<?php
else: ?>
					<p class="mb-6">現在、所員からのひとことは公開されておりません。</p>
<?php
endif; ?>
				</div>
			</div>

<?php
elseif(is_page( array('contact','entry')) || $parent_slug == 'contact' || $parent_slug == 'entry'): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<?php the_content(); ?>

				</div>
			</div>

<?php
elseif(is_page('sample')): 
$POST_URL = 'https://feed.jobwagon.jp/test_naito/job_33806/reception_st';
$data = array (
	'analytics' => 
	array (
	  'device' => 'Desktop',
	  'ip' => '211.129.205.83',
	  'sponsored' => false,
	  'userAgent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36',
	),
	'applicant' => 
	array (
	  'address' => 
	  array (
		0 => '大阪府',
		1 => '大阪市',
		2 => '北区',
		3 => '',
	  ),
	  'birthday' => '19920317',
	  'email' => 'kou.masaki@gmail.com',
	  'firstName' => '太郎',
	  'fullName' => '応募太郎',
	  'gender' => '男性',
	  'lastName' => '応募',
	  'phoneNumber' => '0664564560',
	  'pronunciationFirstName' => 'たろう',
	  'pronunciationFullName' => 'おうぼ たろう',
	  'pronunciationLastName' => 'おうぼ',
	),
	'appliedOnMillis' => 1707818605138,
	'id' => '01HPGYQPJJN9830Q4G4GFHTTPX',
	'job' => 
	array (
	  'jobCompany' => '株式会社内藤一水社 大阪',
	  'jobId' => '30378',
	  'jobTitle' => '企業の採用活動をサポートする法人営業',
	  'jobUrl' => 'https://jobwagon.jp/test_naito/job_30378?referencenumber&#x3D;test_naito_job_30378',
	),
	'questionsAndAnswers' => 
	array (
	  'questionsAndAnswers' => 
	  array (
		0 => 
		array (
		  'answer' => 
		  array (
			'id' => 'keireki',
			'value' => 'テスト送付',
		  ),
		  'question' => 
		  array (
			'id' => 'keireki',
			'question' => '職務経歴（任意）',
			'type' => 'textarea',
		  ),
		),
		1 => 
		array (
		  'answer' => 
		  array (
			'id' => 'shikaku',
			'value' => 'テスト',
		  ),
		  'question' => 
		  array (
			'id' => 'shikaku',
			'question' => '保有資格（任意）',
			'type' => 'textarea',
		  ),
		),
	  ),
	  'retrievedOnMillis' => 1707818605136,
	  'url' => 'https://jobwagon.jp/test_naito/job_30378/entryitem_st',
	),
  );
  
$data_json = json_encode($data); // JSON文字列に変換


$context = array(
  'http' => array(
    'method'  => 'POST', // POST
    'header'  => implode("\r\n", array('Content-Type: application/json',)), // implode(): 配列要素を文字列により連結
    'content' => $data_json
  )
);
file_get_contents($POST_URL, false, stream_context_create($context)); // POST処理
?>

<?php
else:
the_content();
endif;
?>

<?php
wp_footer();
get_footer();
?>

<?php
if(is_page('service')):
$labels = [];
$color = [];
$data = [];
$total = 0;
while(have_rows('field')): the_row();
$ipc = get_sub_field('ipc');
switch ($ipc) {
	case 'H':
		$bc = '#699C9E';
	break;
	case 'G':
		$bc = '#5D537B';
	break;
	case 'C':
		$bc = '#69859E';
	break;
	case 'A':
		$bc = '#E56464';
	break;
	case 'B':
		$bc = '#CF627C';
	break;
}
$num = get_sub_field('per');
array_push($labels, '"IPC分類：'.$ipc.'"');
array_push($color, '"'.$bc.'"');
array_push($data, '"'.$num.'"');
$total += $num;
endwhile;
if($total < 100) {
	$over = 100 - $total;
	$data = implode(",", $data). ',"'. $over.'"';
	$labels = implode(",", $labels). ',"その他"';
	$color = implode(",", $color). ',"#999"';
} else {
	$data = implode(",", $data);
	$labels = implode(",", $labels);
	$color = implode(",", $color);
}
 ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="../js/chartjs-plugin-datalabels.min.js"></script>
<script>
let config = {
	type: "pie",
	data: {
		labels:[<?php echo $labels; ?>],
		datasets: [{
			backgroundColor:[<?php echo $color; ?>],//グラフの背景色
			data:[<?php echo $data; ?>]//データ
		}],
	},
	options: {
	responsive: false,
	legend: {
	display:  false,
		},
	plugins: {
		
		datalabels: {
			align: "end",
			offset:20,
			color: '#fff',
			font: {
				weight: 'bold',
				size: 16,
			},
			formatter: (value, ctx) => {
				return value + '%';
			},
		}
	}
}
};

// チャートの生成
window.addEventListener("load", function() {
	let ctx = document.getElementById("myChart").getContext("2d");
	myChart = new Chart(ctx, config);
}, false);
</script>
<?php
endif; ?>

</body>
</html>