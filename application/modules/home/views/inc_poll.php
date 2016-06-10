<?$pollTitleArray = array('0'=>'ควรปรับปรุง','1'=>'ควรปรับปรุง','2'=>'พอใช้','3'=>'ดี','4'=>'ดีมาก')?>
<div class="poll">
  <img src="themes/law/images/icon-questionMark.png" width="16" height="16">&nbsp;
  <strong>คุณคิดว่าเนื้อหาของระบบฐานข้อมูลกฎหมายเป็นอย่างไรบ้าง</strong>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="tb-poll">
    <tbody>
      <?foreach($rs as $row):?>
      <tr>
      	<td width="10"><input type="radio" name="poll" value="<?=$row->score?>"></td>
        <td class="td-poll"><?=$pollTitleArray[$row->score]?></td>
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
  	<button id="voteBtn" type="button" class="btn btn-info btn-xs center-block">โหวตคะแนน</button>
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