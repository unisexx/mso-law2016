<h3>หมวดกฎหมาย (เพิ่ม / แก้ไข)</h3>

<form id="law_types_frm" action="admin/law_types/save/<?=$rs->id?>" method="post">


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
          <th>กลุ่มกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td>
            <?=form_dropdown('lawg_id',get_option('id','name','law_groups order by id asc'),@$rs->lawg_id,'class="form-control" style="width:auto;"','-- กรุณาเลือกกลุ่มกฎหมาย --');?>
          </td>
        </tr>
        <tr>
          <th>ชื่อหมวดกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td>
            <input type="text" class="form-control" name="name" style="width:500px;" value="<?=$rs->name?>" />
          </td>
        </tr>
        <tr>
          <th>รูปแบบการนำเข้า</th>
          <td>
            <?=form_dropdown('import_code',array('im1'=>'สิทธิการนำเข้าแบบ ในภารกิจ','im2'=>'สิทธิการนำเข้าแบบ ในภารกิจ ไม่มีคาบข้าม','im3'=>'สิทธิการนำเข้าแบบ รัฐธรรมนูญ','im4'=>'สิทธิการนำเข้าแบบ ระหว่างประเทศ'),@$rs->import_code,'class="form-control" style="width:auto;"','-- กรุณาเลือกรูปแบบการนำเข้าข้อมูล --');?>
          </td>
        </tr>
        <tr>
          <th>รูปภาพ</th>
          <td>
            <span class="form-inline">
              <input class="form-control" type="text" name="pic" value="<?php echo $rs->pic?>" style="width:300px;"/>
              <input class="btn btn-success" type="button" name="browse" value="คลิกเพื่อเลือกรูป" onclick="browser($(this).prev(),'image')" />
            </span>
          </td>
        </tr>
        <tr>
          <th>สิทธิการนำเข้ากฎหมาย<span class="Txt_red_12"> *</span></th>
          <td>
            <?
              $sql = "select * from user_groups order by id asc";
              $query = $this->db->query($sql)->result();
            ?>
            <?foreach($query as $row):?>
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="unit_import[]" value="<?=$row->id?>" <?=in_array($row->id,explode(',',$rs->unit_import))?"checked":"";?>>
                  <?=$row->name?>
                </label>
              </div>
            <?endforeach;?>
          </td>
        </tr>
        </table>
    </div>

    <div role="tabpanel" class="tab-pane" id="english">
        <table class="tbadd">
        <tr>
          <th>Law Group<span class="Txt_red_12"> *</span></th>
          <td><select name="select2" class="form-control" style="width:auto;">
            <option>-- Select Law Group --</option>
            <option>ในภารกิจ</option>
            <option>กฎหมายประกอบภารกิจ</option>
          </select></td>
        </tr>
        <tr>
          <th>Name of the Law Category<span class="Txt_red_12"> *</span></th>
          <td>
            <input type="text" class="form-control" id="exampleInputName" style="width:500px;" />
          </td>
        </tr>
        <tr>
          <th>Import format</th>
          <td><select name="select2" class="form-control" style="width:auto;">
            <option>-- Select Import format --</option>
            <option>สิทธิการนำเข้าแบบ ในภารกิจ</option>
            <option>สิทธิการนำเข้าแบบ ในภารกิจ ไม่มีคาบข้าม</option>
            <option>สิทธิการนำเข้าแบบ รัฐธรรมนูญ</option>
            <option>สิทธิการนำเข้าแบบ ระหว่างประเทศ</option>
          </select></td>
        </tr>
        <tr>
          <th>Picture</th>
          <td>
            <span class="form-inline">
            <input type="text" disabled="disabled" class="form-control" id="exampleInputName2" style="width:200px;" />
              <input name="input3" type="button" title="คลิกเพื่อเลือกรูป" value="คลิกเพื่อเลือกรูป"  class="btn btn-success"/></span>
          </td>
        </tr>
        <tr>
          <th>Permission<span class="Txt_red_12"> *</span></th>
          <td>
          <span><input type="checkbox" name="checkbox" id="checkbox" /> ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร	</span>
          <span><input type="checkbox" name="checkbox" id="checkbox" /> สำนักงานปลัด(กองนิติการ)</span><br />
          <span><input type="checkbox" name="checkbox" id="checkbox" /> กรมพัฒนาสังคมและสวัสดิการ</span>
          <span><input type="checkbox" name="checkbox" id="checkbox" /> สำนักงานกิจการสตรีและสถาบันครอบครัว</span><br />
          <span><input type="checkbox" name="checkbox2" id="checkbox2" /> กรมกิจการเด็กและเยาวชน</span>
          <span><input type="checkbox" name="checkbox2" id="checkbox2" /> กรมผู้สูงอายุ</span><br />
          <span><input type="checkbox" name="checkbox3" id="checkbox3" /> สถาบันพัฒนาองค์กรชุมชน</span>
          <span><input type="checkbox" name="checkbox4" id="checkbox4" /> การเคหะแห่งชาติ </span> <br />
          <span><input type="checkbox" name="checkbox4" id="checkbox4" /> สำนักงานส่งเสริมและพัฒนาคุณภาพชีวิตคนพิการแห่งชาติ</span></td>
        </tr>
        </table>

    </div>
</div>

<div id="btnBoxAdd">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>


<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("#law_types_frm").validate({
	    rules:
	    {
	    	lawg_id:{required: true},
        name:{required: true},
        'unit_import[]':{required: true}
	    },
	    messages:
	    {
	    	lawg_id:{required: "กรุณาเลือกกลุ่มกฎหมาย"},
        name:{required: "กรุณากรอกชื่อหมวดกฎหมาย"},
        'unit_import[]':{required: "กรุณาเลือกอย่างน้อย 1 รายการ"}
	    }
    });
});
</script>
