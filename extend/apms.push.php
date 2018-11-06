<?php
if (!defined('_GNUBOARD_')) exit;

// Send Push
function apms_push($mb_id, $subject, $content, $url, $push=array()) {
	global $member;

	// 푸시사용안함
	return;

	// 보낼 회원 체크
	$hps = array();

	$mb_ids = explode(",", $mb_id); // 회원아이디는 콤마(,)로 복수 등록 가능
	$mb_ids = array_unique($mb_ids); // 동일아이디 제거

	for($i=0; $i < count($mb_ids); $i++) {

		$mb_id = trim($mb_ids[$i]);

		if(!$mb_id) continue;

		// 내아이디이면 통과
		if($member['mb_id'] == $mb_id) continue;

		// 휴대폰 번호 체크
		$mb = get_member($mb_id, 'mb_hp');
	    $hp = trim(str_replace("-", "", $mb['mb_hp']));
		if($hp) {
			$hps[] = $hp;
		}
	}

	$hps_cnt = count($hps);

	// 보낼 회원이 있으면
	if($hps_cnt) {

		/* --------------------------------------------------------------	
		 * $push 에 따라서 보낼 내용 분기
		 * --------------------------------------------------------------
		 * $push['use']			: 푸시 종류
		 * $push['flag']		: 응답 종류
		 * $push['it_id']		: 상품(it)일 때 존재
		 * $push['bo_table']	: 게시판(wr)일 때 존재
		 * $push['wr_id']		: 글/댓글(wr,it,qa,ev)일 때 존재
		 * $push['my_id']		: 반응회원 아이디(mb_id)
		 * $push['my_name']		: 반응회원 이름(name)
		 * $push['c_id']		: 댓글일 때 댓글 위치(comment_id)

		 * $push['od_name']		: 주문자
		 * $push['od_id']		: 주문번호
		 * $push['od_amount']	: 주문금액
		 * $push['od_status']	: 주문상태
		 * $push['od_memo']		: 주문메모
		 * --------------------------------------------------------------
		 */

		if($push['use'] == 'wr') {
			//게시물
			switch($push['flag']) {
				case 'choice' :
					$subject = '[채택]'.$subject.' 글의 댓글이 채택되었습니다.';	
					$content = '채택 확인 : '.$url;	
					break;
				case 'reply' :
					$subject = '[답글]'.$subject.' 제목의 답글이 등록되었습니다.';	
					$content = '답글 확인 : '.$url;	
					break;
				case 'new' :
					$subject = '[새글]'.$subject.' 제목의 새글이 등록되었습니다.';	
					$content = '새글 확인 : '.$url;	
					break;
				case 'comment' :
					$subject = '[댓글]'.$subject.' 글에 댓글이 달렸습니다.';	
					$content = '댓글 확인 : '.$url;	
					break;
				case 'comment_reply' :
					$subject = '[대댓글]'.$subject.' 글의 내 댓글에 대댓글이 달렸습니다.';	
					$content = '대댓글 확인 : '.$url;	
					break;
				case 'good' :
					$subject = '[추천]'.$subject.' 글을 추천하였습니다.';	
					$content = '추천 확인 : '.$url;	
					break;
				default	: return;
			}
		} else if($push['use'] == 'it') { 
			//상품
			switch($push['flag']) {
				case 'use' :
					$subject = '[후기]'.$subject.' 상품에 후기가 등록되었습니다.';	
					$content = '후기 확인 : '.$url;	
					break;
				case 'qa' :
					$subject = '[문의]'.$subject.' 상품에 문의가 등록되었습니다.';	
					$content = '문의 확인 : '.$url;	
					break;
				case 'reply' :
					$subject = '[답변]'.$subject.' 상품 문의에 대한 답변이 등록되었습니다.';	
					$content = '답변 확인 : '.$url;	
					break;
				case 'comment' :
					$subject = '[댓글]'.$subject.' 상품에 댓글이 달렸습니다.';	
					$content = '댓글 확인 : '.$url;	
					break;
				case 'comment_reply' :
					$subject = '[대댓글]'.$subject.' 상품의 내 댓글에 대댓글이 달렸습니다.';	
					$content = '대댓글 확인 : '.$url;	
					break;
				case 'good' :
					$subject = '[추천]'.$subject.' 상품을 추천하였습니다.';	
					$content = '추천 확인 : '.$url;	
					break;
				default	: return;
			}
		} else if($push['use'] == 'qa') {
			//1:1 문의
			switch($push['flag']) {
				case 'new' :
					$subject = '[문의]'.$subject.' 문의가 등록되었습니다.';	
					$content = '문의 확인 : '.$url;	
					break;
				case 'reply' :
					$subject = '[답변]'.$subject.' 문의에 대한 답변이 등록되었습니다.';	
					$content = '답변 확인 : '.$url;	
					break;
				default	: return;
			}
		} else if($push['use'] == 'od') {
			//주문 - 관리자 발송
			switch($push['flag']) {
				case 'new' :
					$subject = '[주문]'.$push['od_name'].'님의 주문('.$push['od_id'].')이 접수되었습니다.';	
					$content = '번호 : '.$push['od_id'].' // 금액 : '.number_format($push['od_amount']).'원 // 상태 : '.$push['od_status'];
					if($push['od_memo']) $content .= ' // 메모 : '.$push['od_memo'];
					break;
				default	: return;
			}
		} else if($push['use'] == 'ev') {
			//이벤트
			switch($push['flag']) {
				case 'win' :
					$subject = '[당첨]'.$subject.' 이벤트에 당첨되셨습니다.';	
					$content = '당첨 확인 : '.$url;
					break;
				default	: return;
			}
		}

		/* --------------------------------------------------------------	
		 * 푸시발송 : 푸시발송 방법에 따라서 개별적으로 적용
		 * --------------------------------------------------------------
		 */

		for($i=0; $i < $hps_cnt; $i++) {

			//Send Push

		}
	}
}

?>