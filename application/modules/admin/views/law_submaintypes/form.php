<h3>ประเภทย่อยกฎหมาย (เพิ่ม / แก้ไข)</h3>
<form id="law_submaintypes_frm" action="admin/law_submaintypes/save/<?=$rs->id?>" method="post">
<table class="tbadd">
<tr>
  <th>ประเภทกฎหมาย<span class="Txt_red_12"> *</span></th>
  <td>
    <?=form_dropdown('law_maintype_id',get_option('id','typeName','law_maintypes order by typeName asc'),@$rs->law_maintype_id,'class="form-control" style="width:auto;"','-- กรุณาเลือกประเภทกฎหมาย --');?>
  </td>
</tr>
<tr>
  <th>ชื่อประเภทย่อยกฎหมาย<span class="Txt_red_12"> *</span></th>
  <td class="chkPermiss">
    <input type="text" class="form-control" name="typeName" value="<?=$rs->typeName?>" style="width:500px;" />
  </td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("#law_submaintypes_frm").validate({
	    rules:
	    {
	    	typeName:{required: true},
	    	law_maintype_id:{required: true}
	    },
	    messages:
	    {
	    	typeName:{required: "กรุณากรอกชื่อประเภทกฎหมาย"},
	    	law_maintype_id:{required: "กรุณาเลือกประเภทกฎหมาย"}
	    }
    });
});
</script>