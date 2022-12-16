<?php
include('includes/session.php');
include('includes/header.php');
include('includes/navbar.php');
include('includes/db.php');
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
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $_SESSION['email'] ?></span>
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Výnosy (měsíční)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        0 Kč
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-plus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Costs (Monthly) -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Náklady (měsíční)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php echo getTotalExpenses(), " Kč" ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-minus fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Reminder card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Připomínky</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">                                        
                                            <?php getDueSoonCount(); ?>
                                            <br>                                            
                                            <?php getExpiredCount(); ?>                                        
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Problem card -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Technické problémy</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php getIssueCount();?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-exclamation fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <!-- Total Expense Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="top-right">
                                <select class="form-control" id="filter-expense">
                                    <option value="all">Zobrazit vše</option>
                                    <?php getVehicles(); ?>
                                </select>
                            </div>
                            <h6 class="m-0 font-weight-bold text-primary">Celkové náklady</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="expense-bar-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <!-- Service Expense Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="top-right">
                                <select class="form-control" id="filter-service">
                                    <option value="all">Zobrazit vše</option>
                                    <?php getVehicles(); ?>
                                </select>
                            </div>
                            <h6 class="m-0 font-weight-bold text-primary">Servisní náklady</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="service-bar-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <!-- Fuel Expense Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="top-right">
                                <select class="form-control" id="filter-fuel">
                                    <option value="all">Zobrazit vše</option>
                                    <?php getVehicles(); ?>
                                </select>
                            </div>
                            <h6 class="m-0 font-weight-bold text-primary">Tankovací náklady</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="fuel-bar-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-7 col-lg-7">
                    <!-- Consumption Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Průměrná cena za litr nafty</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-5 col-lg-5">
                    <!-- Revenue Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Výnosy</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-bar">
                                <canvas id="revenue-bar-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>

<?php
include('includes/scripts-charts.php');
include('includes/footer.php');
?>

<script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    function number_format(number, decimals, dec_point, thousands_sep) {
        // *     example: number_format(1234.56, 2, ',', ' ');
        // *     return: '1 234,56'
        number = (number + '').replace(',', '').replace(' ', '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }

    // Bar Chart Revenue
    var revenue = document.getElementById("revenue-bar-chart");
    var revenueBarChart = new Chart(revenue, {
        type: 'bar',
        data: {
            labels: ["Leden", "Únor", "Březen", "Duben", "Květen", "Červen"],
            datasets: [{
                label: "Výnos",
                backgroundColor: "#1cc88a",
                hoverBackgroundColor: "#04db8e",
                borderColor: "#4e73df",
                data: [42150, 53120, 62510, 78410, 98210, 149840],
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },

            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + 'Kč';
                    }
                }
            },
        }
    });

    // Bar Chart Total Expense
    var expense = document.getElementById("expense-bar-chart");
    var totalBarChart = new Chart(expense, {
        type: 'bar',
        data: {
            labels: <?php getExpensesGroupedByMonth('month') ?>,
            datasets: [{
                label: "Náklady",
                backgroundColor: "#e74a3b",
                hoverBackgroundColor: "#e31a07",
                borderColor: "#4e73df",
                data: <?php getExpensesGroupedByMonth('total') ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'měsíc'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value) + ' Kč';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + 'Kč';
                    }
                }
            },
        }
    });

    // Bar Chart Service
    var service = document.getElementById("service-bar-chart");
    var serviceBarChart = new Chart(service, {
        type: 'bar',
        data: {
            labels: <?php getServiceGroupedByMonth('month') ?>,
            datasets: [{
                label: "Náklady",
                backgroundColor: "#f2c930",
                hoverBackgroundColor: "#d1a70d",
                borderColor: "#4e73df",
                data: <?php getServiceGroupedByMonth('total') ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'měsíc'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value) + ' Kč';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + 'Kč';
                    }
                }
            },
        }
    });

    // Bar Chart Fuel
    var fuel = document.getElementById("fuel-bar-chart");
    var fuelBarChart = new Chart(fuel, {
        type: 'bar',
        data: {
            labels: <?php getFuelGroupedByMonth('month') ?>,
            datasets: [{
                label: "Náklady",
                backgroundColor: "#1b1a1c",
                hoverBackgroundColor: "#373538",
                borderColor: "#4e73df",
                data: <?php getFuelGroupedByMonth('total') ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'měsíc'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 6
                    },
                    maxBarThickness: 25,
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value) + ' Kč';
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ':' + number_format(tooltipItem.yLabel) + 'Kč';
                    }
                }
            },
        }
    });

    // Area Chart Price per liter
    var ctx = document.getElementById("myAreaChart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?php getAvgPriceGroupedByMonth('month') ?>,
            datasets: [{
                label: "Cena za litr nafty",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: <?php getAvgPriceGroupedByMonth('avg_price') ?>,
            }],
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'date'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 7
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10,
                        callback: function(value, index, values) {
                            return number_format(value) + " Kč";
                        }
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }],
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                    label: function(tooltipItem, chart) {
                        var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                        return datasetLabel + ': ' + number_format(tooltipItem.yLabel) + " Kč";
                    }
                }
            }
        }
    });

    // Filtrování celkových nákladu podle názvu vozidla
    $("#filter-expense").on('change', function() {
        $selected = this.value;
        // AJAX požadavek
        $.post('filter-graph.php', {
            filtertotal: $selected
        }, function(data) {
            // Vrácená data převedena na objekt
            var obj = $.parseJSON(data)
            var months = [];
            var values = [];
            // Rozdělení každého objektu na dvě pole
            for (var i = 0, len = obj.length; i < len; i++) {
                months.push(obj[i].month);
                values.push(obj[i].total); 
            }
            // Vložení polí do grafu
            totalBarChart.data.labels = months;
            totalBarChart.data.datasets[0].data = values;
            // Vykreslení grafu
            totalBarChart.update();
        });
    });

    // Return service expense based on selected vehicle
    $("#filter-service").on('change', function() {
        $selected = this.value;
        $.post('filter-graph.php', {
            filterservice: $selected
        }, function(data) {
            var obj = $.parseJSON(data)
            var months = [];
            var values = [];
            for (var i = 0, len = obj.length; i < len; i++) {
                months.push(obj[i].month);
                values.push(obj[i].total); 
            }
            serviceBarChart.data.labels = months;
            serviceBarChart.data.datasets[0].data = values;
            serviceBarChart.update();
        });
    });

    // Return service expense based on selected vehicle
    $("#filter-fuel").on('change', function() {
        $selected = this.value;
        $.post('filter-graph.php', {
            filterfuel: $selected
        }, function(data) {
            var obj = $.parseJSON(data)
            var months = [];
            var values = [];
            for (var i = 0, len = obj.length; i < len; i++) {
                months.push(obj[i].month);
                values.push(obj[i].total); 
            }
            fuelBarChart.data.labels = months;
            fuelBarChart.data.datasets[0].data = values;
            fuelBarChart.update();
        });
    });
</script>