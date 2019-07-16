<?php
//update hiptracemtvsound SET CampaignTheme = REPLACE(CampaignTheme, '-', '...')

// LOAD DATA LOCAL INFILE "C:/Users/PC/Downloads/adjusted contn2.csv" into table hip_tv2018s FIELDS TERMINATED by ',' enclosed by '"' LINES TERMINATED by '\n'

//LOAD DATA INFILE "C:/Users/Admin/Downloads/2018 Logs/2018 Logs/Abuja 2018 July 1st - Dec 31st/Aso FM Abuja July - Dec 31st 2018.csv" into table aso_fm_abuja FIELDS TERMINATED by ',' enclosed by '"' LINES TERMINATED by '\n'  IGNORE 1 LINES
//characters are -, _
include 'config.php';
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=classic.xls");
header("Pragma: no-cache");
header("Expires: 0");

// $host = "localhost";
// $db = "tv";
// $user = "root";

// $con = mysqli_connect($host, $user, '', $db);
$sql = "SELECT DetectedTime, Station, CampaignTheme, SourceBeginTime, SourceEndTime, DurationPlayed, TargetMatchFullClip, TargetMatchStart, TargetMatchEnd, TargetMatchDuration, SUBSTRING_INDEX(SUBSTRING_INDEX(CampaignTheme, '...', 1), '...', -1) as Artist,
SUBSTRING_INDEX(SUBSTRING_INDEX(CampaignTheme, '...', 2), '...', -1) as Song FROM  hiptracemtvsound";

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
       <th>DetectedTime</th>
       <th>Station</th>
       <th>Artist</th>
       <th>Song</th>
       <th>SourceBeginTime</th>
       <th>DurationPlayed</th>
       <th>TargetMatchFullClip</th>
       <th>TargetMatchStart</th>
       <th>TargetMatchEnd</th>
       <th>TargetMatchDuration</th>
       </thead>
       <tbody>
       <?php
    while ($result = mysqli_fetch_assoc($query)) {?>
       <tr>
       <td><?php echo $result['DetectedTime']?></td>
       <td><?php echo $result['Station']?></td>
       <td><?php echo $result['Artist']?></td>
       <td><?php echo $result['Song']?></td>
       <td><?php echo $result['SourceBeginTime']?></td>
       <td><?php echo $result['DurationPlayed']?></td>
       <td><?php echo $result['TargetMatchFullClip']?></td>
       <td><?php echo $result['TargetMatchStart']?></td>
       <td><?php echo $result['TargetMatchEnd']?></td>
       <td><?php echo $result['TargetMatchDuration']?></td>
       </tr>
        <?php }?>
       </tbody>
       </table>

</body>
</html>
