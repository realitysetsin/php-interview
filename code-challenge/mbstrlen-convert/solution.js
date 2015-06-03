/*
The PHP function (in README.md) relies on Unicode Scripts, which nearly every language supports, but Javascript does not.
To solve this in Javascript, you will have to look up the Unicode ranges that Cyrillic comprises.
This is an easy thing to research, which makes it ideal for a code challenge. The ranges are as follows:

x0400-x04FF (Cyrillic)
x0500-x052F (Cyrillic Supplement)
x2DE0-x2DFF (Cyrillic Extended A)
xA640-xA69F (Cyrillic Extended B)

For a basic solution, I would consider the first Unicode block sufficient.
 */

String.prototype.solutionOne = function () {
  var cyrillic = /[\u0400-\u04FF]/g;
  return this.length + (cyrillic.test(this) ? this.match(cyrillic).length : 0);
};

/*
But using all blocks would be better.
 */
String.prototype.solutionTwo = function () {
  var cyrillic = /[\u0400-\u04FF\u0500-\u052F\u2DE0-\u2DFF\uA640-\uA69F]/g;
  return this.length + (cyrillic.test(this) ? this.match(cyrillic).length : 0);
};

/*
A more advanced knowledge of Javascript would account for the presence of surrogate pairs. Javascript strings are
represented in UTF-16. Characters that are x10000 and higher are represented in surrogate pairs. Since there are no
Cyrillic characters in that range, we can exclude everything in it.
 */
String.prototype.solutionThree = function () {
  var cyrillic = /[\u0400-\u04FF\u0500-\u052F\u2DE0-\u2DFF\uA640-\uA69F]/g;
  var num_cyrillic = cyrillic.test(this) ? this.match(cyrillic).length : 0;

  var high_surrogates = /[\uD800-\uDBFF]/g;
  var num_high_surrogates = high_surrogates.test(this) ? this.match(high_surrogates).length : 0;

  return this.length + num_cyrillic - num_high_surrogates;
};