$( document ).ready(function() {
    $("#file1_field_box").hide();
    $("#file2_field_box").hide();
    $("#file3_field_box").hide();
    $("#file4_field_box").hide();
    $("#file5_field_box").hide();

    $( "#file1_input_box" ).after( 
        "<div class='table_link'><a target='_blank' href='http://www.pdfmerge.com/es' download>Concatenar PDF </a></div>" 
        );


    $( "#body_img_input_box" ).after( 
    	"<div class=''><a target='_blank' href='http://www.psicofisica.com/admin/assets/uploads/files/body_img/body_img.jpg' download>Descargar Imagen original </a></div>" 
    	);

    $( "#carta_astral_input_box" ).after( 
    	"<div class=''><a target='_blank' href='https://carta-natal.es/carta.php' >Generar Carta Astral</a></div>" 
    	);

    $( "#carta_astral_input_box" ).after( 
        "<button type='button' id='uploadFilesButton' class='btn btn-default'>Subir Mas Archivos</button>" 
        );

    $("#uploadFilesButton").click(function(){
        $("#file1_field_box").toggle();
        $("#file2_field_box").toggle();
        $("#file3_field_box").toggle();
        $("#file4_field_box").toggle();
        $("#file5_field_box").toggle();
    });

    if($("#file1_input_box").find("img").attr("src") !== undefined){
        var elementToAdd = "<img src='' id='img_show_profile_picture'>";
        $(elementToAdd).insertAfter($("#pacient_crud_container"));
        $("#img_show_profile_picture").attr("src",$("#file1_input_box").find("img").attr("src"));
    }
});
