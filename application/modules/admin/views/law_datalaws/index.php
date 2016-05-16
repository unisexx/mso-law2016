<h3>ข้อมูลกฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อกฎหมาย">
    </div>
    <select name="select" class="form-control" style="width:auto;">
    <option>-- ทุกกลุ่มกฎหมาย --</option>
    <option>ในภารกิจ</option>
    <option>กฎหมายประกอบภารกิจ</option>
  </select>
  <select name="select" class="form-control" style="width:auto;">
    <option>-- ทุกหน่วยงานผู้นำเข้า --</option>
    <option>ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร</option>
    <option>สำนักงานปลัด(กองนิติการ)</option>
    <option>กรมพัฒนาสังคมและสวัสดิการ</option>
    <option>สำนักงานกิจการสตรีและสถาบันครอบครัว</option>
  </select>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มข้อมูลกฎหมาย" value="เพิ่มข้อมูลกฎหมาย" onclick="document.location='admin/law_datalaws/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>วันที่ประกาศใช้</th>
  <th width="40%">ชื่อกฎหมาย</th>
  <th width="25%">หมวดกฎหมาย</th>
  <!-- <th>กฎหมายที่เกี่ยวข้อง</th> -->
  <th>สถานะ</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=mysql_to_th($row->notic_date)?></td>
	  <td><?=str_replace("|"," ",$row->name_th)?></td>
	  <td><?=get_law_group_text($row->id)?></td>
	  <!-- <td>-</td> -->
	  <td><?=get_datalaw_status($row->status)?></td>
	  <td><a href="admin/law_datalaws/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_datalaws/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>