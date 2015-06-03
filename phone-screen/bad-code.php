<?php
/**
 * Find as many problems with badFunction as possible.
 */

class badCode {

    public function badFunction($dateTimeObject, $Comment = '', $user_id)
    {
        global $db_link;

        $newLoginDate = $dateTimeObject->format('Y-m-d H:i:s');
        $query = "UPDATE Users SET LoginDate = '$newLoginDate' WHERE id = $user_id";

        if (!mysql_query($query, $db_link)) {
            return false;
        }

        if ($Comment) {
            require_once("../lib/user_log.php");
            $log = new UserLog;
            $log::recordComment($Comment);
        }

        return mysql_insert_id($db_link);

    }
}

/**
 * Some possible answers:
 *
 * 0. DO NOT USE GLOBALS!
 * 1. The function is using the mysql library, which has been deprecated and is dangerous.
 * 2. The function is passing input directly to the SQL query without validation/sanitization.
 * 3. The function expects a DateTime object but is not using type hinting.
 * 4. The method signature has required arguments before optional arguments.
 * 5. The method is requiring an external file. It is far better to use an autoloader, or if one is not available,
 *    to require the other file at the top of the class.
 * 6. Static call on an instance variable.
 * 7. The function has different return types (boolean and int).
 * 8. The variable styles are inconsistent.
 * 9. mysql_insert_id only works on insert, not update
 *
 * There may be others
 */