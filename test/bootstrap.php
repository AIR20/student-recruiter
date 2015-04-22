<?php

require 'config.php';

require TEST_PATH.'slim_test_helper.php';

/**
 * Start native PHP session
 */
session_cache_limiter(false);
session_start();