<?php

require_once '../config/connection.php';
require_once '../model/User.php';

$user = new User($conn);
$users = $user->getAllArchived(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="../assets/image/icons8-users-48.png" />
  <link rel="stylesheet" href="../assets/css/table.css" />

  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Recently Deleted</title>
</head>

<body>
  <header>
    <div class="return-to-view">
      <button onclick="window.location.href='../views/dataView.php'"><i class='bx bx-chevron-left'></i></button>
      <p>List of Deleted Users</p>
    </div>


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
        <div class="total-con-del">
          <p>
            Total Users <span><?php echo count($users); ?></span>
          </p>
        </div>
        <div class="container">
          <button class="filter-btn">Sort <span id="sortLabel">A-Z</span> <i class="bx bx-filter"></i></button>

          <form method="POST" action="../routes/process.php" onsubmit="return confirm(' Are you sure you want to delete all these users?');">
            <input type="hidden" name="delete_all" value="<?php echo $data['user_id']; ?>">
            <button type="submit" class="empty-btn">Empty Trash</button>
          </form>
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

                  <form action="../routes/process.php" method="POST" onsubmit="return confirm(' Are you sure you want to restore this user?');">
                    <input type="hidden" name="restore_user" value="<?php echo $data['user_id']; ?>">
                    <button type="submit" class="restore"><i class='bx bx-revision'></i></button>
                  </form>

                  <form method="POST" action="../routes/process.php" onsubmit="return confirm(' Are you sure you want to delete this user?');">
                    <input type="hidden" name="delete_user" value="<?php echo $data['user_id']; ?>">
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