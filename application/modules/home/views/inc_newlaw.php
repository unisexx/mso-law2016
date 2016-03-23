<?
function style_date($date){
  $ar = explode(" ",$date);
  return '<span class="day">'.$ar[0].'</span><br>'.$ar[1].'<br>'.$ar[2];
}
?>

<div id="news-law">
  <span class="title-law1">กฎหมายใหม่...</span>
  <div class="line1">&nbsp;</div>
  <ul>
    <?foreach($rs as $row):?>
    <li>
      <span id="day-law1">
        <?=style_date($row->notic_date)?>
      </span>
      <span id="<?=alternator('news-law1', 'news-law2');?>">
        <a href="law/view/<?=$row->id?>" target="_blank"><?=str_replace("|"," ",$row->name_th)?></a>
      </span>
    </li>
    <?endforeach;?>
  </ul>
</div>
<div class="clearfix">&nbsp;</div>
<!-----------------------------------กฎหมายใหม่...------------------------------------------------------------------------------------------------->
