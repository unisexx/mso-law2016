<?$pollTitleArray = array('0'=>'ควรปรับปรุง','1'=>'ควรปรับปรุง','2'=>'พอใช้','3'=>'ดี','4'=>'ดีมาก')?>
<?$pollTitleArray_eng = array('0'=>'Should Improve','1'=>'Should Improve','2'=>'Fair','3'=>'Good','4'=>'Excellent')?>
<div class="poll">
  <img src="themes/law/images/icon-questionMark.png" width="16" height="16">&nbsp;
  <strong><?=lang("po_title")?></strong>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-poll">
    <tbody>
      <?foreach($rs as $row):?>
      <tr>
      	<td width="10"><input type="radio" name="poll" value="<?=$row->score?>"></td>
        <td class="td-poll">
        	<?if(@$this->session->userdata('lang') == "th"):?>
		            <?=$pollTitleArray[$row->score]?>
			<?elseif(@$this->session->userdata('lang') == "en"):?>
		            <?=$pollTitleArray_eng[$row->score]?>
		    <?endif;?>
        </td>
        <td>
          <div class="percent">
            <div style="margin-left:-6px; width:<?=$row->percentage?>%;background-color:#e9e7e7;"><span style="margin-left: 5px;"><?=$row->percentage?>%</span></div>
          </div>
        </td>
      </tr>
      <?endforeach;?>
    </tbody>
  </table>
  <div id="btnBlock" align="center">
  	<?if(@$check_ip[0]['ip'] == ""):?>
  		<button id="voteBtn" type="button" class="btn btn-info btn-xs center-block"><?=lang("po_vote")?></button>
  	<?endif?>
  </div>
</div>

<script>
$(document).ready(function(){
	$('div.poll input[type=radio]:first').attr('checked', true);
	
	$('#voteBtn').click(function(){
		$.get('ajax/vote',{
			'score' : $(this).closest('div.poll').find('input[type=radio]').val()
		},function(data){
			$("#btnBlock").html("<span style='color:#555;font-size:13px;'>ทำการบันทึกผลโหวตเรียบร้อย</span>");
		});
	});
});
</script>