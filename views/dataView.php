<?php

require_once '../config/connection.php';
require_once '../model/User.php';

$user = new User($conn);
$users = $user->getAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../assets/image/icons8-users-48.png" />
  <link rel="stylesheet" href="../assets/css/table.css">

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>List of Users</title>
</head>

<body>
  <header>
    <p>List of Users</p>

    <div class="search">
      <input type="text" id="searchInput" placeholder="Search by name" onkeyup="searchTable()" />

      <div class="image">
        <img src="../assets/image/profile.png" alt="" />
      </div>
    </div>
  </header>

  <main>

    <div class="wrapper">
      <div class="head">
        <div class="total-con">
          <p>Total Users <span><?php echo count($users); ?></span></p>
        </div>
        <div class="container">
          <button class="filter-btn">
            Sort <span id="sortLabel">A-Z</span> <i class="bx bx-filter"></i>
          </button>

          <button class="add-btn" onclick="window.location.href='../return.php'">Add New <i class="bx bx-message-square-add"></i></button>
          <button type="submit" class="view-trash" onclick="window.location.href='archiveView.php'">Recently Deleted</i></button>
        </div>
      </div>

      <div class="table-con">
        <table id="userTable">
          <tr>
            <th>ID</th>
            <th class="sortable" id="nameColumn">Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>Action</th>
          </tr>

          <?php
          if (empty($users)):
          ?>
            <tr>
              <td colspan="6" class="nodata">
                <p>No data available at the moment.</p>
              </td>
            </tr>
            <?php
          else:
            foreach ($users as $data):
            ?>
              <tr>
                <td><?php echo $data['user_id']; ?></td>
                <td class="user-name"><?php echo $data['firstname'] . ' ' . $data['lastname']; ?></td>
                <td><?php echo $data['age']; ?></td>
                <td><?php echo $data['sex']; ?></td>
                <td><?php echo $data['nationality']; ?></td>
                <td class="actions">
                  <button class="find" onclick="window.location.href='../success.php?id=<?php echo $data['user_id']; ?>'"><i class="bx bx-file-find"></i></button>
                  <button class="edit" onclick="window.location.href='../views/updateView.php?id=<?php echo $data['user_id']; ?>'"><i class="bx bx-edit"></i></button>

                  <form method="POST" action="../routes/process.php" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <input type="hidden" name="archived_user" value="<?php echo $data['user_id']; ?>">
                    <button type="submit" class="delete"><i class="bx bx-trash"></i></button>
                  </form>

                </td>
              </tr>
          <?php
            endforeach;
          endif;
          ?>



        </table>
      </div>
    </div>
  </main>
  <script src="../assets/js/main.js"></script>
</body>

</html>