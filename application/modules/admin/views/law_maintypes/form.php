<h3>ประเภทกฎหมาย (เพิ่ม / แก้ไข)</h3>
<form id="law_maintypes_frm" action="admin/law_maintypes/save/<?=$rs->id?>" method="post">
<table class="tbadd">
<tr>
  <th>ชื่อประเภทกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
  <td class="chkPermiss">
    <input rel="th" type="text" class="form-control" name="typeName[th]" value="<?=lang_decode($rs->typeName,'th')?>" style="width:500px;" />
  </td>
</tr>
<tr>
  <th>ชื่อประเภทกฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
  <td class="chkPermiss">
    <input rel="en" type="text" class="form-control" name="typeName[en]" value="<?=lang_decode($rs->typeName,'en')?>" style="width:500px;" />
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
	$("#law_maintypes_frm").validate({
	    rules:
	    {
	    	typeName:{required: true}
	    },
	    messages:
	    {
	    	typeName:{required: "กรุณากรอกชื่อประเภทกฎหมาย"}
	    }
    });
});
</script>