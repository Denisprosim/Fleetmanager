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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                        <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
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
            <h1 class="h3 mb-4 text-gray-800">Servisní programy</h1>

            <!-- Add Modal -->
            <div class="modal fade" id="addConfigModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Přidat</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="code.php" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <label>Název programu*</label>
                                    <input type="text" name="description" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <?php GetTable("vehicle"); ?>
                                    <label>Vozidla*</label>
                                    <select type="text" name="vehicles_name" class="form-control">
                                        <?php
                                        if (mysqli_num_rows($query_run)) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                                        <?php
                                            }
                                        } else {
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Úkon*</label>
                                    <input type="text" name="description" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Datum připomenutí*</label>
                                    <input type="date" name="date" class="form-control" min="<?php echo date("Y-m-d"); ?>" required>                                   
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Každý</span>
                                    <input type="number" name="date-interval" class="form-control" min="<?php echo date("Y-m-d"); ?>" required>
                                    <select type="text" name="vehicles_name" class="form-control">
                                        <option value="daily">Den</option>
                                        <option value="weekly">Týden</option>
                                        <option value="monthly">Měsíc</option>
                                        <option value="yearly">Rok</option>
                                    </select>
                                </div>
                                <div class="form-group">               
                                    <label>Kilometry*</label>
                                    <div class="input-group mb-3">
                                    <span class="input-group-text">Každých</span>
                                    <input type="number" name="description" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Zrušit</button>
                                <button type="submit" name="addIssueBtn" class="btn btn-primary">Přidat</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fas fa-fw fa-cog"></i>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addConfigModal">
                        Přidat
                    </button>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="configureTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Servisní program</th>
                                    <th>Vozidla</th>
                                    <th>Rozvrh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Iveco 2016</td>
                                    <td>
                                        <select name="vehicle">
                                            <option value="volvo">Volvo</option>
                                            <option value="saab">Saab</option>
                                            <option value="mercedes">Mercedes</option>
                                        </select>
                                    </td>
                                    <td>3</td>
                                </tr>
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