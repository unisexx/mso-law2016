<h3>หน่วยงานกฏหมายอื่น</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-3">
    <input type="text" class="form-control" id="exampleInputName2" placeholder="ชื่อหน่วยงาน / เว็บไซต์" name="search" value="<?=@$_GET['search']?>">
    </div>
  <!-- <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" /> -->
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>

<div id="btnBox">
  <input type="button" title="เพิ่มหน่วยงานกฏหมายอื่น" value="เพิ่มหน่วยงานกฏหมายอื่น" onclick="document.location='admin/weblinks/form'" class="btn btn-warning vtip" />
</div>
<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ชื่อหน่วยงาน</th>
  <th>เว็บไซต์</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->name?></td>
	  <td><?=$row->url?></td>
	  <td>
	  	<a href="admin/weblinks/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/weblinks/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a>
	  </td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>