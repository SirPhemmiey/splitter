<?php
//LOAD DATA LOCAL INFILE "C:/Users/PC/Downloads/MTV Base Jan-Dec-1.csv" into table mtv FIELDS TERMINATED by ',' enclosed by '"' LINES TERMINATED by '\n' 

//update mtv SET campaign = REPLACE(campaign, '-', '...')
include 'config.php';
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=mtv_base.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");

// $host = "localhost";
// $db = "tv";
// $user = "root";

// $con = mysqli_connect($host, $user, '', $db);
$sql = "SELECT DetectedTime, Station, CampaignTheme, SourceBeginTime, SourceEndTime, DurationPlayed, TargetMatchFullClip, TargetMatchStart, TargetMatchEnd, TargetMatchDuration, SUBSTRING_INDEX(SUBSTRING_INDEX(CampaignTheme, '...', 1), '...', -1) as artist,
SUBSTRING_INDEX(SUBSTRING_INDEX(CampaignTheme, '...', 2), '...', -1) as song FROM sound_beat";
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
<body style="border: 1px solid #ccc">
       <table>
       <thead>
       <th>Date</th>
       <th>Time Flighted</th>
       <th>Station</th>
       <th>Artist</th>
       <th>Song</th>
       <th>Duration</th>
       </thead>
       <tbody>
       <?php
    while ($result = mysqli_fetch_assoc($query)) {?>
       <tr>
       <td><?php echo $result['datte']?></td>
       <td><?php echo $result['time_flighted']?></td>
       <td><?php echo $result['station']?></td>
       <td><?php echo $result['artist']?></td>
       <td><?php echo $result['song']?></td>
       <td><?php echo $result['duration']?></td>
       </tr>
        <?php }?>
       </tbody>
       </table>
   
</body>
</html>