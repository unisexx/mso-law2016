<h3>แผนพัฒนากฎหมาย</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline" method="get" action'admin/law_plans'>
  <div class="col-xs-4">
    <input type="text" class="form-control" name="search" id="exampleInputName2" placeholder="ชื่อแผนพัฒนากฎหมาย" value="<?=@$_GET['search']?>">
    </div>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มแผนพัฒนากฎหมาย" value="เพิ่มแผนพัฒนากฎหมาย" onclick="document.location='admin/law_plans/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ชื่อแผนพัฒนากฎหมาย</th>
  <th>ปี พ.ศ.</th>
  <th>ดาวน์โหลด</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=lang_decode($row->plan_name)?></td>
	  <td><?=$row->plan_year?></td>
	  <td>
	  	<?if($row->plan_file_th):?><a href="uploads/planfile/<?=$row->plan_file_th?>" target="_blank"><?=file_icon_th($row->plan_file_th)?></a><?endif;?>
	  	<?if($row->plan_file_en):?><a href="uploads/planfile/<?=$row->plan_file_en?>" target="_blank"><?=file_icon_en($row->plan_file_en)?></a><?endif;?>
	  </td>
	  <td><a href="admin/law_plans/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_plans/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>