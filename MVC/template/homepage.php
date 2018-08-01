<?php
    $file = __DIR__.'/log.log';

    $fileCountent = file_get_contents($file);
    if (!$fileCountent) {
        $counter = 0;
    }else
    {
        $counter = unserialize($fileCountent);
    }
    $counter++;
    file_put_contents($file, serialize($counter));
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
   <p>Hello world!</p> 
   <p>this page was viewed <?php echo $counter; ?></p>
</body>
</html>