
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>@import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&family=Poppins:wght@400;500;600&display=swap');
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }
      body{
        margin: 0;
        padding: 0;
        background: rgb(157,224,173);
        background: #37306B;
        height: 100vh;
        overflow: hidden;
      }
      .center{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
        box-shadow: 10px 10px 15px rgba(0,0,0,0.05);
      }
      .center h1{
        color: #594F4F;
        text-align: center;
        padding: 20px 0;
        border-bottom: 1px solid silver;
      }
      .center form{
        padding: 0 40px;
        box-sizing: border-box;
      }
      form .txt_field{
        position: relative;
        border-bottom: 2px solid #9DE0AD;
        margin: 30px 0;
      }
      .txt_field input{
        color: #2a363b;
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
        color: #9DE0AD;
        transform: translateY(-50%);
        font-size: 16px;
        pointer-events: none;
        transition: .5s;
      }
      .txt_field span::before{
        content: '';
        position: absolute;
        top: 40px;
        left: 0;
        width: 0%;
        height: 2px;
        background: #45ADA8;
        transition: .5s;
      }
      .txt_field input:focus ~ label,
      .txt_field input:valid ~ label{
        top: -5px;
        color: #45ADA8;
      }
      .txt_field input:focus ~ span::before,
      .txt_field input:valid ~ span::before{
        width: 100%;
      }
      .pass{
        margin: -5px 0 20px 5px;
        color: #594F4F;
        cursor: pointer;
      }
      .pass:hover{
        text-decoration: underline;
      }
      button{
        width: 100%;
        height: 50px;
        border: 1px solid;
        background: #37306B;
        border-radius: 25px;
        font-size: 18px;
        color: #e9f4fb;
        font-weight: 700;
        cursor: pointer;
        outline: none;
      }
      button:hover{
        border-color: #99b898;
        transition: .5s;
      }
      .signup_link{
        margin: 30px 0;
        text-align: center;
        font-size: 16px;
        color: #666666;
      }
      .signup_link a{
        color: #594F4F;
        text-decoration: none;
      }
      .signup_link a:hover{
        text-decoration: underline;
      }
      a {
        text-decoration: none;
        color: #666666;
      }

    </style>
    <meta charset="utf-8">
    <title>FEMAS</title>
  </head>
  <body>
  <script>
    function ceksama() {
      let password = document.getElementById('password').value;
      let confirmpassword = document.getElementById('confirmpassword').value;
      if (password == confirmpassword) {
        document.getElementById('error').style.visibility = 'hidden';
        document.getElementById('btn').disabled = false;
      } else {
        document.getElementById('btn').disabled = true;
        document.getElementById('error').style.visibility = 'visible';
      }
    }
    </script>
    <div class="center">
      <h1>Daftar</h1>
      <form method="post">
        <div class="txt_field">
          <input type="text" required name="name" autofocus>
          <span></span>
          <label>Name</label>
        </div>
        <div class="txt_field">
          <input type="text" required name="email">
          <span></span>
          <label>Email</label>
        </div>
        <div class="txt_field">
          <input type="password" required name="password" id="password" onkeyup="ceksama()">
          <span></span>
          <label>Password</label>
        </div>
        <div class="txt_field">
          <input type="password" required id="confirmpassword" onkeyup="ceksama()">
          <span></span>
          <label>Konfirmasi Password</label>
        </div>
        <button type="submit" name="submit" id="btn" disabled>Daftar</button>
        <div class="signup_link" style="color:red; visibility: hidden; margin-top: -2px; padding-top: -10px; padding-bottom: -10px;" id="error">
          Password tidak sama
        </div>
        <div class="signup_link" style="margin-top: -14px;">
          Sudah punya akun? <a href="login.php">Login</a>
        </div>
      </form>
    </div>
  </body>
</html>
<?php

if (isset($_POST['submit'])) {
  include 'koneksi.php';
  $name = $koneksi->real_escape_string($_POST['name']);
  $email = $koneksi->real_escape_string($_POST['email']);
  $password = md5($koneksi->real_escape_string($_POST['password']));
  try {
    $q = $koneksi->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
    ?>
    ?>
    <script>
      Swal.fire(
        'Berhasil membuat akun!',
        'Berhasil',
        'success'
      ).then(function() {
        window.location = "login.php";
      })
    </script>
    <?php
  } catch (Exception $e) {
    ?>
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Email sudah digunakan!'
      });
    </script>
    <?php
    return;
  }
}