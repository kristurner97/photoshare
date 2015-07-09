<html>
    <body style="text-align: center">
        <h2>
<?php

function GetIP()
{
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
            {
                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
                {
                    return $ip;
                }
            }
        }
    }
}

/* server timezone */
define('CONST_SERVER_TIMEZONE', 'UTC');
 
/* server dateformat */
define('CONST_SERVER_DATEFORMAT', 'YmdHis');

function now($str_user_timezone ='UTC', $str_server_timezone = CONST_SERVER_TIMEZONE,
       $str_server_dateformat = CONST_SERVER_DATEFORMAT) {
 
  // set timezone to user timezone
  date_default_timezone_set('Europe/London');
 
  $date = new DateTime('now');

  return $date->getTimestamp();
  
}

$max_file_size = 1024*1024*16; //16MB
$nowTime = now();
$path = "uploads/images/". $nowTime . "/";// Upload directory
mkdir($path,0770);
$countpics = 0;
$countvids = 0;

foreach ($_FILES['pics']['name'] as $f => $name) {     
	    if ($_FILES['pics']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['pics']['error'][$f] == 0) {	           
	        if ($_FILES['pics']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["pics"]["tmp_name"][$f], $path.$countpics.'-'.$name))
	            $countpics++; // Number of successfully uploaded file
	        }
	    }
	}            
            
foreach ($_FILES['vids']['name'] as $f => $name) {     
	    if ($_FILES['vids']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['vids']['error'][$f] == 0) {	           
	        if ($_FILES['vids']['size'][$f] > $max_file_size) {
	            $message[] = "$name is too large!.";
	            continue; // Skip large files
	        }
			else{ // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["vids"]["tmp_name"][$f], $path.$countvids.'-'.$name))
	            $countvids++; // Number of successfully uploaded file
	        }
	    }
	}            

            $message = ($countvids + $countpics). " files uploaded.";
            echo $message;
            $output = shell_exec("bash uploads/cleanup");
            file_put_contents("uploads/log", getIP(). ": ". $message. '('. $nowTime. ') | ', FILE_APPEND);
            
?></h2>
        
        <h1><a href="index.php">Go Home</a></h1>
        <h2><a href="gallery/">See everyone's photos</a> | <a href="uploads/latest.zip">Download All Files</a></h2>

    </body>
</html>