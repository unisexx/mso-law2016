<div id="news-law">
  <span class="title-law1"><?=lang("ho_new_law")?></span>
  <div class="line1">&nbsp;</div>
  <ul>
    <?foreach($rs as $row):?>
    <li>
      <span id="day-law1">
        <?if(@$this->session->userdata('lang') == "th"):?>
	            <?=mysql_to_th($row->notic_date)?>
		<?elseif(@$this->session->userdata('lang') == "en"):?>
	            <?=mysql_to_en($row->notic_date)?>
	    <?endif;?>
      </span>
      <span id="<?=alternator('news-law1', 'news-law2');?>">
        <a href="law/view/<?=$row->id?>" target="_blank">
        	<?if(@$this->session->userdata('lang') == "th"):?>
		            <?=str_replace("|"," ",$row->name_th)?>
			<?elseif(@$this->session->userdata('lang') == "en"):?>
		            <?if($row->name_eng == ""):?>
		            	<?=str_replace("|"," ",$row->name_th)?>
		            <?else:?>
		            	<?=str_replace("|"," ",$row->name_eng)?>
		            <?endif;?>
		    <?endif;?>
        </a>
      </span>
    </li>
    <?endforeach;?>
  </ul>
  <div class="clearfix">&nbsp;</div>
</div>
<div class="clearfix">&nbsp;</div>
<!-----------------------------------กฎหมายใหม่...------------------------------------------------------------------------------------------------->