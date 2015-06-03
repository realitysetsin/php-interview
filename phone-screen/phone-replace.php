<?php
/**
 *
 * Example:
 * maskPhoneNumber('Call me at (818) 274-0260 as soon as possible.', 'x')
 *
 * returns
 * "Call me at (xxx) xxx-xxxx as soon as possible."
 *
 */

function maskPhoneNumber($str, $mask = 'x')
{

}

// SOLUTION
function maskPhoneNumberSolution($str, $mask = 'x')
{
    return preg_replace_callback('/(\(\d{3}\)\s|\d{3}-)\d{3}-\d{4}/', function($match) use ($mask) {
        return preg_replace('/\d/', $mask, $match[0]);
    }, $str);
}
// a candidate who may not be familiar with closures in PHP might use capture groups, which would also solve the
// problem, but is less flexible when capture groups are of dynamic width.
// a candidate with dated experience, may use the /e pattern modifier, which has been deprecated as of 5.5.
// a candidate with REALLY poor experience might try to capture each format individually and replace it with its
// masked equivalent (e.g. "{$mask}{$mask}{$mask}-{$mask}{$mask}{$mask}-{$mask}{$mask}{$mask}{$mask}")