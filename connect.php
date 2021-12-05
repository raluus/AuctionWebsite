<?php 
function conectare_mysql1()
 {  $host = "localhost";
	$user = "root";
	$pass = "";
	$db = "licitatii";
	
	$con =  mysqli_connect($host, $user, $pass, $db);

	if (mysqli_connect_errno()) {
		echo "failed to connect:".mysqli_connect_error();
	 }
	 else {return $con;}
}

function sanitize1($data)
{ 
 if (is_array($data))
	    foreach($data as $var=>$val) {
        $output[$var] = sanitize($val);
    } 
  else 
    {
		
		$data = trim($data); 
	
		$data  = cleanInput1($data);
	
	}
return $data;
}

function test_input1($data)
{ 
  $data = trim($data); 
  $data = stripslashes($data); 
  $data = htmlspecialchars($data); 
  return $data;
}

function cleanInput1($input) {
 
 $search = array(
    '@<script[^>]*?>.*?</script>@si',   
    '@<[\/\!]*?[^<>]*?>@si',            
    '@<style[^>]*?>.*?</style>@siU',    
    '@<![\s\S]*?--[ \t\n\r]*>@'         
  );
  $output = preg_replace($search, '', $input);
  return $output;
  }
function curata1($data)
{ 
	$data  = cleanInput1($data); 
 return $data;
}
?>