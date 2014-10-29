function checkColor(element){
	return(element >= 0 && element < 256);
}
function isBigEnough(element) {
	  return element >= 10;
}

var colors = new Array();
colors[0] = [0,262,255];
var a = colors[0].filter(checkColor);
var filtered = [12, 5, 8, 130, 44].filter(isBigEnough);

console.log(a,filtered);

