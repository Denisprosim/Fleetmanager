<?php

include('includes/db.php');


if (isset($_POST['filtertotal'])) {

    $vehicle_name = $_POST['filtertotal'];
    $amount_array = array();

    if ($vehicle_name == 'all') {
        $query = "  SELECT SUM(price) AS total, month 
                FROM (SELECT price, MONTH(date) AS month 
                FROM expense
                UNION ALL 
                SELECT price, MONTH(datetime) AS month 
                FROM fuel
                UNION ALL 
                SELECT price, MONTH(date) AS month 
                FROM service) 
                AS output               
                GROUP BY month";

        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    } else {
        $query = "  SELECT SUM(price) AS total, month 
                FROM (SELECT price, MONTH(date) AS month 
                FROM expense WHERE vehicles_name = '$vehicle_name'
                UNION ALL 
                SELECT price, MONTH(datetime) AS month 
                FROM fuel WHERE vehicles_name = '$vehicle_name'
                UNION ALL 
                SELECT price, MONTH(date) AS month 
                FROM service WHERE vehicles_name = '$vehicle_name') 
                AS output               
                GROUP BY month";

        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    }
}

if (isset($_POST['filterservice'])) {

    $vehicle_name = $_POST['filterservice'];
    $amount_array = array();

    if ($vehicle_name == 'all') {
        $query = "SELECT SUM(price) AS total, MONTH(date) AS month FROM service GROUP BY MONTH(date)";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    } else {
        $query = "SELECT SUM(price) AS total, MONTH(date) AS month FROM service where vehicles_name = '$vehicle_name' GROUP BY MONTH(date)";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    }
}

if (isset($_POST['filterfuel'])) {

    $vehicle_name = $_POST['filterfuel'];
    $amount_array = array();

    if ($vehicle_name == 'all') {
        $query = "SELECT SUM(price) AS total, MONTH(datetime) AS month FROM fuel GROUP BY MONTH(datetime)";
        $query_run = mysqli_query($connection, $query);
    
        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    } else {
        $query = "SELECT SUM(price) AS total, MONTH(datetime) AS month FROM fuel WHERE vehicles_name = '$vehicle_name' GROUP BY MONTH(datetime)";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
            $amount_array[] = $row;
        }
        echo json_encode($amount_array);
    }
}
