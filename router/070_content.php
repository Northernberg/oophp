<?php
use Anax\Route\Exception\NotFoundException;

/**
 * Index content
 */
$app->router->any(["GET", "POST"], "content", function () use ($app) {
    $title = "Content";

    $app->db->connect();
    $sql = "SELECT * FROM content;";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("content/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Edit content
 */
$app->router->any(["GET", "POST"], "content/edit", function () use ($app) {
    $title = "Content edit";
    $contentId = $app->request->getGet("id");

    $app->db->connect();
    $sql = "SELECT * FROM content WHERE id = ?;";
    $res = $app->db->executeFetchAll($sql, [$contentId]);
    $res = $res[0];

    if ($app->request->getPost("doSave")) {
        $contentTitle = $app->request->getPost("contentTitle");
        $contentPath  = $app->request->getPost("contentPath");
        $contentSlug = $app->request->getPost("contentSlug");
        $contentData = $app->request->getPost("contentData");
        $contentType = $app->request->getPost("contentType");
        $contentFilter = $app->request->getPost("contentFilter");
        $contentPublished = $app->request->getPost("contentPublished");
        if (!$contentPath) {
            $contentPath = null;
        }
        if (!$contentSlug) {
            $contentSlug = null;
        }

        $sql = "SELECT slug FROM content WHERE slug LIKE ? AND NOT title = ?;";
        $search = $app->db->executeFetchAll($sql, [$contentSlug . "%", $contentTitle]);
        $count = 0;
        $slugs = [];

        var_dump($search);
        foreach ($search as $s) {
            $slugs[] = $s->slug;
        }

        $temp = $contentSlug;
        while (in_array($temp, $slugs)) {
            $count++;
            $temp = $contentSlug . "-" . $count;
        }
        $contentSlug = $temp;

        $sql = "UPDATE content SET title = ?, path = ?, slug = ?, data = ?, type = ?, filter = ?, published = ? WHERE id = ?;";
        $app->db->execute($sql, [$contentTitle,$contentPath,$contentSlug,$contentData,
                                 $contentType,$contentFilter,$contentPublished,$contentId
                                ]);
        header("Location: ../content");
        exit;
    }

    $app->page->add("content/edit-content", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});


/**
 * Delete content
 */
$app->router->any(["GET", "POST"], "content/delete", function () use ($app) {
    $title = "Content delete";
    $contentId = $app->request->getGet("id");

    $app->db->connect();
    $sql = "SELECT * FROM content WHERE id = ?;";
    $res = $app->db->executeFetchAll($sql, [$contentId]);
    $res = $res[0];

    if ($app->request->getPost("doDelete")) {
        $sql = "UPDATE content SET deleted = CURRENT_TIMESTAMP WHERE id = ?;";
        $app->db->execute($sql, [$contentId]);
        header("Location: ../content");
        exit;
    }

    $app->page->add("content/delete-content", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Create content
 */
$app->router->any(["GET", "POST"], "content/create", function () use ($app) {
    $title = "Content delete";
    $text = $app->request->getPost("contentTitle");
    $slug = slugify($text);

    $app->db->connect();


    if ($app->request->getPost("doCreate")) {
        $sql = "INSERT INTO content (title, slug) VALUES (?, ?);";
        $app->db->execute($sql, [$text, $slug]);
        $contentId = $app->db->lastInsertId();
        header("Location: edit?id=$contentId");
        exit;
    }

    $app->page->add("content/create-content");

    return $app->page->render([
        "title" => $title,
    ]);
});

/**
 * Pages view
 */
$app->router->any(["GET", "POST"], "content/pages", function () use ($app) {
    $title = "Pages";
    $app->db->connect();

    $sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;

    $res = $app->db->executeFetchAll($sql, ["page"]);

    $app->page->add("content/pages", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "content/pages/{path}", function ($path) use ($app) {
    $textFilter = new \Guno\Filter\TextFilter();

    if ($path == "404") {
        throw new NotFoundException("Does not have a path");
    }

    $app->db->connect();
    $sql = <<<EOD
    SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;
    $res = $app->db->executeFetchAll($sql, [$path, "page"]);
    $res = $res[0];

    if ($res->filter != null) {
        $filters = explode(",", $res->filter);
        $res->data = $textFilter->parse($res->data, $filters);
    }

    $title = $res->title;

    $app->page->add("content/page-view", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "content/blog", function () use ($app) {
    $textFilter = new \Guno\Filter\TextFilter();
    $title = "Blog";

    $app->db->connect();
    $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
    FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
    $res = $app->db->executeFetchAll($sql, ["post"]);

    foreach ($res as $b) {
        if ($b->filter != null) {
            $filters = explode(",", $b->filter);
            $b->data = $textFilter->parse($b->data, $filters);
        }
    }
    $app->page->add("content/blog", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "content/blog/{slug}", function ($slug) use ($app) {
    $textFilter = new \Guno\Filter\TextFilter();

    $app->db->connect();
    $sql = <<<EOD
    SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    slug = ?
    AND type = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;
    $res = $app->db->executeFetchAll($sql, [$slug, "post"]);
    $res = $res[0];

    if ($res->filter != null) {
        $filters = explode(",", $res->filter);
        $res->data = $textFilter->parse($res->data, $filters);
    }

    $title = $res->title;


    $app->page->add("content/blog-view", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
