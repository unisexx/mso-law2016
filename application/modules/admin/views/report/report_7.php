<h3>รายงานจำนวนผู้ใช้งานระบบ</h3>

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
  <th align="left">ชื่อ-สกุลผู้ใช้งาน</th>
  <th align="left">ชื่อผู้ใช้งาน</th>
  <th align="left">เบอร์โทร</th>
  <th align="left">อีเมล์</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr class="<?=alternator('','odd');?>">
	  <td><?=($key+1)?></td>
	  <td><?=$row->name?> <?=$row->lastname?></td>
	  <td><?=$row->username?></td>
	  <td><?=$row->tel?></td>
	  <td><?=$row->email?></td>
  </tr>
  <?endforeach;?>
</table>