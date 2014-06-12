<?php

/**
 *
 * 定义常量
 */
define("_decs",4);
define("_dech",2);



/**
 *
 * 判断两个日期之间相差天数
 * @param $st
 * @param $ed
 */
function daysBetween($st,$ed){
	$std = strtotime($st);
	$edd = strtotime($ed);
	$itv = abs($edd-$std)/86400;
	return $itv;
}

/**
 *
 * 30/360 模式下, one 结束 two 开始
 * @param $st
 * @param $ed
 */
function daysB360($st,$ed){
	$std = getdate(strtotime($st));
	$edd = getdate(strtotime($ed));
	$bDay=$edd['mday']-$std['mday'];
	$bMonth=$edd['mon']-$std['mon'];
	$bYear=$edd['year']-$std['year'];
	$cha = $bDay+($bMonth+12*$bYear)*30;
	//加入起始结尾的非30的日期修正
	if(!($bMonth==0&&$bDay==0)){
		if($edd['mday']==31){
			$cha=$cha-1;
		}
		if($std['mday']==31){
			$cha=$cha+1;
		}
		if($edd['mon']==2){
			if($edd['mday']==28){
				$cha = $cha+2;
			}elseif ($edd['mday']==29){
				$cha = $cha+1;
			}
		}
	}
	return $cha;
}
/**
 * 
 * 判断是否润年
 * @param $year
 */
function isLeapYear($year){
 	return (0==$year%4&&(($year%100!=0)||($year%400==0)));   
}