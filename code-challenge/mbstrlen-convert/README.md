### Background

We have an application that sends data off to an external API. This API doesn't give detailed error messages, so we want
to do as much validation within our application as possible before we send it off to the API. The data is in the following
format:

```json
{
  title: "Book title"
  description: "Book description"
}
```

The API imposes the following rule:

> `title` may be no longer than 25 total characters. Cyrillic characters count as two characters.

Right now, we have a PHP function that calculates the length of a string according to this rule.

```php
function calculateTitleLength($str) {
    mb_internal_encoding("UTF-8");
    $len = mb_strlen($str);

    preg_replace('/\p{Cyrillic}/u', '', $str, -1, $num_cyrillic);
    return $len + $num_cyrillic;
}
```

As part of process improvements, we want to move this length calculation to the client side.

### Instructions

Implement this function in Javascript such that the output is the same as the PHP function.

```javascript
String.prototype.titleLength = function () {
    // Implement code here
};
```

### Example Javascript Output

```javascript
"grandmother".titleLength(); // => 11
"бабушка".titleLength(); // => 14
"緑茶".titleLength(); // => 2
"𐌈𐌎".titleLength(); // => 2
```