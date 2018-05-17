<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>queue demo</title>
  <script src="https://shopadjust.dk/system/resources/assets/global/plugins/jquery.min.js"></script>
</head>
<body>
<script>

var requests = 0;

(function($) {
  var ajaxQueue = $({});
  $.ajaxQueue = function(ajaxOpts) {
    var oldComplete = ajaxOpts.complete;
    ajaxQueue.queue(function(next) {    
		ajaxOpts.complete = function() {
			if (oldComplete) oldComplete.apply(this, arguments);    
			setTimeout(function(){
				next(); // run the next query in the queue
			},1000);
		};
	  
		$.ajax(ajaxOpts);
	  
    });
  };

})(jQuery);


function scrapeItNow(url){
	$.ajaxQueue({
		url: 'ajax.php',
		data: {
			url: url
		},
		async: true,
		success: function (data) {
			
		},
		error: function (jqXHR,textStatus,errorThrown) {
			//error Handler
		}       
	});
}

$( document ).ready(function() {
	requests = $( "li" ).length;
	var dataUrl = [];
	$( "li" ).each(function(i) {
		dataUrl = [];
		dataUrl[0] = $(this).data('url');
		scrapeItNow(dataUrl);
	});
	
	
	
});

</script>


<ul class="list">
	<li data-url="http://test.com/1">First</li>
	<li data-url="http://test.com/2">Second</li>
	<li data-url="http://test.com/3">Third</li>
</ul> 
<div class="waiting"></div>
</body>
</html>