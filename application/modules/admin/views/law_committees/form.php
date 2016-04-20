<h3>มติ ครม. (เพิ่ม / แก้ไข)</h3>

<form method="post" enctype="multipart/form-data" action="admin/law_committees/save/<?=$rs->id?>">
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>

<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>ประเภทคณะกรรมการ</th>
          <td>
          	<span class="form-inline">
          		<?=form_dropdown('law_committee_type_id',get_option('id','name','law_committee_types order by id asc'),@$rs->law_committee_type_id,'class="form-control" style="width:auto;"','-- เลือกประเภทคณะกรรมการ --');?>
	          </span>
          </td>
        </tr>
        <tr>
          <th>ปี พ.ศ.  <span class="Txt_red_12">*</span></th>
          <td>
          	<select name="committee_year" class="form-control" style="width:auto;">
	            <option>-- เลือกปี พ.ศ. --</option>
	            <?
	            	$firstYear = 2553;
					$lastYear = $firstYear + 10;
					for($i=$firstYear;$i<=$lastYear;$i++):
				?>
					<option value="<?=$i?>" <?if($rs->committee_year == $i){ echo "selected"; }?>><?=$i?></option>
				<?endfor;?>
	          </select>
          </td>
        </tr>
        <tr>
          <th>ถูกแต่งตั้งในชุดที่ <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" name="committee_set" value="<?=$rs->committee_set?>" /></td>
        </tr>
        <tr>
          <th>วันที่ แต่งตั้ง<span class="Txt_red_12"> *</span></th>
          <td>
		  	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control" name="committee_dateappoint" value="<?=$rs->committee_dateappoint?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		</td>
        </tr>
        <tr>
          <th>ชื่อ-สกุล<span class="Txt_red_12">*</span></th>
          <td>
            <input rel="th" type="text" class="form-control" name="committee_name[th]" value="<?=lang_decode($rs->committee_name,'th')?>" style="width:400px;" />
            <input rel="en" type="text" class="form-control" name="committee_name[en]" value="<?=lang_decode($rs->committee_name,'en')?>"  style="width:400px;" />
            </td>
        </tr>
        <tr>
          <th>ตำแหน่ง<span class="Txt_red_12"> *</span></th>
          <td>
          	<input rel="th" type="text" class="form-control" name="committee_position[th]" value="<?=lang_decode($rs->committee_position,'th')?>" style="width:600px;" />
            <input rel="en" type="text" class="form-control" name="committee_position[en]" value="<?=lang_decode($rs->committee_position,'en')?>"  style="width:600px;" />
          	</td>
        </tr>
        <tr>
          <th>ประวัติ</th>
          <td>
          	<textarea rel="th"  rows="7" class="form-control" style="width:600px;" name="committee_history[th]"><?=lang_decode($rs->committee_history,'th')?></textarea>
          	<textarea rel="en"  rows="7" class="form-control" style="width:600px;" name="committee_history[en]"><?=lang_decode($rs->committee_history,'en')?></textarea>
          </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td>
          	<?if($rs->committee_picfile != ""):?>
          		<a href="uploads/law_committees/<?=$rs->committee_picfile?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->committee_picfile?></a>
          	<?endif;?>
          	<input type="file" name="committee_picfile" class="form-control" id="fileField" />
          </td>
        </tr>
        </table>  
    </div>
</div>


<div id="btnBoxAdd">
  <?if($rs->id == ""):?>
  	<input type="hidden" name="committee_createby" value="<?=user_login()->id?>">
  <?else:?>
  	<input type="hidden" name="committee_updateby" value="<?=user_login()->id?>">
  <?endif;?>
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>

<script type="text/javascript">
$(function() {
	$("[rel=en]").hide();
	
	$(".lang a").click(function(){
		$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		$(this).closest('li').addClass('active').siblings().removeClass('active');
		return false;
	})
});
</script>