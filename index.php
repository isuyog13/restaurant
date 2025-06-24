<?php
include "db.php";
session_start();
$sql = "select * from menu_items";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            echo "Error! {$conn->error}";
        }
        else{

        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Food Order Homepage</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background-color: #fefefe;
      color: #333;
    }

    /* Navbar */
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #007BFF;
      padding: 1rem 2rem;
      flex-wrap: wrap;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
      color: white;
    }

    .nav-links {
      display: flex;
      gap: 1rem;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      padding: 0.5rem 1rem;
      border-radius: 5px;
      transition: background 0.3s;
    }

    .nav-links a:hover {
      background: #007BFF;
    }

    /* Food Grid */
    .container {
      padding: 2rem;
    }

    .food-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 1.5rem;
    }

    .food-item {
      background-color: white;
      border: 1px solid #ddd;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      transition: transform 0.3s;
    }

    .food-item:hover {
      transform: translateY(-5px);
    }

    .food-item img {
      width: 100%;
      height: 180px;
      object-fit: cover;
    }

    .food-details {
      padding: 1rem;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .food-title {
      font-size: 1.2rem;
      margin-bottom: 0.5rem;
    }

    .food-price {
      font-size: 1rem;
      color: #555;
      margin-bottom: 1rem;
    }

    .buy-btn {
      padding: 0.5rem;
      background: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
      text-align:center;
    }

    .buy-btn:hover {
      background-color: #ff3d2e;
    }

    @media (max-width: 600px) {
      nav {
        flex-direction: column;
        align-items: flex-start;
      }

      .nav-links {
        flex-direction: column;
        width: 100%;
      }

      .nav-links a {
        width: 100%;
        padding-left: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav>
    <div class="logo">Suyog's Food Corner</div>
    <div class="nav-links">
        
      <a href="index.php">Home</a>
      <?php if(!isset($_SESSION['user_id'])){?>  
      <a href="login.php">Login</a>
      <a href="register.php">Registration</a>
      <?php } ?>

      <?php if(isset($_SESSION['user_id'])){?>
      <a href="user_dashboard.php">Dashboard</a>
       <?php } ?>
    </div>
  </nav>

  <!-- Food Items -->
  <div class="container">
    
    <div class="food-grid">
      <!-- Food Card 1 -->
       <?php while($row = mysqli_fetch_assoc($result)){?>
          <?php if(isset($_GET['added_message'])){ 
          $message = $_GET['added_message'];
          ?>
          <p><?php echo $message; ?></P>
        <?php } ?> 
      <div class="food-item">
       

         
        <img src="image/<?php echo $row['image']; ?>" alt="Burger">
        <div class="food-details">
          <div class="food-title"><?php echo $row['name']; ?></div>
          <div class="food-price"><?php echo $row['price']; ?></div>
          <?php if(isset($_SESSION['user_id'])){?>
          <a href="order_item.php?user_id=<?php echo $_SESSION['user_id']; ?>&menu_id=<?php echo $row['id'] ?>" class="buy-btn">Order Now</a>
          <?php } ?>
          <?php if(!isset($_SESSION['user_id'])){?>
          <a href="login.php" class="buy-btn">Order Now</a>
          <?php } ?>
        </div>
        
      </div>
   
<?php } ?>
    </div>
       
  </div>

</body>
</html>