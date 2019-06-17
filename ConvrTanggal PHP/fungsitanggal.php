<?php

function f_convert($flag0,$flag1){
	if($flag1=="0000-00-00")return;
	$monthtext=explode("@|@","@|@Januari@|@Februari@|@Maret@|@April@|@Mei@|@Juni@|@Juli@|@Agustus@|@September@|@Oktober@|@November@|@Desember");

	if($flag1==""){return;}
	$flag1=explode("|",$flag1);
	if(count($flag1)==2&&($flag1[0]==""||$flag1[1]==""))return;

	if($flag0==0){return;}

	elseif($flag0==10){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // d/m/y -> Y-m-d
	elseif($flag0==11){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][0]."&nbsp;".$monthtext[intval($flag1[0][1])]."&nbsp;".$flag1[0][2];} // dd/mm/yyyy -> dd mmmm yyyy
	elseif($flag0==12){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][0]." ".$monthtext[intval($flag1[0][1])]." ".$flag1[0][2];} // dd/mm/yyyy -> dd mmmm yyyy
	elseif($flag0==13){$flag1[0]=explode(" ",$flag1[0]);$flag1[0]=explode("/",$flag1[0][0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // d/m/y (age) -> Y-m-d
	elseif($flag0==14){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2].$flag1[0][1].$flag1[0][0];} // dd/mm/yyyy -> Ymd
	elseif($flag0==15){$flag1[0]=explode("/",$flag1[0]);return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd/mm/yyyy -> Y-m-d

	elseif($flag0==20){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return ($flag1[0][2]==""||$flag1[0][1]==""||$flag1[0][0]==""?false:$flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0]);} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==21){$flag1[0]=explode(" ",$flag1[0]);return f_convert(20,$flag1[0][0]." ".$flag1[0][1]." ".$flag1[0][2])." ".$flag1[0][3];} // dd mmmm yyyy hh:nn:ss -> Y-m-d H:i:s
	elseif($flag0==22){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==23){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return $flag1[0][2]."-".$flag1[0][1]."-".$flag1[0][0];} // dd mmmm yyyy -> Y-m-d
	elseif($flag0==24){$flag1[0]=explode(" ",$flag1[0]);for($i=0;$i<count($monthtext);$i++){if($monthtext[$i]==$flag1[0][1]){$flag1[0][1]=$i;break;}}return ($flag1[0][2]==""||$flag1[0][1]==""||$flag1[0][0]==""?false:$flag1[0][0]."/".substr("0".$flag1[0][1],-2,2)."/".$flag1[0][2]." ".$flag1[0][3]);} // dd mmmm yyyy hh:nn:ss -> dd/mm/yyyy hh:nn:ss

	elseif($flag0==30){$flag1[0]=explode("-",$flag1[0]);return $flag1[0][2]."/".$flag1[0][1]."/".$flag1[0][0];} // Y-m-d -> dd/mm/yyyy
	elseif($flag0==31){$flag1[0]=explode(" ",$flag1[0]);return f_convert(30,$flag1[0][0])." ".$flag1[0][1];} // Y-m-d H:i:s -> dd/mm/yyyy hh:nn:ss
	elseif($flag0==32){$flag1[0]=explode("-",$flag1[0]);return $flag1[0][2]." ".$monthtext[intval($flag1[0][1])]." ".$flag1[0][0];} // Y-m-d -> dd mmmm yyyy
	elseif($flag0==33){$flag1[0]=explode(" ",$flag1[0]);return f_convert(32,$flag1[0][0])." ".$flag1[0][1];} // Y-m-d H:i:s -> dd mmmm yyyy hh:nn:ss
	elseif($flag0==34){return substr($flag1[0],6,2)."/".substr($flag1[0],4,2)."/".substr($flag1[0],0,4);} // YmdHis -> dd/mm/yyyy
	elseif($flag0==35){return substr($flag1[0],6,2)."/".substr($flag1[0],4,2)."/".substr($flag1[0],0,4)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> dd/mm/yyyy hh:nn:ss
	elseif($flag0==36){return substr($flag1[0],0,4)."-".substr($flag1[0],4,2)."-".substr($flag1[0],6,2)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> Y-m-d H:i:s
	elseif($flag0==37){return substr($flag1[0],6,2)." ".$monthtext[intval(substr($flag1[0],4,2))]." ".substr($flag1[0],0,4);} // YmdHis -> dd mmmm yyyy
	elseif($flag0==38){$flag1[0]=explode(" ",$flag1[0]);return f_convert(30,$flag1[0][0]);} // Y-m-d H:i:s -> dd/mm/yyyy
	elseif($flag0==39){return substr($flag1[0],6,2)." ".$monthtext[intval(substr($flag1[0],4,2))]." ".substr($flag1[0],0,4)." ".substr($flag1[0],8,2).":".substr($flag1[0],10,2).":".substr($flag1[0],12,2);} // YmdHis -> dd mmmm yyyy hh:nn:ss

	elseif($flag0==40){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return floor($diff);} // usia
	elseif($flag0==41){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])." (".floor($diff)." th. ".floor(($diff-floor($diff))*12)." bl.)";} // Y-m-d -> dd/mm/yyyy (th. bl.)
	elseif($flag0==42){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])." (".floor($diff)." tahun ".floor(($diff-floor($diff))*12)." bulan)";} // Y-m-d -> dd/mm/yyyy (tahun bulan)
	elseif($flag0==43){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(32,$flag1[1])." (".floor($diff)." tahun ".floor(($diff-floor($diff))*12)." bulan)";} // Y-m-d -> dd mmmm yyyy (tahun bulan)
	elseif($flag0==44){$diff=abs((strtotime($flag1[0])-strtotime($flag1[1])))/(24*60*60*365.25);return f_convert(30,$flag1[1])."<br>(".floor($diff)." th. ".floor(($diff-floor($diff))*12)." bl.)";} // Y-m-d -> dd/mm/yyyy<br>(th. bl.)
}

?>