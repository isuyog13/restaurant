<?php
session_start();
include "../db.php";
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_type'] == "admin")
  {
    $sql = "SELECT 
                users.id,
                users.name,
                users.email,
                users.address,
                users.phone,
                menu_items.id,
                menu_items.image,
                menu_items.name,
                menu_items.price,
                menu_items.category,
                orders.id,
                orders.status 
                FROM orders 
                JOIN users ON orders.customer_id = users.id
                JOIN menu_items ON orders.item_id = menu_items.id;
    " ;
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo "Error!:{$conn->error}";
    }else{

    }
  } if($_SESSION['user_type'] == "user"){
    header("Location: ../user_dashboard.php");
  } 
}else{
  header("Location: ../login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body,
    html {
      height: 100%;
      font-family: Arial, sans-serif;
    }

    .dashboard {
      display: flex;
      height: 100vh;
    }

    .sidebar {
      width: 220px;
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 20px;
    }

    .sidebar h2 {
      margin-bottom: 30px;
    }

    .sidebar ul {
      list-style: none;
    }

    .sidebar li {
      margin-bottom: 20px;
    }

    .sidebar a {
      color: inherit;
      text-decoration: none;
    }

    .sidebar .logout a {
      color: #e74c3c;
    }

    .main-content { 
      flex: 1;
      padding: 30px;
      background: #ecf0f1;
      overflow-y: auto;
    }
    table {
      overflow-x:auto;
      margin: 20px auto;
      border-collapse: collapse;
      font-family: Arial, sans-serif;
    }

    th, td {
      border: 1px solid #ddd;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    img {
      width: 120px;
      height: 100px;
    }
    
      

    
  </style>
</head>

<body>
  <div class="dashboard">
    <aside class="sidebar">
      <h2>Admin Panel</h2>
      <ul>
        <li><a href="add_items.php">Add Menu Item</a></li>
        <li><a href="view_items.php">View Menu Items</a></li>
        <li><a href="view_order_items.php">View Orders</a></li>

        <li class="logout"><a href="../logout.php">Logout</a></li>
      </ul>
    </aside>
    <main class="main-content">
      <table>
        

    <thead>
      <tr>
        <th>customer id</th>
        <th>customer name</th>
        <th>customer email</th>
        <th>customer address</th>
        <th>customer phone</th>
        <th>ID</th>
        <th>Item Image</th>
        <th>Item Name</th>
        <th>Item Price</th> 
        <th>Item Category</th>
        <th>order id</th>
        <th>order status</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        while($row = mysqli_fetch_assoc($result)){ 
        ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><img src="../image/<?php echo $row['image']; ?>" alt=""></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['price']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['status']; ?></td>
        <td>
            <form class="" action="update_item_status.php" method="post">
                <input type="text" name="order_id" value="<?php echo $row['id']; ?>" hidden>
                <select style="color: white; background-color: #4CAF50; padding:10px;"name="" id="status">
                    <option value="pending">pending</option>
                    <option value="delivered">delivered</option>
                </select>
                <input style="color: white; background-color: #4CAF50; padding:10px;" type="submit" name="submit" value="submit">
            </form>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>


    </main>
  </div>
</body>

</html>