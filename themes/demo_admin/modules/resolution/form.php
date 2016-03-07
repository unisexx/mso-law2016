<h3>มติ ครม. (เพิ่ม / แก้ไข)</h3>
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
          <th>ปี พ.ศ.  <span class="Txt_red_12">*</span></th>
          <td><select name="select2" class="form-control" style="width:auto;">
            <option>-- เลือกปี พ.ศ. --</option>
          </select></td>
        </tr>
        <tr>
          <th>ฉบับที่ <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" /></td>
        </tr>
        <tr>
          <th>ชื่อเรื่อง <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:600px;" />
            
            </td>
        </tr>
        <tr>
          <th>วันที่ ครม. มีมติ<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName10" value="<? echo date("d/m/y"); ?>" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
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
          <th>Year <span class="Txt_red_12">*</span></th>
          <td><select name="select2" class="form-control" style="width:auto;">
            <option>-- Select Year --</option>
          </select></td>
        </tr>
        <tr>
          <th>Issue NO. <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName" style="width:100px;" /></td>
        </tr>
        <tr>
          <th>Topic <span class="Txt_red_12">*</span></th>
          <td><input type="text" class="form-control" id="exampleInputName7" style="width:600px;" />
            
            </td>
        </tr>
        <tr>
          <th>วันที่ ครม. มีมติ<span class="Txt_red_12"> *</span></th>
          <td><span class="form-inline">
            <input type="text" class="form-control" id="exampleInputName10" value="<? echo date("d/m/y"); ?>" style="width:110px;" />
            <img src="images/calendar.png" alt="" width="24" height="24" /></span></td>
        </tr>
        <tr>
          <th>Attachment</th>
          <td><input type="file" name="fileField" class="form-control" id="fileField" /></td>
        </tr>
        </table>

    </div>
</div>


<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>


     
        

        
        

