<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.$latest_skin_url.'/style.css">', 0);
?>

<!-- <?php echo $bo_subject; ?> 최신글 시작 { -->

	<div class="col-md-12 kor">
		<h4>
		<b>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a>
		</b>
		<small class="pull-right latest-more">
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>">더보기</a>
		</small>
		</h4>
		<hr class="latest-hr">
		<ol class="list-unstyled">
		<?php for ($i=0; $i<count($list); $i++) {  ?>
			<li class="latest">		

			<?php

				echo "<span class=\"latest-right pull-right\">&nbsp;";
				// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
				// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

				if (isset($list[$i]['icon_new'])) echo " " . $list[$i]['icon_new'];
				if (isset($list[$i]['icon_hot'])) echo " " . $list[$i]['icon_hot'];
				if (isset($list[$i]['icon_file'])) echo " " . $list[$i]['icon_file'];
				if (isset($list[$i]['icon_link'])) echo " " . $list[$i]['icon_link'];
				if (isset($list[$i]['icon_secret'])) echo " " . $list[$i]['icon_secret'];

				echo "</span>";

				//echo $list[$i]['icon_reply']." ";
				echo "<a href=\"".$list[$i]['href']."\">";
				if ($list[$i]['is_notice'])
				echo "<strong>".$list[$i]['subject']."</strong>";
				else
				echo $list[$i]['subject'];

				if ($list[$i]['comment_cnt'])
				echo $list[$i]['comment_cnt'];

				echo "</a>";
				
			?>
			</li>
		<?php }  ?>
		<?php if (count($list) == 0) { //게시물이 없을 때  ?>
			<li>게시물이 없습니다.</li>
		<?php }  ?>
		</ol>
	</div>

<!-- } <?php echo $bo_subject; ?> 최신글 끝 -->