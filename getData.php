<?php


//$string = file_get_contents("sampleData.json");
//echo $string;

$ch = curl_init();
$url = "http://www.nflarrest.com/api/v1/crime";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);

$data_arr = json_decode($output, true);

$data = array();
array_push($data, array("Crime", "Number"));
foreach($data_arr as $data_element){
  if(intval($data_element["arrest_count"]) <= 7)
    continue;
  $temp = array();
  $count = 0;
  foreach($data_element as $key=>$val) {
    if($count == 1){
      array_push($temp, intval($val));
      break;
    }  
    array_push($temp, $val);
    $count++;
  }
  array_push($data, $temp);
}

echo json_encode( $data );
?>


