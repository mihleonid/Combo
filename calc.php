<?php
function multi($a,$b){
if($a==0 or $b==0){return "0";}
if($a==1){return $b;}
if($b==1){return $a;}
$ar=notdot($a, $b);
$dots=$ar[0];
$a=$ar[1];
$b=$ar[2];
if($b>$a){
$ad=$a;
$a=$b;
$b=$ad;
unset($ad);
}
$b=strrev($b);
for($i=0; $i<strlen($b); $i++){
$r=plus(smulti($a, $b[$i]).str_repeat("0", $i), $r);
}
$r=dot($r, ($dots*2));
return $r;
}
function notdot($a, $b){
if((strpos($a, ".")!==false) or (strpos($b, ".")!==false)){
if(strpos($a, ".")===false){
$a.=".0";
}
if(strpos($b, ".")===false){
$b.=".0";
}
$aa=explode(".", $a);
$ba=explode(".", $b);
$la=strlen($aa[1]);
$lb=strlen($ba[1]);
$max=max($la, $lb);
$aa[1].=str_repeat("0", ($max-$la));
$ba[1].=str_repeat("0", ($max-$lb));
$a=$aa[0].$aa[1];
$b=$ba[0].$ba[1];
}else{
$max=0;
}
return array($max, $a, $b);
}
function dot($a, $sdot){
if($sdot!="0"){
$a=substr_replace($a, ".", (strlen($a)-$sdot), 0);
}
if($a[0]=="."){
$a="0".$a;
}
return $a;
}
function plus($a, $b){
if($a==0){return $b;}
if($b==0){return $a;}
$ar=(notdot($a, $b));
$dots=$ar[0];
$a=$ar[1];
$b=$ar[2];
$a=strrev((string)$a);
$b=strrev((string)$b);
$max=max(strlen($a),strlen($b));
$r=str_repeat("0",$max+1);
$a=$a.str_repeat("0",$max-strlen($a));
$b=$b.str_repeat("0",$max-strlen($b));
$s=0;
$new=0;
for($x=0,$y=$max+2;$x<$y;$x++){
$new=$a[$x]+$b[$x]+$s;
$s=0;
if($new>9){
$new-=10;
$s+=1;
}
$r[$x]=$new;
}
$r=strrev($r);
while($r[0]==0){$r=substr($r,1);}
$r=dot($r, $dots);
return $r;
}
function smulti($a,$b){
if($a==0 or $b==0){return "0";}
$ar=notdot($a, $b);
$dots=$ar[0];
$a=$ar[1];
$b=$ar[2];
if($b>$a){
$ad=$a;
$a=$b;
$b=$ad;
unset($ad);
}
$bb=0;
while($b!=$bb){
$r=plus($r,$a);
$bb=plus($bb,"1");
}
$r=dot($r, ($dots*2));
return $r;
}
function minus($a, $b){
if($a==$b){
return "0";
}
$ar=notdot($a, $b);
$dots=$ar[0];
$a=$ar[1];
$b=$ar[2];
if($b>$a){
$min=$a;
$a=$b;
$b=$min;
}
$a=strrev((string)$a);
$b=strrev((string)$b);
$max=max(strlen($a),strlen($b));
$a=$a.str_repeat("0",$max-strlen($a));
$b=$b.str_repeat("0",$max-strlen($b));
$s=0;
$new=0;
for($x=0,$y=$max;$x<$y;$x++)
{
$new=$a[$x]-$b[$x]-$s;
$s=0;
if($new<0){
$new+=10;
$s+=1;
}
$a[$x]=$new;
}
$a=strrev($a);
while($a[0]==0 and $dots==0){$a=substr($a,1);}
if(isset($min)){
$a="-".$a;
unset($min);
}
$a=dot($a, $dots);
return $a;
}
function fact($a){
	if($a=="0"){
		return 1;
	}
if(strpos($a, ".")===false){
$tof = minus($a,"1");
$factorial = $a;
while($tof >= 1){
$factorial = multi($factorial,$tof);
$tof = minus($tof,"1");
}
return $factorial;
}else{
	return "Ошибка: факториал должен быть целым.";
}
}

function sdel($a, $b){
if($a==0){return "0";}
if($b==0){return "ошибка";}
if($b==1){return $a;}
$ar=notdot($a, $b);
$a=$ar[1];
$b=$ar[2];
$dell=mindel($a,$b);
$r=$dell[0];
$a=$dell[1];
$ostt[]=$a;
if($a!=0){
$r.=".";
}
while($a!=0){
$a.="0";
$dell=mindel($a, $b);
$r.=$dell[0];
$a=$dell[1];
if(in_array($a, $ostt) and ($a!=0)){
$r.="[...]";
break;
}
$ostt[]=$a;
}
return $r;
}
function del($a, $b){
if($a==0){return "0";}
if($b==0){return "ошибка";}
if($b==1){return $a;}
if($a==1){return $b;}
if(well($a)==well($b)){return "1";}//my

$ar=notdot($a, $b);
$a=$ar[1];
$b=$ar[2];
$td="";
for($i=0; $i<strlen($a); $i++){
$td.=$a[$i];
if(!$td < $b){
$dell=mindel($td,$b);
$r.=$dell[0];
$td=$dell[1];
}
}
$ostt[]=$td;
if($td!=0){
$r.=".";
}
while($td!=0){
$td.="0";
$dell=mindel($td, $b);
$r.=$dell[0];
$td=$dell[1];
if(in_array($td, $ostt) and ($td!=0)){
$r.="{...}";
break;
}
$ostt[]=$td;
}
return $r;
}
function well($a){
while($a[0]=="0"){
$a=substr($a, 1);
}
return $a;
}
function mindel($a, $b){
if($a==0){return array(0, 0);}
if($b==0){return array("ошибка",0);}
if($a==$b){
return array(1,0);}
$ar=notdot($a, $b);
$a=$ar[1];
$b=$ar[2];
$r=0;
while($a>=$b){
$a=minus($a,$b);
$r=plus($r,"1");
}
$rr=array($r,$a);
return $rr;
}
?>