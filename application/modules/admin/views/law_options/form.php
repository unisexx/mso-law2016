<h3>OPTION กฎหมาย (เพิ่ม / แก้ไข)</h3>
<form id="law_options_frm" action="admin/law_options/save/<?=$rs->id?>" method="post">
<table class="tbadd">
<tr>
  <th>ชื่อ Option กฎหมาย<span class="Txt_red_12"> *</span></th>
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
	$("#law_options_frm").validate({
	    rules:
	    {
	    	typeName:{required: true}
	    },
	    messages:
	    {
	    	typeName:{required: "กรุณากรอกชื่อ Option กฎหมาย"}
	    }
    });
});
</script>
