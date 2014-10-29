function isBigEnough(element, index, array) {
	  return element >= 10;
}
var passed1 = [12, 5, 8, 130, 44].every(isBigEnough);
 //passed is false
console.log(passed1);
var passed2 = [12, 54, 18, 130, 44].every(isBigEnough);
  //passed is true
console.log(passed2);
