<?php
function conectare_mysql()
 {  $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "licitatii";
	// Create connection
	$con =  mysqli_connect($host, $user, $pass, $db);
	// Check connection
	if (mysqli_connect_errno()) {
		echo "failed to connect:".mysqli_connect_error();
	 }
	 else {return $con;}
}

function sanitize($data)
{ 
 if (is_array($data))
	    foreach($data as $var=>$val) {
        $output[$var] = sanitize($val);
    } 
  else 
    {
		
		$data = trim($data); 
		$data  = cleanInput($data);
	}
return $data;
}

function test_input($data)
{ 
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}

function cleanInput($input) {
 
 $search = array(
    '@<script[^>]*?>.*?</script>@si',   
    '@<[\/\!]*?[^<>]*?>@si',            
    '@<style[^>]*?>.*?</style>@siU',    
    '@<![\s\S]*?--[ \t\n\r]*>@'         
  );
  $output = preg_replace($search, '', $input);
  return $output;
  }
function curata($data)
{ 
	$data  = cleanInput($data); 
 return $data;
}
?>  