<?php
require_once 'musixmatch.php';
$music = new musiXmatch("xxxxxxxx_your_api_key");
$music->param("track_id", "15445219");
var_dump($music->find("TRACK.GET"));
var_dump($music->status());
