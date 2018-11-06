<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!--/* 헤더 -->
<div class="section text-center" id="headSection">
	<div class="container">
		<div class="row">
			<div class="col-md-3 hidden-xs">
				<h1>
				<a href="<?php echo G5_URL ?>">GNUBOARD5</a>
				</h1>
			</div>
			<div class="col-md-3 hidden-xs">
				<form role="form" id="formSearch" name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);">
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" name="stx" id="sch_stx" maxlength="20">
						<span class="input-group-btn">
						<input type="submit" id="sch_submit" value="검색" class="btn btn-default">
						</span>
					</div>
				</div>
				</form>
			</div>
			<div class="col-md-6">
				<ol class="list-inline text-right" id="listTopMenu">
					<?php if ($is_member) {  ?>
					<?php if ($is_admin) {  ?>
					<li class="hidden-xs"><a href="<?php echo G5_ADMIN_URL ?>"><b>관리자</b></a></li>
					<?php }  ?>
					<li class="hidden-xs"><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
					<li class="hidden-xs"><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
					<?php } else {  ?>
					<li class="hidden-xs"><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
					<li class="hidden-xs"><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
					<?php }  ?>
					<li><a href="<?php echo G5_BBS_URL ?>/faq.php">FAQ</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <span class="badge"><?php echo connect('theme/basic'); // 현재 접속자수, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정  ?></span></a></li>
					<li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
				</ol>
			</div>
		</div>
	</div>
</div>
<!--// 메뉴 -->
<div class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse-search">검색</button>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse-menu">메뉴</button>
			<a class="hidden-lg hidden-md hidden-sm navbar-brand" href="<?php echo G5_URL ?>"><span>GNUBOARD5</span></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse-menu">
			<ul class="nav navbar-nav">
			<?php
			$sql = " select *
						from {$g5['menu_table']}
						where me_use = '1'
						  and length(me_code) = '2'
						order by me_order, me_id ";
			$result = sql_query($sql, false);

			for ($i=0; $row=sql_fetch_array($result); $i++) {

				// 드롭다운 여부 확인 쿼리
				$sql2 = " select count(*) as cnt
							from {$g5['menu_table']}
							where me_use = '1'
							  and length(me_code) = '4'
							  and substring(me_code, 1, 2) = '{$row['me_code']}'
							order by me_order, me_id ";
				$row2 = sql_fetch($sql2);

				$add_li_class = '';
				$add_a_class = '';
				$add_a_icon = '';
				if($row2['cnt']){
					$add_li_class = ' class="dropdown"';
					$add_a_class = ' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"';
					$add_a_icon = ' <i class="fa fa-caret-down"></i>';
				}
			?>
				<li<?php echo $add_li_class; ?>>
					<a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>"<?php echo $add_a_class; ?>><?php echo $row['me_name'] ?><?php echo $add_a_icon ?></a>			

					<?php
					$sql2 = " select *
								from {$g5['menu_table']}
								where me_use = '1'
								  and length(me_code) = '4'
								  and substring(me_code, 1, 2) = '{$row['me_code']}'
								order by me_order, me_id ";
					$result2 = sql_query($sql2);

					for ($k=0; $row2=sql_fetch_array($result2); $k++) {
						if($k == 0)
							echo '<ul class="dropdown-menu" role="menu">'.PHP_EOL;
					?>
						<li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>					
					<?php
					}

					if($k > 0)
						echo '</ul>'.PHP_EOL;
					?>
				</li>
				<?php
				}

				if ($i == 0) {
				?>
					<style type="text/css">
						/* 메뉴가 없는 경우 중앙 정렬 */
						.navbar-nav, .navbar-nav > li { float:none; text-align:center; }
					</style>

					<li>
					<?php
						$add_url = '#';
						if ($is_admin) {
							$add_url = G5_ADMIN_URL.'/menu_list.php';
							$add_msg = '<br /><b class="text-danger">관리자모드 &gt; 환경설정 &gt; 메뉴설정</b>에서 설정하실 수 있습니다.';
						}
					?>
					<a href="<?php echo $add_url; ?>" class="kor">
					메뉴 준비 중입니다. <?php echo $add_msg ?>
					</a>
					</li>
				<?php } ?>
				
			</ul>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse-search">
			<form class="hidden-lg hidden-md hidden-sm navbar-form" role="search" name="fsearchbox" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" method="get">
			<input type="hidden" name="sfl" value="wr_subject||wr_content">
            <input type="hidden" name="sop" value="and">
			<div class="form-group">
				<input type="text" class="form-control" name="stx" id="sch_stx" placeholder="검색어(필수)" required class="required" maxlength="20">
			</div>
			<input type="submit" value="검색" id="sch_submit" class="btn btn-block btn-default">
			</form>            
		</div>
	</div>
</div>
<script type="text/javascript">
	<!--
		$(function(){
			$('.navbar-collapse').on('show.bs.collapse', function(e) {
				$('.navbar-collapse').not(this).collapse('hide');
			});
		});
		
		//검색 전처리
		function fsearchbox_submit(f)
		{
			if (f.stx.value.length < 2) {
				alert("검색어는 두글자 이상 입력하십시오.");
				f.stx.select();
				f.stx.focus();
				return false;
			}

			// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
			var cnt = 0;
			for (var i=0; i<f.stx.value.length; i++) {
				if (f.stx.value.charAt(i) == ' ')
					cnt++;
			}

			if (cnt > 1) {
				alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
				f.stx.select();
				f.stx.focus();
				return false;
			}

			return true;
		}
	//-->
</script>
<!--*/ 헤더 -->

<!--/* 바디 -->
<div class="section">
	<div class="container">
		<div class="row">
			<!--/* 로그인 -->
			<div class="col-md-3 col-md-push-9" id="colOutLogin">

				<?php echo outlogin('theme/basic'); // 외부 로그인, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>

				<?php echo poll('theme/basic'); // 설문조사, 테마의 스킨을 사용하려면 스킨을 theme/basic 과 같이 지정 ?>
				
			</div>
			<!--*/ 로그인 -->

			<div class="col-md-9 col-md-pull-3 kor">
