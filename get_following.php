<?php
// to get the people, I am follwing to be shown in staus wrapper, thsi is used in other_people.php
// user_id follows the other_user_id


include('connection.php');

$user_id = $_SESSION['id'];

$stmt = $conn->prepare("SELECT other_user_id FROM followings WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

// This array will contain the people I am following
$ids = array();  

$result = $stmt->get_result();
while($row = $result->fetch_array(MYSQLI_NUM)){
    foreach($row as $r){
     $ids[] = $r;
    }

}

if(empty($ids)){
 $ids = [1]; // random number is passed
}

$following_ids= join(",", $ids);
                                                         // we want to get the last 20 people I follwoed
$stmt = $conn->prepare("SELECT * FROM users WHERE id in ($following_ids) ORDER BY RAND() LIMIT 20");

$stmt->execute();

$other_people = $stmt->get_result();


?>