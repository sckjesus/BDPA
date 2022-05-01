<body>
<?php
    function prompt($WYW){
        echo "<script>prompt(\"".$WYW."\")</script>";
    };
    function alert($WYW){
        echo "<script>alert(\"".$WYW."\")</script>";
    };
    $firstgrade = prompt('Enter your first grade: ');
//    $secondgrade = prompt('Enter your second grade: ');
//    $thirdgrade = prompt('Enter your third grade: ');
  //  echo "numbers are ".$firstgrade.", ".$secondgrade.", ".$thirdgrade;
    //$average = $firstgrade+$secondgrade+$thirdgrade;
    //alert($average);

    echo "my number is " . $firstgrade;
?>
</body>