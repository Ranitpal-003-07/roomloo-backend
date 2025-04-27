<?php
return [

/*
|--------------------------------------------------------------------------
| Cross-Origin Resource Sharing (CORS) Configuration
|--------------------------------------------------------------------------
|
| Here you may configure your settings for cross-origin resource sharing
| or "CORS". This determines what cross-origin operations may execute
| in web browsers. You are free to adjust these settings as needed.
|
| To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
|
*/



    'paths' => ['api/*'], // Allow CORS for API routes
    'allowed_methods' => ['*'], // Allow all HTTP methods (GET, POST, PUT, DELETE)
    'allowed_origins' => ['*'], // Allow all origins (you can specify a list of trusted domains instead of *)
    'allowed_headers' => ['*'], // Allow all headers (you can specify a list of headers instead of *)
    'exposed_headers' => [],
    'max_age' => 900000,
    'supports_credentials' => true,
];
