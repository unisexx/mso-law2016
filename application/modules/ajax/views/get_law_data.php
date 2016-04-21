<table class="tblist">
<tr>
  <th align="left">ชื่อกฎหมาย</th>
  <th align="left" width="100">สถานะ</th>
  <th align="left">เลือก</th>
</tr>
<?foreach($rs as $row):?>
<tr class="<?=alternator('','odd');?>">
	<td><?=str_replace("|"," ",$row->name_th)?></td>
	<td><?=get_datalaw_status($row->status)?></td>
	<td><input name="input8" type="button" title="เลือก" value="เลือก" class="btn btn-warning vtip chooseLaw" data-row-id="<?=$row->id?>" data-row-name="<?=str_replace("|"," ",$row->name_th)?>"/></td>
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