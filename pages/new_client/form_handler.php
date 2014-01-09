<?php
$i=0;

while($i<10000000)
{
	$i++;
}
if($_POST['step']=="basic")
{
	echo "basic_added";
}
else if($_POST['step']=="contact")
{
	echo "contact_added";
}
else
	{
		$address=$_POST["address"];
		
		echo $address[3][1][1];
	}

?>