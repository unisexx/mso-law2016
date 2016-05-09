<table class="tblist relatedLawTable">
	<tr>
	  <th align="left">ลำดับ</th>
	  <th align="left">เลือก</th>
	  <th align="left">ชื่อกฎหมาย</th>
	  <th align="left">สถานะ</th>
	</tr>
	<?foreach($rs as $key=>$row):?>
	<tr class="<?=alternator('','odd');?>">
	  <td><?=$key+1?></td>
	  <td><input class="radio" type="checkbox" name="radio4" id="selthis" value="radio4" data-row-id="<?=$row->id?>" data-row-name="<?=str_replace("|"," ",$row->name_th)?>" /></td>
	  <td width="60%"><?=str_replace("|"," ",$row->name_th)?>
	    <div class="dvDetail" style="border-top:1px dotted #999;">
	    <span class="form-inline">
	    <select name="relatedType" class="form-control" style="width:160px; margin-top:10px;">
	      <option>-- เกี่ยวข้องโดย --</option>
	      <option value="1">ยกเลิก</option>
	      <option value="2">แก้ไข</option>
	      <option value="3">เพิ่มเติม</option>
	      <option value="4">แก้ไข / เพิ่มเติม</option>
	      </select>
	      
	      <input type="file" name="fileField2" id="fileField2"  class="form-control" style="width:300px; margin-top:10px;"/></span>
	      <textarea rows="3" class="form-control " style="width:500px; margin-top:10px;" placeholder="รายละเอียด"></textarea></div>
	  </td>
	  <td><?=$row->status ? "ประกาศใช้งาน" : "ยกเลิกใช้งาน";?></td>
	  </tr>
	<?endforeach;?>
</table>

<div id="btnBoxAdd">
  <input name="input" type="button" title="บันทึกเพิ่มรายการ" value="บันทึกเพิ่มรายการ" class="btn btn-primary chooseRelatedLaw" />
</div>


<script>
$(document).ready(function(){
	// ซ่อน รายละเอียด
	$('.dvDetail').hide();
	
	// เปิด-ปิด รายละเอียดเมื่อ checkbox
	$('.radio').change(function () {
	     $(this).closest('tr').find('.dvDetail').toggle(this.checked);
	  }).change(); //ensure visible state matches initially
	
	// เมื่อกดปุ่มบันทึกเพิ่มรายการ
	$('#relatedlawData').on('click', '.chooseRelatedLaw', function() {
		// ปิด colorbox
		$.colorbox.close();
		
		// ดึงข้อมูลที่เลือกลงฟอร์มหลัก
		$('.relatedLawTable input[type=checkbox]:checked').each(function() {
			var lawId = $(this).attr('data-row-id');
			var lawName = $(this).attr('data-row-name');
			var lawrelatedTypeTxt = $(this).closest('tr').find('select[name=relatedType] option:selected').text();
			var lawrelatedTypeValue = $(this).closest('tr').find('select[name=relatedType] option:selected').val();
			var lawDetail = $(this).closest('tr').find('textarea').val();
			$('.tbRelatedSublist tr:last').after('<tr><td></td><td>'+lawName+'</td><td>'+lawrelatedTypeTxt+'</td><td><input type="hidden" name="law_id_select[]" value="'+lawId+'"><input type="hidden" name="version_type[]" value="'+lawrelatedTypeValue+'"><input type="hidden" name="version_txt[]" value="'+lawDetail+'"><img class="delLawBtn" src="themes/admin/images/remove.png" alt="" width="32" height="32" class="vtip" title="ลบรายการนี้"   style="cursor:pointer;"/></td></tr>');
		});
		
		// เคลียร์ฟอร์มค้นหา
		$("#relatedlawData").html("");
		
		// คำนวนใส่ตัวเลขแถว
		autoCountTableRow('tbRelatedSublist');
		
	});
});
</script>