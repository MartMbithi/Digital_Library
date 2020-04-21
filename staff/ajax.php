<?php
include('assets/config/pdoconfig.php');
if(!empty($_POST["bookCategoryName"])) 
{	
    //get instructor id
    $id=$_POST['bookCategoryName'];
    $stmt = $DB_con->prepare("SELECT * FROM iL_BookCategories WHERE  bc_name = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['bc_id']); ?>
<?php
}
}

if(!empty($_POST["studentiLibNumber"])) 
{	
    //get student name
    $id=$_POST['studentiLibNumber'];
    $stmt = $DB_con->prepare("SELECT * FROM iL_Students WHERE  s_number = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['s_name']); ?>
<?php
}
}

if(!empty($_POST["studentName"])) 
{	
    //get student id
    $id=$_POST['studentName'];
    $stmt = $DB_con->prepare("SELECT * FROM iL_Students WHERE  s_number = :id");
    $stmt->execute(array(':id' => $id));
?>
<?php
    while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
?>
<?php echo htmlentities($row['s_id']); ?>
<?php
}
}

