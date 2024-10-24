<?php
$angka = 5;
for ($i = 1; $i <= $angka; $i++){
    for ($j=1; $j <= $angka - $i; $j++){
        echo"&nbsp;&nbsp;";
    }
    for ($k=1; $k<=(2*$i-1);$k++){
        echo"*";    
    }
    echo "<br>";
}
