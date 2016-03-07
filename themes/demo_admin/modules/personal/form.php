<h3>บุคลากร (เพิ่ม / แก้ไข)</h3>
<table class="tbadd">
<tr>
  <th>ปีที่ใช้งาน <span class="Txt_red_12"> *</span></th>
  <td><select name="select">
    <option>-- ปีงบประมาณ --</option>
    <option selected="selected">2559</option>
    <option>2560</option>
  </select></td>
</tr>
<tr>
  <th>ชื่อ - สกุล (ไทย)<span class="Txt_red_12"> *</span></th>
  <td><select name="select5" id="select4">
    <option>-- เลือกคำนำหน้า --</option>
  </select>    
    <input name="textarea7" type="text" id="textarea7" value="" style="width:500px;" placeholder="ชื่อ - สกุล"/></td>
</tr>
<tr>
  <th>ชื่อ - สกุล (อังกฤษ)<span class="Txt_red_12"> *</span></th>
  <td><select name="select6" id="select5" disabled="disabled">
    <option>-- Select Prefix --</option>
  </select>
    <input name="textarea2" type="text" id="textarea2" value="" style="width:500px;" placeholder="Name - Surname"/></td>
</tr>
<tr>
  <th>ตำแหน่ง<span class="Txt_red_12"> *</span></th>
  <td><select name="select7" id="select6">
    <option selected="selected">-- เลือกตำแหน่ง --</option>
    <option>รัฐมนตรีว่าการ / Minister</option>
    <option>ผู้ช่วยรัฐมนตรีประจำกระทรวง / Vice Minister for Social Development and Human Security</option>
  </select></td>
</tr>
<tr>
  <th>รูปภาพ</th>
  <td><input type="file" name="fileField" id="fileField"/></td>
</tr>
<tr>
  <th>สังกัดหน่วยงาน <span class="Txt_red_12">*</span></th>
  <td><select name="select2">
    <option selected="selected">-- เลือกกรม --</option>
    <option>สำนักงานรัฐมนตรี</option>
    <option>สำนักงานปลัดกระทรวง</option>
    <option>กรมพัฒนาสังคมและสวัสดิการ</option>
    <option>กรมกิจการเด็กและเยาวชน</option>
    <option>กรมกิจการสตรีและสถาบันครอบครัว</option>
    <option>กรมส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
    <option>กรมกิจการผู้สูงอายุ</option>
    <option>การเคหะแห่งชาติ</option>
    <option>สถานธนานุเคราะห์</option>
    <option>สถาบันพัฒนาองค์กรชุมชน</option>
  </select>
    <select name="select3">
      <option>-- เลือกกอง/สำนัก --</option>
    </select></td>
</tr>
<tr>
  <th>หมายเลขโทรศัพท์<span class="Txt_red_12"> *</span></th>
  <td><span style="margin-right:10px;">1.
    <input name="textarea" type="text" id="textarea" value="" style="width:150px;" placeholder="เบอร์ที่ทำงาน"/>
    <input name="textarea3" type="text" id="textarea3" value="" style="width:70px;" placeholder="เบอร์ภายใน"/>
    </span>
    <span style="margin-right:10px;">2. 
    <input name="textarea" type="text" id="textarea" value="" style="width:150px;" placeholder="เบอร์ที่ทำงาน"/>
    <input name="textarea3" type="text" id="textarea3" value="" style="width:70px;" placeholder="เบอร์ภายใน"/>
    </span>
    3. 
    <input name="textarea" type="text" id="textarea" value="" style="width:150px;" placeholder="เบอร์ที่ทำงาน"/>
    <input name="textarea3" type="text" id="textarea3" value="" style="width:70px;" placeholder="เบอร์ภายใน"/></td>
</tr>
<tr>
  <th>หมายเลขโทรสาร</th>
  <td><span style="margin-right:10px;">1. 
    <input name="textarea5" type="text" id="textarea6" value="" style="width:150px;"/></span>

    <span style="margin-right:10px;">2. 
    <input name="textarea12" type="text" id="textarea14" value="" style="width:150px;"/></span>

    3. 
    <input name="textarea13" type="text" id="textarea15" value="" style="width:150px;"/></td>
</tr>
<tr>
  <th>มือถือ</th>
  <td>1.
    <span style="margin-right:10px;"><input name="textarea14" type="text" id="textarea16" value="" style="width:150px;"/></span>
    
    2.
  <input name="textarea14" type="text" id="textarea17" value="" style="width:150px;"/></td>
</tr>
<tr>
  <th>อีเมล์</th>
  <td><input name="textarea14" type="text" id="textarea18" value="" style="width:400px;"/></td>
</tr>
<tr>
  <th>Facebook</th>
  <td><input name="textarea9" type="text" id="textarea8" value="" style="width:400px;"/></td>
</tr>
<tr>
  <th>Line ID</th>
  <td><input name="textarea10" type="text" id="textarea9" value="" style="width:300px;"/></td>
</tr>
<tr>
  <th>สถานะ</th>
  <td><select name="select4" id="select">
    <option>รอการตรวจสอบ</option>
    <option>ตรวจสอบแล้ว</option>
    <option>ส่งกลับไปแก้ไข</option>
  </select></td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>