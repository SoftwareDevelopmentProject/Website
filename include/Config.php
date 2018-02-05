<?php

// Database Related
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sdp');

// Security options
define('SECURITY_MAX_LOGIN_TIMEOUT', 360); // 360 minutes
define('SECURITY_MAX_LOGIN_ATTEMPT', 6);

// Login
define('LOGIN_USER_NOT_FOUND', 0);
define('LOGIN_SUCCESS', 1);
define('LOGIN_PASSWORD_INCORRECT', 2);
define('LOGIN_ACCOUNT_LOCKED', 3);
define('LOGIN_NULL',4);

?>