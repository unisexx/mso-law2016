<h3>Distribute</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ID / Name / Tel">
  </div>
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มตัวแทนจำหน่าย" value="Add Distribute" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-warning vtip" />
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
  <th align="left">รหัส</th>
  <th align="left">ชื่อตัวแทนจำหน่าย</th>
  <th align="left">ข้อมูลติดต่อ</th>
  <th align="left" style="width:25%">ที่อยู่</th>
  <th align="left">เลือก</th>
  </tr>
<tr>
  <td>1</td>
  <td>THK20002</td>
  <td>I.N.B. Enterprise Co., Ltd.</td>
  <td>(66) 2 613-9166</td>
  <td>479/17-19 ถนนพระราม4 รองเมือง ปทุมวัน กรุงเทพ 10330</td>
  <td><a href="<?=basename($_SERVER['PHP_SELF'])?>?act=form"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td>AMD10027</td>
  <td>บจก. แอร์ ลิควิด (ประเทศไทย) </td>
  <td class="odd cursor">นางปานรดา เธอร์การ์ <br />
    089-998-8889</td>
  <td class="odd cursor">849 อาคารวรวัฒน์ ชั้น 14 ห้อง 1402ถนนสีลม แขวงสีลม เขตบางรัก กรุงเทพมหานคร 10500 </td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd">HHTR10025</td>
  <td class="odd">บจก. สยามสเตบิไลเซอร์สแอนด์เคมิคอลส์</td>
  <td>นายอมร กิจเชวงกุล<br />
    0-2586-2511-5</td>
  <td>ง.12 หมู่ 13 นิคมอุตสาหกรรมบางชัน ถนนเสรีไทย    	มีนบุรี  	มีนบุรี    	กรุงเทพมหานคร       	10510<br /></td>
  <td class="odd cursor"><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td align="left">BCT04006</td>
  <td align="left">บจก.โกลว์ เอสพีพี 3</td>
  <td class="odd cursor">นายสรยุทธ เพ็ชรตระกูล<br />
    0-2586-5281</td>
  <td class="odd cursor">888/210 หมู่ 19 ซอยยิ่งเจริญ ถนนบางพลี-ตำหรุ        	บางพลีใหญ่	บางพลี 	สมุทรปราการ 	10540</td>
  <td><img src="images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /> <img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
  </tr>
<tr>
  <td>5</td>
  <td align="left" class="odd">VP040041</td>
  <td align="left" class="odd">บจก. บี เอส ที อิลาสโตเมอร์ส</td>
  <td>นางสุนิดา สกุลรัตนะ<br />
    0-2676-6000</td>
  <td>623/1-2 หมู่ 11 ถนนสุขาภิบาล 8 	หนองขาม          	ศรีราชา 	ชลบุรี  	20280</td>
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