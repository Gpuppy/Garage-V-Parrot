<?php

##umask(0000); // This will let the permissions be 0777

use App\Kernel;
use http\Env\Request;


require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    if ($trustedProxies = $_SERVER['TRUSTED_PROXIES'] ?? $_ENV['TRUSTED_PROXIES'] ?? false) {
        Request::setTrustedProxies(explode(',', $trustedProxies), Request::HEADER_X_FORWARDED_ALL ^ Request::HEADER_X_FORWARDED_HOST);
    }

};

#$_SERVER['HTTP_X_FORWARDED_PROTO'] = $_SERVER['HTTP_CUSTOM_FORWARDED_PROTO'];

//$response = $kernel->handle($request);

