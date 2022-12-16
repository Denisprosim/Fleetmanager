<?php
include('includes/session.php');
include('includes/db.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/global-func.php');
?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['email']?></span>
                        <i class="fas fa-user"></i>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Odhlásit
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800">Servisní historie</h1>

            <!-- Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Přidat</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="code.php" class="service-form" method="POST" id="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Vozidlo*</label>
                                    <select type="text" name="vehicles_name" class="form-control vehicle-picker">
                                        <option disabled selected>Vyberte...</option>
                                        <?php GetVehicles(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Datum*</label>
                                    <input type="date" max="<?php echo date("Y-m-d"); ?>" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nájezd</label>
                                    <input type="number" name="distance" class="form-control">
                                    <small class="distance-info"></small>
                                </div>
                                <div class="form-group">
                                    <label>Úkon</label>
                                    <input type="text" name="info" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Částka*</label>
                                    <input type="number" name="price" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Zrušit</button>
                                <button type="submit" name="addServiceBtn" class="btn btn-primary">Přidat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Přidat</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="code.php" class="service-form" method="POST" id="form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" id="service-id">
                                    <label>Vozidlo*</label>
                                    <select type="text" name="vehicles_name" id="vehicle-name" class="form-control vehicle-picker">
                                        <option disabled selected>Vyberte...</option>
                                        <?php GetVehicles(); ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Datum*</label>
                                    <input type="date" max="<?php echo date("Y-m-d"); ?>" id="service-date" name="date" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nájezd</label>
                                    <input type="number" name="distance" id="service-distance" class="form-control">
                                    <small class="distance-info"></small>
                                </div>
                                <div class="form-group">
                                    <label>Úkon</label>
                                    <input type="text" name="info" id="service-info" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Částka*</label>
                                    <input type="number" name="price" id="service-price" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Zrušit</button>
                                <button type="submit" name="editServiceBtn" class="btn btn-primary">Přidat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Odstranit</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="code.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id" id="id">
                                Opravdu chcete řádek odstranit?
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Zrušit</button>
                                <button type="submit" name="deleteServiceBtn" class="btn btn-primary">Odstranit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fas fa-fw fa-wrench"></i>
                </div>
                <div class="card-body">
                    <!-- Button trigger modal -->
                    <button type="button" class=" btn btn-primary" data-toggle="modal" data-target="#addServiceModal">
                        Přidat
                    </button>
                    <div class="table-responsive">
                        <?php GetTable("service"); ?>
                        <table class="table table-bordered row-border hover order-column" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="display:none;">id</th>
                                    <th>Vozidlo</th>
                                    <th>Datum</th>
                                    <th>Nájezd</th>
                                    <th>Úkon</th>
                                    <th>Částka CZK</th>
                                    <th>Operace</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (mysqli_num_rows($query_run)) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                        <tr>
                                            <td style="display:none;"><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['vehicles_name']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['distance']; ?></td>
                                            <td><?php echo $row['info']; ?></td>
                                            <td><?php echo $row['price']; ?></td>
                                            <td>
                                                <a class="dropdown-toggle btn btn-secondary " href="#" role="button" data-toggle="dropdown">
                                                    <span class="">Akce</span>
                                                </a>
                                                <div class="dropdown-menu shadow ">
                                                    <a class="btn dropdown-item edit-item">
                                                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Upravit
                                                    </a>
                                                    <a class="btn dropdown-item delete-item">
                                                        <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                        Odstranit
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                } else {  
                                    echo "Zde přidejte první záznam";                                 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>

<?php

include('includes/scripts.php');
include('includes/footer.php');

?>