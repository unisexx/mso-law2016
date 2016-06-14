<h3>มติ ครม.</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " placeholder="ชื่อมติ ครม." name="search" value="<?=@$_GET['search']?>">
  </div>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มมติ ครม." value="เพิ่มผู้ใช้งาน" onclick="document.location='admin/law_resolutions/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ปี</th>
  <th>ฉบับที่</th>
  <th>วันที่ ครม. มีมติ</th>
  <th>ชื่อมติ ครม.</th>
  <th>ดาวน์โหลด</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->resolution_year?></td>
	  <td><?=$row->resolution_no?></td>
	  <td><?=mysql_to_th($row->resolution_dateappoint)?></td>
	  <td><?=lang_decode($row->resolution_name)?></td>
	  <td>
	  	<?if($row->resolution_file_th):?><a href="uploads/resolutionfile/<?=$row->resolution_file_th?>"><?=file_icon_th($row->resolution_file_th)?></a><?endif;?>
	  	<?if($row->resolution_file_en):?><a href="uploads/resolutionfile/<?=$row->resolution_file_en?>"><?=file_icon_en($row->resolution_file_en)?></a><?endif;?>
	  </td>
	  <td><a href="admin/law_resolutions/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_resolutions/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>