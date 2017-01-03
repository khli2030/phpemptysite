<?php
include('connect.php');
$epr='';
$msg='';
if(isset($_GET['epr']))
	$epr=$_GET['epr'];

	if($epr=='save')
	{

   $FruitName=$_POST['name'];
   $Fruitcolor=$_POST['color'];
   $Flavor=$_POST['flavor'];
   $Texture=$_POST['texture'];
   $Colories=$_POST['colories'];

   $s_sql=mysqli_query($link,"INSERT INTO fruitDB  VALUES('$FruitName', '$Fruitcolor', '$Flavor', '$Texture', '$Colories')");
   if($s_sql)
   	header("location:index.php");
   else
   	$msg='error : '.mysql_error();
    }

    if($epr=='delete')
    {
    	$id=$_GET['id'];
    	$delete=mysqli_query($link,"DELETE FROM fruitDB WHERE FruitName='$id'");
    	if($delete)
   	header("location:index.php");
   else
   	$msg='error : '.mysql_error();
   }
?>

<html>
<head>
	
</head>
<body>
<h2 align="center">Add fruit </h2>
   <form method="post" action='index.php?epr=save'>
  <table align="center">
  <tr>
<td>FruitName:</td>
    <td> <input type="text" name='name'/></td>
    </tr>

    <tr>
<td>Fruitcolor:</td>
   <td><input type="text" name='color'/></td>
   </tr>

   <tr>
<td>Flavor:</td>
    <td><input type="text" name="flavor"/></td>
    </tr>

    <tr>
<td>Texture:</td>  
    <td><input type="text" name="texture"/></td>
    </tr>

    <tr>
<td>Colories:</td>  
    <td><input type="text" name="colories"/></td>
   </tr>
   <tr>
     <td> <input type="submit" name="submit" value="Add Fruit"/></td>
</tr>
</table>
</form>

</body>
</html>
 



<!--  show data !-->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h2 align="center"> Ibrahim Bin Taleb</h2>
<h2 align="center"> 434042905</h2>
  <table align="center" border="1" cellspacing="0" cellpadding="0" width="700">
  	 <thead>
  	 	<th>FruitName</th>
  	 	<th>Fruitcolor</th>
  	 	<th>Flavor</th>
  	 	<th>Texture</th>
  	 	<th>Colories</th>
  	 	<th>delete</th>
  	 </thead>
  	 <?php
  	 $sql=mysqli_query($link,"SELECT * FROM fruitDB");
  	 $i=1;
  	 while ($row=mysqli_fetch_array($sql)) {
  	 	

  	 	//echo $konan[0];
  	 	echo " <tr>
       			
       			<td>".$row["FruitName"]."</td>
       			<td>".$row['Fruitcolor']."</td>
       			<td>".$row['Flavor']."</td>
       			<td>".$row['Texture']."</td>		
                <td>".$row['Colories']."</td>
                
                <td align ='center'> 
                  <a href='index.php?epr=delete&id=".$row['FruitName']."'>DELETE</a>
                </td>
                
  	 	        </tr>";
  	 	        $i++;
  	 }
  	   ?>
  </table>
  <?php echo $msg; ?>
</body>
</html>

