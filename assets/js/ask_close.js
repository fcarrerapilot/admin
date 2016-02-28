$(window).bind("beforeunload", function(event) { 
	if($("#any-changes").html() == "true"){
		return "¡Existen cambios no guardados!"; 
	}
});

$( ".form-control" ).change(function() {
  $("#any-changes").html("true");
});