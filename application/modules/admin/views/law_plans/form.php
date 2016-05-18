<h3>แผนพัฒนากฎหมาย (เพิ่ม / แก้ไข)</h3>

<form id="law_plans_frm" method="post" enctype="multipart/form-data" action="admin/law_plans/save/<?=$rs->id?>">
<!-- Nav tabs -->
  <!-- <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul> -->


<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>เเผนพัฒนากฎหมายปี พ.ศ. </th>
          <td>
	          <select name="plan_year" class="form-control" style="width:auto;">
	            <option>-- เลือกปี พ.ศ. --</option>
	            <?
	            	$firstYear = 2553;
					$lastYear = $firstYear + 10;
					for($i=$firstYear;$i<=$lastYear;$i++):
				?>
					<option value="<?=$i?>" <?if($rs->plan_year == $i){ echo "selected"; }?>><?=$i?></option>
				<?endfor;?>
	          </select>
          </td>
        </tr>
        <tr>
          <th>ชื่อแผนพัฒนากฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td>
          	<input rel="th" type="text" class="form-control" name="plan_name[th]" value="<?=lang_decode($rs->plan_name,'th')?>" style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>ชื่อแผนพัฒนากฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="plan_name[en]" value="<?=lang_decode($rs->plan_name,'en')?>"  style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (ไทย)</th>
          <td>
          	<?if($rs->plan_file_th != ""):?>
          		<a href="uploads/planfile/<?=$rs->plan_file_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->plan_file_th?></a>
          	<?endif;?>
          	<input type="file" name="plan_file_th" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (อังกฤษ)</th>
          <td>
          	<?if($rs->plan_file_en != ""):?>
          		<a href="uploads/planfile/<?=$rs->plan_file_en?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->plan_file_en?></a>
          	<?endif;?>
          	<input type="file" name="plan_file_en" class="form-control" id="fileField" />
          </td>
        </tr>
        </table>
    </div>
</div>


<div id="btnBoxAdd">
  <input type="hidden" name="create_by" value="<?=user_login()->id?>">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>

<script type="text/javascript">
$(function() {
	// $("[rel=en]").hide();
// 	
	// $(".lang a").click(function(){
		// $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		// $(this).closest('li').addClass('active').siblings().removeClass('active');
		// return false;
	// })
	
	
	$("#law_plans_frm").validate({
	    rules:
	    {
	    	'plan_name[th]':{required: true},
        	'plan_name[en]':{required: true}
	    },
	    messages:
	    {
	    	'plan_name[th]':{required: "ชื่อแผนพัฒนากฎหมาย (ไทย)"},
        	'plan_name[en]':{required: "ชื่อแผนพัฒนากฎหมาย (อังกฤษ)"}
	    }
    });
});
</script>