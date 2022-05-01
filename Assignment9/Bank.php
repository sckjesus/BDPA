<?php 
$startingAmount = 567;
$interestRate = 0.04;
function bankcal($startingAmount, $interestRate){    
  $amounts = array($startingAmount);
  $inter = $startingAmount * $interestRate;
  $interests = array($inter);     
  $currentAmount = $startingAmount;
  
  for ($interest =  $startingAmount * $interestRate; $i < 6; $interest= $interest * $interestRate + $interest){
    $currentAmount=$currentAmount * $interestRate + $currentAmount;
    array_push($amounts, $currentAmount);  
    array_push($interests, $interest);
    $i = $i + 1;
  };
    $interestpercent = $interestRate*100;
  echo "<head><style>table, th, td{border: 5px solid black; border-radius: 10px; padding: 15px;};</style></head><body><table style='border: 5px solid black; border-radius: 10px; padding: 15px; text-align:center; margin-left:auto; margin-right:auto;'><tr><th colspan='3'>Starting principle of ".$startingAmount."$ with a interest rate as ".$interestpercent."%</th></tr><tr><th>Year</th><th>Interest</th><th>Principle</th></tr>";
  
  for ($i=1; $i<6; $i = $i + 1){
    $num = 1;
    echo "<tr><th style='text-align:center'>".$i."</td><td>".$interests[$i]."$</td><td>".$amounts[$i]."$</td></tr>";
    $num = $num +1;
  };
  
  echo "</table></body>";
  
}

bankcal($startingAmount, $interestRate);
?> 
