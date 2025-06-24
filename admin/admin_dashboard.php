<?php 
session_start();
if(isset($_SESSION['user_id'])){
  if($_SESSION['user_type'] == "admin"){

  }if($_SESSION['user_type'] == "user"){

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

    .main-content h3 {
      margin-bottom: 15px;
      color: #34495e;
    }

    form {
      margin-bottom: 40px;
    }

    form label {
      display: block;
      margin: 10px 0 5px;
    }

    form input {
      width: 100%;
      padding: 8px;
      border: 1px solid #bdc3c7;
      border-radius: 4px;
    }

    form button {
      margin-top: 15px;
      padding: 10px 20px;
      background: #2980b9;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    form button:hover {
      background: #1f6391;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background: #bdc3c7;
    }

    th,
    td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #bdc3c7;
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
      <section id="add">
        <h3>Add Menu Item</h3>
        <form>
          <label for="item-name">Name</label>
          <input type="text" id="item-name" name="item-name" placeholder="e.g. Caesar Salad" required>

          <label for="item-price">Price</label>
          <input type="number" step="0.01" id="item-price" name="item-price" placeholder="e.g. 9.99" required>

          <button type="submit">Add Item</button>
        </form>
    </main>
  </div>
</body>

</html>