<?php

use PHPHtmlParser\Dom;

if (! function_exists("get_preview")) {
    function get_preview($fullHtml)
    {
        if (! $fullHtml) {
            return null;
        }
        $dom = new Dom;
        $dom->load($fullHtml);
        if ($p = $dom->find("p")[0]) {
            return $p->text;
        } else {
            return null;
        }
    }
}
