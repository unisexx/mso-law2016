<h3>มติ ครม. (เพิ่ม / แก้ไข)</h3>
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#thai" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation"><a href="#english" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>


<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>ประเภทคณะกรรมการ</th>
          <td>
          	<span class="form-inline">
          		<?=form_dropdown('law_committee_type_id',get_option('id','name','law_committee_types order by id asc'),@$rs->law_committee_type_id,'class="form-control" style="width:auto;"','-- เลือกประเภทคณะกรรมการ --');?>
	          </span>
          </td>
        </tr>
        <tr>
          <th>ปี พ.ศ.  <span class="Txt_red_12">*</span></th>
          <td>
          	<select name="plan_year" class="form-control" style="width:auto;">
	            <option>-- เลือกปี พ.ศ. --</option>
	            <?
	            	$firstYear = 2553;
					$lastYear = $firstYear + 10;
					for($i=$firstYear;$i<=$lastYear;$i++):
				?>
					<option value="<?=$i?>" <?if($rs->plan_year == $i){ echo "selected"; }?>><?=$i?></option>
				<?endfor;?>
	          </select>
          </td>
        </tr>
        <tr>
          <th>ถูกแต่งตั้งในชุดที่ <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" /></td>
        </tr>
        <tr>
          <th>วันที่ แต่งตั้ง<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName3" style="width:110px;" />
            <img src="themes/admin/images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>ชื่อ-สกุล<span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:400px;" />
            
            </td>
        </tr>
        <tr>
          <th>ตำแหน่ง<span class="Txt_red_12"> *</span></th>
          <td><input type="text" class="form-control" id="exampleInputName4" style="width:600px;" /></td>
        </tr>
        <tr>
          <th>ประวัติ</th>
          <td><textarea rows="7" class="form-control" id="exampleInputName5" style="width:600px;"></textarea></td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        </table>  
    </div>
    
    <div role="tabpanel" class="tab-pane" id="english">
        <table class="tbadd">
        <tr>
          <th>Type of comittee</th>
          <td><span class="form-inline">
            <select name="select" class="form-control" style="width:auto;">
              <option selected="selected">-- เลือกประเภทคณะกรรมการ --</option>
              <option>คณะกรรมการตามมติ ครม.</option>
              <option>คณะกรรมการจากการแต่งตั้ง(โดยกฎหมาย)</option>
            </select>
          </span></td>
        </tr>
        <tr>
          <th>Year  <span class="Txt_red_12">*</span></th>
          <td><select name="select2" class="form-control" style="width:auto;">
            <option>-- เลือกปี พ.ศ. --</option>
          </select></td>
        </tr>
        <tr>
          <th>ถูกแต่งตั้งในชุดที่ <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" /></td>
        </tr>
        <tr>
          <th>วันที่ แต่งตั้ง<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName3" style="width:110px;" />
            <img src="themes/admin/images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>ชื่อ-สกุล<span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:400px;" />
            
            </td>
        </tr>
        <tr>
          <th>ตำแหน่ง<span class="Txt_red_12"> *</span></th>
          <td><input type="text" class="form-control" id="exampleInputName4" style="width:600px;" /></td>
        </tr>
        <tr>
          <th>ประวัติ</th>
          <td><textarea rows="7" class="form-control" id="exampleInputName5" style="width:600px;"></textarea></td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        </table>  
   
    </div>
</div>


<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>