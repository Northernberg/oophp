<?php
/**
 * Index textfilters
 */
$app->router->get("textfilters", function () use ($app) {
    $title = "Textfilters";

    $app->page->add("textfilters/index");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * BBcode tests
 */
$app->router->get("textfilters/bbcode", function () use ($app) {
    $title = "bbcode";

    $filter = new \Guno\Filter\TextFilter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/bbcode.txt");

    $html = $filter->parse($text, ["bbcode"]);

    $app->page->add("textfilters/bbcode", [
        "text" => $text,
        "html" => $html
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Link tests
 */
$app->router->get("textfilters/clickable", function () use ($app) {
    $title = "clickable";

    $filter = new \Guno\Filter\TextFilter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/clickable.txt");

    $html = $filter->parse($text, ["link"]);

    $app->page->add("textfilters/clickable", [
        "text" => $text,
        "html" => $html
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("textfilters/markdown", function () use ($app) {
    $title = "markdown";

    $filter = new \Guno\Filter\TextFilter();
    $text = file_get_contents(__DIR__ . "/../htdocs/text/sample.md");

    $html = $filter->parse($text, ["markdown"]);

    $app->page->add("textfilters/markdown", [
        "text" => $text,
        "html" => $html
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("textfilters/nl2br", function () use ($app) {
    $title = "nl2br";

    $filter = new \Guno\Filter\TextFilter();
    $text = "Hey \n this \n is \n newline";

    $html = $filter->parse($text, ["nl2br"]);

    $app->page->add("textfilters/nl2br", [
        "text" => $text,
        "html" => $html
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
