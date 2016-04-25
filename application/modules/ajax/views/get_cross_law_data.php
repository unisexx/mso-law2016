<table class="tblist">
<tr>
  <th align="left">เลือก</th>
  <th align="left">ชื่อกฎหมาย</th>
  <th align="left" style="width:25%">ชนิด คาบ / ข้าม</th>
  <th align="left">สถานะ</th>
</tr>
<?foreach($rs as $row):?>
<tr class="<?=alternator('','odd');?>">
	<td><input type="checkbox" name="checkbox" id="checkbox" value="detail" /></td>
	<td>
		<?=str_replace("|"," ",$row->name_th)?>
		<div class="dvDetail"><textarea rows="3" class="form-control " style="width:400px;" placeholder="รายละเอียด"></textarea></div>
	</td>
	<td>
		<?
			if($row->law_group_id == 1 && $row->law_type_id == 1 && $row->law_maintype_id == 1 &&  $row->law_submaintype_id == 1){ 
				echo "คาบ"; 
			}else{ 
				echo "ข้าม";
			}
		?>
	</td>
	<td><?=$row->status ? "ประกาศใช้งาน" : "ยกเลิกใช้งาน";?></td>
</tr>
<?endforeach;?>
</table>

<script>
	$(document).ready(function(){
		$('table').on('click', '.chooseLaw', function() {
			$.colorbox.close();
			
			var lawId = $(this).attr('data-row-id');
			var lawName = $(this).attr('data-row-name');
			$('.tbSublist tr:last').after('<tr><td>'+lawName+'</td><td><input type="hidden" name="law_datalaw_id[]" value="'+lawId+'"><img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td></tr>');	
		});
	});
</script>