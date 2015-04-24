<?php

require 'config.php';

require TEST_PATH.'slim_test_helper.php';

if (DEPARTMENT_SERVER) {
	ini_set('session.save_path', SESSION_PATH);
}

/**
 * Start native PHP session
 */
session_cache_limiter(false);
session_start();
