<?php


/**
 * User model
 *
 * Manage the authentication provides by Auth0
 * Can return specified data
 *
 * @copyright Copyright (c) 2018 ProAbono
 * @license MIT
 */


use Auth0\SDK\Auth0;


class User {


    // The domain of the OIDC Provider Auth0 tenant
    private static $domain = null;
    // The clientID of the target Application
    private static $client_id = null;
    // The clientSecret of the target Application
    private static $client_secret = null;
    // The URL in your application where the user will be redirected to after they have authenticated
    private static $redirect_uri = null;
    // The Identifier value on the Settings tab for the API you created
    private static $audience = null;

    // Store datas returned from Auth0
    private $rawData_from_auth0 = null;


    private function __construct() {
    }


    /**
     * Ensure the authentication before processing a request.
     */
    private static function ensureInitialized() {
        if (!isset(User::$domain)) {
            User::$domain = getenv('AUTH0_DOMAIN');
            User::$client_id = getenv('AUTH0_CLIENT_ID');
            User::$client_secret = getenv('AUTH0_CLIENT_SECRET');
            User::$redirect_uri = getenv('AUTH0_CALLBACK_URL');
            User::$audience = getenv('AUTH0_AUDIENCE');
        }
    }


    /**
     * Return the current user get from Auth0.
     *
     * @param bool $required
     * @return null|User
     * @throws \Auth0\SDK\Exception\ApiException
     * @throws \Auth0\SDK\Exception\CoreException
     */
    public static function getCurrentUser($required = true) {

        User::ensureInitialized();

        if(User::$audience == ''){
            User::$audience = 'https://' . User::$domain . '/userinfo';
        }

        $auth0 = new Auth0([
            'domain' => User::$domain,
            'client_id' => User::$client_id,
            'client_secret' => User::$client_secret,
            'redirect_uri' => User::$redirect_uri,
            'audience' => User::$audience,
            'scope' => 'openid profile',
            'persist_id_token' => true,
            'persist_access_token' => true,
            'persist_refresh_token' => true,
        ]);

        $raw =  $auth0->getUser();

        if (!$raw) {
            if($required) {
                // no user ? then login
                $auth0->login($_SERVER["REQUEST_URI"]);
            }
            return null;
        }

        $user = new User();

        // Fill the User property with raw data of an user
        $user->rawData_from_auth0 = $raw;

        return $user;
    }


    /**
     * @throws \Auth0\SDK\Exception\CoreException
     */
    public static function logout() {
        User::ensureInitialized();

        $auth0 = new Auth0([
            'domain' => User::$domain,
            'client_id' => User::$client_id,
            'client_secret' => User::$client_secret,
            'redirect_uri' => User::$redirect_uri,
            'audience' => User::$audience,
            'scope' => 'openid profile',
            'persist_id_token' => true,
            'persist_refresh_token' => true,
        ]);

        $auth0->logout();

        $return_to = 'http://' . $_SERVER['HTTP_HOST'];
        $logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', User::$domain, User::$client_id, $return_to);
        header('Location: ' . $logout_url);
    }


    public function getId() {
        return isset($this->rawData_from_auth0['user_id'])
            ? $this->rawData_from_auth0['user_id']
            : $this->rawData_from_auth0['sub'];
    }


    public function getDisplayName() {
        return isset($this->rawData_from_auth0['nickname'])
            ? $this->rawData_from_auth0['nickname']
            : $this->rawData_from_auth0['name'];
    }


    public function getEmail() {
        $email = $this->rawData_from_auth0['name'];
        $charMail = '@';

        $pos = strpos($email, $charMail);

        if ($pos !== false) {
            return $email;
        }
        return null;
    }


    public function getName() {

        $name = $this->rawData_from_auth0['name'];
        $charMail = '@';

        $pos = strpos($name, $charMail);

        if ($pos !== false) {
            return $this->rawData_from_auth0['nickname'];
        }
        return $name;
    }


}