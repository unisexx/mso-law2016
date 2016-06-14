<div id="plan">
  <span class="title-law2">แผนพัฒนากฎหมาย</span>
  <div class="line1">&nbsp;</div>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th>ปี</th>
        <th>เอกสาร</th>
        <th colspan="2" class="col-sm-1 text-center">ไฟล์</th>
      </tr>
      <tr>
      	<th></th>
      	<th></th>
      	<th class="text-center">th</th>
      	<th class="text-center">eng</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($rs as $row):?>
      <tr>
        <td><?=$row->plan_year?></td>
        <td><?=lang_decode($row->plan_name)?></td>
        <td class="text-center"><?if($row->plan_file_th):?><a href="uploads/planfile/<?=$row->plan_file_th?>" target="_blank"><?=file_icon_th($row->plan_file_th)?></a><?endif;?></td>
        <td class="text-center"><?if($row->plan_file_en):?><a href="uploads/planfile/<?=$row->plan_file_en?>" target="_blank"><?=file_icon_en($row->plan_file_en)?></a><?endif;?></td>
      </tr>
      <?endforeach;?>
    </tbody>
  </table>
</div>

<?=$rs->pagination_front();?>
