<table class="tblist crossLawTable">
<tr>
  <th align="left">เลือก</th>
  <th align="left">ชื่อกฎหมาย</th>
  <th align="left" style="width:25%">ชนิด คาบ / ข้าม</th>
  <th align="left">สถานะ</th>
</tr>
<?foreach($rs as $row):?>

<?
	// รูปแบบ ข้าม / คาบ
	if($row->law_group_id == $_GET['law_group_id'] && $row->law_type_id == $_GET['law_type_id'] && $row->law_maintype_id == $_GET['law_maintype_id'] &&  $row->law_submaintype_id == $_GET['law_submaintype_id']){ 
		$crossFormat =  "คาบ"; 
	}else{ 
		$crossFormat = "ข้าม";
	}
?>
		
<tr class="<?=alternator('','odd');?>">
	<td><input type="checkbox" name="checkbox" class="checkbox" value="detail" data-row-id="<?=$row->id?>"  data-row-name="<?=str_replace("|"," ",$row->name_th)?>" data-row-type="<?=$crossFormat?>" /></td>
	<td>
		<?=str_replace("|"," ",$row->name_th)?>
		<div class="dvDetail"><textarea rows="3" class="form-control " style="width:400px;" placeholder="รายละเอียด"></textarea></div>
	</td>
	<td><?=$crossFormat?></td>
	<td><?=$row->status ? "ประกาศใช้งาน" : "ยกเลิกใช้งาน";?></td>
</tr>
<?endforeach;?>
</table>


<div id="btnBoxAdd"> <input name="input" type="button" title="บันทึกเพิ่มรายการ" value="บันทึกเพิ่มรายการ" class="btn btn-primary chooseCrossLaw"> </div>

<script>
	$(document).ready(function(){
		// ซ่อน รายละเอียด
		$('.dvDetail').hide();
		
		// เปิด-ปิด รายละเอียดเมื่อ checkbox
		$('.checkbox').change(function () {
		     $(this).closest('tr').find('.dvDetail').toggle(this.checked);
		  }).change(); //ensure visible state matches initially
		
		// เมื่อกดปุ่มบันทึกเพิ่มรายการ
		$('#crosslawData').on('click', '.chooseCrossLaw', function() {
			// ปิด colorbox
			$.colorbox.close();
			
			// ดึงข้อมูลที่เลือกลงฟอร์มหลัก
			$('.crossLawTable input[type=checkbox]:checked').each(function() {
				var lawId = $(this).attr('data-row-id');
				var lawName = $(this).attr('data-row-name');
				var lawType = $(this).attr('data-row-type');
				var lawDetail = $(this).closest('tr').find('textarea').val();
				$('.tbCrossSublist tr:last').after('<tr><td></td><td>'+lawName+'</td><td>'+lawType+'</td><td><input type="hidden" name="ov_sk_law[]" value="'+lawId+'"><input type="hidden" name="ov_sk_type[]" value="'+lawType+'"><input type="hidden" name="ov_sk_description[]" value="'+lawDetail+'"><img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td></tr>');
			});
			
			// เคลียร์ฟอร์มค้นหา
			$("#crosslawData").html("");
			
			// คำนวนใส่ตัวเลขแถว
			autoCountTableRow('tbCrossSublist');
			
			// var lawId = $(this).attr('data-row-id');
			// var lawName = $(this).attr('data-row-name');
			// $('.tbSublist tr:last').after('<tr><td>'+lawName+'</td><td><input type="hidden" name="law_datalaw_id[]" value="'+lawId+'"><img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td></tr>');	
			
		});
	});
</script>