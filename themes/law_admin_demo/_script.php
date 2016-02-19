<link rel="stylesheet" type="text/css" href="css/template.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/cufon/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon/supermarket_400.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2, h3, h4, #menu');

</script>

<!-- Colorbox jquery -->
<script src="js/jquery.colorbox.js"></script>
<link media="screen" rel="stylesheet" href="css/colorbox.css" />
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
<link rel="stylesheet" href="css/menu.css">
<script src="js/menu.js"></script>


<!-- Tooltip jquery -->
<script type="text/javascript" src="js/vtip.js"></script>
<link rel="stylesheet" type="text/css" href="css/vtip.css" />

<!-- number format -->
<script type="text/javascript" src="js/jquery.number.js"></script>
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
<script type="text/javascript" src="js/jquery.maskedinput.js"></script>
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
<link href="css/bootstrap-switch.css" rel="stylesheet">
<script src="js/bootstrap-switch.js"></script>
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


<!-- bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">












