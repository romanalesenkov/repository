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

?>
