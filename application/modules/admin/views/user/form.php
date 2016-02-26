<h3>ผู้ใช้งาน (เพิ่ม / แก้ไข)</h3>
<form action="admin/user/save">
	<table class="tbadd">
	<tr>
	  <th>ชื่อ / สกุล<span class="Txt_red_12"> *</span></th>
	  <td><span class="form-inline"><input name="textarea7" type="text" class="form-control" placeholder="ชื่อผู้ใช้งาน" id="textarea7" value="<?=$rs->name?>" style="width:250px;"/> / <input name="textarea7" type="text" class="form-control" placeholder="นามสกุลผู้ใช้งาน" id="textarea7" value="<?=$rs->lastname?>" style="width:350px;"/></span></td>
	</tr>
	<tr>
	  <th>ตำแหน่ง</th>
	  <td>
	    <select name="select" class="form-control" style="width:auto;">
	      <option>-- เลือกตำแหน่ง --</option>
	    </select>
	</td>
	</tr>
	<tr>
	  <th>เบอร์โทร</th>
	  <td><span class="form-inline"><input name="textarea5" type="text" class="form-control" id="textarea5" value="" style="width:200px;"/> ต่อ
	  <input name="textarea5" type="text" class="form-control" id="textarea5" value="" style="width:70px;"/></span>
	  </td>
	</tr>
	<tr>
	  <th>วันที่</th>
	  <td>
	  	<span class="form-inline">
	    <div class="input-group date">
		  <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
		</div>
	    </span>
	</td>
	</tr>
	<tr>
	  <th>สังกัด</th>
	  <td>
	    <select name="select2" class="form-control" style="width:auto;">
	      <option>-- เลือกสังกัด --</option>
	    </select>
	</td>
	</tr>
	<tr>
	  <th>สิทธ์การใช้งาน</th>
	  <td><input name="textarea6" type="text" disabled="disabled" class="form-control" id="textarea6" style="width:300px;" value=""/></td>
	</tr>
	<tr>
	  <th>อีเมล์<span class="Txt_red_12"> *</span></th>
	  <td><input name="textarea2" type="text" class="form-control" id="textarea2" value="" style="width:400px;"/></td>
	</tr>
	<tr>
	  <th>Username<span class="Txt_red_12"> *</span></th>
	  <td><input name="textarea4" type="text" class="form-control" id="textarea4" value="" style="width:200px;"/></td>
	</tr>
	<tr>
	  <th>รหัสผ่าน<span class="Txt_red_12"> *</span></th>
	  <td><input name="textarea" type="text" class="form-control" id="textarea" value="" style="width:200px;"/></td>
	</tr>
	<tr>
	  <th>ยืนยันรหัสผ่าน<span class="Txt_red_12"> *</span></th>
	  <td><input name="textarea3" type="text" class="form-control" id="textarea3" value="" style="width:200px;"/></td>
	</tr>
	</table>
	<div id="btnBoxAdd">
	  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
	  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
	</div>
</form>