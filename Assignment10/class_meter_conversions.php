<?php
    class conversions {
        public function centimeter() {
            echo "<head><style>table, th, td{border: 5px solid black; border-radius: 10px; padding: 15px;};</style></head><body><table style='border: 5px solid black; border-radius: 10px; padding: 15px; text-align:center; margin-left:auto; margin-right:auto; float:left; width:33.3%'><tr><th colspan='3'>Centimeter conversion</th></tr><tr><th>Centimeter</th><th>Meter</th><th>Kilometer</th></tr>";
            
            for ($i=1; $i<=100; $i=$i+1) {
                $i100 = $i/100;
                $i100000 = $i/100000;
                echo "<tr><td>".$i." cm</td><td>".$i100." m</td><td>".number_format($i100000,5)." km</td></tr>";
            }
            
            echo "</table></body>";
            
        }

    // ---------------------------------------------------------------------------------

        public function meter() {
            echo "<head><style>table, th, td{border: px solid black; border-radius: 10px; padding: 15px;};</style></head><body><table style='border: 5px solid black; border-radius: 10px; padding: 15px; text-align:center; margin-left:auto; margin-right:auto; float: left; width:33.3%'><tr><th colspan='3'>Meter conversion</th></tr><tr><th>Meter</th><th>Centemeter</th><th>Kilometer</th></tr>";
            
            for ($i=1; $i<=100; $i=$i+1) {
                $i100 = $i*100;
                $i100000 = $i/100;
                echo "<tr><td>".$i."m</td><td>".$i100." cm</td><td>".number_format($i100000,2)." km</td></tr>";
            }
            
            echo "</table></body>";
            
        }
        public function kilometer() {
            echo "<head><style>table, th, td{border: 5px solid black; border-radius: 10px; padding: 15px;};</style></head><body><table style='border: 5px solid black; border-radius: 10px; padding: 15px; text-align:center; margin-left:auto; margin-right:auto; float:left; width:33.3%'><tr><th colspan='3'>Kilometer conversion</th></tr><tr><th>kilometer</th><th>Meter</th><th>Centemeter</th></tr>";
            
            for ($i=1; $i<=100; $i=$i+1) {
                $i100 = $i/100;
                $i100000 = $i/100000;
                echo "<tr><td>".$i." km</td><td>".$i100." m</td><td>".number_format($i100000,5)." cm</td></tr>";
            }
            
            echo "</table></body>";
            
        }
    }