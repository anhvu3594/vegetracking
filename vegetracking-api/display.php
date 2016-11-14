<?php
 include_once './dbConnect.php';
 
 function dispInfo($id){
   $db = new dbConnect();
 
  // Mảng JSON
  //$response = array();
  //$response["vegetracking-db"] = array();
  // Câu lệnh Select dùng để xem dữ liệu
  $result = mysqli_query($db->connect(), "SELECT *, category.cat_name, transportation.trans_name, production.prod_name from vegetable inner join category on vegetable.cat_id = category.cat_id inner join transportation on vegetable.trans_id = transportation.trans_id inner join production on vegetable.prod_id = production.prod_id where vegetable.veget_id=".$id );
 
  //Đọc dữ liệu từ MySQL
  //while($row = mysqli_fetch_array($result)){ 
  //  $t = array();
   // $t["veget_id"] = $row["veget_id"];
   // $t["name"] = $row["cat_name"];
 
    // Mảng JSON
   // array_push($response["vegetracking-db"], $t);
 //}
 $row = mysqli_fetch_array($result);
 $response = array();
 $response["veget_id"] = $row["veget_id"];
 $response["cat_id"] = $row["cat_id"];
 $response["cat_name"] = $row["cat_name"];
 $response["QR"] = $row["QR"];
 $response["price"] = $row["price"];
 $response["date_release"] = $row["date_release"];
 $response["trans_id"] = $row["trans_id"];
 $response["prod_id"] = $row["prod_id"];
 $response["trans_name"] = $row["trans_name"];
 $response["prod_name"] = $row["prod_name"];
 // Thiết lập header là JSON
 header('Content-Type: application/json');
 
 // Hiển thị kết quả
 echo json_encode($response);
}

$id = $_GET["id"];
dispInfo($id);
?>