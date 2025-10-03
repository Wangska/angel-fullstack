<?php
require '../config/connection.php';
require '../controller/UserController.php';

$userController = new UserController($conn);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['delete_user'])) {
        $user_id = $_POST['delete_user'];
        $userController->deleteUser($user_id);
    } elseif (isset($_POST['delete_all'])) {
        $user_id = $_POST['delete_all'];
        $userController->deleteAll($user_id);
    } elseif (isset($_POST['archived_user'])) {
        $user_id = $_POST['archived_user'];
        $userController->delete($user_id);
    } elseif (isset($_POST['restore_user'])) {
        $user_id = $_POST['restore_user'];
        $userController->restoreUser($user_id);
    } elseif (isset($_POST['update_user'])) {
        $userController->updateUser($_POST['update_user'], $_POST);
    } else {
        $userController->insertUser();
    }
} else {
    echo "Invalid request.";
}
