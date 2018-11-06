<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
include_once(G5_ADMIN_PATH.'/apms_admin/apms.admin.lib.php');

// 설정토글
$toggle = 0;

// 테마스킨
$tmain = apms_file_list('thema/'.THEMA.'/main', 'php');
$tside = apms_file_list('thema/'.THEMA.'/side', 'php');
?>
<aside class="<?php echo $at_set['font'];?>">
	<script>
		var sw_url = "<?php echo THEMA_URL;?>";
		var sw_bgcolor = "<?php echo $at_set['body_bgcolor'];?>";
	</script>
	<link rel="stylesheet" href="<?php echo THEMA_URL;?>/assets/css/switcher.css">
	<link rel="stylesheet" href="<?php echo THEMA_URL;?>/assets/css/spectrum.css">
	<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/switcher.js"></script>
	<script type="text/javascript" src="<?php echo THEMA_URL;?>/assets/js/spectrum.js"></script>
	<section id="style-switcher" class="font-12 ko-12">
		<div class="cursor switcher-icon layout-setup" title="테마설정">
			<i class="fa fa-desktop"></i>
		</div>
		<div class="cursor switcher-icon widget-setup" title="위젯설정">
			<i class="fa fa-cogs"></i>
		</div>
		<div class="switcher-wrap">
			<div class="switcher-title layout-setup cursor en">
				Style Switcher
				&nbsp;
				<i class="fa fa-arrow-circle-left"></i>
			</div>
			<div class="switcher-content">
				<?php if($is_demo) { ?>
					<form id="themaSwitcher" name="themaSwitcher" method="post" class="form">
					<input type="hidden" name="dpv" value="1" id="dvp">
				<?php } else { ?>
					<form id="themaSwitcher" name="themaSwitcher" action="<?php echo $at_href['switcher_submit'];?>" method="post" onsubmit="return switcher_submit(this);" class="form">
					<input type="hidden" name="sw_type" value="<?php echo $sw_type;?>">
					<input type="hidden" name="sw_code" value="<?php echo $sw_code;?>">
					<input type="hidden" name="sw_thema" value="<?php echo THEMA;?>">
					<input type="hidden" name="url" value="<?php echo urldecode($urlencode);?>">
				<?php } ?>
				<input type="hidden" name="at_set[thema]" value="<?php echo THEMA;?>">

				<div class="panel-group" id="switcherSet" role="tablist" aria-multiselectable="true">
					<div class="panel">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 컬러셋 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">
							<div class="panel-body">
								<select id="colorset-style" name="colorset" class="form-control input-sm input-bottom">
									<?php //Colorset
										$srow = thema_switcher('thema', 'colorset', COLORSET);
										for($i=0; $i < count($srow); $i++) {
									?>
										 <option value="<?php echo $srow[$i]['value'];?>"<?php echo ($srow[$i]['selected']) ? ' selected' : '';?>>
											<?php echo $srow[$i]['name'];?>
										</option>
									<?php } ?>
								</select>
								<div class="text-muted ko-11">
									테마 내 /colorset 폴더 안의 폴더
								</div>
								<label>
									<input type="checkbox" id="font-style" name="at_set[font]" value="en"<?php echo get_checked('en', $at_set['font']);?>>
									영문폰트 적용
								</label>

							</div>
						</div>
					</div>


					<div class="panel">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 레이아웃 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">
							<div class="panel-body">
								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">전체</span>
									<select id="layout-style" name="at_set[layout]" class="form-control input-sm">
										<option value="">와이드형</option>
										<option value="boxed"<?php echo get_selected('boxed', $at_set['layout']);?>>박스형</option>
									</select>
								</div>

								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">상단</span>
									<select id="lnb-style" name="at_set[lnb]" class="form-control input-sm">
										<option value="">화이트</option>
										<option value="at-lnb-gray"<?php echo get_selected('at-lnb-gray', $at_set['lnb']);?>>그레이</option>
										<option value="at-lnb-dark"<?php echo get_selected('at-lnb-dark', $at_set['lnb']);?>>블랙</option>
									</select>
								</div>

								<label>
									<input type="checkbox" id="pc-style" name="at_set[pc]" value="1"<?php echo get_checked('1', $at_set['pc']);?>>
									비반응형 PC 레이아웃
								</label>

							</div>
						</div>
					</div>

					<div class="panel" id="bg-style">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 배경화면 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">
							<div class="panel-body">
								<input type="hidden" id="input-body-background" name="at_set[background]" value="<?php echo $at_set['background'];?>">
								<input type="text" class="body-bgcolor" name="at_set[bgcolor]" value="<?php echo $at_set['bgcolor'];?>">
								<div style="margin:8px 0px;">
									<a role="button" class="switcher-win btn btn-black btn-sm btn-block" target="_balnk" href="<?php echo $at_href['switcher'];?>&amp;type=html&amp;fid=input-body-background&amp;cid=body-background">
										<i class="fa fa-picture-o"></i> 배경이미지 선택
									</a>
								</div>
								<div class="text-muted ko-11">
									배경은 박스형 PC에서만 적용됨
								</div>
							</div>
						</div>
					</div>

					<div class="panel">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 상단메뉴 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">

							<div class="panel-body">

								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">폰트</span>
									<select id="font-style" name="at_set[mfont]" class="form-control input-sm">
										<option value="12">12px</option>
										<option value="13"<?php echo get_selected('13', $at_set['mfont']);?>>13px</option>
										<option value="14"<?php echo get_selected('14', $at_set['mfont']);?>>14px</option>
										<option value="15"<?php echo get_selected('15', $at_set['mfont']);?>>15px</option>
										<option value="16"<?php echo get_selected('16', $at_set['mfont']);?>>16px</option>
										<option value="17"<?php echo get_selected('17', $at_set['mfont']);?>>17px</option>
										<option value="18"<?php echo get_selected('18', $at_set['mfont']);?>>18px</option>
									</select>
								</div>

								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">서브</span>
									<input type="text" class="form-control input-sm" name="at_set[subw]" value="<?php echo $at_set['subw'];?>" placeholder="180">
									<span class="input-group-addon">px</span>
								</div>

								<label>
									<input type="checkbox" id="menu-style" name="at_set[menu]" value="navbar-contrasted"<?php echo get_checked('navbar-contrasted', $at_set['menu']);?>>
									반전메뉴 모드
								</label>

								<label>
									<input type="checkbox" name="at_set[meffect]" value="1"<?php echo get_checked('1', $at_set['meffect']);?>>
									슬라이드 모드(저장)
								</label>

								<label>
									<input type="checkbox" id="header-style" name="at_set[header]" value="1"<?php echo get_checked('1', $at_set['header']);?>>
									상단고정 모드(저장)
								</label>

							</div>
						</div>
					</div>

					<div class="panel">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 메인파일 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">
							<div class="panel-body">
								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">파일</span>
									<select name="at_set[mfile]" class="form-control input-sm">
										<?php for ($i=0; $i<count($tmain); $i++) { ?>
											<option value="<?php echo $tmain[$i];?>"<?php echo get_selected($at_set['mfile'], $tmain[$i]);?>><?php echo $tmain[$i];?></option>
										<?php } ?>
									</select>
								</div>

								<div class="text-muted ko-11">
									테마 내 /main 폴더 안의 PHP 파일
								</div>
							</div>
						</div>
					</div>

					<div class="panel">
						<div class="panel-heading" role="tab" id="swHead<?php $toggle++; echo $toggle;?>" aria-expanded="true" aria-controls="swSet<?php echo $toggle;?>">
							<a data-toggle="collapse" data-parent="#switcherSet" href="#swSet<?php echo $toggle;?>">
								<i class="fa fa-caret-right"></i> 페이지 설정
							</a>
						</div>
						<div id="swSet<?php echo $toggle;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="swHead<?php echo $toggle;?>">
							<div class="panel-body">

								<select id="page-style" name="at_set[page]" class="form-control input-sm input-bottom">
									<option value="9">2단 - 라지 페이지</option>
									<option value="8"<?php echo get_selected('8', $at_set['page']);?>>2단 - 미디엄 페이지</option>
									<option value="7"<?php echo get_selected('7', $at_set['page']);?>>2단 - 스몰 페이지</option>
									<option value="12"<?php echo get_selected('12', $at_set['page']);?>>1단 - 박스형 페이지</option>
									<option value="13"<?php echo get_selected('13', $at_set['page']);?>>1단 - 와이드 페이지</option>
								</select>
					
								<label style="margin-top:8px;">
									<i class="fa fa-caret-right"></i>
									<b>2단 사이드 설정</b>
								</label>

								<div class="input-group input-group-sm input-bottom">
									<span class="input-group-addon">파일</span>
									<select name="at_set[sfile]" class="form-control input-sm">
										<?php for ($i=0; $i<count($tside); $i++) { ?>
											<option value="<?php echo $tside[$i];?>"<?php echo get_selected($at_set['sfile'], $tside[$i]);?>><?php echo $tside[$i];?></option>
										<?php } ?>
									</select>
								</div>

								<label>
									<input type="checkbox" id="side-style" name="at_set[side]" value="1"<?php echo get_checked('1', $at_set['side']);?>>
									좌측 사이드 사용
								</label>

								<div class="text-muted ko-11">
									테마 내 /side 폴더 안의 PHP 파일
								</div>

							</div>
						</div>
					</div>

				</div>
				<button type="submit" class="btn btn-color btn-sm btn-block">
					<i class="fa fa-check"></i> <?php echo ($is_demo) ? '데모적용' : '저장하기';?>
				</button>
				<?php if($is_demo) { ?>
					<label style="margin:8px 0px 0px;">
						<input type="checkbox" name="reset" value="1">
						데모설정 초기화
					</label>
				<?php } ?>
				</form>
			</div>
			<script>
				function switcher_submit(f) {
					<?php if(!$is_demo) { ?>
					if (!confirm("<?php echo $sw_msg;?>의 설정으로 저장하시겠습니까?")) {
						return false;
					}
					<?php } ?>
					return true;
				}
			</script>
		</div>
	</section>
</aside>

