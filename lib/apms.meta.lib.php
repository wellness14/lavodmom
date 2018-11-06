<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

$seometa = array();

if($is_seometa == 'view') { //게시물
	$seometa['subject'] = apms_get_text($write['wr_subject']);
	$g5_head_title = $seometa['subject'];
	$seometa['description'] = apms_cut_text($write['wr_content'], 200);
	$seometa['creator'] = apms_get_text($write['wr_name']);
	$seometa['keyword'] = apms_seo_keyword($write['as_tag'], $write['ca_name']);
	$seometa['type'] = 'article';
	$seometa['url'] = G5_BBS_URL.'/board.php?bo_table='.$bo_table.'&wr_id='.$wr_id;
	$seometa['img'] = apms_wr_thumbnail($bo_table, $write, 0, 0); // 썸네일
	//썸네일 이미지 업데이트
	if(isset($write['as_thumb']) && !$write['as_thumb']) {
		$write['as_thumb'] = ($seometa['img']['src']) ? $seometa['img']['src'] : 1;
		sql_query(" update {$write_table} set as_thumb = '".addslashes($write['as_thumb'])."' where wr_id = '{$wr_id}' ", false);
	}
} else if($is_seometa == 'it') { // 상품
	$seometa['subject'] = apms_get_text($it['it_name']);
	$g5_head_title = $seometa['subject'];
	$seometa['description'] = ($it['it_basic']) ? apms_get_text($it['it_basic']) : apms_cut_text($it['it_explan'], 200);
	$seometa['creator'] = ($author['mb_nick']) ? $author['mb_nick'] : $seometa['publisher'];
	$seometa['keyword'] = apms_seo_keyword($it['pt_tag']);
	$seometa['type'] = 'product';
	$seometa['url'] = G5_SHOP_URL.'/item.php?it_id='.$it['it_id'];
	$seometa['img'] = apms_it_thumbnail($it, 0, 0, false, true);
	//썸네일 이미지 업데이트
	if(isset($it['pt_thumb']) && !$it['pt_thumb']) {
		$it['pt_thumb'] = ($seometa['img']['src']) ? $seometa['img']['src'] : 1;
		sql_query(" update {$g5['g5_shop_item_table']} set pt_thumb = '".addslashes($it['pt_thumb'])."' where it_id = '{$it['it_id']}' ", false);
	}
} else if($is_seometa == 'iqa') { //상품문의
	$seometa['subject'] = apms_get_text($view['iq_subject']).' > '.apms_get_text($view['it_name']);
	$seometa['description'] = apms_cut_text($view['iq_content'], 200);
	$seometa['creator'] = apms_get_text($view['iq_name']);
	$seometa['keyword'] = apms_seo_keyword($view['pt_tag']);
	$seometa['type'] = 'article';
	$seometa['url'] = G5_SHOP_URL.'/itemqaview.php?iq_id='.$iq_id;
	$seometa['img'] = apms_it_write_thumbnail($view['it_id'], $view['iq_content'], 0, 0);
} else if($is_seometa == 'iuse') { //상품후기
	$seometa['subject'] = apms_get_text($view['is_subject']).' > '.apms_get_text($view['it_name']);
	$g5_head_title = $seometa['subject'];
	$seometa['description'] = apms_cut_text($view['is_content'], 200);
	$seometa['creator'] = apms_get_text($view['is_name']);
	$seometa['keyword'] = apms_seo_keyword($view['pt_tag']);
	$seometa['type'] = 'article';
	$seometa['url'] = G5_SHOP_URL.'/itemuseview.php?is_id='.$is_id;
	$seometa['img'] = apms_it_write_thumbnail($view['it_id'], $view['is_content'], 0, 0);
} else if($is_seometa == 'page' || $is_seometa == 'content') { // 페이지
	$seometa['subject'] = $at['subject'];
	$seometa['description'] = $seo_page_desc;
	$seometa['creator'] = $config['cf_title'];
	$seometa['keyword'] = '';
	$seometa['type'] = 'website';
	$seometa['url'] = ($is_seometa == 'content') ? G5_BBS_URL.'/content.php?co_id='.$co_id : G5_BBS_URL.'/page.php?hid='.$hid.$qstr;
	$seometa['img']['src'] = $seo_page_img;
} else { //기타
	$seometa['url'] = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$seometa['keyword'] = apms_get_text($xp['seo_key']);
	$seometa['description'] = apms_get_text($xp['seo_desc']);
}

$seometa['title'] = str_replace("\"", "'", $g5_head_title);
$seometa['publisher'] = str_replace("\"", "'", apms_get_text($config['cf_title']));
$seometa['creator'] = ($seometa['creator']) ? str_replace("\"", "'", $seometa['creator']) : $seometa['publisher'];
$seometa['description'] = ($seometa['description']) ? str_replace("\"", "'", $seometa['description']) : '';

//이미지가 없으면 대표이미지 지정
if(!$seometa['img']['src']) {
	if ($xp['seo_img'] && preg_match("/(\.(jpg|gif|png))$/i", $xp['seo_img'])) {
		$seometa['img']['src'] = $xp['seo_img'];
	}
}

?>
<meta name="title" content="<?php echo $seometa['title'];?>" />
<?php if($seometa['subject']) { ?>
<meta name="subject" content="<?php echo str_replace("\"", "'", $seometa['subject']);?>" />
<?php } ?>
<meta name="publisher" content="<?php echo $seometa['publisher'];?>" />
<meta name="author" content="<?php echo $seometa['creator'];?>" />
<meta name="robots" content="index,follow" />
<?php if($seometa['keyword']) { ?>
<meta name="keywords" content="<?php echo str_replace("\"", "'", $seometa['keyword']);?>" />
<?php } ?>
<?php if($seometa['description']) { ?>
<meta name="description" content="<?php echo $seometa['description'];?>" />
<?php } ?>
<meta property="og:title" content="<?php echo $seometa['title'];?>" />
<meta property="og:site_name" content="<?php echo $seometa['publisher'];?>" />
<meta property="og:author" content="<?php echo $seometa['creator'];?>" />
<meta property="og:type" content="<?php echo $seometa['type'];?>" />
<?php if($seometa['img']['src']) { ?>
<meta property="og:image" content="<?php echo $seometa['img']['src'];?>" />
<?php } ?>
<?php if($seometa['description']) { ?>
<meta property="og:description" content="<?php echo $seometa['description'];?>" />
<?php } ?>
<?php if($seometa['url']) { ?>
<meta property="og:url" content="<?php echo $seometa['url'];?>" />
<?php } ?>
<?php if($seometa['img']['src']) { ?>
<link rel="image_src" href="<?php echo $seometa['img']['src'];?>" />
<?php } ?>
<?php if($seometa['url']) { ?>
<link rel="canonical" href="<?php echo $seometa['url'];?>" />
<?php } ?>