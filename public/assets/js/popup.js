// JavaScript Document
window.addEventListener("load",function(){
	setTimeout(
	function open(event){
		document.querySelector(".popup").style.display="block";
	},
		3000
	)
});
document.querySelector("#close").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "none";
});
document.querySelector("#exit").addEventListener("click", function(){
	document.querySelector(".popup").style.display = "none";
});
let popups = document.getElementById("popup");
function closePopup(){
	popups.style.display = "none";
}
