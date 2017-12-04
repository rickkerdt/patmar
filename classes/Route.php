<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 11/30/2017
 * Time: 14:21
 */

class Route
{
    private $urls = [];

    public function map($method, $url, $class)
    {
        array_push($this->urls, ["method" => $method, "url" => $url, "class" => $class]);
    }

    public function dumpRoutes()
    {
        return $this->urls;
    }
}