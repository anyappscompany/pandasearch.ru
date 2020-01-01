<style>

td{
  max-width: 600px;
}

</style>
<?php
$file = "logs/newlog".date("Y-m-d").".txt";
$f = fopen($file, "r");
echo "<table border='1'>";

while(!feof($f)) {
	    echo fgets($f);
	}
echo "</table>";
	fclose($f);
?>