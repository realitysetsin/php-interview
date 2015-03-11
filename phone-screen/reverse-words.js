/**
 * Reverse the order of words in a sentence. Complete this function.
 */

var sentence = "The quick brown fox.";

function reverseWords(str) {

}

reverseWords(sentence);
// should return
// "fox. brown quick The"


// BONUS
// Write the function so that I can call the following and it will return the same result.
"The quick brown fox.".reverseWords();


// ANSWER
function reverseWordsSolved(str) {
  return str.split(' ').reverse().join(' ');
}

// BONUS ANSWER
String.prototype.reverseWords = function() {
  return this.split(' ').reverse().join(' ');
};
