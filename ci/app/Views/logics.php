<?php
function grade($score)
{
	switch ($score) {
		case $score >= 90 && $score <= 100:
			return 'A+';
			break;
		case $score >= 70 && $score <= 89:
			return 'A';
			break;
		case $score >= 45 && $score <= 69:
			return 'B';
			break;
		case $score >= 35 && $score <= 44:
			return 'C';
			break;
		case $score >= 0 && $score <= 34:
			return 'D';
			break;
	}	
}

function remark($score)
{
	switch ($score) {
		case $score >= 90 && $score <= 100:
			return 'Excellent'; //Distinction
			break;
		case $score >= 70 && $score <= 89:
			return 'V. Good';
			break;
		case $score >= 45 && $score <= 69:
			return 'Good';
			break;
		case $score >= 35 && $score <= 44:
			return 'Fair';
			break;
		case $score >= 0 && $score <= 34:
			return 'Poor';
			break;
	}
}


function ccremark($score)
{
	switch ($score) {
		case $score >= 90 && $score <= 100:
			return 'Exc.'; //Distinction
			break;
		case $score >= 70 && $score <= 89:
			return 'V.Gd';
			break;
		case $score >= 45 && $score <= 69:
			return 'Good';
			break;
		case $score >= 35 && $score <= 44:
			return 'Fair';
			break;
		case $score >= 0 && $score <= 34:
			return 'Poor';
			break;
	}
}


function cctotal($score)
{
	$total = (($score)/300)*100;
	return ceil($total) ;
}

function totalper($score)
{
	return $score.'~<b>'.ceil($score*0.083).'%</b>';
 }

function totalpe($score)
{
	return ceil((($score)/(3*1200))*100);
 }

function per($score)
{
	$total = (($score)/1200)*100;
	return ceil($total) ;
}

function genRemark($score)
{
	if($score > 480){
		return 'PASSED';
	}else{
		return 'FAILED';
	}
}

function genRemarkPer($percentage)
{
	if($percentage > 50){
		return 'Promoted';
	}elseif ($percentage >= 40) {
		return 'Promoted on trial';
	}else{
		return 'Not Promoted';
	}
}

?>