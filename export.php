<?php
require('conn.php');
function filterData(&$str){
  $str = preg_replace("/\t/","\\t",$str);
  $str = preg_replace("/\r?\n/","\\n",$str);
  if(strstr($str,'"')) $str ='"' . str_replace('"', '""', $str) . '"';
}
$fileName ="resultsheet" . ".xlsx";
$fields =array('Roll','Student_Name','Total_Vote');

$excelData = implode("\t", array_values($fields)) . "\n";
$sql ="SELECT Roll,Student_Name,Total_Vote FROM student_list join candidate_list using(Roll) ORDER BY Total_Vote desc";
$query = mysqli_query($conn,$sql);    
if(mysqli_num_rows($query)>0){
  while($data = mysqli_fetch_assoc($query )){
    $rowdata=array($data["Roll"],$data["Student_Name"],$data["Total_Vote"]);
    array_walk($rowdata,'filterData');
    $excelData .=implode("\t", array_values($rowdata)) . "\n";
  }}
  else{
    $excelData .='No records found...' . "\n";
  }

  //Headers for download
  header("Content-Disposition: attachment; filename=\"$fileName\"");
  header("Content-Type: application/vnd.ms-excel");
  echo $excelData;
  exit;


?>