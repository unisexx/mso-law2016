<h3>คณะกรรมการ</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-3">
    <input type="text" class="form-control " placeholder="ชื่อคณะกรรมการ" name="search" value="<?=@$_GET['search']?>">
    </div>
    <?=form_dropdown('law_committee_type_id',get_option('id','name','law_committee_types order by id asc'),@$_GET['law_committee_type_id'],'class="form-control" style="width:auto;"','-- เลือกประเภทคณะกรรมการ --');?>
    <!-- <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="themes/admin/images/calendar.png" alt="" width="24" height="24" /> - <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="themes/admin/images/calendar.png" alt="" width="24" height="24" /> -->
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>
<div id="btnBox">
  <input type="button" title="เพิ่มคณะกรรมการ" value="เพิ่มคณะกรรมการ" onclick="document.location='admin/law_committees/form'" class="btn btn-warning vtip" />
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th>ปี</th>
  <th>ประเภทคณะกรรมการ</th>
  <th>วันที่ แต่งตั้ง</th>
  <th>ชื่อ - นามสกุล</th>
  <th>จัดการ</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><?=$row->committee_year?></td>
	  <td><?=$row->law_committee_type->name?></td>
	  <td><?=mysql_to_th($row->committee_dateappoint)?></td>
	  <td><?=lang_decode($row->committee_name)?></td>
	  <td><a href="admin/law_committees/form/<?=$row->id?>"><img src="themes/admin/images/edit.png" width="24" height="24" style="margin-right:10px;" class="vtip" title="แก้ไขรายการนี้" /></a> <a href="admin/law_committees/delete/<?=$row->id?>"><img src="themes/admin/images/remove.png" width="32" height="32" class="vtip" title="ลบรายการนี้"  onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')" /></a></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>