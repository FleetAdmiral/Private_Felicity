var flagW=300;
var flagElementW=2;
var len=flagW/flagElementW;
var delay=10;
window.addEventListener('load', function(){
	var flag=document.getElementById("flag");
	for(var i=0; i<len; i++){
		var fe=document.createElement("div");
		fe.className="flag-element";
		fe.style.backgroundPosition=-i*flagElementW+"px 0";
		fe.style.webkitAnimationDelay=i*delay+'ms';
		fe.style.animationDelay=i*delay+'ms';
		flag.appendChild(fe);
	}
})
