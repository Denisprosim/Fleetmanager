<?php
include('includes/header.php');
?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Přihlášení do systému</h1>
                                    </div>
                                    <form action="authenticate.php" class="login-form user" method="POST">
                                        <div class="input-group form-group">
                                            <span class="input-group-user"><i class="fas fa-user"></i></span>
                                            <input type="email" name="email" class="form-control form-control-user" id="userInputEmail" aria-describedby="emailHelp" placeholder="Vaše uživatelské jméno...">
                                        </div>
                                                                           
                                        <div class="input-group form-group">
                                            <span class="input-group-user"><i class="fas fa-lock"></i></span>
                                            <input type="password" name="password" class="form-control form-control-user" id="userInputPassword" placeholder="Heslo">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Přihlásit se</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <?php
    include('includes/scripts.php');
    ?>

</body>

</html>