<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
//add_stylesheet('<link rel="stylesheet" href="'.$outlogin_skin_url.'/style.css">', 0);
?>

				<!--//로그인 후 -->
				<h5>
				<b><?php echo $nick ?>님</b>
				</h5>
				<?php if ($is_admin == 'super' || $is_auth) {  ?>
				<a href="<?php echo G5_ADMIN_URL ?>" class="btn btn-block btn-danger">관리자 모드</a>
				<?php }  ?>
				<div class="btn-group btn-group-justified">
					<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank" class="btn btn-info win_memo"><p>
					쪽지</p><span class="badge"><?php echo $memo_not_read ?></span></a>
					<a href="<?php echo G5_BBS_URL ?>/point.php" target="_blank" class="btn btn-info win_point"><p>
					포인트</p><span class="badge"><?php echo $point ?></span></a>
					<a href="<?php echo G5_BBS_URL ?>/scrap.php" target="_blank" class="btn btn-info win_scrap">스크랩</a>
				</div>
				<div class="btn-group btn-group-justified">
					<a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=register_form.php" class="btn btn-primary">정보수정</a>
					<a href="<?php echo G5_BBS_URL ?>/logout.php" class="btn btn-primary">로그아웃</a>
				</div>


<script>
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave()
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?"))
        location.href = "<?php echo G5_BBS_URL ?>/member_confirm.php?url=member_leave.php";
}
</script>
<!-- } 로그인 후 아웃로그인 끝 -->
