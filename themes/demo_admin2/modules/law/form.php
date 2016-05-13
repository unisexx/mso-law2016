<h3>ข้อมูลกฎหมาย (เพิ่ม / แก้ไข)</h3>
<!-- Nav tabs 
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#thai" aria-controls="thai" role="tab" data-toggle="tab"><img src="images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab"><img src="images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>  -->
  
  
<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>กลุ่มกฎหมาย &gt; หมวดกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <select name="select" class="form-control" style="width:auto;">
              <option>-- เลือกกลุ่มกฎหมาย --</option>
              <option>ในภารกิจ</option>
              <option>กฎหมายประกอบภารกิจ</option>
            </select>
            &gt; 
            <select name="select3" class="form-control" style="width:auto;">
              <option selected="selected">-- เลือกหมวดกฎหมาย --</option>
              <option>กฎหมายเด็กและเยาวชน</option>
              <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
              <option>กฎหมายผู้สูงอายุ</option>
              <option>กฎหมายสวัสดิการสังคม</option>
            </select>
          </span></td>
        </tr>
        <tr>
          <th>ประเภทกฎหมาย &gt; ประเภทย่อยกฎหมาย <span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline"><select name="select4" class="form-control" style="width:auto;">
            <option selected="selected">-- เลือกประเภทกฎหมาย --</option>
            <option>กฎหมายแม่บท (กฎหมายหลัก)</option>
            <option>อนุบัญญัติ</option>
            <option>มาตรการทางการบริหาร</option>
          </select>
            &gt; 
            <select name="select5" class="form-control" style="width:auto;">
              <option>-- เลือกประเภทย่อยกฎหมาย --</option>
            </select></span></td>
        </tr>
        <tr>
          <th>ชื่อกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:800px;" />
            
            </td>
        </tr>
        <tr>
          <th>ชื่อกฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td><input type="text" class="form-control" id="exampleInputName12" style="width:800px;" /></td>
        </tr>
        <tr>
          <th>วันที่ประกาศในราชกิจจานุเบกษา <span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName11" value="<? echo date("d/m/").(date("Y")+543); ?>" style="width:120px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /> /
            เล่ม
            <input type="text" class="form-control" id="exampleInputName7" style="width:100px; margin-right:30px;" />
            <input name="radiobutton" value="2" type="radio" />
            ตอนพิเศษ  
            <input name="radiobutton" value="2" type="radio" />
            ตอนที่ 
            <input type="text" class="form-control" id="exampleInputName3" style="width:100px;" />
          </span></td>
        </tr>
        <tr>
          <th>อาศัยอำนาจกฎหมาย</th>
          <td>
            <select name="select2" class="form-control" style="width:auto;">
              <option selected="selected">-- เลือกประเภทกฎหมายย่อยที่อาศัยอำนาจ --</option>
              <option>พระราชบัญญัติ</option>
              <option>พระราชกฤษฎีกา</option>
              <option>ประกาศคณะปฎิวัติ</option>
              <option>กฎกระทรวง</option>
              <option>ระเบียบ</option>
              <option>ประกาศ</option>
              <option>ข้อบังคับ</option>
            </select>
        </td>
        </tr>
        <tr>
          <th>ผูกกฎหมาย (คาบ/ข้าม)</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
          <a class='inline' href="#inline_bind_th"><input type="button" value="เพิ่มการผูกกฎหมาย" title="เพิ่มการผูกกฎหมาย" class="btn btn-warning vtip" /></a>
        </div>
          <table class="tbSublist">
            <tr>
              <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
            </tr>
            <tr>
              <td>1</td>
              <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม(ฉบับที่2)พ.ศ.2533</td>
              <td>คาบ</td>
              <td><img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
              </tr>
              <tr>
                <td>1</td>
                <td>พระราชบัญญัติคุ้มครองเด็กพ.ศ.2546</td>
                <td>แก้ไข</td>
                <td><img src="images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <th>วันที่ลงนาม<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName" value="" style="width:120px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>วันที่ใช้บังคับ<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName9" value="" style="width:120px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>วันที่นำเข้า<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName13" value="<? echo date("d/m/").(date("Y")+543); ?>" style="width:120px;" />
          <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>สถานะการใช้<span class="Txt_red_12"> *</span></th>
          <td><span>
            <input type="radio" name="radio" id="radio" value="radio" />
        บังคับใช้ </span> <span>
        <input type="radio" name="radio" id="radio2" value="radio" />
        อยู่ระหว่างพิจารณา</span> <span>
        <input type="radio" name="radio" id="radio3" value="radio" />
        ยกเลิก</span></td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td><input type="file" name="fileField4" class="form-control" id="fileField4" /></td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        <tr>
          <th>Option</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
            <a class="inline" href="#inline_option_th"><input type="button" value="เพิ่ม Option กฎหมาย" title="เพิ่ม Option กฎหมาย" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:25%">ชนิด Option</th>
                <th style="width:25%">ชื่อ</th>
                <th style="width:20%">แหล่งที่มา</th>
                <th style="width:10%">ปี</th>
                <th style="width:10%">ลบ</th>
              </tr>
              <tr>
                <td>1</td>
                <td>เอกสารนำเสนอกฎหมาย (Presentation)</td>
                <td>กฎหมาย abc</td>
                <td>ศาลเด็ก</td>
                <td>2525</td>
                <td><img src="images/remove.png"  width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
              </tr>
            </table>
          
            </td>
        </tr>
        </table>
    </div>
    
    <div role="tabpanel" class="tab-pane" id="english">
        <table class="tbadd">
        <tr>
          <th>Law group &gt; Law category<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <select name="select" class="form-control" style="width:auto;">
              <option>-- เลือกกลุ่มกฎหมาย --</option>
              <option>ในภารกิจ</option>
              <option>กฎหมายประกอบภารกิจ</option>
            </select>
            &gt; 
            <select name="select3" class="form-control" style="width:auto;">
              <option selected="selected">-- เลือกหมวดกฎหมาย --</option>
              <option>กฎหมายเด็กและเยาวชน</option>
              <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
              <option>กฎหมายผู้สูงอายุ</option>
              <option>กฎหมายสวัสดิการสังคม</option>
            </select>
          </span></td>
        </tr>
        <tr>
          <th>Law type &gt; Law sub type<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline"><select name="select4" class="form-control" style="width:auto;">
            <option selected="selected">-- เลือกประเภทกฎหมาย --</option>
            <option>กฎหมายแม่บท (กฎหมายหลัก)</option>
            <option>อนุบัญญัติ</option>
            <option>มาตรการทางการบริหาร</option>
          </select>
            &gt; 
            <select name="select5" class="form-control" style="width:auto;">
              <option>-- เลือกประเภทย่อยกฎหมาย --</option>
            </select></span></td>
        </tr>
        <tr>
          <th>Name of law<span class="Txt_red_12"> *</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:800px;" />
            
            </td>
        </tr>
        <tr>
          <th>เล่มที่ / ตอน<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline"><input type="text" class="form-control" id="exampleInputName7" style="width:100px; margin-right:30px;" />
            <input name="radiobutton" value="2" type="radio" />
            ตอน  
        <input name="radiobutton" value="2" type="radio" />
            ตอนที่ 
            <input type="text" class="form-control" id="exampleInputName3" style="width:200px;" /></span></td>
        </tr>
        <tr>
          <th>วันที่ประกาศในราชกิจจานุเบกษา<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName10" value="<? echo date("d/m/y"); ?>" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>อาศัยอำนาจกฎหมาย</th>
          <td>
            <select name="select2" class="form-control" style="width:auto;">
              <option>-- เลือกประเภทกฎหมายย่อยที่อาศัยอำนาจ --</option>
            </select>
        </td>
        </tr>
        <tr>
          <th>ผูกกฎหมาย (คาบ/ข้าม)</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
          <a class='inline' href="#inline_bind_th"><input type="button" value="เพิ่มการผูกกฎหมาย" title="เพิ่มการผูกกฎหมาย" class="btn btn-warning vtip" /></a>
        </div>
          <table class="tbSublist">
            <tr>
              <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
            </tr>
            <tr>
              <td>1</td>
              <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม(ฉบับที่2)พ.ศ.2533</td>
              <td>คาบ</td>
              <td><img src="images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง (ยกเลิก/แก้ไข/เพิ่มเติม)</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
              <th style="width:60%">ชื่อกฎหมาย</th>
              <th style="width:20%">รูปแบบ</th>
              <th style="width:10%">ลบ</th>
              </tr>
              <tr>
                <td>1</td>
                <td>พระราชบัญญัติคุ้มครองเด็กพ.ศ.2546</td>
                <td>แก้ไข</td>
                <td><img src="images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <th>วันที่ประกาศใช้</th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName" value="" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>วันที่นำเข้า</th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName4" value="" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>วันที่บังคับใช้</th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName5" value="" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>สถานะการใช้</th>
          <td><span>
            <input type="radio" name="radio" id="radio" value="radio" />
        บังคับใช้ </span> <span>
        <input type="radio" name="radio" id="radio2" value="radio" />
        อยู่ระหว่างพิจารณา</span> <span>
        <input type="radio" name="radio" id="radio3" value="radio" />
        ยกเลิก</span></td>
        </tr>
        <tr>
          <th>แนบเอกสารกฎหมาย</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        <tr>
          <th>Option</th>
          <td>
          <div id="btnBox" style="margin-bottom:10px;">
            <a class="inline" href="#inline_option_th"><input type="button" value="เพิ่ม Option กฎหมาย" title="เพิ่ม Option กฎหมาย" class="btn btn-warning vtip" /></a>
          </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:25%">ชนิด Option</th>
                <th style="width:25%">ชื่อ</th>
                <th style="width:20%">แหล่งที่มา</th>
                <th style="width:10%">ปี</th>
                <th style="width:10%">ลบ</th>
              </tr>
              <tr>
                <td>1</td>
                <td>เอกสารนำเสนอกฎหมาย (Presentation)</td>
                <td>กฎหมาย abc</td>
                <td>ศาลเด็ก</td>
                <td>2525</td>
                <td><img src="images/remove.png"  width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
              </tr>
            </table>
          
            </td>
        </tr>
        </table>

    </div>
</div>



<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>


<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_bind_th' style='padding:10px; background:#fff;'>
            <h3>การผูกกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย">
  </div><br /><br />
  <select name="select6" class="form-control" style="width:auto;">
    <option selected="selected">-- ทุกกลุ่มกฎหมาย --</option>
    <option>ในภารกิจ</option>
    <option>กฎหมายประกอบภารกิจ</option>
  </select>
  <select name="select7" class="form-control" style="width:auto;">
    <option selected="selected">-- ทุกหมวดกฎหมาย --</option>
    <option>กฎหมายเด็กและเยาวชน</option>
    <option>กลุ่มกฎหมายการส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการ</option>
    <option>กฎหมายผู้สูงอายุ</option>
    <option>กฎหมายสวัสดิการสังคม</option>
  </select><br />
  <select name="select7" class="form-control" style="width:auto;">
    <option selected="selected">-- ทุกประเภทกฎหมาย --</option>
    <option>กฎหมายแม่บท (กฎหมายหลัก)</option>
    <option>อนุบัญญัติ</option>
    <option>มาตรการทางการบริหาร</option>
  </select>
  <select name="select8" class="form-control" style="width:auto;">
    <option>-- ทุกประเภทย่อยกฎหมาย --</option>
  </select>
<button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>
</div>
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
  <th align="left">เลือก</th>
  <th align="left">ชื่อกฎหมาย</th>
  <th align="left" style="width:25%">ชนิด คาบ / ข้าม</th>
  <th align="left">สถานะ</th>
  </tr>
<tr>
  <td>1</td>
  <td><input type="checkbox" name="checkbox" id="checkbox" value="detail" /></td>
  <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 2) พ.ศ. 2533
    <div class="dvDetail"><textarea rows="3" class="form-control " style="width:400px;" placeholder="รายละเอียด"></textarea></div>
  </td>
  <td>คาบ</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td><input type="checkbox" name="checkbox2" id="checkbox2" /></td>
  <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 2) พ.ศ. 2533</td>
  <td>คาบ</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd"><input type="checkbox" name="checkbox3" id="checkbox3" /></td>
  <td class="odd">พระราชบัญญัติคุ้มครองเด็ก พ.ศ. 2546</td>
  <td>คาบ</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td align="left"><input type="checkbox" name="checkbox4" id="checkbox4" /></td>
  <td align="left">พระราชบัญญัติส่งเสริมการพัฒนาเด็กและเยาวชนแห่งชาติ พ.ศ. 2550</td>
  <td>คาบ</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr>
  <td>5</td>
  <td align="left" class="odd"><input type="checkbox" name="checkbox5" id="checkbox5" /></td>
  <td align="left" class="odd">พระราชบัญญัติหอพัก พ.ศ. 2507</td>
  <td>คาบ</td>
  <td>ประกาศใช้งาน</td>
  </tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึกเพิ่มรายการ" value="บันทึกเพิ่มรายการ" class="btn btn-primary" />
</div>    
            
			</div>
		</div>
        
        
<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_related_th' style='padding:10px; background:#fff;'>
			
            <h3>กฎหมายที่เกี่ยวข้อง</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย">
  </div>
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>
</div>
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
  <th align="left">เลือก</th>
  <th align="left">ชื่อกฎหมาย</th>
  <th align="left">สถานะ</th>
  </tr>
<tr>
  <td>1</td>
  <td><input type="radio" name="radio4" id="selthis" value="radio4" /></td>
  <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 2) พ.ศ. 2533
    <div class="dvDetail" style="border-top:1px dotted #999;">
    <span class="form-inline">
    <select name="" class="form-control" style="width:160px; margin-top:10px;">
      <option>-- เกี่ยวข้องโดย --</option>
      <option>ยกเลิก</option>
      <option>แก้ไข</option>
      <option>เพิ่มเติม</option>
      <option>แก้ไข / เพิ่มเติม</option>
      </select>
      
      <input type="file" name="fileField2" id="fileField2"  class="form-control" style="width:300px; margin-top:10px;"/></span>
      <textarea rows="3" class="form-control " style="width:500px; margin-top:10px;" placeholder="รายละเอียด"></textarea></div>
  </td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td><input type="radio" name="radio4" id="radio5" value="radio4" /></td>
  <td>พระราชบัญญัติการรับเด็กเป็นบุตรบุญธรรม (ฉบับที่ 2) พ.ศ. 2533</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd"><input type="radio" name="radio4" id="radio6" value="radio4" /></td>
  <td class="odd">พระราชบัญญัติคุ้มครองเด็ก พ.ศ. 2546</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td align="left"><input type="radio" name="radio4" id="radio7" value="radio4" /></td>
  <td align="left">พระราชบัญญัติส่งเสริมการพัฒนาเด็กและเยาวชนแห่งชาติ พ.ศ. 2550</td>
  <td>ประกาศใช้งาน</td>
  </tr>
<tr>
  <td>5</td>
  <td align="left" class="odd"><input type="radio" name="radio4" id="radio8" value="radio4" /></td>
  <td align="left" class="odd">พระราชบัญญัติหอพัก พ.ศ. 2507</td>
  <td>ประกาศใช้งาน</td>
  </tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึกเพิ่มรายการ" value="บันทึกเพิ่มรายการ" class="btn btn-primary" />
</div>
            
			</div>
		</div>
        
        

<!-- This contains the hidden content for inline calls -->
		<div style='display:none'>
			<div id='inline_option_th' style='padding:10px; background:#fff;'>
			
            <h3>Option กฎหมาย</h3>
<table class="tbadd">
<tr>
  <th>ชนิดของ Option<span class="Txt_red_12"> *</span></th>
  <td><select name="select2" class="form-control" style="width:auto;">
    <option>-- กรุณาเลือกชนิดของ Option --</option>
    <option>คำอธิบายกฎหมาย (Explanatory Notes)/สรุปสาระสำคัญ</option>
    <option>เอกสารนำเสนอกฎหมาย (Presentation)</option>
    <option>คำพิพากษาที่เกี่ยวข้อง</option>
    <option>คำวินิจฉัยของคณะกรรมการกฤษฎีกา</option>
    <option>บทความทางวิชาการ/ฐานข้อมูลประวัติกฎหมาย</option>
    <option>บทความทางกฎหมาย</option>
  </select></td>
</tr>
<tr>
  <th>ชื่อ<span class="Txt_red_12"> *</span></th>
  <td><input type="text" class="form-control" id="exampleInputName6" style="width:300px;" /></td>
</tr>
<tr>
  <th>แหล่งที่มา</th>
  <td><input type="text" class="form-control" id="exampleInputName8" style="width:500px;" /></td>
</tr>
<tr>
  <th>ปี พ.ศ.</th>
  <td><input type="text" class="form-control" id="exampleInputName2" style="width:100px;" /></td>
</tr>
<tr>
  <th>ไฟล์แนบ <img src="images/add.png" width="16" height="16" /></th>
  <td><span class="form-inline"><input type="text" class="form-control" id="exampleInputName8" style="width:400px;" placeholder="ชื่อไฟล์แนบ" /> <input type="file" name="fileField3" id="fileField3" class="form-control" style="width:400px;" /></span></td>
</tr>
</table>
<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
</div>


            
		  </div>
		</div>