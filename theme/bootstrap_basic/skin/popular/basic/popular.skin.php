<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$popular_skin_url.'/style.css">', 0);
?>

		<div class="row">
			<div class="col-md-2 col-sm-12 col-xs-12">
				<h5>
				<b>인기검색어</b>
				</h5>
			</div>
			<div class="col-md-10">
				<ol class="list-inline">
				<?php for ($i=0; $i<count($list); $i++) {  ?>
					<li><h5><a href="<?php echo G5_BBS_URL ?>/search.php?sfl=wr_subject&amp;sop=and&amp;stx=<?php echo urlencode($list[$i]['pp_word']) ?>"><?php echo get_text($list[$i]['pp_word']); ?></a></h5></li>
				<?php }  ?>				
				</ol>
			</div>
		</div>