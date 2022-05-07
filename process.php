<?php

include "config.php";

if (isset($_POST['showUsers'])) {
    $statement = $pdo->prepare("SELECT * FROM user");
    $result = $statement->execute();

    if ($statement->rowCount() > 0) {

        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

    ?>
    <tr>
        <td class="text-nowrap align-middle"><input type="checkbox" name="update_many[]" value="<?= $row['id'] ?>"></td>
        <td class="text-nowrap align-middle"><?= $row['name']; ?></td>
        <td class="text-nowrap align-middle"><?= $row['role']; ?></td>
        <td class="text-center align-middle">
            <?php if ($row['status'] == 1): ?>
                <i class="fa fa-circle active-circle"></i>
            <?php else: ?>
                <i class="fa fa-circle not-active-circle" style="color:grey"></i>
            <?php endif; ?>
        </td>
        <td class="text-center align-middle"><button class="btn btn-sm btn-outline-secondary badge" name="update" type="button"
                    onclick="getUserData(<?= $row['id']; ?>)" >Edit</button>
            &nbsp;<button class="btn btn-sm btn-outline-secondary badge" type="button"
                    onclick="deleteUser(<?= $row['id']; ?>)" ><i class="fa fa-trash"></i></button>
        </td>
    </tr>

    <?php
        }
    }
}

if (isset($_POST['updateid'])) {
    $updateid = $_POST['updateid'];

    $statement = $pdo->prepare("SELECT * FROM user WHERE id = $updateid");
    $result = $statement->execute();

    $response = [];


    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $response = $row;
    }

    echo json_encode($response);
} else {
    $response['status'] = 200;
    $response['message'] = 'ID is not found0';
}

if (isset($_POST['firstname'])) {
    $name = $_POST['firstname'] . ' ' . $_POST['lastname'];
    $user_id = $_POST['hiddendata'];
    $role = $_POST['role'];
    $status = '';

    if ($_POST['hidden_status'] == '') {
        $status = 0;
    } elseif ($_POST['hidden_status'] == 1) {
        $status = 1;
    } else {
        $status = 0;
    }

    if ($user_id == '') {
        $statement = $pdo->prepare("INSERT INTO `user`(name, role, status) VALUES ('$name','$role','$status')");
        $message = "Record created successfully.";
    } else {
        $statement = $pdo->prepare("UPDATE `user` SET `name`='$name',`role`='$role', `status` = '$status' WHERE `id`='$user_id'");
        $message = "Record updated successfully.";
    }
    $result = $statement->execute();

    if ($result) {
        $response = array('status' => true, 'message' => $message);
    } else {
        $response = array('status' => false, 'message' => 'Error');
    }

    echo json_encode($response);
    exit();
}

if (isset($_POST['deleteid'])) {
    $deleteid = $_POST['deleteid'];

    $statement = $pdo->prepare("DELETE FROM user WHERE id = $deleteid");
    $result = $statement->execute();
}

if (isset($_POST['select']) && !isset($_POST['update_many'])
    ||
    isset($_POST['select2']) && !isset($_POST['update_many'])) {
    $response = array('status' => false, 'message' => 'Choose at least one user');

    echo json_encode($response);
}

if (isset($_POST['update_many'])) {
    $idArray = $_POST['update_many'];
    $idExtract = implode(',', $idArray);

    if (isset($_POST['select']) && $_POST['select'] == 'set-active'
        ||
        isset($_POST['select2']) && $_POST['select2'] == 'set-active') {
        $statement = $pdo->prepare("UPDATE user SET status = 1 WHERE id IN ($idExtract)");
        $result = $statement->execute();
        if ($result) {
            $response = array('status' => true, 'message' => 'Record updated successfully.');
        } else {
            $response = array('status' => false, 'message' => 'Error');
        }

        echo json_encode($response);

    } elseif (isset($_POST['select']) && $_POST['select'] == 'set-not-active'
        ||
        isset($_POST['select2']) && $_POST['select2'] == 'set-not-active') {
        $statement = $pdo->prepare("UPDATE user SET status = 0 WHERE id IN ($idExtract)");
        $result = $statement->execute();
        if ($result) {
            $response = array('status' => true, 'message' => 'Record updated successfully.');
        } else {
            $response = array('status' => false, 'message' => 'Error');
        }

        echo json_encode($response);

    } elseif (isset($_POST['select']) && $_POST['select'] == 'delete'
        ||
        isset($_POST['select2']) && $_POST['select2'] == 'delete') {
        $statement = $pdo->prepare("DELETE FROM user WHERE id IN ($idExtract)");
        $result = $statement->execute();
        if ($result) {
            $response = array('status' => true, 'message' => 'Record deleted successfully.');
        } else {
            $response = array('status' => false, 'message' => 'Error');
        }

        echo json_encode($response);

    } elseif (isset($_POST['select']) && $_POST['select'] == 'select'
        ||
        isset($_POST['select2']) && $_POST['select2'] == 'select') {
        $response = array('status' => false, 'message' => 'Choose an action');

        echo json_encode($response);
    }
}