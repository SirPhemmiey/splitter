<?php
//LOAD DATA LOCAL INFILE "C:/Users/PC/Downloads/MTV Base Jan-Dec-1.csv" into table mtv FIELDS TERMINATED by ',' enclosed by '"' LINES TERMINATED by '\n' 

//update mtv SET campaign = REPLACE(campaign, '-', '...')

// header("Content-Type: application/xls");    
// header("Content-Disposition: attachment; filename=mtv_base.xls");  
// header("Pragma: no-cache"); 
// header("Expires: 0");

$host = "localhost";
$db = "tv";
$user = "root";

$con = mysqli_connect($host, $user, '', $db);
$sql = "SELECT datte, time_flighted, station, campaign, duration, SUBSTRING_INDEX(SUBSTRING_INDEX(campaign, '...', 1), '...', -1) as artist,
SUBSTRING_INDEX(SUBSTRING_INDEX(campaign, '...', 2), '...', -1) as song FROM mtv limit 3";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    while ($result = mysqli_fetch_assoc($query)) {
        print_r($result);
    }
    ?>
</body>
</html>