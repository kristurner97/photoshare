<?php

$yourWebsiteTitle = "YOUR NAME HERE";

?>

<html>

<header>
    <title><?php echo $yourWebsiteTitle;?></title>

    <style>
        body {
            text-align: center;
        }
        
        div {
            width: 40%;
            padding-left: 2em;
            float: left;
        }
        
        form {
            border: 1px solid grey;
            text-align: center;
            padding: 3em;
            float: left;
            width: 45%
        }
        
        h1 {
            color: #9b0000;
            text-align: center;
            font-family: arial;
        }
        
        h3 {
            color: #9b0000;
            text-align: center;
            font-family: arial;
        }
        
        p {
            text-align: justify;
            font-family: arial;
        }
        
        input {
            margin-bottom: 5em;
            display: block;
        }
        
        .pics {
            bottom-border: 1px solid black;
        }
        
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
            div {
                width: 75%;
            }
            form {
                border: 1px solid grey;
                text-align: center;
                margin: 1em;
                width: 75%
            }
            p {
                text-align: left;
                font-family: arial;
            }
            input {
                margin-bottom: 5em;
                display: block;
            }
            .pics {
                bottom-border: 1px solid black;
            }
        }
        
        @media only screen and (min-device-width: 375px) and (max-device-width: 667px) {
            div {
                width: 75%;
            }
            form {
                border: 1px solid grey;
                text-align: center;
                margin: 1em;
                width: 75%
            }
            p {
                text-align: left;
                font-family: arial;
            }
            input {
                margin-bottom: 5em;
                display: block;
            }
            .pics {
                bottom-border: 1px solid black;
            }
        }
        
        @media only screen and (min-device-width: 320px) and (max-device-width: 568px) {
            div {
                width: 75%;
            }
            form {
                border: 1px solid grey;
                text-align: center;
                margin: 1em;
                width: 75%
            }
            p {
                text-align: left;
                font-family: arial;
            }
            input {
                margin-bottom: 5em;
                display: block;
            }
            .pics {
                bottom-border: 1px solid black;
            }
        }
        
        @media only screen and (min-device-width: 768px) and (max-device-width: 1024px)and (-webkit-min-device-pixel-ratio: 1) {
            div {
                width: 75%;
            }
            form {
                border: 1px solid grey;
                text-align: center;
                margin: 1em;
                width: 75%
            }
            p {
                text-align: left;
                font-family: arial;
            }
            input {
                margin-bottom: 5em;
                display: block;
            }
            .pics {
                bottom-border: 1px solid black;
            }
        }
        
        @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
            div {
                width: 75%;
            }
            form {
                border: 1px solid grey;
                text-align: center;
                margin: 1em;
                width: 75%
            }
            p {
                text-align: left;
                font-family: arial;
            }
            input {
                margin-bottom: 5em;
                display: block;
            }
            .pics {
                bottom-border: 1px solid black;
            }
        }

    </style>


</header>

<body>

    <h1><?php echo $yourWebsiteTitle;?></h1>

    <center>
    <form action="upload.php" method="post" enctype="multipart/form-data">

        <h3>Pictures</h3>
        <input name="pics[]" multiple="multiple" type="file" accept="image/*">
        <h3>Videos</h3>
        <input name="vids[]" multiple="multiple" type="file" accept="video/*">
        <input type="submit" value="Upload" name="submit">

    </form>
    <div>


        <h3>How To Upload Files</h3>

        <p>Just select the photo's (and video's seperately) you want to upload and click upload. Remember there is an approximate maximum of 125 files you can upload at once (total of both pictures and videos) so try and keep count as you're going along. </p>
        <p>Don't forget video's will take longer to upload so don't worry if nothing seems to be happening. You will receive a message telling you that your files have uploaded - don't leave the window until you get this.</p>
        
        <h3><a href="gallery/">See the Photos</a> | <a href="uploads/latest.zip">Download All Files</a></h3>


    </div>
    </center>

</body>



</html>
