<?php

$db = mysql_connect("localhost","pandasearchuser","gz5NiZiE");
mysql_select_db("pandasearch", $db);
mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $db);

?>