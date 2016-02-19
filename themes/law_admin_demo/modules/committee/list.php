<h3>คณะกรรมการ</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-3">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อคณะกรรมการ">
    </div>
    <select name="select2" class="form-control" style="width:auto;">
    <option selected="selected">-- ทุกประเภทคณะกรรมการ --</option>
    <option>คณะกรรมการตามมติ ครม.</option>
    <option>คณะกรรมการจากการแต่งตั้ง(โดยกฎหมาย)</option>
  </select>
    <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" /> - <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" />
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มคณะกรรมการ" value="เพิ่มคณะกรรมการ" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-warning vtip" />
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
  <th>#</th>
  <th>ปี</th>
  <th>ประเภทคณะกรรมการ</th>
  <th>วันที่ แต่งตั้ง</th>
  <th>ชื่อ - นามสกุล</th>
  <th>จัดการ</th>
  </tr>
<tr>
  <td>1</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td class="odd">&nbsp;</td>
  <td class="odd cursor"><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td align="left">&nbsp;</td>
  <td align="left">&nbsp;</td>
  <td align="left">&nbsp;</td>
  <td align="left">&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>5</td>
  <td align="left" class="odd">&nbsp;</td>
  <td align="left" class="odd">&nbsp;</td>
  <td align="left" class="odd">&nbsp;</td>
  <td align="left" class="odd">&nbsp;</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
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