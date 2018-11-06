<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가 

// 수동메뉴설정
$hmenu = array();
$bmenu = array();
$shmenu = array();

if($mon && $pvm) $is_main = false; // 메인 스타일 보기일 때

$i = 0;
$msp = 'main';
$demo_href = $at_href['home'].'/?mon='.$msp.'&amp;pv='.THEMA.'&amp;pvm=';
$hmenu[$i]['new'] = 'old';
$hmenu[$i]['on'] = ($mon == $msp) ? true : false;
$hmenu[$i]['is_sub'] = true;
$hmenu[$i]['name'] = '기본 메인';
if(IS_YC && IS_SHOP) {
	$hmenu[$i]['href'] = $demo_href.urlencode('basic-shop-main'.$shmh);
	$shmenu = array();
	$shmenu[] = array('basic-shop-main', '기본형', '', 0);
	$shmenu[] = array('basic-shop-main-small', '기본형 - 스몰 타이틀', '', 0);
	$shmenu[] = array('basic-shop-main-large', '기본형 - 라지 타이틀', '', 0);
	$shmenu[] = array('basic-shop-main-wide', '와이드형', '', 0);
	$shmenu[] = array('basic-shop-main-wide-large', '와이드형 - 라지 타이틀', '', 0);
} else {
	$hmenu[$i]['href'] = $demo_href.urlencode('basic-main'.$shmh);
	$shmenu = array();
	$shmenu[] = array('basic-main', '기본형', '', 0);
	$shmenu[] = array('basic-main-small', '기본형 - 스몰 타이틀', '', 0);
	$shmenu[] = array('basic-main-large', '기본형 - 라지 타이틀', '', 0);
}

for($j=0; $j < count($shmenu); $j++) {
	$hmenu[$i]['sub'][$j]['line'] = $shmenu[$j][2];
	$hmenu[$i]['sub'][$j]['sp'] = $shmenu[$j][3];
	$hmenu[$i]['sub'][$j]['on'] = ($pvm == $shmenu[$j][0]) ? true : false;
	$hmenu[$i]['sub'][$j]['href'] = $demo_href.urlencode($shmenu[$j][0]);
	$hmenu[$i]['sub'][$j]['name'] = $shmenu[$j][1];
	$hmenu[$i]['sub'][$j]['new'] = 'old';
	$hmenu[$i]['sub'][$j]['is_sub'] = false;
}

// 쇼핑몰 페이지
if(IS_YC && IS_SHOP) {
	// 상품 페이지
	unset($shmenu);
	$i++;
	$msp = 'it';
	$hmenu[$i]['new'] = 'old';
	$hmenu[$i]['on'] = ($mon == $msp) ? true : false;
	$hmenu[$i]['href'] = G5_SHOP_URL.'/list.php?ca_id=10&amp;mon='.$msp.'&amp;pv='.THEMA.'&amp;slist='.urlencode('basic|1');
	$hmenu[$i]['name'] = '상품 페이지';
	$hmenu[$i]['is_sub'] = true;

	$shmenu[] = array('list', '10', 'basic|1', '갤러리형 - 사이드', '', 0);
	$shmenu[] = array('list', '10', 'basic|2', '갤러리형 - 와이드', '', 0);

	$shmenu[] = array('item', '399', 'shop|1', '기본형 - 사이드', '상품설명 페이지', 0);
	$shmenu[] = array('item', '399', 'shop|2', '기본형 - 와이드', '', 0);
	$shmenu[] = array('item', '395', 'board|1', '보드형 - 사이드', '', 0);
	$shmenu[] = array('item', '395', 'board|2', '보드형 - 와이드', '', 0);

	for($j=0; $j < count($shmenu); $j++) {
		$hmenu[$i]['sub'][$j]['line'] = $shmenu[$j][4];
		$hmenu[$i]['sub'][$j]['sp'] = $shmenu[$j][5];
		$hmenu[$i]['sub'][$j]['on'] = ($hmenu[$i]['on'] && ($slist == $shmenu[$j][2] || $sitem == $shmenu[$j][2])) ? true : false;
		switch($shmenu[$j][0]) {
			case 'list'		: $demo_mode = 'list.php?ca_id='.$shmenu[$j][1].'&amp;slist='; break;
			case 'item'		: $demo_mode = 'item.php?it_id='.$shmenu[$j][1].'&amp;sitem='; break;
			default			: $demo_mode = 'list.php?ca_id='.$shmenu[$j][1].'&amp;slist='; break;
		}
		$hmenu[$i]['sub'][$j]['href'] = G5_SHOP_URL.'/'.$demo_mode.urlencode($shmenu[$j][2]).'&amp;mon='.$msp.'&amp;pv='.THEMA;
		$hmenu[$i]['sub'][$j]['name'] = $shmenu[$j][3];
		$hmenu[$i]['sub'][$j]['new'] = 'old';
		$hmenu[$i]['sub'][$j]['is_sub'] = false;
	}
}

// 매뉴 재설정
$bmenu = $menu[0];

unset($menu);

$i = 1;

// 메뉴 통계
$menu[0] = $bmenu;

// 테마 메뉴
for($j = 0; $j < count($hmenu); $j++) {
	$menu[$i] = $hmenu[$j];
	$i++;
}

// 페이지 메뉴
for($j = 0; $j < count($demo_page_menu); $j++) {
	$menu[$i] = $demo_page_menu[$j];
	$i++;
}

// 보드 메뉴
for($j = 0; $j < count($demo_board_menu); $j++) {
	$menu[$i] = $demo_board_menu[$j];
	$i++;
}

// 더보기 메뉴
for($j = 0; $j < count($demo_more_menu); $j++) {
	$menu[$i] = $demo_more_menu[$j];
	$i++;
}

// -------------------------------------------------------------

// 데모테마 레이아웃 설정
if(IS_YC && IS_SHOP) { // 쇼핑몰
	$at_set['mfile'] = 'basic-shop-main';
	$at_set['sfile'] = 'basic-shop-side';
} else {
	$at_set['mfile'] = 'basic-main';
	$at_set['sfile'] = 'basic-side';
}

// 메인체크 해제
if($mon == 'main') {
	$is_index = $is_main = false;
}

// 박스형 배경
$at_set['background'] = ($at_set['background']) ? $at_set['background'] : 'http://amina.co.kr/demo/data/apms/background/1107.jpg';

//분류,이벤트 상품목록 & 상품설명스킨 - 추가설정값
if($ev_id || $ca_id || $it_id) {

	//상품설명 스킨
	if($it_id) {
		if($sitem) set_session('sitem', $sitem);

		$sitem = get_session('sitem');

		list($is, $io) = explode("|", $sitem);

		$item_skin = ($is) ? $is : 'shop';

		if($io == "2") { //와이드
			$at_set['page'] = 12; //페이지 스타일
			$slist = 'basic|2'; //상품목록 
		} else {
			$at_set['page'] = 9; //페이지 스타일
			$slist = 'basic|1'; //상품목록 
		}

		if($is == 'board') {
			$wset['seller'] = 1;
		}

		$wset['nav'] = 1;
	}

	//목록스킨에 따른 설정
	if($slist) set_session('slist', $slist);

	$slist = get_session('slist');

	list($ls, $lo) = explode("|", $slist);

	$list_skin = ($ls) ? $ls : 'basic';

	//스킨설정
	$thumb_w = 400;// 썸네일 너비
	$thumb_h = 540;// 썸네일 높이
	$wset['shadow'] = '';
	$wset['buy'] = '';
	$wset['cmt'] = '';
	$wset['hit'] = '';
	$wset['sns'] = ''; 

	if($lo == "2") { //와이드형
		$at_set['page'] = 12; //페이지 스타일
		$list_mods = 5; //가로수
		$list_rows = 4; //세로수
		$wset['item'] = 5;
		$wset['lg'] = 4;
	} else {
		$at_set['page'] = 9; //페이지 스타일
		$list_mods = 4; //가로수
		$list_rows = 6; //세로수
	}
}

//스킨 추가설정이 있는 페이지
if($pid == 'iuse') { //사용후기
	$skin_name = 'basic';
} else if($pid == 'iqa') { //상품문의
	$skin_name = 'basic';
} else if($pid == 'iev') { //이벤트(전체)
	$skin_name = 'basic';
} else if($pid == 'itype') { //상품유형
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} else if($pid == 'isearch') { //상품검색
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} else if($pid == 'myshop') { //마이샵
	$skin_name = 'basic';
	$list_mods = 4; //가로수
	$list_rows = 6; //세로수
} 

// 모바일은 무조건 페이지 없음
if(G5_IS_MOBILE) {
	$at_set['page'] = 12;
	$ca['pt_item'] = '';
}

?>