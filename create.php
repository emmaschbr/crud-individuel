<?php
include "config.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];


    $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$first_name', '$last_name', '$email', '$password', '$gender')";

    $result = $db->query($sql);

    if ($result == TRUE) {
        echo "New Record Created Successfully";
    } else {
        echo "Error:" . $sql . "<br>" . $db->error;
    }
    
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>

<body>

    <h2>Signup Form</h2>

    <form action="" method="POST">
        <fieldset>
            <legend>Personal Information:</legend>
            First Name:
            <input type="text" name="firstname">
            <br>
            Last Name:
            <input type="text" name="lastname">
            <br>
            Email:
            <input type="email" name="email">
            <br>
            Password:
            <input type="password" name="password">
            <br>
            Gender:<br>
            <input type="radio" name="gender" value="Male">Male
            <input type="radio" name="gender" value="Female">Female
            <br><br>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>

    <body>

</html>