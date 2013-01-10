<!-- lab_1_2 -->
<!-- ��������� ����������: 
- ���������� �����������, �.�., ���� ��������� ������ ������ ��������,
 �� ��� ������������� ��� ������;
- ������, ������� ��� ����� ������������� ���������� ����� � 
 �������� ���������, �� ��������� ������;
- ������� �������������� ���, ��� ����� �� ��������� ������� �� 1 �����; -->
<?php 
//�������� ����� ������� � ������
$f = fopen("history.csv", "rt") or die("ERROR!!!!");
for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {
	//echo "<h3>������ ����� $i</h3>";
	$A[$i] = array(
	"data"=>$data[0], "telefon"=>$data[1], "operator"=>$data[2], "napravl"=>$data[3], "tip"=>$data[4], "prodolzh"=>$data[5]
	);
	//foreach ($A[$i] as $k => $v) echo "$k=$v<br>";	
}
fclose($f);
$num_history = $i;
//�������� ����� ������ � ������
$f = fopen("tarif.csv", "rt") or die("ERROR!!!!");
for ($i=0; $data=fgetcsv($f,1000,";"); $i++) {
	//echo "<h3>����� ����� $i</h3>";
	$B[$i] = array(
	"tarif"=>$data[0], "abon_plata"=>$data[1], "cost_voice_1"=>$data[2], "cost_voice"=>$data[3], "cost_sms"=>$data[4], "sum_bespl_voice"=>$data[5], "sum_bespl_sms"=>$data[6]
	);
	//foreach ($B[i] as $k => $v) echo "$k=$v<br>";		
}
fclose($f);
$num_tarif = $i;
//��������� ����� �� ������
for ($i=0; $i<$num_history; $i++)
	$MM_SS[$i] = explode(":", $A[$i]['prodolzh'], 2);
$the_best = 99999999;
//������ ��������
for($j=0; $j<$num_tarif; $j++) {
	for ($i=0; $i<$num_history; $i++) {
		if($A[$i]['napravl'] == 'out') {
			if($A[$i]['tip'] == 'sms') {
				if($B[$j]['sum_bespl_sms']>0) 
					$B[$j]['sum_bespl_sms']--;
				else $sum_sms[$j]++;
			}
			else {
				if($B[$j]['sum_bespl_voice']>0)
					$B[$j]['sum_bespl_voice'] -= $MM_SS[$i][0]+1;
				else {
					$number[$j]++;
					$sum_voice[$j] += $MM_SS[$i][0]+1;
				}
			}
		}
	$sum[$j] = $sum_sms[$j]*$B[$j]['cost_sms'] - $B[$j]['sum_bespl_voice']*$B[$j]['cost_voice'] + ($sum_voice[$j]-$number[$j])*$B[$j]['cost_voice'] + $number[$j]*$B[$j]['cost_voice_1']+$B[$j]['abon_plata'];
	}	
	//echo $sum[$j]."=sum[$j] <br>";
    if($the_best > $sum[$j]) {
		$the_best = $sum[$j];
		$k=$j;
	}
}
echo "�������� ������� ��������� �����: ".$B[$k]['tarif']."<br>";
echo "�������� ������� �� ����������� ������� :".$the_best;
?>
