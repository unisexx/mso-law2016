<div id="webboard">
  <span class="title-law2"><?=lang("h_webboard")?></span>
  <div class="line1">&nbsp;</div>
  <div>
    <h3><?=$quiz->quiz_title?></h3>
    <p><?=$quiz->quiz_detail?></p>
    <div class="small text-right"><?=$quiz->quiz_who?></div>
    <div class="small text-right"><?=db_to_th($quiz->quiz_createdate)?></div>
  </div>
  <hr>
  <h4><?=lang("b_answer")?></h4>
  <?foreach($answer as $ans):?>
  <div>
    <p><?=$ans->answer_detail?></p>
    <div class="small text-right"><?=$ans->answer_who?></div>
    <div class="small text-right"><?=db_to_th($ans->answer_createdate)?></div>
  </div>
  <hr>
  <?endforeach;?>
  <!-- <h4>ตอบคำถาม</h4> -->
  <form id="webboard_answer" class="form-horizontal" action="webboard/save_answer" method="post">
    <textarea class="form-control" name="answer_detail" rows="8" placeholder="<?=lang("b_detail")?>"></textarea>
    <br>
    <input class="form-control" type="text" name="answer_who" placeholder="<?=lang("b_name")?>">
    <br>
    <img src="users/captcha" />
    <Br>
    <input class="form-control" type="text" name="captcha" id="inputCaptcha" placeholder="<?=lang("captcha")?>" style="width:125px;">
    <Br>
    	<input type="hidden" name="law_quiz_id" value="<?=$quiz->id?>">
	  <!-- <button type="submit" class="btn btn-info">ตั้งคำถาม</button> -->
    	<input class="btn btn-info" type="submit" value="<?=lang("b_answer_button")?>">
  </form>
</div>

<script type="text/javascript" charset="utf-8">
$(document).ready(function(){
	$("#webboard_answer").validate({
	    rules:
	    {
	    	answer_detail:{required: true},
        	answer_who:{required: true},
        	captcha:
	        {
	            required: true,
	            remote: "users/check_captcha"
	        }
	    },
	    messages:
	    {
	    	answer_detail:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
        	answer_who:{required: "ฟิลด์นี้ห้ามเป็นค่าว่าง"},
        	captcha:
	        {
	            required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพ",
	            remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพ"
	        }
	    }
    });
});
</script>
