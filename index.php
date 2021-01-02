<?php include "inc/header.php"; ?>

<?php 
	spl_autoload_register(function($class)
	{
		include "classes/".$class.".php";
		
	});
?>
	<?php 
		$user = new student();
		
		if(isset($_POST['submit']))
		{
			$name = $_POST['name'];
			
			$Dep = $_POST['Dep'];
			
			$Age = $_POST['Age'];
			
			
			$user-> setName($name);
			
			$user -> setDep($Dep);
			
			$user -> setAge($Age);
		
			if($user->Insert())
			{
				echo "Data insert successfully";
			}
			else
			{
				echo "Data insert not successfull";
			}
		
		}
		
		if(isset($_POST['Update']))
		{
			$id = $_POST['id'];
			
			$name = $_POST['name'];
			
			$Dep = $_POST['Dep'];
			
			$Age = $_POST['Age'];
			
			  
			$user-> setName($name);
			
			$user -> setDep($Dep);
			
			$user -> setAge($Age);
		
			if($user->UpdateData($id))
			{
				echo "Data update successfully";
			}
			else
			{
				echo "Data update  not successfull";
			}
		
		}
		
		
		
		
	
	?>
        <?php 
	if(isset($_GET['action']) && $_GET['action'] == 'Delete')
	{
		$id = (int)$_GET['Id'];
		
		$result = $user->DeleteData($id);
		
		
		
	
	
	}
	
	?>
    <?php 
	if(isset($_GET['action']) && $_GET['action'] == 'Update')
	{
		$id = (int)$_GET['Id'];
		
		$result = $user->readDataBYId($id);
		
		
		
	
	
	
	
	?>
   <section class="mainleft">
<form action="" method="post">
<input type = "hidden" name = "id" value = "<?php echo $result['Id'] ?>" />
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" value ="<?php echo $result['Name'] ?>" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="Dep" value = "<?php echo $result['Department'] ?>" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="Age" value = "<?php echo $result['Age'] ?>"  required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="Update" value="submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>
</section>
<?php }  else { ?>
<section class="mainleft">
<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" placeholder="Your name" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="Dep" placeholder="Your Department"  required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="Age"  placeholder="Your Age" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="submit" value="Submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>
</section>

<?php } ?>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    <?php 
	
	 $i = 0;
	foreach($user->readAll() as $key => $value)
	{
	
	 $i++;
	
	?>

    <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $value['Name'] ?></td>
        <td><?php echo $value['Department'] ?></td>
        <td><?php echo $value['Age'] ?></td>
        <td>
        <?php echo"<a href='index.php?action=Update&Id=".$value['Id']."'>Update</a>"; ?>
        ||
        <?php echo"<a href='index.php?action=Delete&Id=".$value['Id']."'>Delete</a>"; ?>
        </td>
    </tr>
	<?php  } ?>
    
  </table>
</section>
<?php include "inc/footer.php"; ?>