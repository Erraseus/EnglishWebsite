window.addEventListener("keypress", Check, false);
fehler = 0
function Check(){
	text = document.getElementById("originalText").value
	newtext = document.getElementById("neuerTextIn").value
	kurzertext = text.substring(0,newtext.length)
	
	if(newtext != kurzertext){
		words = newtext.split(' ');
		alert("Du hasst einen Fehler: "+words[words.length - 1]);
		fehler++
		console.log(fehler);
	}else{
		if(kurzertext.length > text.length -1){
			window.location = "index.php?view=win&&error="+fehler;
		}
	}
}