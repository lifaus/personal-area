<?php

namespace App\Services;

class Router
{
    private static array $list = [];

    public static function page(string $uri, string $page_name)
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    public static function enable()
    {
        $query = $_GET['q'];

        foreach (self::$list as $route) {
            if ($route['uri'] === "/" . $query) {
                require_once "views/pages/" . $route['page'] . ".php";
            }
        }
    }

}