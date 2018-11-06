<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>
			</div>

		</div>
      </div>
    </div>
    <!--*/ 바디 -->

	<!--*/ 푸터 -->
    <footer class="section bg-primary link-inverse">
	<div class="container">
		<!--// 인기검색어 -->
		<?php echo popular('theme/basic'); // 인기검색어, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?>
		<!--// 접속자집계 -->
		<?php echo visit('theme/basic'); // 접속자집계, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
		<!--// 하단 로고 -->
		<div class="hidden-xs row">
			<div class="col-md-12">
				<h1 class="text-center">GNUBOARD5</h1>
				<h6 class="text-center">gnuboard <b>NEXT DECADE</b> verdion</h6>
				<h5 class="text-center">Copyright ©&nbsp;&nbsp;
				<b>소유하신 도메인</b>.&nbsp;&nbsp;All rights reserved.</h5>
				<br>
			</div>
		</div>
		<!--// 하단 메뉴 -->
		<div class="row">
			<div class="col-sm-10">
				<ol class="list-inline" id="listBottomMenu">
					<li>
					<a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a>
					</li>
					<li>
					<a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보취급방침</a>
					</li>
					<li>
					<a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a>
					</li>
				</ol>
			</div>
			<div class="col-sm-2">
				<h5 class="hidden-lg hidden-md hidden-sm text-center">Copyright ©&nbsp;&nbsp;
				<b>소유하신 도메인.</b>&nbsp;&nbsp;All rights reserved.</h5>
				<ol class="list-unstyled text-right">
					<li>
					<a href="#">상단으로</a>
					</li>
				</ol>
			</div>
		</div>
	</div>
	</footer>

    <!--*/ 푸터 -->

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
?>