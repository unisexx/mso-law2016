<h3>หน่วยงานกฏหมายอื่น (เพิ่ม / แก้ไข)</h3>

<form id="law_plans_frm" method="post" enctype="multipart/form-data" action="admin/weblinks/save/<?=$rs->id?>">
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
          <th>ชื่อหน่วยงาน<span class="Txt_red_12"> *</span></th>
          <td>
          	<input rel="th" type="text" class="form-control" name="name" value="<?=$rs->name?>" style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>เว็บไซต์<span class="Txt_red_12"> *</span></th>
          <td>
            <input rel="en" type="text" class="form-control" name="url" value="<?=$rs->url?>"  style="width:800px;" placeholder="http://www.google.com" />
		  </td>
        </tr>
        </table>
    </div>
</div>


<div id="btnBoxAdd">
  <input type="hidden" name="create_by" value="<?=user_login()->id?>">
  <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>