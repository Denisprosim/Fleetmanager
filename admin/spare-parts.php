<?php
include('includes/session.php');
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
            <h1 class="h3 mb-4 text-gray-800">Náhradní díly</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <i class="fas fa-fw fa-wrench"></i>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered row-border hover order-column" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Název dílu</th>
                                    <th>Datum</th>                                 
                                    <th>Info</th>                                  
                                    <th>Částka CZK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Brzdové obložení FERODO</td>
                                    <td>08/02/2021</td>
                                    <td><a href="https://www.autokelly.cz/Product/FE-K19071-0-F2020/2537526">www.autokelly.cz</a></td>
                                    <td>15000</td>
                                </tr>
                                <tr>
                                    <td>STARLINE DIAMOND 5W-40 - 5 l</td>
                                    <td>13/09/2022</td>
                                    <td><a href="https://www.autokelly.cz/Product/NA-D-5/104444">www.autokelly.cz</a></td>
                                    <td>430</td>
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