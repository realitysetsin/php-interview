<?php
/**
 * Demonstrate how to sort an array by an arbitrary criteria.
 * Sort the following array by the user's domain name.
 */

$emails = array(
    'morgan@microsoft.com',
    'jesse@yahoo.com',
    'cameron@reachlocal.com',
    'jason@google.com',
    'tom@networkerror.com'
);

// ENTER CODE HERE


// END

print_r($emails);
// SHOULD OUTPUT
// Array
// (
//    [0] => jason@google.com
//    [1] => morgan@microsoft.com
//    [2] => tom@networkerror.com
//    [3] => cameron@reachlocal.com
//    [4] => jesse@yahoo.com
// )

// SOLUTION
usort($emails, function ($email1, $email2) {
    list($username1, $domain1) = explode('@', $email1);
    list($username2, $domain2) = explode('@', $email2);

    return strcmp($domain1, $domain2);
});
