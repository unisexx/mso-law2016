<h3>บุคลากร</h3>
<div id="search">
<div id="searchBox">
  <select name="select">
    <option>-- ปีงบประมาณ --</option>
    <option selected="selected">2559</option>
  </select>
  <input name="input" type="text" style="width:300px;" placeholder="ชื่อ - สกุล / อีเมล์" />
  <select name="select2">
    <option selected="selected">-- ทุกกรม --</option>
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
    <option>-- ทุกกอง/สำนัก --</option>
  </select>
<input type="submit" name="button9" id="button9" value="Search" class="btn btn-default vtip" style="width:80px;" title="ค้นหา" /></div>
</div>

<div style="margin:20px 0;">
<select name="">
  <option>-- เลื่อนลำดับจากรายการที่เลือก --</option>
  <option>เลื่อนขึ้น 1 ลำดับ</option>
  <option>เลื่อนลง 1 ลำดับ</option>
  <option>เลื่อนไปตำแหน่งบนสุด (Top)</option>
  <option>เลื่อนไปตำแหน่งล่างสุด (Last)</option>
</select>
<input type="submit" name="button" id="button" value="เลื่อนลำดับ" class="btn btn-default vtip" style="width:120px;" title="เลื่อนลำดับ" />
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มบุคลากร" value="เพิ่มบุคลากร" style="width:120px; height:30px;" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-primary vtip" />
</div>

<div class="paginationTG">
	<ul>
    <li style="margin-right:10px;">หน้าที่</li>
	<li class="currentpage">1</li><li ><a href=''>2</a></li>
	<li><a href="">3</a></li>
	<li><a href="">4</a></li>
	<li><a href="">5</a></li>
	<li><a href="">6</a></li>
	<li><a href="">7</a></li> . . . <li ><a href="">19</a></li>
	<li><a href="">20</a></li><li ><a href="">21</a></li>
	</ul>
</div>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>เลือก</th>
  <th>ขึ้น / ลง</th>
  <th>ชื่อ-สกุล</th>
  <th>ตำแหน่ง</th>
  <th>สังกัดหน่วยงาน</th>
  <th>ปีงบประมาณ</th>
  <th>สถานะ</th>
  <th>จัดการ</th>
  </tr>
<tr>
  <td>1</td>
  <td><input type="checkbox" name="checkbox" id="checkbox" />
    <label for="checkbox"></label></td>
  <td><img src="images/down.png" width="24" height="24" style="margin-left:40px;" /></td>
  <td>นายไมตรี  อินทุสุต</td>
  <td>ปลัดกระทรวง</td>
  <td>สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</td>
  <td>2559</td>
  <td><img src="images/status_wait.png" width="16" height="16" /></td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td><input type="checkbox" name="checkbox2" id="checkbox2" /></td>
  <td><img src="images/up.png" width="24" height="24" /> / <img src="images/down.png" width="24" height="24" /></td>
  <td>ว่าที่ร้อยตรีศรัณย์ สมานพันธ์ </td>
  <td>รองปลัดกระทรวง</td>
  <td>สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</td>
  <td>2559</td>
  <td><img src="images/status_return.png" width="16" height="16" /></td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>3</td>
  <td><input type="checkbox" name="checkbox3" id="checkbox3" /></td>
  <td><img src="images/up.png" width="24" height="24" /> / <img src="images/down.png" width="24" height="24" /></td>
  <td>นางจารุชา ลิ้มแหลมทอง </td>
  <td>ผู้อำนวยการ</td>
  <td>ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร<br />
    สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์<br /></td>
  <td>2559</td>
  <td class="odd cursor"><img src="images/status_accept.png" width="16" height="16" /></td>
  <td class="odd cursor"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td><input type="checkbox" name="checkbox4" id="checkbox4" /></td>
  <td><img src="images/up.png" width="24" height="24" /> / <img src="images/down.png" width="24" height="24" /></td>
  <td>นางสาวอวยพร ศรีสังข์</td>
  <td>ผู้อำนวยการ</td>
  <td>กลุ่มการพัฒนาระบบเทคโนโลยีและการสื่อสาร<br />
    ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร<br />
สำนักงานปลัดกระทรวงการพัฒนาสังคมและความมั่นคงของมนุษย์</td>
  <td>2559</td>
  <td><span class="odd cursor"><img src="images/status_accept.png" width="16" height="16" /></span></td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>5</td>
  <td><input type="checkbox" name="checkbox5" id="checkbox5" /></td>
  <td><img src="images/up.png" width="24" height="24" /></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>2559</td>
  <td><span class="odd cursor"><img src="images/status_accept.png" width="16" height="16" /></span></td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
</table>

<div class="paginationTG">
	<ul>
    <li style="margin-right:10px;">หน้าที่</li>
	<li class="currentpage">1</li><li ><a href=''>2</a></li>
	<li><a href="">3</a></li>
	<li><a href="">4</a></li>
	<li><a href="">5</a></li>
	<li><a href="">6</a></li>
	<li><a href="">7</a></li> . . . <li ><a href="">19</a></li>
	<li><a href="">20</a></li><li ><a href="">21</a></li>
  </ul>
</div>