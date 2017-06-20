function openNavHelp() {
    document.getElementById("help").style.width = "50%";
}

function closeNavHelp() {
    document.getElementById("help").style.width = "0";
}
function openNavContact() {
    document.getElementById("contect").style.width = "50%";
}

function closeNavContact() {
    document.getElementById("contect").style.width = "0";
}
function openNavAsk() {
    document.getElementById("ask").style.width = "70%";
}

function closeNavAsk() {
    document.getElementById("ask").style.width = "0";
}
function openNavFile() {
    document.getElementById("upload").style.width = "35%";
}

function closeNavFile() {
    document.getElementById("upload").style.width = "0";
}


function showDiv(id){
	var hideDiv = getElementById(id);
	if(hideDiv.style.display ==none){
		hideDiv.style.display = 'block';
		
	}else{
		hideDiv.style.display = 'none';
	}
}