<?php
/**
 * Show all movies.
 */
$app->router->get("movie", function () use ($app) {
    $title = "Movie database | oophp";

    $app->db->connect();
    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $app->page->add("movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("movie/search", function () use ($app) {
    $title = "Movie search | oophp";

    $res = null;
    $app->db->connect();
    $search = $app->request->getGet("searchTitle");

    if ($search) {
        $sql = "SELECT * FROM movie WHERE title LIKE ? OR year LIKE ?;";
        $res = $app->db->executeFetchAll($sql, [$search, $search]);
    }

    $app->page->add("movie/search-movie", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "movie/select", function () use ($app) {
    $title = "Movie select | oophp";

    $app->db->connect();

    $sql = "SELECT id, title FROM movie;";
    $res = $app->db->executeFetchAll($sql);
    $movieId = $app->request->getPost("movieId");

    if ($app->request->getPost("doEdit") && is_numeric($movieId)) {
        header("Location: edit?movieId=$movieId");
        exit;
    }

    if ($app->request->getPost("doCreate")) {
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?);";
        $app->db->execute($sql, ["A title", 2018, "img/noimage.png"]);
        $movieId = $app->db->lastInsertId();
        header("Location: edit?movieId=$movieId");
        exit;
    }

    if ($app->request->getPost("doDelete")) {
        $sql = "DELETE FROM movie WHERE id = ?;";
        $app->db->execute($sql, [$movieId]);
        header("Location: ../movie");
        exit;
    }

    $app->page->add("movie/select-movie", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any(["GET", "POST"], "movie/edit", function () use ($app) {
    $title = "Movie select | oophp";

    $movieId    = $app->request->getPost("movieId") ?: $app->request->getGet("movieId");
    $movieTitle = $app->request->getPost("movieTitle");
    $movieYear  = $app->request->getPost("movieYear");
    $movieImage = $app->request->getPost("movieImage");

    $app->db->connect();

    if ($app->request->getPost("doSave")) {
        $sql = "UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage, $movieId]);
        header("Location: ../movie");
        exit;
    }

    $sql = "SELECT * FROM movie WHERE id = ?;";
    $movie = $app->db->executeFetchAll($sql, [$movieId]);
    $movie = $movie[0];

    $app->page->add("movie/edit-movie", [
        "movie" => $movie,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
