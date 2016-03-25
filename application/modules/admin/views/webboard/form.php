<h3>กระทู้ ถาม-ตอบ (เพิ่ม / แก้ไข)</h3>

<form id="law_types_frm" action="#" method="post">

<table class="tbadd">
<tr>
  <th>หัวข้อคำถาม</th>
  <td>
    <?=$rs->quiz_title?>
  </td>
</tr>
<tr>
  <th>รายละเอียด</th>
  <td>
  	<?=$rs->quiz_detail?>
  </td>
</tr>
<tr>
  <th>คำตอบ</th>
  <td>
    	<table id="table-ans" class="table">
    		<tr>
    			<th>#</th>
    			<th>รายละเอียด</th>
    			<th>ผู้ตอบ</th>
    			<th>สถานะ</th>
    		</tr>
    		<?foreach($answer as $key=>$ans):?>
    		<tr>
    			<td><?=$key+1?></td>
    			<td><?=$ans->answer_detail?></td>
    			<td><?=$ans->answer_who?></td>
    			<td>
    				<input id="switch-size" data-status="<?=$ans->answer_status?>" data-row-id="<?=$ans->id?>" type="checkbox" data-size="small" data-on-color="success" class="chkOnOff" <?if($ans->answer_status == 1){echo "checked";}?> name="status">
    			</td>
    		</tr>
    		<?endforeach;?>
    	</table>
  </td>
</tr>
</table>
        
<div id="btnBoxAdd">
  <!-- <input name="input" type="submit" title="บันทึก" value="บันทึก" class="btn btn-primary" style="width:100px;"/> -->
  <input name="input2" type="button" title="ย้อนกลับ" value="ย้อนกลับ"  onclick="history.back(-1)"  class="btn btn-default" style="width:100px;"/>
</div>

</form>

<style>
#table-ans tr td:nth-child(1){
    width:5%;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
	// สถานะ เปิด-ปิด
	$('input[name="status"]').on('switchChange.bootstrapSwitch', function(event, state) {
	  // console.log(this); // DOM element
	  // console.log(event); // jQuery event
	  // console.log(state); // true | false
	  // console.log($(this).attr('data-row-id'));
	  $.get('admin/webboard/ajax_status_answer',{
	  	id : $(this).attr('data-row-id'),
	  	state : state
	  });
	});
	
});
</script>