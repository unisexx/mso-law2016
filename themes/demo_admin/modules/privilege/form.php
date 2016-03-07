<h3>สิทธิประโยชน์ (เพิ่ม / แก้ไข)</h3>
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#thai" aria-controls="thai" role="tab" data-toggle="tab"><img src="images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab"><img src="images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>
  
<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>ชื่อเอกสาร</th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:800px;" />
            
            </td>
        </tr>
        <tr>
          <th>วันที่นำเข้า<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName10" value="<? echo date("d/m/y"); ?>" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related_th"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
            </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:60%">ชื่อกฎหมาย</th>
                <th style="width:10%">ลบ</th>
                </tr>
              <tr>
                <td>1</td>
                <td>พระราชบัญญัติคุ้มครองเด็กพ.ศ.2546</td>
                <td><img src="images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
                </tr>
            </table></td>
        </tr>
        </table>       
    </div>
    
    <div role="tabpanel" class="tab-pane" id="english">
        <table class="tbadd">
        <tr>
          <th>Document name</th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:800px;" />
            
            </td>
        </tr>
        <tr>
          <th>Date added<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName10" value="<? echo date("d/m/y"); ?>" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        <tr>
          <th>กฎหมายที่เกี่ยวข้อง</th>
          <td><div id="btnBox" style="margin-bottom:10px;">
            <a class='inline' href="#inline_related"><input type="button" value="เพิ่มกฎหมายที่เกี่ยวข้อง" title="เพิ่มกฎหมายที่เกี่ยวข้อง" class="btn btn-warning vtip" /></a>
            </div>
            <table class="tbSublist">
              <tr>
                <th style="width:10%">#</th>
                <th style="width:60%">ชื่อกฎหมาย</th>
                <th style="width:10%">ลบ</th>
                </tr>
              <tr>
                <td>1</td>
                <td>พระราชบัญญัติคุ้มครองเด็กพ.ศ.2546</td>
                <td><img src="images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
                </tr>
            </table></td>
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
			<div id='inline_related_th' style='padding:10px; background:#fff;'>
			
            <h3>กฎหมายที่เกี่ยวข้อง</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ID / Product Name">
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
  <th align="left">รหัสสินค้า</th>
  <th align="left">ชื่อสินค้า</th>
  <th align="left">ประเภท</th>
  <th align="left">จำนวน</th>
  <th align="left">เลือก</th>
  </tr>
<tr>
  <td>1</td>
  <td>1-69-87</td>
  <td>ACTUATOR KRF5100150 THK</td>
  <td>LM GUIDE ACTUATOR</td>
  <td>0</td>
  <td><input name="input" type="button" title="เลือกสินค้านี้" value="เลือก" class="btn btn-warning vtip"/></td>
  </tr>
<tr class="odd">
  <td>2</td>
  <td>1-67-08</td>
  <td>ACTUATOR KRF6-10-0350 THK</td>
  <td class="odd cursor">LM GUIDE ACTUATOR</td>
  <td>0</td>
  <td><input name="input7" type="button" title="เลือกสินค้านี้" value="เลือก" class="btn btn-warning vtip"/></td>
  </tr>
<tr>
  <td>3</td>
  <td class="odd">H-00-01</td>
  <td class="odd">AUTOMATIC GREASE LUBRICATOR EASYLUBE 150</td>
  <td>GREASE LUBRICATOR</td>
  <td class="odd cursor">347</td>
  <td class="odd cursor"><input name="input8" type="button" title="เลือกสินค้านี้" value="เลือก" class="btn btn-warning vtip"/></td>
  </tr>
<tr class="odd">
  <td>4</td>
  <td align="left">1-54-44</td>
  <td align="left">BALL CAGE BS2260 THK</td>
  <td class="odd cursor">BALL CAGES</td>
  <td>0</td>
  <td><input name="input9" type="button" title="เลือกสินค้านี้" value="เลือก" class="btn btn-warning vtip"/></td>
  </tr>
<tr>
  <td>5</td>
  <td align="left" class="odd">1-09-64</td>
  <td align="left" class="odd">BALL SPLINE THK</td>
  <td>BALL CAGES</td>
  <td>24</td>
  <td><input name="input10" type="button" title="เลือกสินค้านี้" value="เลือก" class="btn btn-warning vtip"/></td>
  </tr>
</table>
            
			</div>
		</div>
        
        

