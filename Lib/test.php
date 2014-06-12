<?php
/**
function fxc($x1,$p1,$f1,$m1,$n1){
		return ($p1+$m1)*pow($x1,$n1+1)-$p1*pow($x1,$n1)+($f1-$m1)*$x1-$f1;
	}
function test($n1,$n2){
	return log(1+$n1);
}

$tt = array();
$tt[0] = 22;
for ($i=1;$i<10;$i++){
	$tt[$i] = 0;
}

function getChartsFV($n,$f){
	$fv = array();
	if($n>0){
		for($i=0;$i<$n;$i++){
			$fv[$i] =0;
		}
	}
	$fv[$n] = $f;
	return $fv;
}*/
//echo str_replace(',','',"-1,114.9528");
//echo time();
//echo date("Y-m-d",time());
//$datetime1 = new DateTime('2014-01-16');
//$datetime2 = new DateTime('2014-01-16');
//$interval = $datetime1->diff($datetime2);
//echo $interval->format('%R%a days');
$tt = "12;23;12;34;12";
$xss = split(";", $tt);
$fj0=-40;
$nfj ="20;20;10";
$nn = "1;2;3";

$cfn = split(";", $nfj);
$nnn = split(";", $nn);
$IRR = 1.1;
//echo fx($IRR, $cfn, $nnn, $fj0);
$g = 0.1;
$itv = 400;
$yint = floor($itv/360);
	$itvy = $itv%360;
	$mint = floor($itvy/30);
	$dint = $itvy % 30;
//echo $dint ;	

function fx1($IRR,$cfn,$nnn) //導函數
{
  $pv = 0;
  $k = 0;
  for($i = 0; $i < sizeof($nnn); $i++){
    for($j = 1; $j <= $nnn[$i]; $j++){
      $k++;
      $pv = $pv - $k*$cfn[$i]/pow($IRR,$k+1);
    }
  }
  return $pv;
}
$curDay = strtotime('2013-02-30');
$today = getdate($curDay);
//$today['mon'] = 8;
//print_r($today);
//print_r($today);
/*

$ttt = 0;
while (true) {
	echo $ttt;
	$ttt++;
	if($ttt==10){
		break;
	}
}
*/
//echo daysBetween("2013-12-8", "2014-01-18");
function daysAdd360($od,$itv,$drt){
	$odd = getdate(strtotime($od));
	$yint = floor($itv/360);
	$itvy = $itv%360;
	$mint = floor($itvy/30);
	$dint = $itvy % 30;
	if($drt=="-"){
		$newy = $odd['year']-$yint;
		$newm = $odd['mon']-$mint;
		$newd = $odd['mday']-$dint;
		
	}else{
		$newy = $odd['year']+$yint;
		$newm = $odd['mon']+$mint;
		$newd = $odd['mday']+$dint;
	}
	$ndd = getdate(strtotime($newy."-".$newm."-".$newd));
	print_r($ndd);
}

daysAdd360("2014-01-30", 30, "+");

//原函數
function fx($x1,$p1,$f1,$m1,$n1,$g1,$d1) {
	//$rt = array('x1'=>$x1,'p1'=>$p1,'f1'=>$f1,'m1'=>$m1,'n1'=>$n1,'g1'=>$g1,'d1'=>$d1);
	//print_r(json_encode($rt));
	//$n1 = $n1*$d1; 
	$m1 = $m1/$d1; 
	$x1 = ($x1-1)/$d1 + 1;
	
	$G=$g1+1;
	$temp = ($p1-(ceil($n1)-$n1)*$m1)*pow($x1,$n1)+$f1;
	for ($i=1;$i<$n1+1;$i++){
		 $temp = $temp + $m1*pow($G,$i-1)*pow($x1,ceil($n1)- $i);
	}
	//$name1 = new Array('x1','p1','f1','m1','n1','c_n1');var value1 = new Array(x1,p1,f1,m1,n1,Math.ceil (n1));debug(name1,value1); //調試時輸出
	return $temp;
}


echo fx(100,110,-100,-10,10.32876,0,2);
