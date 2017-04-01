 <?php
$cdit=json_encode($_POST);
$cdit=json_decode($cdit);

$servername = "localhost:3306";
$username = "root";
$password = "123";
$db_name='test';
 
$conn = new mysqli($servername, $username, $password,$db_name);
 
if ($conn->connect_error) { 
    echo 'conerr';
} 
else {
    $select = "select * from testtable where name like '%" . $cdit->z_one . "%' and place like '%" . $cdit->z_two . "%' and contry like '%" . $cdit->z_three . "%' and area like '%" . $cdit->z_four . "%' and word like '%" . $cdit->z_five . "%' union select * from testtable2 where name like '%" . $cdit->z_one . "%' and place like '%" . $cdit->z_two . "%' and contry like '%" . $cdit->z_three . "%' and area like '%" . $cdit->z_four . "%' and word like '%" . $cdit->z_five . "%' ";
    $result=$conn->query($select);
    if($result === false){
	    echo $mysqli->error;
	    echo $mysqli->errno;
	}
	$res=array();
    while($row=$result->fetch_object()){
    	array_push($res,$row);
    }
    echo json_encode($res);
}

?>