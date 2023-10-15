<?php
session_start();
error_reporting(0);

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
   
   
}

$host = "localhost";
$user = "root";
$password = "";
$db = "school";
$data = mysqli_connect($host, $user, $password, $db);


$id = $_GET['student_id'];

$sql = "SELECT * FROM user WHERE id='$id'";
$result = mysqli_query($data, $sql);
$info = $result->fetch_assoc();

if (isset($_POST['update'])) {
   
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
  

    $query = "UPDATE user SET  email = '$email', password = '$password', phone = '$phone'
    WHERE id = '$id' ";

    $result2 = mysqli_query($data, $query);

    if ($result2) {
      header("location:view_myinfo.php");
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>student page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .div_deg {
            background-color: #3498db;
            color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 500px;
            padding: 15px;

        }


        .div_deg input[type="text"],
        .div_deg input[type="number"],
        .div_deg input[type="email"],
        .div_deg input[type="password"] {
            width: 50%;
            padding: 5px;
            border: none;
            border-radius: 5px;
            margin-bottom: 10px;

        }

        .div_deg input[type="text"]:focus,
        .div_deg input[type="number"]:focus,
        .div_deg input[type="email"]:focus,
        .div_deg input[type="password"]:focus {
            outline: none;
            box-shadow: 0 0 5px #3498db;
        }

        .div_deg select {
            width: 50%;
            height: 40px;
            border-radius: 5px;
            margin: 20px;
        }

        .btn {
            box-shadow: inset 0px -3px 7px 0px #29bbff;
            background: linear-gradient(to bottom, #2dabf9 5%, #0688fa 100%);
            background-color: #2dabf9;
            border-radius: 17px;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 15px;
            font-weight: bold;
            padding: 10px 21px;
            text-decoration: none;
            border: none;
            margin-top: 10px;

        }

        .btn:hover {
            background: linear-gradient(to bottom, #0688fa 5%, #2dabf9 100%);
            background-color: #0688fa;
        }

        .btn:active {
            position: relative;
            top: 1px;
        }

        * {
            margin: 0px;
            padding: 0px;
        }

        header {
            background-color: skyblue;
            line-height: 75px;
            padding-left: 30px;
        }

        a {
            text-decoration: none;
            color: white;
            font-weight: 800;
        }

        .logout {
            float: right;
            padding-right: 50px;

            background-color: #skyblue;
        }

        aside li {
            padding: 20px;
            text-decoration: none;

            list-style: none;
            font-size: 15px;
        }

        aside li a:hover {
            color: lightblue;
        }

        ul {
            background-color: grey;
            width: 18%;
            height: 100%;
            text-align: center;
            position: fixed;

        }

        label {
            display: inline-block;
            text-align: right;
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .content {
            margin-left: 20%;
            margin-top: 5%;
        }

        .table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .table tr {
            background-color: #349eeb;
            color: #ffffff;
            text-align: left;
        }

        .table th,
        .table td {
            padding: 12px 15px;
        }

        .table tr {
            border-bottom: 1px solid #dddddd;
        }

        .table td {
            background-color: #f7f7f7;
            color: black;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <a href="student.php">student dashboard</a>
        <div class="logout">
            <a href="index.php">logout</a>
        </div>
    </header>
    <aside>
        <ul>
        <li><a href="view_myinfo.php">view my info</a></li>
      <li><a href="view_score.php">view my score</a></li>
        </ul>
    </aside>
    <div class="content">
        <center>
            <h1>Update my info</h1>
            <div class="div_deg">
                <form action="#" method="POST">
                    <div>
                        <div>
                            <label>email</label>
                            <input type="email" name="email" value="<?php 
                            echo "{$info['email']}"; ?>">
                        </div>
                        <div>
                            <label>phone</label>
                            <input type="number" name="phone" max="99999999" value="<?php 
                            echo "{$info['phone']}"; ?>">
                        </div>
                        <div>
                            <label>password</label>
                            <input type="text" name="password" value="<?php 
                            echo "{$info['password']}"; ?>">
                        </div>
        


                        <div>
                            <input type="submit" class="btn" name="update" value="update">
                        </div>


                    </div>
                </form>
            </div>
        </center>
    </div>




</body>

</html>