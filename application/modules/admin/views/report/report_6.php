<h3>รายงานการใช้งานระบบบริหารจัดการผู้ใช้</h3>

<div id="search">
<div id="searchBox">
<form class="form-inline">
  <?=form_dropdown('user_group_id',get_option('id','name','user_groups order by id asc'),@$_GET['user_group_id'],'id="group" class="form-control" style="width:auto;" onchange="frm=this.form; check_permit();"','-- เลือกสังกัด --');?>
  <button type="submit" class="btn btn-info"><img src="themes/admin/images/search.png" width="16" height="16" />Search</button>
</form>
</div>
</div>

<table class="tblist">
	<tr>
	  <th align="left">ลำดับ</th>
	  <th align="left">วันที่และเวลา</th>
	  <th align="left">ชื่อผู้ใช้งาน</th>
	  <th align="left">ไอพี</th>
	  <th align="left">สถานะการใช้งาน</th>
	  <th align="left">ตำแหน่งที่ใช้งาน</th>
	</tr>
	<?foreach($rs as $key=>$row):?>
	<tr class="<?=alternator('','odd');?>">
		<td><?=($key+1)?></td>
		<td><?=$row->time?></td>
		<td><?=$row->username?></td>
		<td></td>
		<td><?=$row->action?></td>
		<td><?=$row->ref?></td>
	</tr>
	<?endforeach;?>
</table>