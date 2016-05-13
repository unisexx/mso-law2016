<h3>Distribute (เพิ่ม / แก้ไข)</h3>
<table class="tbadd">
<tr>
  <th>รหัสตัวแทนจำหน่าย <span class="Txt_red_12">*</span></th>
  <td><input type="text" class="form-control" id="exampleInputName" placeholder="Distribute ID" style="width:150px;" /></td>
</tr>
<tr>
  <th>ชื่อตัวแทนจำหน่าย<span class="Txt_red_12"> *</span></th>
  <td>
    <input type="text" class="form-control " id="exampleInputName2" placeholder="Distribute Name" style="width:600px;">
    </td>
</tr>
<tr>
  <th>ที่อยู่<span class="Txt_red_12"> *</span></th>
  <td><input type="text" class="form-control " id="exampleInputName3" placeholder="Address" style="width:600px;" /></td>
</tr>
<tr>
  <th>จังหวัด / อำเภอ / ตำบล<span class="Txt_red_12"> *</span></th>
  <td>
  <form class="form-inline">
  <select name="select2" class="form-control" style="width:auto;">
    <option>+ Select Province +</option>
  </select> 
    / 
    <select name="select3" class="form-control" style="width:auto;">
      <option>+ Select Aumpor +</option>
    </select> 
    / 
    <select name="select4" class="form-control" style="width:auto;">
      <option>+ Select Tumbon +</option>
    </select>
    </form>
    </td>
</tr>
<tr>
  <th>รหัสไปรษณีย์<span class="Txt_red_12"> *</span></th>
  <td> 
    <input type="text" class="form-control numOnly" id="exampleInputName4" placeholder="Postal code" style="width:150px;" maxlength="5" />
 </td>
</tr>
<tr>
  <th>เบอร์โทรศัพท์<span class="Txt_red_12"> *</span></th>
  <td>
    <input type="text" class="form-control" id="exampleInputName5" placeholder="Phone" style="width:400px;" />
  </td>
</tr>
<tr>
  <th>เบอร์โทรสาร</th>
  <td><input type="text" class="form-control" id="exampleInputName6" placeholder="Fax" style="width:400px;" /></td>
</tr>
<tr>
  <th>อีเมล์ / เว็บไซต์<span class="Txt_red_12"></span></th>
  <td>
  <form class="form-inline">
  <input type="text" class="form-control" id="exampleInputName7" placeholder="Email" style="width:300px;" /> / http://
  <input type="text" class="form-control" id="exampleInputName7" placeholder="Website" style="width:350px;" /></form>
  </td>
</tr>
<tr>
  <th>หมายเหตุ</th>
  <td><textarea rows="4" class="form-control" id="exampleInputName11" style="width:600px;" placeholder="Remark"></textarea></td>
</tr>
<tr>
  <th colspan="2" style="background:#F0F0F0;">&nbsp;</th>
</tr>
<tr>
  <th>ชื่อผู้ติดต่อ</th>
  <td><input type="text" class="form-control" id="exampleInputName10" placeholder="Contact Name" style="width:400px;" /></td>
</tr>
<tr>
  <th>ตำแหน่ง</th>
  <td><input type="text" class="form-control" id="exampleInputName13" placeholder="Positon" style="width:400px;" /></td>
</tr>
<tr>
  <th>เบอร์ผู้ติดต่อ</th>
  <td><input type="text" class="form-control" id="exampleInputName12" placeholder="Phone" style="width:400px;" /></td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>




<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_content' style='padding:10px; background:#fff;'>
			<p><strong>This content comes from a hidden element on this page.</strong></p>
			<p>The inline option preserves bound JavaScript events and changes, and it puts the content back where it came from when it is closed.</p>
			<p><a id="click" href="#" style='padding:5px; background:#ccc;'>Click me, it will be preserved!</a></p>
			
			<p><strong>If you try to open a new Colorbox while it is already open, it will update itself with the new content.</strong></p>
			<p>Updating Content Example:<br />
			<a class="ajax" href="../content/ajax.html">Click here to load new content</a></p>
			</div>
		</div>