<?php
include ('connectdbshore.php');
$sql3 = "SELECT * FROM notification ORDER BY id DESC LIMIT 1";
$query3 = mysqli_query($conn,$sql3);
date_default_timezone_set('Asia/Calcutta');
$date = date('Y-m-d H:i:s', strtotime('-1 minute')) ;
//echo $date . '<br>';
if(mysqli_num_rows($query3) > 0) {
  while($row = mysqli_fetch_assoc($query3)) {
    if ($row['timestamp'] >= $date AND $row['status'] == 0)
    { ?>
      <?php echo "<audio autoplay=\"autoplay\">
      <source src=\"alarm.wav\" type=\"audio/wav\">
      Your browser does not support the audio element.
      </audio>"; ?>
      
      <div id = "my-div" style="background-color:<?php if($row['abnormality_level'] == 1) { echo '#FFDE00;';} else { echo 'red';} ?>">
        <img src = "warning.png" style="width:60px; height:60px; margin: auto;">
        <h2 style = "text-align: center;color: white"><?php echo $row['heading']; ?></h2>
        <hr>
        <div><?php echo $row['message']; ?></div>
        <a href="view_notification.php?id=<?php echo $row['id']; ?>">
        <button class="btn btn-outline btn-rounded">View</button>
        </a>
      </div>
    <?php   ?>

      <!--div class="mail-contnet">
          <h5><?php echo $row['heading']; ?></h5> <span class="mail-desc"><?php echo $row['message']; ?></span> <span class="time"><?php echo $row['timestamp']; ?></span>
      </div-->
    <?php
    }
  }
}

?>
