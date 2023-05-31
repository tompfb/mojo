<?php
function fetchData($conn)
{

    $sql = "SELECT * FROM videos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    } else {
        return $row = [];
    }
}
