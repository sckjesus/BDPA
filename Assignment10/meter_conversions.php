<?php
  include("class_meter_conversions.php");
  $b = new conversions();
  echo "<body><h1 style='text-align:center; font-size:300%'>Conversions</h1></body>";
  echo $b->centimeter();
  echo $b->meter();
  echo $b->kilometer();

?>
