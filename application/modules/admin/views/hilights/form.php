<h3>ไฮไลท์ (เพิ่ม / แก้ไข)</h3>

<form id="hilight_frm" method="post" enctype="multipart/form-data" action="admin/hilights/save/<?=$rs->id?>">
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
          <th>ชื่อไฮไลท์ (ไทย)<span class="Txt_red_12"> *</span></th>
          <td>
          	<input rel="th" type="text" class="form-control" name="name[th]" value="<?=lang_decode($rs->name,'th')?>" style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>ชื่อไฮไลท์ (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="name[en]" value="<?=lang_decode($rs->name,'en')?>"  style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (ไทย)<br>ขนาด 863 x 266 px</th>
          <td>
          	<?if($rs->img_th != ""):?>
          		<a href="uploads/hilight/<?=$rs->img_th?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->img_th?></a>
          	<?endif;?>
          	<input type="file" name="img_th" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร (อังกฤษ)<br>ขนาด 863 x 266 px</th>
          <td>
          	<?if($rs->img_en != ""):?>
          		<a href="uploads/hilight/<?=$rs->img_en?>" target="_blank"><i class="fa fa-file-pdf-o"></i> <?=$rs->img_en?></a>
          	<?endif;?>
          	<input type="file" name="img_en" class="form-control" id="fileField" />
          </td>
        </tr>
        <tr>
        	<th>ลิ้งค์</th>
        	<td><input type="text" class="form-control" name="url" value="<?=$rs->url?>"  style="width:800px;" placeholder="http://law.m-society.go.th/law2016" /></td>
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
	
	
	$("#hilight_frm").validate({
	    rules:
	    {
	    	'name[th]':{required: true},
        	'name[en]':{required: true}
	    },
	    messages:
	    {
	    	'name[th]':{required: "ชื่อไฮไลท์ (ไทย)"},
        	'name[en]':{required: "ชื่อไฮไลท์ (อังกฤษ)"}
	    }
    });
});
</script>