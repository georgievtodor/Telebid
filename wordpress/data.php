<?php
    $con = @new mysqli('localhost', 'user', 'asdf42', 'wordpress');

    if($con->connect_error) {
        echo "error: " . $con->connect_error;
        exit();
    }

    $query = "SELECT * FROM google_maps_markers";

    $result = $con->query($query);
    if($result !== FALSE) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
    }

   mysqli_close($con);

   $doc = new DOMDocument('1.0', 'UTF-8');

   $xmlRoot = $doc->createElement("markers");
   $xmlRoot = $doc->appendChild($xmlRoot);
   header("Content-type: text/xml");
   foreach($result as $item) {
    // var_dump($item);
    // debug($item['lat']);
    // debug($item['lng']);
    $node = $doc->createElement('marker');
    $newNode = $xmlRoot->appendChild($node);
    $newNode->setAttribute('lat', $item['lat']);
    $newNode->setAttribute('lng', $item['lng']);
    $newNode->setAttribute('name', $item['name']);
    $newNode->setAttribute('adress', $item['adress']);
   }

//    debug(json_encode($result));

    function debug($msg) {
        $msg = str_replace('"', '\\"', $msg);
        echo "<script>console.log(\"$msg\")</script>";
    }

    echo $doc->saveXML();