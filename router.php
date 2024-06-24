<?php

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

// 404 Meldung
function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

$routes = require('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($uri, $routes);