<?php 
    include 'inc/header.php';
    include 'config.php';
    include 'Database.php';
?>
		

<?php
$id = $_GET['id'];
$db = new Database();
$query = "SELECT * FROM tbl_user WHERE id=$id";
$getdata = $db->select($query)->fetch_assoc();

if (isset($_POST['submit'])) {
    $name  = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

    if ($name == '' || $email == '' || $skill == '') {
        $error = "Field Must Not Be Empty";
    } else {
        $query = "UPDATE tbl_user
        SET
        name = '$name',
        email = '$email',
        skill = '$skill'
        WHERE id=$id
        ";
        $update = $db->update($query);
    }
}
?>

<?php
if (isset($_POST['delete'])) {
    $query = "DELETE FROM tbl_user WHERE id=$id";
    $deleteData = $db->delete($query);
}
?>

<?php

if (isset($error)) {
    echo "<span style='color: red'>".$error."</span>";
}

?>

<form action="update.php?id=<?php echo $id?>" method="post">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" value="<?php echo $getdata['name']?>"></td>
    </tr>

    <tr>
        <td>E-mail</td>
        <td><input type="text" name="email" value="<?php echo $getdata['email']?>"></td>
    </tr>

    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" value="<?php echo $getdata['skill']?>"></td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Cancel">
            <input type="submit" name="delete" value="Delete">
        </td>
    </tr>
</table>
</form>


<a href="index.php">Go Back</a>


<?php include 'inc/footer.php'; ?>