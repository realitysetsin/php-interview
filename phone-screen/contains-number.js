/**
 * Write a function to tell me if an array of strings contains any string that contains a number.
 */

var arrayWithNumber = ['one', 'two', 'three', 'four', 'five', 'six', 'se7en'];
var arrayWithoutNumber = ['eight', 'nine', 'ten'];

function arrayHasStringWithNumber(arr) {

}

arrayHasStringWithNumber(arrayWithNumber); // true
arrayHasStringWithNumber(arrayWithoutNumber); // false


// SOLUTION

function arrayHasStringWithNumberSolved(arr) {
  return arr.some(function (str) {
    return /\d/.test(str);
  });
}