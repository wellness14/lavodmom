<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

global $is_admin;

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$visit_skin_url.'/style.css">', 0);
?>

		<div class="row">
			<div class="col-md-2 col-sm-12 col-xs-12">
				<h5 class="pull-left">
				<b>접속자집계</b>
				</h5>
			</div>
			<div class="col-md-10">
				<ol class="list-inline">
					<li>
					<h5>오늘
					<span class="badge"><?php echo number_format($visit[1]) ?></span>
					</h5>
					</li>
					<li>
					<h5>어제
					<span class="badge"><?php echo number_format($visit[2]) ?></span>
					</h5>
					</li>
					<li>
					<h5>최대
					<span class="badge"><?php echo number_format($visit[3]) ?></span>
					</h5>
					</li>
					<li>
					<h5>전체
					<span class="badge"><?php echo number_format($visit[4]) ?></span>
					</h5>
					</li>
				</ol>
			</div>
		</div>