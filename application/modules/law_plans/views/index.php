<div id="plan">
  <span class="title-law2">แผนพัฒนากฎหมาย</span>
  <div class="line1">&nbsp;</div>

  <table class="table table-striped" id="tb-plan">
    <thead>
      <tr>
        <th>ปี</th>
        <th>เอกสาร</th>
        <th>ไฟล์</th>
      </tr>
    </thead>
    <tbody>
      <?foreach($rs as $row):?>
      <tr>
        <td><?=$row->plan_year?></td>
        <td><?=$row->plan_name?></td>
        <td><a href="<?=$row->plan_file?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
      </tr>
      <?endforeach;?>
    </tbody>
  </table>
</div>

<?=$rs->pagination_front();?>
