<?php
/**
 * Demonstrate how to call this function safely such that will not produce fatal errors.
 * Bonus: Account for different types of exceptions and handle them differently.
 */

class User {
    public function findById($userId)
    {
        if (!is_numeric($userId)) {
            throw new \InvalidArgumentException('User ID must be numeric!');
        }

        try {
            return UserRepository::byId($userId);
        } catch (\RuntimeException $e) {
            throw $e;
        }
    }
}

// MODIFY CODE HERE
$user = new User;
$user->findById($userId);

// SOLUTION
try {
    $user = new User;
    $user->findById($userId);
} catch (\InvalidArgumentException $e) {
    // we passed an invalid argument
} catch (\RuntimeException $e) {
    // there was an error while trying to
}