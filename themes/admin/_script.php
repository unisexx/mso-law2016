<link rel="stylesheet" type="text/css" href="themes/admin/css/template.css"/>
<link rel="stylesheet" href="themes/admin/css/bootstrap.min.css">
<link rel="stylesheet" href="media/js/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css" />
<link media="screen" rel="stylesheet" href="themes/admin/css/colorbox.css" />
<link href="themes/admin/css/bootstrap-switch.css" rel="stylesheet">
<link rel="stylesheet" href="themes/admin/css/menu.css">
<link rel="stylesheet" type="text/css" href="themes/admin/css/vtip.css" />


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> -->
<script src="themes/admin/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="themes/admin/js/cufon/cufon-yui.js"></script>
<script type="text/javascript" src="themes/admin/js/cufon/supermarket_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, #menu');

</script>

<!-- Colorbox jquery -->
<script src="themes/admin/js/jquery.colorbox.js"></script>
<script>
			$(document).ready(function(){
				//Examples of how to assign the Colorbox event to elements
				$(".inline").colorbox({inline:true, width:"90%"});
				$(".inline2").colorbox({inline:true, width:"100%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});

				$('.non-retina').colorbox({rel:'group5', transition:'none'})
				$('.retina').colorbox({rel:'group5', transition:'none', retinaImage:true, retinaUrl:true});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
			});
</script>

<!-- Menu CSS -->
<script src="themes/admin/js/menu.js"></script>


<!-- Tooltip jquery -->
<script type="text/javascript" src="themes/admin/js/vtip.js"></script>

<!-- number format -->
<script type="text/javascript" src="themes/admin/js/jquery.number.js"></script>
<script type="text/javascript">
$(function(){
	$('input.numDecimal').number( true, 2 );
	$('input.numInt').number( true, 0 );
	
	$('input.numOnly').bind('keypress', function(e) {
    	return ( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)) ? false : true ;
	});
});
</script>

<!-- Input format -->
<script type="text/javascript" src="themes/admin/js/jquery.maskedinput.js"></script>
<script type="text/javascript">
jQuery(function($){
   $(".fdate").mask("99/99/9999");
   $(".fmobile").mask("(999) 999-9999");
   $(".fidcard").mask("9-9999-99999-99-9");
   $(".fnum").mask("999,999,999");
   $(".ftime").mask("99:99");
});
</script>


<!-- On / Off -->
<script src="themes/admin/js/bootstrap-switch.js"></script>
    <script>
    $(function(argument) {
      $('.chkOnOff').bootstrapSwitch();
    })
    </script>
    

<!-- Tab -->
<script>
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>


<!-- Checkbox Show/Hide -->
<script type="text/javascript">
$(document).ready(function(){
	$(".dvDetail").hide();
    $('input[type="checkbox"]').click(function(){
		// law/form.php
        if($(this).attr("value")=="detail"){
            $(".dvDetail").toggle();
        }
    });
});
</script>

<!-- Option Show/Hide -->
<script>
$(document).ready(function(){
    $("#selthis").click(function(){
        $(".dvDetail").toggle();
    });
});
</script>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="themes/admin/js/jquery.min.js"><\/script>')</script>
<script src="themes/admin/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="themes/admin/js/ie10-viewport-bug-workaround.js"></script>


<script src="media/js/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" charset="utf-8"></script>
<script src="media/js/bootstrap-datepicker/js/locales/bootstrap-datepicker.th.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.input-group.date').datepicker({
			language: "th",
			orientation: "bottom left",
			todayHighlight: true,
    		autoclose: true
		});
	});
</script>


<!-- <script src="media/js/validate/additional-methods.min.js" type="text/javascript" charset="utf-8"></script> -->
<script src="media/js/validate/jquery.validate.min.js" type="text/javascript" charset="utf-8"></script>