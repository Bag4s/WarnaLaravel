<?php
session_start();

// Jika sudah login
if(isset($_SESSION['login'])){

// Alihkan tetap ke pengguna ke index.php ketika pengguna mencoba masuk ke login.php
header("Location: session02.php");
die();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="styles.css" />

    <style>
body{
  margin: 0;
  padding: 0;
  font-family: Roboto;
  background-repeat: no-repeat;
  background-size: cover;
  background: linear-gradient(120deg, #007bff, #d0314c);
  height: 100vh;
  overflow: hidden;
}

b{
  color: white;
}

.center{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 30vw;
  background: white;
  background-color: rgba(0,0,0,0.4);
  backdrop-filter: blur(7px);
  border-radius: 10px;
}

.center h1{
  text-align: center;
  padding: 0 0 20px 0;
  border-bottom: 1px solid silver;
}

.center form{
  padding: 0 40px;
  box-sizing: border-box;
  backdrop-filter: blur(1px);
}

form .txt_field{
  position: relative;
  border-bottom: 2px solid #adadad;
  margin: 30px 0;
}

.txt_field input{
  width: 100%;
  padding: 0 5px;
  height: 40px;
  font-size: 16px;
  border: none;
  background: none;
  outline: none;
}

.txt_field label{
  position: absolute;
  top: 50%;
  left: 5px;
  color: #adadad;
  transform: translateY(-50%);
  font-size: 16px;
  pointer-events: none;
}

.txt_field span::before{
  content: '';
  position: absolute;
  top: 40px;
  left: 0;
  width: 0px;
  height: 2px;
  background: #2691d9;
  transition: .5s;
}

.txt_field input:focus ~ label,
.txt_field input:valid ~ label{
  top: -5px;
  color: #2691d9;
}

.txt_field input:focus ~ span::before,
.txt_field input:Valid ~ span::before{
  width: 100%;
}

.pass{
  margin: -5px 0 20px 5px;
  color: #a6a6a6;
  cursor: pointer;
}

.pass:hover{
  text-decoration: underline;
}

input[type="Submit"]{
  width: 100%;
  height: 50px;
  border: 1px solid;
  border-radius: 25px;
  font-size: 18px;
  font-weight: 700;
  cursor: pointer;

}

input[type="Submit"]:hover{
  background: #2691d9;
  color: #e9f4fb;
  transition: .5s;
}

.HomeAbout{
  width: 100vw;
  height: 25vh;
}
    </style>
  </head>

  <body style="background-image: url('gunung.jpg');">

<?php

if(isset($_POST['login'])) {

$user = $_POST['username'];
$pass = $_POST['password'];

//periksa login
 if ($user == "fatih" && $pass == "123") {

//menciptakan session
$_SESSION['login'] = true;

 //menuju ke halaman index ketika berhasil login
header("Location: session02.php");
die();
}
}
?>
    <div class="container">
      <div class="center">
          <h1><b>LOGIN </h1>
          <form action="" method="POST">
              <div class="txt_field">
                  <input type="text" name="username" required>
                  <label><b>USERNAME</label>
              </div>
              <div class="txt_field">
                  <input type="password" name="password" required>
                  <label><b>PASSWORD</label>
              </div>
              <input name="login" type="submit" value="Login">
          </form>
      </div>
    </div>
  </body>
</html>