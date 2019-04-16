$(document).ready(function(){
	function firstleft() {
    $(".paint").animate({"left": "-=100px" }, 1500, "swing", firstright);
}
function firstright() {
    $("img.paint").animate({"left": "+=100px" }, 1500, "swing", firstleft);
}
});
	
  
 
