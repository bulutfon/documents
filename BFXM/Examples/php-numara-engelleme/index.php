<?php

/* Anlatım videomuzu https://www.youtube.com/watch?v=4DeFu8JvG3o adresinden izleyebilirsiniz */


$blacklist = array("908508850000", "908508850001");

if(isset($_POST['caller'])) {
  $caller = $_POST['caller'];

  if(in_array($caller, $blacklist)) {
    $ret_val = array(
	    "bfxm"=>array("version"=>1),
	    "seq"=>array(
		    array(
			    "action"=>"reject"
		    )
	    )
    );
  } else {
    $ret_val = array(
	    "bfxm"=>array("version"=>1),
	    "seq"=>array(
		    array(
			    "action"=>"dial",
			    "args"=>array("destination"=> 10)
		    )
	    )
    );
  }

  header('Content-Type: application/json');
  die(json_encode($ret_val));
}