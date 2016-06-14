<h3>สิทธิประโยชน์</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อสิทธิประโยชน์" name="search" value="<?=@$_GET['search']?>">
    </div>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มสิทธิประโยชน์" value="เพิ่มสิทธิประโยชน์" onclick="document.location='admin/law_privileges/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ชื่อสิทธิประโยชน์</th>
  <th>กฎหมายที่เกี่ยวข้อง</th>
  <th>ดาวน์โหลด</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=lang_decode($row->pri_name)?></td>
	  <td width="800">
	  	<ul>
	  	<?foreach($row->law_link_privilege->get() as $item):?>
	  		<li style="list-style: disc;"><?=str_replace("|"," ",$item->law_datalaw->name_th)?></li>
	  	<?endforeach;?>
	  	</ul>
	  </td>
	  <td>
	  	<?if($row->pri_file_th):?><a href="uploads/privilegefile/<?=$row->pri_file_th?>" target="_blank"><?=file_icon_th($row->pri_file_th)?></a><?endif;?>
	  	<?if($row->pri_file_en):?><a href="uploads/privilegefile/<?=$row->pri_file_en?>" target="_blank"><?=file_icon_en($row->pri_file_en)?></a><?endif;?>
	  	</td>
	  <td><a href="admin/law_privileges/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_privileges/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>