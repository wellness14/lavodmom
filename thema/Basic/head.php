<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 
include_once(THEMA_PATH.'/assets/thema.php');
?>

<div id="thema_wrapper" class="<?php echo $at_set['font'];?>">

	<div class="wrapper <?php echo $at_set['layout'];?>">
		<!-- LNB -->
		<aside class="<?php echo $at_set['lnb'];?> at-lnb">
			<div class="container">

				
			</div>
		</aside>

		<header>
			<!-- Logo -->

			
			
		</header>

		<?php if(!G5_IS_MOBILE) { // PC 전체 메뉴 - Masonry 적용 ?>
			<nav id="menu-all" class="collapse menu-all-wrap">
				<div class="container">
					<div class="menu-all-container">
						<?php include (THEMA_PATH.'/menu.php'); // PC 전체메뉴 ?>
						<div class="clearfix"></div>
					</div>
					<div class="menu-all-btn text-center">
						<div class="btn-group">
							<a class="btn btn-lightgray btn-lg" href="<?php echo $at_href['main'];?>" title="메인으로"><i class="fa fa-home"></i></a>
							<a href="#menu-top" class="btn btn-lightgray btn-lg" data-toggle="collapse" data-target="#menu-all" title="메뉴닫기"><i class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
			</nav>
		<?php } ?>

		<?php if($page_title) { // 페이지 타이틀 ?>
			<div class="page-title">
				<div class="container">
					<h2><?php echo ($bo_table) ? '<a href="'.G5_BBS_URL.'/board.php?bo_table='.$bo_table.'"><span>'.$page_title.'</span></a>' : $page_title;?></h2>

				</div>
			</div>
		<?php } ?>
