<?php
include "db.php";
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $type = "user";
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  $sql = "insert into users(name,email,password,type,address,phone)values('$name','$email','$password','$type','$address','$phone')";
  $result = mysqli_query($conn,$sql);
  if(!$result){
    echo "Error!: {$conn->error}";
  }else{
    echo "<h1 style='margin-top: 0; margin-left: 300px; color: green;'>Registred sucessfully</h1>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>Register</title>
  <style>
    /* Base styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body, html {
  height: 100%;
  font-family: Arial, sans-serif;
  background-color: #f3f3f3;
}

/* Centered form container */
.form-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}

/* Form appearance */
.register-form {
  background: #fff;
  padding: 30px 40px;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  width: 360px;
}
.register-form h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #333;
}

/* Input labels & fields */
.register-form label {
  display: block;
  margin-top: 15px;
  margin-bottom: 5px;
  font-weight: 500;
  color: #555;
}
.register-form input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}
.register-form input:focus {
  outline: none;
  border-color: #007BFF;
}

/* Submit button */
.register-form button {
  margin-top: 20px;
  width: 100%;
  padding: 12px;
  background-color: #007BFF;
  border: none;
  color: white;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}
.register-form button:hover {
  background-color: #0056b3;
}

/* Link to login */
.login-link {
  margin-top: 15px;
  text-align: center;
  font-size: 14px;
}
.login-link a {
  color: #007BFF;
  text-decoration: none;
}
.login-link a:hover {
  text-decoration: underline;
}

  </style>
</head>
<body>
  <div class="form-container">
    <form class="register-form" action="register.php" method="post">
      <h2>Create Account</h2>

      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Your name" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="you@example.com" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Choose a password" required>

      <label for="adress">Address</label>
      <input type="text" id="address" name="address" placeholder="Your adress" required>

      <label for="phone">Phone Number</label>
      <input type="tel" id="phone" name="phone" placeholder="+91 1111222233" required>

      <button type="submit" name="submit">Register</button>

      <p class="login-link">
        Already have an account? <a href="login.php">Login</a>
      </p>
    </form>
  </div>
</body>
</html>
