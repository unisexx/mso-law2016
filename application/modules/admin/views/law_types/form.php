<h3>หมวดกฎหมาย (เพิ่ม / แก้ไข)</h3>

<form id="law_types_frm" action="admin/law_types/save/<?=$rs->id?>" method="post">


<!-- Nav tabs -->
  <!-- <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul> -->

<!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>กลุ่มกฎหมาย<span class="Txt_red_12"> *</span></th>
          <td>
            <?=form_dropdown('law_group_id',get_option('id','name','law_groups order by id asc'),@$rs->law_group_id,'class="form-control" style="width:auto;"','-- กรุณาเลือกกลุ่มกฎหมาย --');?>
          </td>
        </tr>
        <tr>
          <th>ชื่อหมวดกฎหมาย (ไทย)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="th" type="text" class="form-control" name="name[th]" style="width:500px;" value="<?=lang_decode($rs->name,'th')?>" />
          </td>
        </tr>
        <tr>
          <th>ชื่อหมวดกฎหมาย (อังกฤษ)<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="name[en]" style="width:500px;" value="<?=lang_decode($rs->name,'en')?>" />
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
            <div class="input-group" style="width:500px;">
			  <input class="form-control" type="text" name="pic" value="<?php echo $rs->pic?>"/>
			  <span class="input-group-addon" id="basic-addon2" onclick="browser($(this).prev(),'image')" style="cursor: pointer;">เลือกไฟล์</span>
			</div>
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
	// $("[rel=en]").hide();
// 	
	// $(".lang a").click(function(){
		// $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		// $(this).closest('li').addClass('active').siblings().removeClass('active');
		// return false;
	// })
	
	$("#law_types_frm").validate({
	    rules:
	    {
	    	'name[th]':{required: true},
        	'name[en]':{required: true},
	    	law_group_id:{required: true},
	        'unit_import[]':{required: true}
	    },
	    messages:
	    {
	    	'name[th]':{required: "กรุณากรอกชื่อหมวดกฎหมายไทย"},
        	'name[en]':{required: "กรุณากรอกชื่อหมวดกฎหมายอังกฤษ"},
	    	law_group_id:{required: "กรุณาเลือกกลุ่มกฎหมาย"},
	        'unit_import[]':{required: "กรุณาเลือกอย่างน้อย 1 รายการ"}
	    }
    });
});
</script>
