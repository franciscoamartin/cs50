<?php

    require(__DIR__ . "/../includes/config.php");

    // numerically indexed array of places
    $places = [];

    // TODO: search database for places matching $_GET["geo"], store in $places
    if (is_numeric($_GET["geo"])) {
        $places = CS50::query("SELECT * FROM places WHERE postal_code LIKE ?", $_GET["geo"] . "%");
    }
    
    else {
        $places = CS50::query("SELECT * FROM places WHERE MATCH(place_name, admin_name1, country_code) AGAINST (?)", $_GET["geo"]);
    }
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));

?>