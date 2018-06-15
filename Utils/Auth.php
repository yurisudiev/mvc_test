<?php

/**
 * Class Auth
 */

class Auth
{
    /**
     * Checks username and password.
     * @param $username
     * @param $password
     * @return bool
     */
    public static function login($username, $password)
    {
        if ($username == ADMIN_USERNAME && $password == ADMIN_PASSWORD) {
            $_SESSION['is_admin'] = true;
            return true;
        }
        return false;
    }

    /**
     * Logout function
     */
    public static function logout()
    {
        unset($_SESSION['is_admin']);
    }

    /**
     * Check if admin is logged in
     * @return bool
     */
    public static function isAdmin()
    {
        return (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true);
    }
}