<div id="highlight" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php foreach($rs as $key=>$row):?>
      	<li data-target="#highlight" data-slide-to="<?=$key?>" <?=($key==0)?'class="active"':'';?>></li>
      <?php endforeach;?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
    	<?php foreach($rs as $key=>$row):?>
    		<div class="item <?=($key==0)?'active':'';?>">
    			<a href="<?=$row->url?>">
	        <?if(@$this->session->userdata('lang') == "th"):?>
		            <img src="uploads/hilight/<?=$rs->img_th?>" width="863" height="266">
			<?elseif(@$this->session->userdata('lang') == "en"):?>
		            <img src="uploads/hilight/<?=$rs->img_en?>" width="863" height="266">
		    <?endif;?>
				</a>
	      </div>
    	<?php endforeach;?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#highlight" role="button" data-slide="prev">
      <i class="icon-prev fa fa-angle-left"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#highlight" role="button" data-slide="next">
      <i class="icon-next fa fa-angle-right"></i>
      <span class="sr-only">Next</span>
    </a>
</div>