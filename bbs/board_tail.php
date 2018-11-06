<?php
//if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// 게시판 관리의 하단 파일 경로
//if (G5_IS_MOBILE) {
//    echo stripslashes($board['bo_mobile_content_tail']);
    // 모바일의 경우 설정을 따르지 않는다.
//    include_once(G5_BBS_PATH.'/_tail.php');
//} else {
//    echo stripslashes($board['bo_content_tail']);
//    @include ($board['bo_include_tail']);
//}


// 수정본게시판 관리의 하단 내용 
    @include ($board['bo_include_tail']); 
if($is_bo_content_head) { 
    echo stripslashes($board['bo_content_tail']); 
} 

?>

