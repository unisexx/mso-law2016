<h3>มติ ครม. (เพิ่ม / แก้ไข)</h3>

<form id="law_resolutions_frm" method="post" enctype="multipart/form-data" action="admin/law_resolutions/save/<?=$rs->id?>">
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
          <th>ปี พ.ศ.  <span class="Txt_red_12">*</span></th>
          <td>
          	<select name="resolution_year" class="form-control" style="width:auto;">
	            <option>-- เลือกปี พ.ศ. --</option>
	            <?
	            	$firstYear = 2553;
					$lastYear = $firstYear + 10;
					for($i=$firstYear;$i<=$lastYear;$i++):
				?>
					<option value="<?=$i?>" <?if($rs->resolution_year == $i){ echo "selected"; }?>><?=$i?></option>
				<?endfor;?>
	          </select>
          </td>
        </tr>
        <tr>
          <th>ฉบับที่ <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" name="resolution_no"  value="<?=$rs->resolution_no?>" /></td>
        </tr>
        <tr>
          <th>ชื่อเรื่อง (ไทย) <span class="Txt_red_12">*</span></th>
          <td>
            <input rel="th" type="text" class="form-control" name="resolution_name[th]" value="<?=lang_decode($rs->resolution_name,'th')?>" style="width:800px;" />
            </td>
        </tr>
        <tr>
          <th>ชื่อเรื่อง (อังกฤษ) <span class="Txt_red_12">*</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="resolution_name[en]" value="<?=lang_decode($rs->resolution_name,'en')?>"  style="width:800px;" />
            </td>
        </tr>
        <tr>
          <th>วันที่ ครม. มีมติ<span class="Txt_red_12"> *</span></th>
          <td>
	      	<span class="form-inline">
		    <div class="input-group date">
			  <input type="text" class="form-control datepickerTH" name="resolution_dateappoint" data-date-language="th-th" value="<?=DB2Date($rs->resolution_dateappoint)?>"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
			</div>
		    </span>
		 </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (ไทย)</th>
          <td>
          	<?if($rs->resolution_file_th != ""):?>
          		<a href="uploads/resolutionfile/<?=$rs->resolution_file_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->resolution_file_th?></a>
          	<?endif;?>
          	<input type="file" name="resolution_file_th" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (อังกฤษ)</th>
          <td>
          	<?if($rs->resolution_file_en != ""):?>
          		<a href="uploads/resolutionfile/<?=$rs->resolution_file_en?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->resolution_file_en?></a>
          	<?endif;?>
          	<input type="file" name="resolution_file_en" class="form-control" id="fileField" />
          </td>
        </tr>
        </table>
    </div>
    
</div>


<div id="btnBoxAdd">
	<?if($rs->id == ""):?>
  	<input type="hidden" name="resolution_createby" value="<?=user_login()->id?>">
  <?else:?>
  	<input type="hidden" name="resolution_updateby" value="<?=user_login()->id?>">
  <?endif;?>
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
	
	$("#law_resolutions_frm").validate({
	    rules:
	    {
	    	resolution_year:{required: true},
        	resolution_no:{required: true},
	    	'resolution_name[th]':{required: true},
        	'resolution_name[en]':{required: true},
        	resolution_dateappoint:{required: true}
	    },
	    messages:
	    {
	    	resolution_year:{required: "กรุณาเลือกปี"},
        	resolution_no:{required: "กรุณากรอกฉบับที่"},
	    	'resolution_name[th]':{required: "กรุณากรอกชื่อเรื่อง (ไทย)"},
        	'resolution_name[en]':{required: "กรุณากรอกชื่อเรื่อง (อังกฤษ)"},
        	resolution_dateappoint:{required: "กรุณาเลือกวันที่ ครม. มีมติ"}
	    }
    });
});
</script>