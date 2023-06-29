<?php
include("../connection.php");
if (isset($_POST['updateId'])) {
    $updateId = $_POST['updateId'];
    updateStatus($conn, $updateId);
}

function updateStatus($conn, $updateId)
{

    $getStatus = getStatus($conn, $updateId);
    if (!empty($getStatus)) {

        if ($getStatus['status'] == 1) {
            $sql = "UPDATE user SET status=0 , role_id=3 WHERE id=$updateId";

            if ($conn->query($sql) === TRUE) {
                echo 1;
            }
        } elseif ($getStatus['status'] == 0) {
            $sql = "UPDATE user SET status=1 , role_id=2 WHERE id=$updateId";

            if ($conn->query($sql) === TRUE) {
                echo 0;
            }
        }
    } else {
        echo "No data is exist in database";
    }
}

function getStatus($conn, $id)
{

    $query = "SELECT status FROM user WHERE id=$id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        $row = [];
    }
    return $row;
}
