<?php
$i=0;

while($i<1000000)
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
		echo "address_added";
	}
?>