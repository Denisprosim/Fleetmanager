<?php
//-----------------------> GLOBAL PHP FUNCTIONS <----------------------

// Function that returns table based on parameter $table = table name
function GetTable($table){
    global $connection;
    global $query_run;

    $query = "SELECT * FROM $table";
    $query_run = mysqli_query($connection, $query);
    if (!$query_run) {
        die("Query selhalo");
    }
}

function getExpensesGroupedByMonth($argument) {
    global $connection;

    $amount_array = array();

    $query = "  SELECT SUM(price) AS total, month 
                FROM ( SELECT price, MONTH(date) AS month 
                FROM expense UNION ALL SELECT price, MONTH(datetime) AS month FROM fuel 
                UNION ALL 
                SELECT price, MONTH(date) AS month FROM service) AS output 
                GROUP BY month";
                
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $amount_array[] = $row[$argument];

    }
    echo json_encode($amount_array);   
}

function getTotalExpenses() {
    global $connection;

    $query = "SELECT SUM(price) AS total, month FROM ( SELECT price, MONTH(date) AS month FROM expense UNION ALL SELECT price, MONTH(datetime) AS month FROM fuel UNION ALL SELECT price, MONTH(date) AS month FROM service) AS output WHERE month = MONTH(NOW())";
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $amount = $row;
        return $amount['total'];
    }  
}

function getDueSoonCount() {
    global $connection;

    $query = "  SELECT COUNT(id) AS due_soon 
                FROM (  SELECT id 
                        FROM reminder_service WHERE CAST(DATE_ADD(date, INTERVAL -30 DAY) AS DATE) < CAST(NOW() AS DATE) AND CAST(NOW() AS DATE) < date
                        UNION ALL
                        SELECT id 
                        FROM reminder_renewal WHERE CAST(DATE_ADD(date, INTERVAL -30 DAY) AS DATE) < CAST(NOW() AS DATE) AND CAST(NOW() AS DATE) < date) 
                AS output";   
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {
        $row = mysqli_fetch_assoc($query_run);
        $due_soon = $row['due_soon'];
        echo "Blížící se: $due_soon";
    } else {
        echo "Žádné blížící se připomínky";
    }
}

function getExpiredCount() {
    global $connection;
    $query = "  SELECT COUNT(id) AS expired 
                FROM (  SELECT id 
                        FROM reminder_service WHERE CAST(NOW() AS DATE) >= date
                        UNION ALL
                        SELECT id 
                        FROM reminder_renewal WHERE CAST(NOW() AS DATE) >= date) 
                AS output";  
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {
        $row = mysqli_fetch_assoc($query_run);
        $expired = $row['expired'];
        echo "Vypršelý: $expired";
    } 
}

function getIssueCount() {
    global $connection;
    $datas = array();
    $i = 0;

    $query = "SELECT vehicles_name, COUNT(*) as count_opened FROM issue WHERE state = 'Otevřeno' GROUP BY vehicles_name ORDER BY count_opened DESC";  
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $datas[] = $row;      
    }

    foreach ($datas as $data) {
        if ($i++ == 3) {
            echo '<a href="issues.php">','...','</a>';
            break;
        }
        echo '<a href="issues.php">',$data['vehicles_name'],' - ',$data['count_opened'],'</a>','<br>';   
    }
}

function calcDistance($id) {
    global $connection;

    $query = "SELECT distance, current_distance FROM reminder_service WHERE id = $id";  
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $calculated_distance = intval($row['distance']) + intval($row['current_distance']);     
        return $calculated_distance;
    }
    
}

function calcDistanceLeft($vehicle,$id) {
    global $connection;
    $datas = array();
    $calculated_distance = calcDistance($id);
    $query = "SELECT distance FROM vehicle WHERE name = '$vehicle'";  
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $datas = $row;      
    }
    
    foreach ($datas as $data) {
        $distance_left = intval($calculated_distance) - intval($data);
        return $distance_left;
    }
}

function getCurrentDistance($vehicle) {
    global $connection;

    $query = "SELECT distance FROM vehicle WHERE name = '$vehicle'";
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $distance = $row;
        return $distance['distance'];
    } 
}

function getState($date) {
    $date1 = $date;
    $date2 = date("Y-m-d");
    $timestamp1 = strtotime($date1);
    $timestamp2 = strtotime($date2);
    $difference = $timestamp1 - $timestamp2;
    $diffindays = floor($difference / (24 * 60 * 60));
    if ($diffindays <= 30 && $diffindays >= 1) { 
        echo "<span class='bullet-warning'>&#8226;</span> Zbývá $diffindays dní";                                                  
    } elseif ($diffindays > 30) { 
        echo "<span class='bullet-success'>&#8226;</span> Zbývá $diffindays dní";
    } else { 
        echo "<span class='bullet-danger'>&#8226;</span> Zbývá $diffindays dní";
    }
}

function getStateWithDistance($vehicle,$id) {
    $distance_left = calcDistanceLeft($vehicle,$id);
    if ($distance_left < 1000 && $distance_left >= 1) { 
        echo "<span class='bullet-warning'>&#8226;</span> Zbývá $distance_left km";                                                  
    } elseif ($distance_left > 1000) { 
        echo "<span class='bullet-success'>&#8226;</span> Zbývá $distance_left km";
    } else { 
        echo "<span class='bullet-danger'>&#8226;</span> Zbývá $distance_left km";
    }
}

function getServiceGroupedByMonth($argument) {
    global $connection;
    $amount_array = array();

    $query = "SELECT SUM(price) AS total, MONTH(date) AS month FROM service GROUP BY MONTH(date)";
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $amount_array[] = $row[$argument];

    }
    echo json_encode($amount_array);   
}

function getAvgPriceGroupedByMonth($argument) {
    global $connection;
    $amount_array = array();

    $query = "  SELECT ROUND(AVG(price / amount),2) AS avg_price, MONTH(datetime) AS month 
                FROM fuel 
                GROUP BY MONTH(datetime)";
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $amount_array[] = $row[$argument];

    }
    echo json_encode($amount_array);   
}

function getFuelGroupedByMonth($argument) {
    global $connection;
    $amount_array = array();

    $query = "SELECT SUM(price) AS total, MONTH(datetime) AS month FROM fuel GROUP BY MONTH(datetime)";
    $query_run = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($query_run)) {
        $amount_array[] = $row[$argument];
    }
    echo json_encode($amount_array);   
}

function getVehicles() {
    global $connection;
    $vehicles = array();

    $query = "SELECT name FROM vehicle";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $vehicles[] = $row['name'];   
        }
    } else {
        echo "Nenalezena žádná vozidla";
    }
    
    foreach ($vehicles as $vehicle) {
        echo "<option value=$vehicle>$vehicle</option>";
    }
}

function getDrivers() {
    global $connection;
    $drivers = array();

    $query = "SELECT drivers_name FROM driver";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_num_rows($query_run)) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $drivers[] = $row['drivers_name'];   
        }
    } else {
        echo "Nenalezena žádná vozidla";
    }
    
    foreach ($drivers as $driver) {
        echo "<option value='$driver'>$driver</option>";
    }
}

?>