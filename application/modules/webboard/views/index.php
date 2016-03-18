<div id="webboard">
  <span class="title-law2">กระทู้ ถาม-ตอบ</span>
  <div class="line1">&nbsp;</div>

  <a href="webboard/form"><i class="fa fa-pencil-square-o"></i> ตั้งคำถามใหม่</a>
  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th>คำถามที่</th>
        <th>หัวข้อ</th>
        <th>โดย</th>
        <th>อ่าน</th>
        <th>ตอบ</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($rs as $row):?>
      <tr>
        <td><?=$row->id?></td>
        <td>
        	<a href="webboard/view/<?=$row->id?>"><?=$row->quiz_title?></a>
        	<?if($row->quiz_sticky == 1):?>
        		&nbsp;<img src="themes/admin/images/pin.png" width="16" height="16" class="vtip" title="ปักหมุดกระทู้">
        	<?endif;?>
        </td>
        <td><?=$row->quiz_who?></td>
        <td><?=number_format($row->quiz_view)?></td>
        <td><?=$row->law_answer->count()?></td>
      </tr>
      <?endforeach;?>
    </tbody>
  </table>
</div>

<?=$rs->pagination_front();?>
