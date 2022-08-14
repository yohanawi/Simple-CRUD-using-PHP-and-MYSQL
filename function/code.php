<?php
    session_start();
    include '../components/connection.php';

    if(isset($_POST['delete']))
    {
        $id = mysqli_real_escape_string($con, $_POST['delete']);
        $query = "DELETE FROM users WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header("Location: ../index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header("Location: ../index.php");
            exit(0);
        }
    }
    if(isset($_POST['update']))
    {
        $id = mysqli_real_escape_string($con, $_POST['id']);
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $nic = mysqli_real_escape_string($con, $_POST['nic']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $query = "UPDATE users SET name='$name', nic='$nic', email='$email', phone='$phone', birthday='$birthday', gender='$gender' WHERE id='$id' ";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Updated Successfully";
            header("Location: ../index.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header("Location: ../index.php");
            exit(0);
        }
    }
    if(isset($_POST['save']))
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $nic = mysqli_real_escape_string($con, $_POST['nic']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $birthday = mysqli_real_escape_string($con, $_POST['birthday']);
        $gender = mysqli_real_escape_string($con, $_POST['gender']);
        $query = "INSERT INTO users (name,nic,email,phone,birthday,gender) VALUES ('$name','$nic','$email','$phone','$birthday','$gender')";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['message'] = "Created Successfully";
            header("Location: insert.php");
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Created";
            header("Location: insert.php");
            exit(0);
        }
    }
?>