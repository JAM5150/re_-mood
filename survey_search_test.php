<?php
//���� �˻��� ���� url �ʱ�ȭ
$url = "https://mood-music-yyioo.run.goorm.io/search";

// �˻��� �޾ƿ��� �κ� �켱 �״�� ��
$search_track = $_POST['search_track']; 

//�ٵ����� ����
$body_data = array(
		'search' => $search_track
);
// api�� �ٵ� ���� 
$body = json_encode($body_data, JSON_UNESCAPED_UNICODE);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec ($ch);
$result_explode = explode('"', $result); // ���ڿ� "�������� �ɰ���
$result_len = count($result_explode); // �迭���� ���ϱ�
$i = 0;
$result_edit = array();
$j = 0;
// ����� �з��ؼ� ����, ����� ���� �ۼ����� ����
for($i=1; $i < $result_len; $i = $i+2)
{
	//$result_explode[$i] = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $result_explode[$i]);
	$result_edit[$j] = $result_explode[$i];
	$j = $j + 1;
}
$result_artist_id = array();
$result_artist_name = array();
$result_track_id = array();
$result_track_image = array();
$result_track_name = array();
$j = 0;
for($i = 1; $i < 11; $i = $i + 1){
	$result_artist_id[$j] = $result_edit[$i];
	$result_artist_name[$j] = $result_edit[$i + 11];
	$result_track_id[$j] = $result_edit[$i + 22];
	$result_track_image[$j] = $result_edit[$i + 33];
	$result_track_name[$j] = $result_edit[$i + 44];
	
	echo "result_artist_id: ".$result_artist_id[$j]."<br/>";
	echo "result_artist_name: ".$result_artist_name[$j]."<br/>";
	echo "result_track_id: ".$result_track_id[$j]."<br/>";
	echo "result_track_name: ".$result_track_name[$j]."<br/>";
	echo "result_track_image: ".$result_track_image[$j]."<br/>";
	echo "<br/>";
	$j = $j + 1;
}


?>