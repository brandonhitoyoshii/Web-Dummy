var form = document.getElementById("postform");
var trigger = document.getElementById("addpost");

trigger.onclick = function(){
	console.log(form.className);
	if(form.className == "show"){
			form.className = "";
	} else {
		form.className = "show";
	}
}