$(window).bind("beforeunload", function(event) { 
	// if($("#report-success").html() == ""){
	// 	return "¿GUARDASTE LOS CAMBIOS?"; 
	// }
});

$("save-and-go-back-button").live( "click", function() {
  alert( "Goodbye!" );
});