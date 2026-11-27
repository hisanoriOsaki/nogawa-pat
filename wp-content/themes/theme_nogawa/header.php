<link href="<?php echo esc_url( home_url('/') ); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo esc_url( home_url('/') ); ?>css/base.css" rel="stylesheet" type="text/css">
<link href="<?php echo esc_url( home_url('/') ); ?>css/common.css" rel="stylesheet" type="text/css">
<?php
if ( is_page() && $post->post_parent ):
$page_id = get_the_ID();
$parent_id = get_page_parent( $post->post_parent , false );
$sAe = get_field('sAe', $parent_id);
$uAd = get_field('uAd', $parent_id); ?>
<style>
	.child #main_img .of img {
		object-position: <?php if($sAe){ echo $sAe.'%'; }else{ echo '50%'; } ?> <?php if($uAd){ echo $uAd.'%'; }else{ echo '50%'; } ?>;
		animation: none;
	}
</style>
<?php
elseif(is_page() ):
$sAe = get_field('sAe', $page_id);
$uAd = get_field('uAd', $page_id); ?>
<style>
	.child #main_img .of img {
		object-position: <?php if($sAe){ echo $sAe.'%'; }else{ echo '50%'; } ?> <?php if($uAd){ echo $uAd.'%'; }else{ echo '50%'; } ?>;
		animation: none;
	}
</style>
<?php
elseif(is_category('recruitment') || in_category('recruitment')):
$sAe = get_field('sAe', 'option');
$uAd = get_field('uAd', 'option'); ?>
<style>
	.child #main_img .of img {
		object-position: <?php if($sAe){ echo $sAe.'%'; }else{ echo '50%'; } ?> <?php if($uAd){ echo $uAd.'%'; }else{ echo '50%'; } ?>;
		animation: none;
	}
</style>
<?php
endif; ?>
</head>

<body>
<!--header ここから -->
<div class="wrapper">
	<div id="top">
		<nav>
			<div class="menu-frame">
				<div class="max1600 d-lg-flex justify-content-between align-items-center position-relative">
					<div class="menubar">
						<div class="siteid d-flex">
							<a href="<?php echo esc_url( home_url('/') ); ?>" class="d-flex align-items-center over pl-lg-2">
<?php
if ( is_home() || is_front_page()):
?>
								<h1 class="h1 mb-0 d-flex align-items-center">
									<img src="<?php echo esc_url( home_url('/') ); ?>images/common/logo.png" alt="野河特許事務所" class="logo">
<?php
$logo = get_field('year_logo', 'option');
if(!empty('$logo')): ?>
									<div class="ml-2 ml-sm-3"><img src="<?php echo $logo['url'] ?>" alt="" class="aniv"></div>
<?php
endif; ?>
								</h1>
<?php
else: ?>
								<div class="h1 mb-0 d-flex align-items-center">
									<img src="<?php echo esc_url( home_url('/') ); ?>images/common/logo.png" alt="野河特許事務所" class="logo">
<?php
$logo = get_field('year_logo', 'option');
if(!empty('$logo')): ?>
									<div class="ml-2 ml-sm-3"><img src="<?php echo $logo['url'] ?>" alt="" class="aniv"></div>
<?php
endif; ?>
								</div>
<?php
endif; ?>
							</a>
						</div>
						<div class="hamburger pc_none">
							<div class="menu-trigger"><span></span><span></span><span></span></div>
						</div>
					</div>
					<div class="menu flex-shrink-0">
						<ul class="main_nav">
							<li class="main_nav_item">
								<div class="d-flex d-lg-block">
									<a href="<?php echo esc_url( home_url('/') ); ?>office/" class="w-100 over toggle-head bold">事務所案内</a><span class="toggle_nav"></span></div>
<?php
$get_page_id = get_page_by_path("office");
$patient_id = $get_page_id->ID;
$args = array(
	'posts_per_page' => -1,
	'post_type' => 'page',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_parent' => $patient_id,
);
$my_query = new WP_Query($args);
if ($my_query->have_posts()) : ?>
								<div class="megamenu">
									<ul class="megamenu_inner">
<?php
while($my_query->have_posts()): $my_query->the_post(); ?>
										<li><a href="<?php the_permalink(); ?>" class="over bold"><?php the_title(); ?></a></li>
<?php
endwhile; wp_reset_postdata(); ?>
									</ul>
								</div>
<?php
endif; ?>
							</li>
							<li><a href="<?php echo esc_url( home_url('/') ); ?>service" class="over bold">私たちの特長</a></li>
							<li class="main_nav_item">
								<div class="d-flex d-lg-block">
									<a href="<?php echo esc_url( home_url('/') ); ?>staff/" class="w-100 over toggle-head bold">NPOのスタッフ</a><span class="toggle_nav"></span></div>
								<div class="megamenu">
									<ul class="megamenu_inner">
										<li><a href="<?php echo esc_url( home_url('/') ); ?>staff/patent/" class="over bold">弁理士紹介</a></li>
									</ul>
								</div>
							</li>
							<li class="main_nav_item">
								<div class="d-flex d-lg-block">
									<a href="<?php echo esc_url( home_url('/') ); ?>recruitment/" class="w-100 over toggle-head bold">採用情報</a><span class="toggle_nav"></span></div>
								<div class="megamenu">
									<ul class="megamenu_inner">
										<li><a href="<?php echo esc_url( home_url('/') ); ?>voice/" class="over bold">所員からのひとこと</a></li>
									</ul>
								</div>
							</li>
						</ul>
						<div class="nav-icon d-flex ml-lg-4">
							<a href="<?php echo esc_url( home_url('/') ); ?>office/access/" class="d-flex flex-lg-column justify-content-center align-items-center px-3 over">
								<img src="<?php echo esc_url( home_url('/') ); ?>images/common/access.png" alt="アクセス" width="30">
								<span class="text-dark fs12 bold over">access</span></a>
							<a href="<?php echo esc_url( home_url('/') ); ?>contact/" class="d-flex flex-lg-column justify-content-center align-items-center px-3 over">
								<img src="<?php echo esc_url( home_url('/') ); ?>images/common/contact.png" alt="問い合わせ" width="30">
								<span class="text-dark fs12 bold">contact</span></a>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</div>
