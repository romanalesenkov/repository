<!-- lab_1_2 -->
<!-- некоторые условности: 
- поминутна€ тарификаци€, т.е., если следующа€ минута звонка началась,
 то она засчитываетс€ как полна€;
- минута, котора€ идЄт после закончившихс€ бесплатных минут в 
 середине разговора, не считаетс€ первой;
- затраты рассчитываютс€ так, как будто бы загружена истори€ за 1 мес€ц; -->
<?php 
//загрузка файла истории в массив
$f = fopen("history.csv", "rt") or die("ERROR!!!!");
for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {
	//echo "<h3>—трока номер $i</h3>";
	$A[$i] = array(
	"data"=>$data[0], "telefon"=>$data[1], "operator"=>$data[2], "napravl"=>$data[3], "tip"=>$data[4], "prodolzh"=>$data[5]
	);
	//foreach ($A[$i] as $k => $v) echo "$k=$v<br>";	
}
fclose($f);
$num_history = $i;
//загрузка файла тарифа в массив
$f = fopen("tarif.csv", "rt") or die("ERROR!!!!");
for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {
	//echo "<h3>“ариф номер $i</h3>";
	$B[$i] = array(
	"tarif"=>$data[0], "abon_plata"=>$data[1], "cost_voice_1"=>$data[2], "cost_voice"=>$data[3], "cost_sms"=>$data[4], "sum_bespl_voice"=>$data[5], "sum_bespl_sms"=>$data[6]
	);
	//foreach ($B[i] as $k => $v) echo "$k=$v<br>";		
}
fclose($f);
$num_tarif = $i;

?>
