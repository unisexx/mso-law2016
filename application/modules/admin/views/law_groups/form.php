<h3>กลุ่มกฎหมาย (เพิ่ม / แก้ไข)</h3>

<form id="law_groups_frm" action="admin/law_groups/save/<?=$rs->id?>" method="post">

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
          <th>ชื่อกลุ่มกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td class="chkPermiss">
            <input rel="th" type="text" class="form-control" name="name[th]" value="<?=lang_decode($rs->name,'th')?>" style="width:500px;" />
          </td>
        </tr>
        <tr>
          <th>ชื่อกลุ่มกฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td class="chkPermiss">
            <input rel="en" type="text" class="form-control" name="name[en]" value="<?=lang_decode($rs->name,'en')?>" style="width:500px;" />
          </td>
        </tr>
        </table>
    </div>
</div>


<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	// $("[rel=en]").hide();
// 	
	// $(".lang a").click(function(){
		// $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		// $(this).closest('li').addClass('active').siblings().removeClass('active');
		// return false;
	// })
	
	$("#law_groups_frm").validate({
      ignore: [],
	    rules:
	    {
	    	'name[th]':{required: true},
        	'name[en]':{required: true}
	    },
	    messages:
	    {
	    	'name[th]':{required: "กรุณากรอกชื่อกลุ่มกฎหมายไทย"},
        	'name[en]':{required: "กรุณากรอกชื่อกลุ่มกฎหมายอังกฤษ"}
	    }
    });
});
</script>
