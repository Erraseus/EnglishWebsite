window.addEventListener("keypress", Check, false);
fehler = 0
function Check(){
	text = document.getElementById("originalText").value
	newtext = document.getElementById("neuerTextIn").value
	kurzertext = text.substring(0,newtext.length)
	
	if(newtext != kurzertext){
		words = newtext.split(' ');
		if(words[words.length - 1] == ""){
			alert("Du hasst einen Fehler: "+words[words.length - 2]);
		}else if(words[words.length - 2] == ""){
			alert("Du hasst einen Fehler: "+words[words.length - 3]);
		}else{
			alert("Du hasst einen Fehler: "+words[words.length - 1]);
		}
		fehler++
		console.log(fehler);
		
	}else{
		if(kurzertext.length > text.length -1){
			window.location = "index.php?view=win&&error="+fehler;
		}
	}
}


$(document).ready(function() {
    var ctrlDown = false,
        ctrlKey = 17,
        cmdKey = 91,
        vKey = 86,
        cKey = 67;

    $(document).keydown(function(e) {
        if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = true;
    }).keyup(function(e) {
        if (e.keyCode == ctrlKey || e.keyCode == cmdKey) ctrlDown = false;
    });

    $(".no-copy-paste").keydown(function(e) {
        if (ctrlDown && (e.keyCode == vKey || e.keyCode == cKey)) return false;
    });
    
    // Document Ctrl + C/V 
    $(document).keydown(function(e) {
        if (ctrlDown && (e.keyCode == cKey)) Alarm();
        if (ctrlDown && (e.keyCode == vKey)) Alarm();
    });
});

function Alarm(){
	const music = new Audio('sound/Alarm.wav');
	music.loop =true;
	music.play();
	music.value = 100;
	//Copieren Verboten
}