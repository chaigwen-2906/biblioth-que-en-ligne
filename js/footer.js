//-------------------reseauxSociaux ---------------------------------
$(".selectionLivres").hide();
$(".btnloupe").click(function(){
    if($(".selectionLivres").is(":visible")){
        $(".selectionLivres").hide("slow");
    }
    else{
        $(".selectionLivres").show("slow");
    }
});