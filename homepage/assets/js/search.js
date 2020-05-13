$(document).ready(function() {
	$("#SearchResult").show();
	$("#all").hide();
	$("#button1").css({'background':'aliceblue','color':'#0069d9'});
	
	$("#button1").click(function(){	
		$("#SearchResult").show();
		$("#all").hide();
		$("#button1").css({'background':'aliceblue','color':'#0069d9'});
		$("#button2").css({'background':'#0069d9','color':'white'});

	});

	$("#button2").click(function(){
		$("#SearchResult").hide();
		$("#all").show();
		$("#button1").css({'background':'#0069d9', 'color': 'white'});
		$("#button2").css({'background':'aliceblue','color':'#0069d9'});

	});
});