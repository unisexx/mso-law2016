<h3>ประเภทย่อยกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อประเภทย่อยกฎหมาย">
  </div><br /><br />
  <select name="select2" class="form-control" style="width:auto;">
    <option>-- ทุกกลุ่มกฎหมาย --</option>
    <option>ในภารกิจ</option>
    <option>กฎหมายประกอบภารกิจ</option>
  </select>
  <select name="select" class="form-control" style="width:auto;">
    <option selected="selected">-- ทุกหมวดกฎหมาย --</option>
    <option>กฎหมายเด็กและเยาวชน</option>
    <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
    <option>กฎหมายผู้สูงอายุ</option>
    <option>กฎหมายสวัสดิการสังคม</option>
  </select>
  <select name="select3" class="form-control" style="width:auto;">
    <option>-- ทุกประเภทกฎหมาย --</option>
    <option>กฎหมายแม่บท (กฎหมายหลัก)</option>
    <option>อนุบัญญัติ</option>
    <option>มาตรการทางการบริหาร</option>
  </select>
<button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มประเภทย่อยกฎหมาย" value="เพิ่มประเภทย่อยกฎหมาย" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-warning vtip" />
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
  <th align="left">ลำดับ</th>
  <th align="left">ชื่อประเภทย่อยกฎหมาย</th>
  <th align="left">ประเภทกฎหมาย</th>
  <th align="left">หมวดกฎหมาย</th>
  <th align="left">กลุ่มกฎหมาย</th>
  <th align="left">จัดการ</th>
  </tr>
<tr>
  <td>1</td>
  <td>พระราชบัญญัติ</td>
  <td>กฎหมายแม่บท (กฎหมายหลัก)</td>
  <td>กฎหมายเด็กและเยาวชน</td>
  <td>ในภารกิจ</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td>พระราชกฤษฎีกา</td>
  <td>กฎหมายแม่บท (กฎหมายหลัก)</td>
  <td>กฎหมายเด็กและเยาวชน</td>
  <td>ในภารกิจ</td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd">ประกาศคณะปฎิวัติ</td>
  <td class="odd">กฎหมายแม่บท (กฎหมายหลัก)</td>
  <td>กฎหมายเด็กและเยาวชน</td>
  <td>ในภารกิจ</td>
  <td class="odd cursor"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td>กฎกระทรวง </td>
  <td>อนุบัญญัติ</td>
  <td class="odd cursor">กฎหมายเด็กและเยาวชน</td>
  <td>ในภารกิจ</td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>5</td>
  <td class="odd">ระเบียบ </td>
  <td class="odd">อนุบัญญัติ</td>
  <td>กฎหมายเด็กและเยาวชน</td>
  <td class="odd">ในภารกิจ</td>
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