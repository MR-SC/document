var numbers = [1, 4, 9];
var roots = numbers.map(Math.sqrt);
// roots is now [1, 2, 3], numbers is still [1, 4, 9]
console.log(roots);

var numbers = [1, 4, 9];
var doubles = numbers.map(function(num) {
	  return num * 2;
});
// doubles is now [2, 8, 18]. numbers is still [1, 4, 9]
console.log(doubles);
