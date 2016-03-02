<h3>สังกัด (เพิ่ม / แก้ไข)</h3>
<form id="usergroup_frm" action="admin/user_groups/save/<?=$rs->id?>" method="post">
<table class="tbadd">
<tr>
  <th>ชื่อสังกัด<span class="Txt_red_12"> *</span></th>
  <td class="chkPermiss">
    <input type="text" class="form-control" name="name" value="<?=$rs->name?>" style="width:500px;" />
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
	$("#usergroup_frm").validate({
	    rules:
	    {
	    	name:{required: true}
	    },
	    messages:
	    {
	    	name:{required: "กรุณากรอกชื่อสังกัด"}
	    }
    });
});
</script>
