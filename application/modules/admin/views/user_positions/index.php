<h3>ตำแหน่ง</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline" method="get" action="admin/user_positions">
  <div class="col-xs-4">
    <input type="text" class="form-control " name="search" placeholder="ชื่อตำแหน่ง" value="<?=@$_GET['search']?>">
  </div>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>


</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มตำแหน่ง" value="เพิ่มตำแหน่ง" onclick="document.location='admin/user_positions/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ชื่อตำแหน่ง</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->name?></td>
	  <td><a href="admin/user_positions/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/user_positions/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
	</tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>
