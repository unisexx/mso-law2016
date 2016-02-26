<h3>สังกัด</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-4">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อสังกัด">
  </div>
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มสังกัด" value="เพิ่มสังกัด" onclick="document.location='<?=basename($_SERVER['PHP_SELF'])?>?act=form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>ลำดับ</th>
  <th>ชื่อสังกัด</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
	<tr>
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->name?></td>
	  <td><a href="admin/user_groups/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  /></td>
	</tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>