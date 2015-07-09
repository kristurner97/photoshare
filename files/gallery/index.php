<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<?php
include_once('resources/UberGallery.php'); 
$yourWebsiteName = "YOUR NAME HERE";
$imageDirectory = "../uploads/images";
    
    ?>

<head>
    <title>XHTML Transitional Template</title>
    
    <link rel="shortcut icon" href="images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="css/rebase-min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="resources/UberGallery.css" />
    <link rel="stylesheet" type="text/css" href="resources/colorbox/1/colorbox.css" />
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
    <script type="text/javascript" src="resources/colorbox/jquery.colorbox.js"></script>
    
    <script type="text/javascript">
    $(document).ready(function(){
        $("a[rel='cats']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
        $("a[rel='dogs']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
        $("a[rel='misc']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
    });
    </script>
    
    <?php if(file_exists('googleAnalytics.inc')) { include('googleAnalytics.inc'); }

    function is_not_dir_empty($dir) 
    {
          if (!is_readable($dir)) return NULL; 
            $handle = opendir($dir);
            while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
              return TRUE;
            }
          }
          return FALSE;
        }

    ?>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>

<body>

    <div class="pageWrap">
        
        <h1 id="pageTitle"><?php echo $yourWebsiteName;?></h1>
        
        <p>
            Thank you for sharing all your photos. I hope you had a great night! <a href='../index.php'>Upload some more     photos</a> or <a href="../uploads/latest.zip">download all files</a>.
        </p>
        
        
        <?php $files = scandir($imageDirectory); ?>
        <?php foreach ($files as $file): ?>
            
            <?php $dir = $imageDirectory. '/' . $file; 
        
            $albumName = ucwords($file);
            if (is_numeric($file))
            {
                $albumName = "Uploaded ". date("jS F (g:i a)", ucwords($file));
            }
            
        
            ?>
            
        <?php
            if (is_dir($dir) && $file != '.' && $file != '..' && is_not_dir_empty($dir))
            {
                echo "<h2>";
                echo $albumName;
                echo "</h2>";
                $gallery = UberGallery::init()->createGallery($dir, $file);
            }?>
            
        <?php endforeach; ?>
                
    </div>

</body>

</html>
