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
					th : <a href="<?=$rs->filename_th?>"><?=file_icon($rs->filename_th)?></a> &nbsp;&nbsp;
				<?endif;?>
				<?if($rs->filename_eng != ""):?>
					eng : <a href="<?=$rs->filename_eng?>"><?=file_icon($rs->filename_eng)?></a>
				<?endif;?>
			</td>
		</tr>
		<tr>
			<th>อาศัยอำนาจกฎหมาย</th>
			<td>
				<div>ประเภทกฎหมายย่อยอาศัยอำนาจ  :  <?=$rs->apply_power_group != ""? get_law_submaintype_name($rs->apply_power_group) : '-' ;?></div>
				<div>อาศัยอำนาจกฎหมาย  : 
					<?
						$sql = "select * from law_datalaws where id='$rs->apply_power_id'";
						$datalaw = $this->db->query($sql)->row();
						if(@$datalaw->id != ""){
							echo"<a href='law/view/".$datalaw->id."' target='_blank'>".str_replace("|"," ",$rs->name_th)."</a>";
						}else{
							echo"-";
						}
					?>
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
				<div>ตอน : <?=$rs->gazette_data?></div>
				<div>วันที่ประกาศ : <?=$rs->gazete_notice_date?></div>
			</td>
		</tr>
		<tr>
			<th>วันที่ประกาศใช้</th>
			<td><?=$rs->notic_date?></td>
		</tr>
		<tr>
			<th>วันที่นำเข้า</th>
			<td><?=$rs->import_date?></td>
		</tr>
		<tr>
			<th>วันที่บังคับใช้</th>
			<td><?=$rs->use_date?></td>
		</tr>
		<tr>
			<th>แก้ไขเพิ่มเติม</th>
			<td>
					<?
						$sql = "select * from law_version where code='$rs->version_code' ";
						$law_versions = $this->db->query($sql)->result();
					?>
					<?if($law_versions):?>
						<?foreach($law_versions as $row):?>
							<?
								$sql = "select * from law_datalaws where id='$row->law_id_select'";
								$datalaw = $this->db->query($sql)->row();
							?>
							<?if($datalaw):?>
								<div><a href="law/view/<?=$datalaw->id?>" target="_blank"><?=str_replace("|"," ",$datalaw->name_th)?></a> <span class="pull-right"><?=get_law_version_version_type_status($row->version_type)?></span></div>
							<?endif;?>
						<?endforeach;?>
					<?else:?>
						-
					<?endif;?>
			</td>
		</tr>
		<tr>
			<th>คาบ/ข้าม</th>
			<td>
				<?
					$sql = "select * from law_overlap_or_skip where code='$rs->oos_code' ";
					$law_overlap_or_skip = $this->db->query($sql)->result();
				?>
				<?if($law_overlap_or_skip):?>
					<?foreach($law_overlap_or_skip as $row):?>
						<?
							$sql = "select * from law_datalaws where id='$row->ov_sk_law'";
							$datalaw = $this->db->query($sql)->row();
						?>
						<?if($datalaw):?>
							<div><a href="law/view/<?=$datalaw->id?>" target="_blank"><?=str_replace("|"," ",$datalaw->name_th)?></a> <span class="pull-right"><?=$rows->ov_sk_type?></span></div>
						<?endif;?>
					<?endforeach;?>
				<?else:?>
					-
				<?endif;?>
			</td>
		</tr>
		<tr>
			<th>Version</th>
			<td>
				<?
					$sql = "select * from law_version where law_id_select='$rs->id' ";
					$law_version = $this->db->query($sql)->row();
				?>
				<?if($law_version):?>
					<?
						$sql = "select * from law_datalaws where id='$law_version->law_id_select'";
						$datalaw = $this->db->query($sql)->row();
					?>
					<div><a href="upload/law/<?=@$law_version->version_filename?>">Version ปัจจุบัน</a></div>
					<div><a href="upload/law/<?=@$law_version->version_fileold?>">Version เก่า</a></div>
				<?else:?>
					-
				<?endif;?>
			</td>
		</tr>
		<?
			$sql = "select * from law_options";
			$law_options = $this->db->query($sql)->result();
		?>
		<?foreach($law_options as $law_option):?>
			<tr>
				<th><?=$law_option->typeName?></th>
				<td>
					<?
						$sql = "SELECT law_optioninlaw.option_name,law_optionfile.op_filename,law_optionfile.op_text 
		       FROM law_optioninlaw Inner Join law_optionfile ON law_optioninlaw.option_code = law_optionfile.option_code 
		       AND law_optioninlaw.code = law_optionfile.op_code WHERE law_optioninlaw.option_type_id = '$law_option->id' AND law_optioninlaw.code =  '$rs->option_code'";
			   			$optionfiles = $this->db->query($sql)->result();
					?>
					<?if($optionfiles):?>
						<?foreach($optionfiles as $optionfile):?>
							<div><i class="fa fa-download"></i> <a href="upload/optionfile/<?=$optionfile->op_filename?>"><?=$optionfile->option_name?></a></div>
						<?endforeach;?>
					<?else:?>
						-
					<?endif;?>
				</td>
			</tr>
		<?endforeach;?>
	</table>
</div>