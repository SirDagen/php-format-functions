<?php

require('bnformat-class.php'); 

#
# --- Demo: Deutsch
#


// Neue Instanz anlegen - Deutsches Nummberformat
$bn = new bnformat\bnformat( ['lang'=>'de'] ); 

echo "<br/><h1>php-beautiful-numbers <b>(Format = ".$bn->langname().")</b><br/></h1>"; 


// sinum()

echo "<br/><h3><pre>A. sinum() &ndash; Gibt Zahlen im einfach zu lesenden SI-Format aus</pre></h3>";

$val=mt_rand()/mt_getrandmax()/5; $u='s'; 
echo "<p>".$bn->sinum($val, $u)." &nbsp;(= {$val} {$u})</p>"; 

$val=mt_rand()/mt_getrandmax()/2000; $u='s'; 
echo "<p>".$bn->sinum($val, $u)." &nbsp;(= {$val} {$u})</p>";

$val=mt_rand()/mt_getrandmax()/10000000; $u='s'; 
echo "<p>".$bn->sinum($val, $u)." &nbsp;(= {$val} {$u})</p>";

$val=mt_rand()/mt_getrandmax()*2000; $u='g'; 
echo "<p>".$bn->sinum($val, $u)." &nbsp;(= {$val} {$u})</p>";

$val=mt_rand(5, 1999999); $u='B'; 
echo "<p>".$bn->sinum($val, $u, ['bin'=>true])." &nbsp;(= {$val} {$u})</p>";

$val=mt_rand()/mt_getrandmax()*9000; $u='m'; 
echo "<p>".$bn->sinum($val, $u, ['acc'=>2])." &nbsp;(= {$val} {$u})</p>"; // Genauigkeit = 2 Stellen

echo "<p><br/><b>kilo, Mega, Giga, Tera, ...</b></p>";

$val=round(mt_rand()/mt_getrandmax()*1000000); 
echo "<p>".$bn->sinum($val)." &nbsp;(= {$val})</p>"; 

$val=round(mt_rand()/mt_getrandmax()*90000000); 
echo "<p>".$bn->sinum($val)." &nbsp;(= {$val})</p>"; 

$val=round(mt_rand()/mt_getrandmax()*80000000000+1000000000);  
echo "<p>".$bn->sinum($val)." &nbsp;(= {$val})</p>"; 

echo "<p><br/><b>Sie können auch einen statistischen Fehler angeben (anstelle der Genauigkeit):</b></p>";

$val=mt_rand()/mt_getrandmax()*2000; $u='g'; $err=$val/900; 
echo "<p>".$bn->sinum($val, $u, ['err'=>$err])." &nbsp;(= {$val} ± {$err} {$u})</p>";

$val=mt_rand()/mt_getrandmax()/10000000; $u='s'; $err=$val/1200; 
echo "<p>".$bn->sinum($val, $u, ['err'=>$err])." &nbsp;(= {$val} ± {$err} {$u})</p>";


// tnum()

echo "<br/><h3><pre>B. tnum() &ndash; Gibt Zahlen im Fließtext aus (0..12 werden ausgeschrieben) - text number</pre></h3>";

// Zahlen 0..12 werden ausgeschrieben, alle anderen als Zahlen ausgegeben (wie es in Publikationen üblich ist)
echo "<p>"; 
for ($i=0;$i<3;$i++) {
    $val=mt_rand(2, 15); 
    echo "Es sind ".$bn->tnum($val)." Bäume auf der Anhöhe.<br/>"; 
}
echo "</p>"; 


// tnum() - volle Nutzung

echo "<p>"; 
for ($i=0;$i<3;$i++) {
    $val=mt_rand(0, 3); 
    echo $bn->tnum($val, ['Bäume', 'einen Baum'], ['transform'=>'ucfirst'])." sehe ich am Wegesrand stehen.<br/>"; 
}
echo "</p>"; 

echo "<p><b>Und rundet auf angegebene Genauigkeit (2 Stellen):</b></p>";

echo "<p>"; 
for ($i=0;$i<3;$i++) {
    $val=mt_rand(100, 2000000); 
    echo "ca. ".$bn->tnum($val, ['Haushalte', 'ein Haushalt'])." &nbsp;(= {$val} Haushalte)<br/>"; 
}
echo "</p>"; 

/*
echo "<p>"; 
for ($i=0;$i<3;$i++) {
    $val=mt_rand(1, 2000000)/90000000;  
    echo "ca. ".$bn->tnum($val, ['Haushalte', 'ein Haushalt'])." &nbsp;(= {$val} Haushalte)<br/>"; 
}
echo "</p>"; 
*/


// tsyn() - zusätzliche Nutzung von 

echo "<br/><h3><pre>C. tsyn() &ndash; Unterscheidet zwischen Singular und Plural - text syntax</pre></h3>";

echo "<p>"; 
for ($i=0;$i<3;$i++) { 
    $val=mt_rand(1, 3); 
    echo "Es ".$bn->tsyn($val, ['stehen', 'steht'])." ".$bn->tnum($val, ['Bäume', 'ein Baum'])." auf dem Marktplatz.<br/>"; 
}
echo "</p>"; 



echo "<br/>&nbsp;<br/>";


?>
