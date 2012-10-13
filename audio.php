<?php
//Scans the given directory and generates links for audio files. Assumes the format: Title - Teacher - Day Date

//path to directory to scan
$directory = dirname(__FILE__) . '/audio';


//break it up into two lists, one for Friday and one for Sunday
$friday = array();
$sunday = array();
$soc = array();
$other = array();


if ($handle = opendir($directory)) {

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {

    	if (strpos($entry,'Sunday') > -1) {
    		array_push($sunday, $entry);
    	}
    	elseif (strpos($entry,'SOC') > -1) {
    		array_push($soc, $entry);
    	}
      elseif (strpos($entry, 'Friday') > -1) {
        array_push($friday, $entry);
      }
      else {
        // for now, lump in others with Friday
        array_push($friday, $entry);
      }

        //echo "<a href='audio/$entry'>$entry</a></br>";
    }

    closedir($handle);
}

echo "<h2>FRIDAYS:</h2></br>";

echo "<table><thead><tr><th>Title (to download, right-click and save target/link as)</th><th>Teacher</th><th>Date</th></tr></thead><tbody>";

// create table row - might blow up, if so something's probably badly formatted
foreach ($friday as $entry) {

	try {
		$split = explode('-', $entry);
		
		$title = $split[0];
		$teacher = $split[1];

    if (!$teacher) {
      continue;
    }

		// get date
		$date = substr($entry, strpos($entry, 'day') +4);
		$date = str_replace('.mp3','',$date);

		echo "<tr><td><a href='audio/$entry'>$title</a></td><td>$teacher</td><td>$date</td></tr>";
	}
	catch (Exception $e) {
		echo "error: " + print_r($entry);
		echo $e;
	}

}

echo "</tbody></table>";
echo "<table><thead><tr><th>Title (to download, right-click and save target/link as)</th><th>Teacher</th><th>Date</th></tr></thead><tbody>";

echo "<h2>SUNDAYS:</h2></br>";
foreach ($sunday as $entry) {

	try {
		$split = explode('-', $entry);
		
		$title = $split[0];
		$teacher = $split[1];

    if (!$teacher) {
      continue;
    }

		// get date
		$date = substr($entry, strpos($entry, 'day') +4);
		$date = str_replace('.mp3','',$date);

		echo "<tr><td><a href='audio/$entry'>$title</a></td><td>$teacher</td><td>$date</td></tr>";
	}
	catch (Exception $e) {
		echo "error: " + print_r($entry);
		echo $e;
	}
}

echo "</tbody></table>";
echo "<table><thead><tr><th>Title (to download, right-click and save target/link as)</th><th>Teacher</th><th>Date</th></tr></thead><tbody>";

echo "<h2>SOC:</h2></br>";
foreach ($soc as $entry) {

  try {
    $split = explode('-', $entry);
    
    $title = $split[0];
    $teacher = $split[1];

    if (!$teacher) {
      continue;
    }

    // get date
    $date = substr($entry, strpos($entry, 'day') +4);
    $date = str_replace('.mp3','',$date);

    echo "<tr><td><a href='audio/$entry'>$title</a></td><td>$teacher</td><td>$date</td></tr>";
  }
  catch (Exception $e) {
    echo "error: " + print_r($entry);
    echo $e;
  }
}

echo "</tbody></table>";
echo "<table><thead><tr><th>Title (to download, right-click and save target/link as)</th><th>Teacher</th><th>Date</th></tr></thead><tbody>";

echo "<h2>Other:</h2></br>";
foreach ($other as $entry) {

  try {
    $split = explode('-', $entry);
    
    $title = $split[0];
    $teacher = $split[1];

    if (!$teacher) {
      continue;
    }

    // get date
    $date = substr($entry, strpos($entry, 'day') +4);
    $date = str_replace('.mp3','',$date);

    echo "<tr><td><a href='audio/$entry'>$title</a></td><td>$teacher</td><td>$date</td></tr>";
  }
  catch (Exception $e) {
    echo "error: " + print_r($entry);
    echo $e;
  }
}

echo "</tbody></table>";


?>

<html>
 <head>
  <title>Compile audio</title>
 </head>
 <body>
 </body>
</html>