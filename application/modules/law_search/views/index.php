<?php echo modules::run('home/inc_hilight'); ?>

<!-----------------------------------EnD Slide------------------------------------------------------------------------------------------------->
<div class="filter" style="margin-top:22px!important;">
	<label> <span class="title-filter"><?=lang("ho_search")?></span> </label> <br>
	<form method="get" action="law_search" data-toggle="validator" role="form">

		<label><input type="radio" name="type" value="title" <?php echo @$_GET['type'] == 'title' ? 'checked' : '' ?> > ค้นหาจากชื่อกฏหมาย</label>
		<label style="margin-left:10px;"><input type="radio" name="type" value="file" <?php echo @$_GET['type'] == 'file' ? 'checked' : '' ?> > ค้นหาจากเอกสารแนบกฏหมาย</label>

		<input type="text" id="searchtext" name="searchtext" class="input-filter" placeholder=""
			value="<?php echo @$_GET['searchtext'];?>" required="true" data-error="กรุณากรอกคำค้นหา">
		<input type="hidden" name="tools" value="b" class="input-filter" placeholder=""> <button type="submit"
			class="btn-filter">Search</button>
	</form>
	<div class="key-filter"> <img src="themes/law/images/icon-triangle.png" width="13" height="15">
		<?=lang("ho_search_top")?> :
		<?php echo modules::run('home/inc_top_search'); ?> </div>
</div>


<?php if( @$_GET['type'] == 'file' ):?>

	<?php echo @$htmlSearch;?>

<?php else:?>

	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-result" style="margin-top:15px;">
		<tbody>
			<tr>
				<td width="4%" height="25" align="center" bgcolor="#d2f1e4"><strong>สถานะ</strong></td>
				<td width="76%" bgcolor="#d2f1e4"> <strong>เรื่อง</strong></td>
				<td width="6%" align="center" bgcolor="#d2f1e4" nowrap="nowrap"><strong>TH ดาวน์โหลด</strong></td>
				<td width="14%" align="center" bgcolor="#d2f1e4" nowrap="nowrap"><strong>EN Download</strong></td>
			</tr>
			<?php foreach($rs as $row): ?>

				<tr>
					<td align="center" valign="top" class="line-result">
						<div class="status">
							<font color="#0000FF"><?php echo get_datalaw_status($row->status)?></font>
						</div>
					</td>
					<td valign="top" class="line-result"><span class="title-result"><a href="law/view/598"
								target="_blank"><?php echo $row->name_th?></a></span><br>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
									<td width="27%" valign="top">โครงสร้างกฎหมาย</td>
									<td width="80%" valign="top">
										<?php echo get_law_group_text($row->id) ?>
									</td>
								</tr>
								<tr>
									<td valign="top">วันที่ประกาศใช้</td>
									<td valign="top"><?php echo mysql_to_th($row->notic_date)?></td>
								</tr>
								<tr>
									<td valign="top">วันที่บังคับใช้</td>
									<td valign="top"><?php echo mysql_to_th($row->use_date)?></td>
								</tr>
								<!-- <tr>
									<td valign="top">เนื้อหาไฟล์กฎหมาย ปัจจุบัน</td>
									<td valign="top">... สถานสงเคราะห์ประจวบคีรีขันธ์ จังหวัดประจวบคีรีขันธ์ (๒๐)
										สถานสงเคราะห์บ้านนิคมปรือใหญ่ จังหวัดศรีสะเกษ (๒๑) สถานสงเคราะห์<b
											style="background-color:#ffff00">เด็ก</b>พิการและทุพพลภาพปากเกร็ด (บ้านนนทภูมิ)
										จังหวัดนนทบุรี (๒๒) สถานสงเคราะห์<b
											style="background-color:#ffff00">เด็ก</b>อ่อนพิการทางสมองและปัญญา จังหวัดนนทบุรี
										(๒๓) ...</td>
								</tr> -->
							</tbody>
						</table>
					</td>
					<td align="center" valign="top" class="line-result">
						<?if($row->filename_th != ""):?>
							<a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_th?>">
								<?=file_icon_th($row->filename_th)?>
								<br> (<?php echo get_download_count($row->filename_th) ?> ครั้ง)
							</a>
						<?endif;?>
					</td>
					<td align="center" valign="top" class="line-result">
						<?if($row->filename_eng != ""):?>
							<a href="law/download_by_name/<?=$row->id?>?filename=<?=$row->filename_eng?>">
								<?=file_icon_en($row->filename_eng)?>
								<br> (<?php echo get_download_count($row->filename_th) ?> ครั้ง)
							</a>
						<?endif;?>
					</td>
				</tr>

			<?php endforeach;?>
		</tbody>
	</table>

	<?php echo $rs->pagination_front()?>

<?php endif;?>
