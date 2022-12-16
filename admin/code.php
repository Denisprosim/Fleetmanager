<?php
    session_start();
    include('includes/db.php');

    // ADD for vehicles table
    if (isset($_POST['addbtn'])) {
        $vehicle = $_POST['vehicle'];
        $year = $_POST['year'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $vin = $_POST['vin'];
        $distance = $_POST['distance'];
        $spz = $_POST['spz'];

        $query = "INSERT INTO vehicle (name,year,brand,model,vin,distance,spz) 
        VALUES ('$vehicle','$year','$brand','$model','$vin','$distance','$spz')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicles.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicles.php');
        }
    }

    // DELETE for vehicles table
    if (isset($_POST['deleteVehicleBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM vehicle WHERE id = $id";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicles.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicles.php');
        }
    }

    // UPDATE for vehicles table
    if (isset($_POST['editVehicleBtn'])) {
        $id = $_POST['id'];
        $vehicle = $_POST['vehicle'];
        $year = $_POST['year'];
        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $vin = $_POST['vin'];
        $distance = $_POST['distance'];
        $spz = $_POST['spz'];

        $query = "UPDATE vehicle SET name = '$vehicle', year = '$year', brand = '$brand', model = '$model', vin = '$vin', distance = '$distance', spz = '$spz' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicles.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicles.php');
        }
    }

    // ADD for drivers table
    if (isset($_POST['addDriverBtn'])) {
        $name = $_POST['name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $query = "INSERT INTO driver (drivers_name,date,info,tel_number,email) 
        VALUES ('$name','$date','$info','$tel','$email')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: drivers.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: drivers.php');
        }
    }

    // DELETE for drivers table
    if (isset($_POST['deleteDriverBtn'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM driver WHERE id = $id";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: drivers.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: drivers.php');
        }
    }

    // UPDATE for drivers table
    if (isset($_POST['editDriverBtn'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];

        $query = "UPDATE driver SET drivers_name = '$name', date = '$date', info = '$info', tel_number = '$tel', email = '$email' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: drivers.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: drivers.php');
        }
    }

    // ADD for fuel table
    if (isset($_POST['addFuelBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $drivers_name = $_POST['drivers_name'];
        $datetime = $_POST['datetime'];
        $distance = $_POST['distance'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];


        $query = "  INSERT INTO fuel (vehicles_name,drivers_name,datetime,distance,amount,price) 
                    VALUES ('$vehicles_name','$drivers_name','$datetime','$distance','$amount','$price')";
        $query2 = " UPDATE vehicle
                    SET distance = IF ( distance < $distance, $distance, distance )
                    WHERE name = '$vehicles_name'";


        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: fuel-info.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: fuel-info.php');
        }
    }

    // DELETE for fuel table
    if (isset($_POST['deleteFuelBtn'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM fuel WHERE id = $id";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: fuel-info.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: fuel-info.php');
        }
    }

    // UPDATE for fuel table
    if (isset($_POST['editFuelBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $drivers_name = $_POST['drivers_name'];
        $datetime = $_POST['datetime'];
        $distance = $_POST['distance'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];

        $query = "UPDATE fuel SET vehicles_name = '$vehicles_name', drivers_name = '$drivers_name', datetime = '$datetime', distance = '$distance', amount = '$amount', price = '$price' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: fuel-info.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: fuel-info.php');
        }
    }

    // ADD for insurance table
    if (isset($_POST['addInsuranceBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $drivers_name = $_POST['drivers_name'];
        $datetime = $_POST['datetime'];
        $info = $_POST['info'];
        $attachment = $_POST['attachment'];

        $query = "INSERT INTO insurance (vehicles_name,drivers_name,datetime,info,attachment) VALUES ('$vehicles_name','$drivers_name','$datetime','$info','$attachment')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues-insurance.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues-insurance.php');
        }
    }

    // DELETE for insurance table
    if (isset($_POST['deleteInsuranceBtn'])) {
        $id = $_POST['id'];
        $query = "DELETE FROM insurance WHERE id = $id";
        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues-insurance.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues-insurance.php');
        }
    }

    // UPDATE for insurance table
    if (isset($_POST['editInsuranceBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $drivers_name = $_POST['drivers_name'];
        $datetime = $_POST['datetime'];
        $info = $_POST['info'];
        $attachment = $_POST['attachment'];

        $query = "UPDATE insurance SET vehicles_name = '$vehicles_name', drivers_name = '$drivers_name', datetime = '$datetime', info = '$info', attachment = '$attachment' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues-insurance.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues-insurance.php');
        }
    }

    // ADD for service table
    if (isset($_POST['addServiceBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $distance = $_POST['distance'];
        $price = $_POST['price'];

        $query = "INSERT INTO service (vehicles_name,date,distance,info,price) VALUES ('$vehicles_name','$date','$distance','$info','$price')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: service.php');
        }
    }

    // DELETE for service table
    if (isset($_POST['deleteServiceBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM service WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: service.php');
        }
    }

    // UPDATE for service table
    if (isset($_POST['editServiceBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $distance = $_POST['distance'];
        $price = $_POST['price'];

        $query = "UPDATE service SET vehicles_name = '$vehicles_name', date = '$date', info = '$info', distance = '$distance', price = '$price' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: service.php');
        }
    }

    // ADD for expense table
    if (isset($_POST['addExpenseBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $price = $_POST['price'];

        $query = "INSERT INTO expense (vehicles_name,date,type,info,price) VALUES ('$vehicles_name','$date','$type','$info','$price')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicle-expense.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicle-expense.php');
        }
    }

    // DELETE for expense table
    if (isset($_POST['deleteExpenseBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM expense WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicle-expense.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicle-expense.php');
        }
    }

    // UPDATE for expense table
    if (isset($_POST['editExpenseBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $price = $_POST['price'];

        $query = "UPDATE expense SET vehicles_name = '$vehicles_name', date = '$date', type = '$type', info = '$info', price = '$price' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: vehicle-expense.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: vehicle-expense.php');
        }
    }

    // ADD for issue table
    if (isset($_POST['addIssueBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $query = "INSERT INTO issue (vehicles_name,date,description,state) VALUES ('$vehicles_name','$date','$description','Otevřeno')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues.php');
        }
    }

    // UPDATE for issue table
    if (isset($_POST['editIssueBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        $query = "UPDATE issue SET vehicles_name = '$vehicles_name', date = '$date', description = '$description' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues.php');
        }
    }

    // DELETE for issue table
    if (isset($_POST['deleteIssueBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM issue WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: issues.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: issues.php');
        }
    }

    // ADD/UPDATE for service/issue table
    if (isset($_POST['addServiceFromIssueBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $distance = $_POST['distance'];
        $price = $_POST['price'];

        $query = "INSERT INTO service (vehicles_name,date,distance,info,price) VALUES ('$vehicles_name','$date','$distance','$info','$price')";
        $query2 = "UPDATE issue SET state = 'Uzavřeno' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: service.php');
        }
    }

    // ADD for reminder renewal table
    if (isset($_POST['addReminderBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $task = $_POST['task'];
        $date = $_POST['date'];
        $every_number = $_POST['every_number'];
        $every_interval = $_POST['every_interval'];

        $query = "INSERT INTO reminder_renewal (vehicles_name,task,date,every_number,every_interval) VALUES ('$vehicles_name','$task','$date','$every_number','$every_interval')";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders.php');
        }
    }

    // ADD for expense from reminder renewal table
    if (isset($_POST['addRExpenseBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $type = $_POST['type'];
        $info = $_POST['info'];
        $price = $_POST['price'];
        $id = $_POST['id'];
        $planned_date = $_POST['planned_date'];

        $query = "INSERT INTO expense (vehicles_name,date,type,info,price) VALUES ('$vehicles_name','$date','$type','$info','$price')";
        $query2 = "UPDATE reminder_renewal SET date = '$planned_date' WHERE id = '$id'";

        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders.php');
        }
    }

    // DELETE for reminder renewal table
    if (isset($_POST['deleteReminderBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM reminder_renewal WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders.php');
        }
    }

    // UPDATE for reminder renewal table
    if (isset($_POST['editReminderBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $task = $_POST['task'];
        $date = $_POST['date'];
        $every_number = $_POST['every_number'];
        $every_interval = $_POST['every_interval'];

        $query = "UPDATE reminder_renewal SET vehicles_name = '$vehicles_name', task = '$task', date = '$date', every_number = '$every_number', every_interval = '$every_interval' WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders.php');
        }
    }

    // ADD for Reminder_service table
    if (isset($_POST['addReminderSBtn'])) {
        $vehicles_name = $_POST['vehicles_name'];
        $task = $_POST['task'];
        $distance = $_POST['distance'];
        $date = $_POST['date'];
        $every_number = $_POST['every_number'];
        $every_interval = $_POST['every_interval'];

        $query = "INSERT INTO reminder_service (vehicles_name,task,distance,current_distance,date,every_number,every_interval) 
        SELECT '$vehicles_name','$task','$distance',distance,'$date','$every_number','$every_interval' 
        FROM vehicle 
        WHERE name = '$vehicles_name'";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders-service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders-service.php');
        }
    }

    // DELETE for Reminder_service table
    if (isset($_POST['deleteRSBtn'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM reminder_service WHERE id = $id";

        $query_run = mysqli_query($connection, $query);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: reminders-service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: reminders-service.php');
        }
    }

    // ADD+DELETE method for Reminder_service table
    if (isset($_POST['addServiceFromReminderBtn'])) {
        $id = $_POST['id'];
        $vehicles_name = $_POST['vehicles_name'];
        $date = $_POST['date'];
        $info = $_POST['info'];
        $distance = $_POST['distance'];
        $price = $_POST['price'];
        $planned_distance = $_POST['planned_distance'];
        $planned_date = $_POST['planned_date'];

        $query = "INSERT INTO service (vehicles_name,date,distance,info,price) VALUES ('$vehicles_name','$date','$distance','$info','$price')";
        $query2 = "UPDATE reminder_service SET current_distance = '$distance', distance = '$planned_distance', date = '$planned_date'  WHERE id = '$id'";

        $query_run = mysqli_query($connection, $query);
        $query_run2 = mysqli_query($connection, $query2);

        if ($query_run) {
            $_SESSION['success'] = "Added";
            header('Location: service.php');
        } else {
            $_SESSION['status'] = "Not added";
            header('Location: service.php');
        }
    }

    if (isset($_POST['suggestion'])) {

        $vehicle_name = $_POST['suggestion'];

        $query = "SELECT distance FROM vehicle WHERE name = '$vehicle_name'";
        $query_run = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($query_run)) {
        $distance = $row;
        echo "Dosavadní nájezd: ",$distance['distance']," km";
        } 
    }

    if (isset($_POST['vehicle'])) {

        $vehicle_name = $_POST['vehicle'];

        $query = "SELECT name FROM vehicle WHERE name = '$vehicle_name'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run)) {
            echo "false";
        } else {
            echo "true";           
        }
    }
?>