		<footer>
			<div class="d-flex align-items-end">
				<div class="footer flex-grow-1 pt-5 pb-3 px-3 pl-md-4 pr-md-5">
					<div class="d-flex justify-content-between mb-4">
						<ul class="d-sm-flex fs14 bold">
							<li class="mr-sm-4"><a href="<?php echo esc_url( home_url('/') ); ?>privacy/">Privacy Policy</a></li>
							<li><a href="<?php echo esc_url( home_url('/') ); ?>contact/">Contact</a></li>
						</ul>
						<ul class="d-flex bold fs14">
							<li class="lang mr-4"><a href="<?php echo network_home_url(); ?>">JP</a></li>
							<li>EN</li>
						</ul>
					</div>
					<div class="img_max pr-4 mb-2"><img src="<?php echo network_home_url(); ?>images/common/logo_en.png" alt="NOGAWA PATENT OFFICE" width="200"></div>
					<p class="fs14 line15 mb-4">Nishitenma Five Bldg., <br class="d-none d-sm-block">5-16-3 Nishitenma, Kita-Ku, Osaka 530-0047 Japan</p>
					<div class="fs11 ls0">&copy; NOGAWA PATENT OFFICE. All Right Reserved</div>
				</div>
				<div class="page-top">
					<a href="#" class="fs14">PAGE TOP</a>
				</div>
			</div>
		</footer>
	</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo network_home_url(); ?>js/base.js"></script>

<?php
if(is_page('contact')): ?>
<script>
	$(function () {
			$(".confirm_button").click(function () {
				$(window).scrollTop($('#anc01').position().top);
			})
	})
</script>
<?php
endif; ?>
