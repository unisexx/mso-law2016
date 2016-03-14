<h3>กระทู้ ถาม-ตอบ</h3>
<div id="search">
<div id="searchBox">
<form class="form-inline">
  <div class="col-xs-3">
    <input type="text" class="form-control " id="exampleInputName2" placeholder="ชื่อหัวข้อกระทู้">
    </div>
  <!-- <input type="text" class="form-control" id="exampleInputName10" style="width:110px;" />
    <img src="images/calendar.png" alt="" width="24" height="24" /> -->
  <button type="submit" class="btn btn-info"><img src="images/search.png" width="16" height="16" />Search</button>
</form>

  
</div>
</div>

<?php echo $rs->pagination()?>

<table class="tblist">
<tr>
  <th>#</th>
  <th><img src="themes/admin/images/pin.png" width="16" height="16" class="vtip" title="ปักหมุดกระทู้" /></th>
  <th>หัวข้อกระทู้</th>
  <th>ความคิดเห็น</th>
  <th>ผู้โพสกระทู้</th>
  <th>วันที่ตั้งกระทู้</th>
  <th>วันที่โพสความคิดเห็นล่าสุด</th>
  <th>แสดง / ไม่แสดง</th>
  </tr>
  <?foreach($rs as $key=>$row):?>
  <tr>
	  <td><?=($key+1)+$rs->paged->current_row?></td>
	  <td><input name="checkbox" type="checkbox" id="checkbox" checked="checked" /></td>
	  <td><a href="#"><?=$row->quiz_title?></a></td>
	  <td><?=$row->law_answer->count()?></td>
	  <td><?=$row->quiz_who?></td>
	  <td><?=mysql_to_th($row->quiz_createdate)?></td>
	  <td><?=mysql_to_th($row->law_answer->order_by('id','desc')->answer_createdate)?></td>
	  <td><input id="switch-size" type="checkbox" data-size="small" data-on-color="success" class="chkOnOff" <?if($row->quiz_status == 1){echo "checked";}?>></td>
  </tr>
  <?endforeach;?>
</table>

<?php echo $rs->pagination()?>