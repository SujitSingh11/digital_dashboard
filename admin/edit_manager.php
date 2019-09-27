<?php
    include '../assets/db/connect_db.php';
    session_start();

    $user_id = $_POST['user_id'];
    $m_id = $_POST['m_id'];

    if (isset($_POST['deactivate'])) {
        $sql_manager = "UPDATE `fl_user` SET `active`= 0 WHERE user_id = $user_id";
        $query_manager = mysqli_query($conn,$sql_manager);
        if ($query_manager) {
            $_SESSION['mess_type'] = 'warning';
    		$_SESSION['mess_title'] = 'Deactivated';
            $_SESSION['message'] = "You have deactivated manager account.";
            die(header('Location: admin_dashboard.php'));
        }
    }
    if (isset($_POST['approve'])) {
        $sql_manager = "UPDATE `fl_user` SET `active`= 1 WHERE user_id = $user_id";
        $query_manager = mysqli_query($conn,$sql_manager);
        if ($query_manager) {
            $_SESSION['mess_type'] = 'success';
    		$_SESSION['mess_title'] = 'Activated';
            $_SESSION['message'] = "You have activated manager account.";
            die(header('Location: admin_dashboard.php'));
        }
    }
    if (isset($_POST['remove'])) {
        $sql_user = "DELETE FROM `fl_user` WHERE user_id=$user_id";
        $sql_manager = "DELETE FROM `fl_manager` WHERE manager_id=$m_id";
        $query_user = mysqli_query($conn,$sql_manager);
        $query_manager = mysqli_query($conn,$sql_manager);
        if ($query_manager AND $query_user) {
            $_SESSION['mess_type'] = 'danger';
    		$_SESSION['mess_title'] = 'Deleated';
            $_SESSION['message'] = "You have deleated manager account.";
            die(header('Location: admin_dashboard.php'));
        }
    }
?>
