<?php

// Require Composer Autoload
require __DIR__ . '/vendor/autoload.php';

// Require Dotenv
require __DIR__ . '/dotenv-loader.php';

// Require utilities
require __DIR__ . '/utils/User.php';
require __DIR__ . '/utils/Tools.php';

// Constants for features:
require __DIR__ . '/features.php';

ProAbono::$keyAgent = 'b61e217c-92de-458f-9a5b-26c5c74328b4';
ProAbono::$keyApi = '0da8c246-77d1-40bd-b4c4-a3d2e0bc0bfd';
ProAbono::$endpoint = 'https://api-848.proabono.com';

const URL_PRICING_PUBLIC = 'https://demo-php-EUR.proabono.com/pricing';