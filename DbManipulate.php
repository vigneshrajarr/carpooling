<?php
$con = mysql_connect("localhost","root","")or die("Cannot connect");
$db = mysql_select_db("members", $con) or die("Cannot select db");

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST);
}
function saveData($data){
  
 
   $fname = $data['fname'];
  $lname = $data['lname'];
  $domain =$data['domain'];
  $email = $data['email'];
  $sql = "insert into `all`(`firstname`,`lastname`,`domain`,`email`) values('$fname','$lname','$domain','$email')";
    if($query=mysql_query($sql))
        showData($data);
}
function showData($data){
  $sql = "select * from `all`";
  $query=mysql_query($sql);
  $str='<tr class="head"><td>Firstname</td><td>Lastname</td><td>Domain</td><td>Email</td><td></td></tr>';
    $rows=mysql_num_rows($query);
  if($rows>0){
   while( $row = mysql_fetch_array($query)){
      $str="<tr id='{$row['id']}'><td>{$row['firstname']}</td><td>{$row['lastname']}</td><td>{$row['domain']}</td><td>{$row['email']}</td><td><input type='button' class='ajaxedit' value='Edit'/> <input type='button' class='ajaxdelete' value='Delete'></td></tr>";
   }
   }else{
    $str = "<td colspan='5'>No Data Available</td>";
   }
   
echo $str;   
}
function updateData($data){
  $fname = $data['fname'];
  $lname = $data['lname'];
  $domain = $data['domain'];
  $email = $data['email'];
  $editid = $data['editid'];
  $sql = "update `all` set `firstname`='$fname',`lastname`='$lname',`domain`='$domain',`email`='$email' where `id`=$editid";
  if(mysql_query($sql)){
    showData($data);
  }
  }
  function deleteData($data){
    $delid = $data['deleteid']; 
	$sql = "delete from `all` where id=$delid";
	if(mysql_query($sql)){
	  showData($data);
	}
  }
?>