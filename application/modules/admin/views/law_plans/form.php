<h3>แผนพัฒนากฎหมาย (เพิ่ม / แก้ไข)</h3>

<form action="admin/law_plans/save/<?=$rs->id?>">
<!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="lang active"><a href="th" aria-controls="thai" role="tab" data-toggle="tab"><img src="themes/admin/images/thai_flag.png" width="32" height="32" /></a></li>
    <li role="presentation" class="lang"><a href="en" aria-controls="english" role="tab" data-toggle="tab"><img src="themes/admin/images/eng_flag.png" width="32" height="32" /></a></li>
  </ul>


<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="thai">
        <table class="tbadd">
        <tr>
          <th>เเผนพัฒนากฎหมายปี พ.ศ. </th>
          <td>
	          <select name="plan_year" class="form-control" style="width:auto;">
	            <option>-- เลือกปี พ.ศ. --</option>
	            <?
	            	$firstYear = 2554;
					$lastYear = $firstYear + 10;
					for($i=$firstYear;$i<=$lastYear;$i++)
					{
					    echo '<option value='.$i.'>'.$i.'</option>';
					}
	            ?>
	          </select>
          </td>
        </tr>
        <tr>
          <th>ชื่อแผนพัฒนากฎหมาย</th>
          <td>
          	<input rel="th" type="text" class="form-control" name="plan_name[th]" style="width:800px;" />
            <input rel="en" type="text" class="form-control" name="plan_name[en]"  style="width:800px;" />
		  </td>
        </tr>
        <tr>
          <th>ไฟล์แนบเอกสาร</th>
          <td><input type="file" name="plan_file" class="form-control" id="fileField" /></td>
        </tr>
        </table>
    </div>
</div>


<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/>
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>
</form>

<script type="text/javascript">
$(function() {
	$("[rel=en]").hide();
	
	$(".lang a").click(function(){
		$("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
		$(this).closest('li').addClass('active').siblings().removeClass('active');
		return false;
	})
});
</script>