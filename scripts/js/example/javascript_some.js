function isBigEnough(element, index, array) {
	  return element >= 10;
}
var passed = [2, 5, 8, 1, 4].some(isBigEnough);
console.log(passed);
// passed is false
 passed = [12, 5, 8, 1, 4].some(isBigEnough);
// // passed is true
console.log(passed);
