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
<title><?php the_title(); ?> | NOGAWA PATENT OFFICE</title>
<meta name="description" content="<?php the_title(); ?> of NOGAWA PATENT OFFICE | We strive to contribute to our clients’ business achievement as their partner... NOGAWA PATENT OFFICE, Osaka, Japan" />
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
						</div>
					</div>
<?php
else:
$under = get_field('under');
$head_img = get_field('head_img'); ?>
					<div class="of<?php if($under){ echo ' of_bottom'; } ?>"><img src="<?php echo $head_img['url']; ?>" alt="<?php the_title(); ?>"></div>
					<div class="copy">
						<div>
							<h1 class="mincho mb-0"><?php the_title(); ?></h1>
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
					<p class="en midashi02 mb-4 pb-2">Specialties</p>
					<p class="mincho">NOGAWA PATENT OFFICE has the specialized staff with extensive knowledge of various technological fields such as chemicals, biotechnology, electronics, electric technology, mechatronics, etc.</p>
					<p class="mincho mb-5 pb-4">Our patent attorneys and technical staff primarily specialize in the following fields.<br>
					We also have experienced staff in design and trademark matters.</p>
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
									<p class="mb-1 centerline"><span class="mincho fs14 bg-white pr-3">IPC sections : <?php echo $ipc; ?></span></p>
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
					<h3 class="dot_bottom mincho midashi03 pb-3 mb-4">Patent Applications Data</h3>
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
									<div class="class-<?php echo $ipc_child; ?>">IPC sections : <?php echo $ipc; ?></div>
<?php
endwhile;
if($total < 100): ?>
									<div class="class-o">Others</div>
<?php
endif; ?>
								</div>
							</div>
							<p class="mincho"><?php the_field('s_body'); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="recruit_img of"><img src="<?php echo network_home_url(); ?>images/pages/service10.jpg" alt="Intellectual Property Network"></div>
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
					<p class="en midashi02 mb-4 pb-2"><?php the_title(); ?></p>
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
					<p class="en midashi02 mb-4 mt-5 pb-2">History</p>
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
					<p class="en midashi02 mb-4 pb-2"><?php the_title(); ?></p>
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
					<p class="en midashi02 mb-4 pb-2">Staff</p>
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
									<p class="mincho midashi03 mb-0 bold">Patent Attorneys</p>
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
					<p class="en midashi02 mb-4 pb-4">Patent Attorneys</p>
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
								<span><?php the_sub_field('name'); ?></span>
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
elseif(is_page('contact') || $parent_slug == 'contact'): ?>
			<div class="container-fluid py-5 mt-4">
				<div class="max1000">
					<?php the_content(); ?>

				</div>
			</div>

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
array_push($labels, '"IPC sections : '.$ipc.'"');
array_push($color, '"'.$bc.'"');
array_push($data, '"'.$num.'"');
$total += $num;
endwhile;
if($total < 100) {
	$over = 100 - $total;
	$data = implode(",", $data). ',"'. $over.'"';
	$labels = implode(",", $labels). ',"Others"';
	$color = implode(",", $color). ',"#999"';
} else {
	$data = implode(",", $data);
	$labels = implode(",", $labels);
	$color = implode(",", $color);
}
 ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<script src="<?php echo network_home_url(); ?>js/chartjs-plugin-datalabels.min.js"></script>
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