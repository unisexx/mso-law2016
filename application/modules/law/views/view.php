<!-- หมายเหตุ :: เลียนแบบฟอร์มจากเว็บเก่าที่ไฟล์ /opt/lampp/htdocs/law/law/modules/search/showchild.php -->

<div id="law-detail">
  <span class="title-law2"><?=str_replace("|"," ",$rs->name_th)?></span>
  <div class="line1">&nbsp;</div>
	
	<div class="pull-right" style="margin-bottom:10px;"><small class="text-muted"><?=get_law_group_text($rs->id)?></small></div>
	<table class="table table-bordered">
		<tr>
			<th>ชื่อกฎหมาย</th>
			<td><?=str_replace("|"," ",$rs->name_th)?></td>
		</tr>
		<tr>
			<th>สถานะการใช้</th>
			<td><?=get_datalaw_status($rs->status)?></td>
		</tr>
		<tr>
			<th>ดาวน์โหลด</th>
			<td>
				<?if($rs->filename_th != ""):?>
					<a href="law/download_by_name/<?=$rs->id?>?filename=<?=$rs->filename_th?>"><?=file_icon_th($rs->filename_th)?></a>
				<?endif;?>
				<?if($rs->filename_eng != ""):?>
					<a href="law/download_by_name/<?=$rs->id?>?filename=<?=$rs->filename_eng?>"><?=file_icon_en($rs->filename_eng)?></a>
				<?endif;?>
			</td>
		</tr>
		<tr>
			<th>อาศัยอำนาจกฎหมาย</th>
			<td>
				<div>ประเภทกฎหมายย่อยอาศัยอำนาจ  :  <?=$rs->apply_power_group != ""? get_law_submaintype_name($rs->apply_power_group) : '-' ;?></div>
				<div>อาศัยอำนาจกฎหมาย  : 
					<?if(@$rs->apply_power_id != ""):?>
						<?=get_law_name($rs->apply_power_id,'link');?>
					<?else:?>
						-
					<?endif;?>
				</div>
			</td>
		</tr>
		<tr>
			<th>กฎหมายลูก</th>
			<td>
				<?
					$sql = "select * from law_datalaws where apply_power_id='$rs->id'";
					$child_laws = $this->db->query($sql)->result();
				?>
				<?if($child_laws):?>
				<ul>
				<?foreach($child_laws as $row):?>
					<li><a href="law/view/<?=$row->id?>" target="_blank"><?=str_replace("|"," ",$row->name_th)?></a></li>
				<?endforeach;?>
				</ul>
				<?else:?>
					-
				<?endif;?>
			</td>
		</tr>
		<tr>
			<th>ประกาศในราชกิจจานุเบกษา</th>
			<td>
				<div>เล่มที่ : <?=$rs->gazette_numerative?></div>
				<div><?if($rs->gazette_section == 1){echo"ตอน";}elseif($rs->gazette_section == 2){echo"ตอนที่";}?> : <?=$rs->gazette_data?></div>
				<div>วันที่ประกาศ : <?=mysql_to_th($rs->gazete_notice_date)?></div>
			</td>
		</tr>
		<tr>
			<th>วันที่ประกาศใช้</th>
			<td><?=mysql_to_th($rs->notic_date)?></td>
		</tr>
		<tr>
			<th>วันที่นำเข้า</th>
			<td><?=mysql_to_th($rs->import_date)?></td>
		</tr>
		<tr>
			<th>วันที่บังคับใช้</th>
			<td><?=mysql_to_th($rs->use_date)?></td>
		</tr>
		<tr>
			<th>แก้ไขเพิ่มเติม</th>
			<td>
					<?if(isset($law_versions)):?>
				    <?foreach($law_versions as $key=>$row):?>
				    	<div><a href="law/view/<?=$row->law_id_select?>" target="_blank"><?=get_law_name($row->law_id_select)?></a> <span class="pull-right"><?=get_law_version_versiontype_status($row->version_type)?></span></div>
				    <?endforeach;?>
				    <?endif;?>
			</td>
		</tr>
		<tr>
			<th>คาบ/ข้าม</th>
			<td>
				<?if(isset($law_overlaps)):?>
			    <?foreach($law_overlaps as $key=>$row):?>
			    	<div><a href="law/view/<?=$row->ov_sk_law?>" target="_blank"><?=@get_law_name($row->ov_sk_law)?></a> <span class="pull-right"><?=$row->ov_sk_type?></span></div>
			    <?endforeach;?>
			    <?endif;?>
			</td>
		</tr>
		<tr>
			<th>Version</th>
			<td>
					<?if(isset($law_versions)):?>
				    <?foreach($law_versions as $key=>$row):?>
				    	<div><a href="upload/law/<?=@$row->version_filename?>">Version ปัจจุบัน</a></div>
						<div><a href="upload/law/<?=@$row->version_fileold?>">Version เก่า</a></div>
				    <?endforeach;?>
				    <?endif;?>
			</td>
		</tr>
		<?foreach($law_options as $law_option):?>
		<tr>
			<th><?=$law_option->typeName?></th>
			<td>
				<?foreach($law_optioninlaws as $row):?>
					<?if($row->law_option_id == $law_option->id):?>
						<div>
							<div><?=$row->option_name?></div>
							<?foreach($row->law_optionfile->get() as $optionfile):?>
								<a href="<?=$optionfile->op_filename?>" style="margin-left:15px;"><i class="fa fa-download"></i> <?=$optionfile->op_text?></a>
							<?endforeach;?>
						</div><br>
					<?endif;?>
				<?endforeach;?>
			</td>
		</tr>
		<?endforeach;?>
	</table>
</div>