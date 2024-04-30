<?php 
    include 'inc/header.php';
    include 'config.php';
    include 'Database.php';
?>
		

<?php 
$db = new Database();
if (isset($_POST['submit'])) {
    $name  = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $skill = mysqli_real_escape_string($db->link, $_POST['skill']);

    if ($name == '' || $email == '' || $skill == '') {
        $error = "Field Must Not Be Empty";
    } else {
        $query = "INSERT INTO tbl_user(name, email, skill) values('$name', '$email', '$skill')";
        $create = $db->insert($query);
    }
}
?>

<?php

if (isset($error)) {
    echo "<span style='color: red'>".$error."</span>";
}

?>

<form action="create.php" method="post">
<table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="name" placeholder="Please Enter Your Name"></td>
    </tr>

    <tr>
        <td>E-mail</td>
        <td><input type="text" name="email" placeholder="Please Enter Your E-mail"></td>
    </tr>

    <tr>
        <td>Skill</td>
        <td><input type="text" name="skill" placeholder="Please Enter Your Skill"></td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" name="submit" value="Submit">
            <input type="reset" value="Cancel">
        </td>
    </tr>
</table>
</form>


<a href="index.php">Go Back</a>


<?php include 'inc/footer.php'; ?>