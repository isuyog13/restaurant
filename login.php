<?php
include "db.php";
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "select * from users where email = '$email'" ;
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "error! {$conn->error}";
        }else{
            if($result->num_rows>0){
                $row = mysqli_fetch_assoc($result);
                if($row['password'] == $password){
                    session_start();
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['user_type'] = $row['type'];
                    if($_SESSION['user_id']){
                        if($_SESSION['user_type'] == "admin"){
                            header("Location: admin/admin_dashboard.php");
                        }if($_SESSION['user_type'] == "user"){
                          header("Location: user_dashboard.php");
                        }

                    }
                    
                }
                else{
                    echo "<h1>password is wrong</h1>";
                }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <style>
   /* Base setup */
body, html {
  margin: 0; padding: 0;
  width: 100%; height: 100%;
  font-family: Arial, sans-serif;
  background: #f3f3f3;
}

.login-container {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
}

.login-form {
  background: #fff;
  padding: 30px 40px;
  border-radius: 8px;
  box-shadow: 0 4px 20px rgba(0,0,0,0.1);
  width: 320px;
  box-sizing: border-box;
}

.login-form h2 {
  margin-bottom: 20px;
  color: #333;
  text-align: center;
}

.login-form label {
  display: block;
  margin-top: 15px;
  margin-bottom: 5px;
  color: #555;
  font-weight: bold;
}

.login-form input {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.login-form input:focus {
  border-color: #007BFF;
  outline: none;
}

.login-form button {
  margin-top: 20px;
  width: 100%;
  padding: 12px;
  border: none;
  background: #007BFF;
  color: white;
  font-size: 16px;
  border-radius: 4px;
  cursor: pointer;
}

.login-form button:hover {
  background: #0056b3;
}

/* Register link styling */
.register-link {
  margin-top: 15px;
  font-size: 14px;
  text-align: center;
}

.register-link a {
  color: #007BFF;
  text-decoration: none;
}

.register-link a:hover {
  text-decoration: underline;
}


    </style>
</head>
<body>
   <div class="login-container">
    <form class="login-form" action="login.php" method="post">
      <h2>Login</h2>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="you@example.com" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" placeholder="Enter your password" required>

      <button type="submit" name="submit">Login</button>

      <p class="register-link">
        Don't have an account? <a href="register.php">Register</a>
      </p>
    </form>
  </div>
</body>
</html>