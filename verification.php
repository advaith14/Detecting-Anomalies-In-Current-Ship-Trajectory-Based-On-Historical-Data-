<?php if(isset($_GET['id']) && isset($_GET['code']))
{
	$id=$_GET['id'];
	$code=$_GET['code'];
	//mysql_connect('localhost','root','');
	//mysql_select_db('sample');
  include ('connectdbshore.php');
	$select=mysqli_query($conn,"select * from user where id=$id and activation_code='$code'");
	if(mysqli_num_rows($select)==1)
	{
		while($row=mysqli_fetch_array($select))
		{
			$update = mysqli_query($conn,"update user set verified = 1 where id = $id");
			//echo $row['verified'];
		}
		//$insert_user=mysql_query("insert into verified_user values('','$email','$password')");
		//$delete=mysql_query("delete from verify where id='$id' and code='$code'");
	}

	//echo $id;
	//echo $code;
}
?>
