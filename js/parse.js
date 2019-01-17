var btnParse = null;

window.onload = function(){
	btnParse = document.querySelector("#btn-parse");
	
};

function parse(){
	var request = new XMLHttpRequest();
	request.open("POST","");
	var jsonObj = JSON.parse();
	var sourceUrl = jsonObj.data.url;
}
