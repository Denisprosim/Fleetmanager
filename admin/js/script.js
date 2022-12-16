(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };

    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });



})(jQuery); // End of use strict

$(document).ready(function () {

  // Otevření modálu
  $('.edit-item').on('click', function () {
    $('#editModal').modal('show');
    // Uložení indexu záznamu, který upravujeme
    $tr = $(this).closest('tr');
    // Vytažení dat z tabulky pomocí indexu
    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();
    // Získání adresy, ve které se uživatel nachází
    var pathname = $(location).attr('pathname');;
    /* Vyhledávání příslušného modálu, podle toho,
       kde se nachází uživatel */
    if (pathname == "/admin/issues.php") {
      $('#issue-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#issue-date').val(data[2]);
      $('#issue-description').val(data[3]);
    }
    if (pathname == "/admin/vehicles.php") {
      $('#vehicle-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#vehicle-year').val(data[2]);
      $('#vehicle-brand').val(data[3]);
      $('#vehicle-model').val(data[4]);
      $('#vehicle-vin').val(data[5]);
      $('#vehicle-distance').val(data[6]);
      $('#vehicle-spz').val(data[7]);
    }
    if (pathname == "/admin/vehicle-expense.php") {
      $('#vehicle-exp-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#expense-date').val(data[2]);
      $('#expense-type').val(data[3]);
      $('#expense-info').val(data[4]);
      $('#expense-price').val(data[5]);
    }
    if (pathname == "/admin/fuel-info.php") {
      $('#fuel-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#driver-name').val(data[2]);
      var dtX = new Date(data[3]);
      dtX.setMinutes(dtX.getMinutes() - dtX.getTimezoneOffset());
      var dt = dtX.toISOString().slice(0,16);
      $('#fuel-datetime').val(dt);
      $('#fuel-distance').val(data[4]);
      $('#fuel-amount').val(data[5]);
      $('#fuel-price').val(data[6]);
    }
    if (pathname == "/admin/service.php") {
      $('#service-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#service-date').val(data[2]);
      $('#service-distance').val(data[3]);
      $('#service-info').val(data[4]);
      $('#service-price').val(data[5]);
    }
    if (pathname == "/admin/issues-insurance.php") {
      $('#insurance-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#driver-name').val(data[2]);
      var dtX = new Date(data[3]);
      dtX.setMinutes(dtX.getMinutes() - dtX.getTimezoneOffset());
      var dt = dtX.toISOString().slice(0,16);
      $('#insurance-datetime').val(dt);
      $('#insurance-info').val(data[4]);
    }
    if (pathname == "/admin/drivers.php") {
      $('#driver-id').val(data[0]);
      $('#driver-name').val(data[1]);
      $('#driver-date').val(data[2]);
      $('#driver-info').val(data[3]);
      $('#driver-tel').val(data[4]);
      $('#driver-email').val(data[5]);
    }
    if (pathname == "/admin/reminders.php") {
      $('#reminder-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#reminder-task').val(data[2]);
      $('#reminder-date').val(data[3]);
      $('#reminder-evnum').val(data[4]);
      $('#reminder-inte').val(data[5]);
    }
    if (pathname == "/admin/reminders-service.php") {
      $('#reminder-s-id').val(data[0]);
      $('#vehicle-name').val(data[1]);
      $('#reminder-task').val(data[2]);
      $('#reminder-date').val(data[7]);
      $('#reminder-evnum').val(data[4]);
      $('#reminder-inte').val(data[5]);
      $('#reminder-s-distance').val(data[3]);
    }
  });

  // Open delete modal <- UNIVERSAL
  $('.delete-item').on('click', function () {
    $('#deleteModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();

    console.log(data);

    $('#id').val(data[0]);

  });

  // Open service modal from issues
  $('.add-service').on('click', function () {
    $('#addServiceModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();

    console.log(data);

    $('#id_service').val(data[0]);
    $('#vehicles_name').val(data[1]);
    $('#date').val(data[2]);
    $('#info').val(data[3]);

  });

  // Open service modal from reminder-service
  $('.add-service-from-reminder').on('click', function () {
    $('#addServiceModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();

    console.log(data);

    $('#id_service').val(data[0]);
    $('#vehicles_name').val(data[1]);
    $('#info').val(data[2]);
    $('#planned_distance').val(data[3]);

    var myDate = new Date(data[7]);

    if (data[5] == "days") {
      var plannedDate = new Date(myDate.setDay(myDate.getDay() + parseInt(data[4])));
    } else if (data[5] == "months") {
      var plannedDate = new Date(myDate.setMonth(myDate.getMonth() + parseInt(data[4])));
    } else {
      var plannedDate = new Date(myDate.setFullYear(myDate.getFullYear() + parseInt(data[4])));
    }

    $('#planned_date').val(plannedDate.toISOString().split('T')[0]);

  });

  // Open expense modal
  $('.add-expense').on('click', function () {
    $('#addExpenseModal').modal('show');

    $tr = $(this).closest('tr');

    var data = $tr.children("td").map(function () {
      return $(this).text();
    }).get();

    console.log(data);

    $('#id_reminder').val(data[0]);
    $('#reminder_vehicle').val(data[1]);
    $('#task').val(data[2]);
    var myDate = new Date(data[3]);


    if (data[5] == "days") {
      var plannedDate = new Date(myDate.setDay(myDate.getDay() + parseInt(data[4])));
    } else if (data[5] == "months") {
      var plannedDate = new Date(myDate.setMonth(myDate.getMonth() + parseInt(data[4])));
    } else {
      var plannedDate = new Date(myDate.setFullYear(myDate.getFullYear() + parseInt(data[4])));
    }

    $('#planned_date').val(plannedDate.toISOString().split('T')[0]);

  });

  // Return current distance based on selected vehicle
  $(".vehicle-picker").on('change', function () {
    $selected = this.value;
    $.post('code.php', {
      suggestion: $selected
    }, function (data) {
      $('.distance-info').text(data);
    });
  });

  

});

// Set the datetime input max attribute to date()
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1;
var yyyy = today.getFullYear();
var hh = today.getHours();
var m = today.getMinutes();

today_max = `${yyyy}-${mm}-${dd}T${hh}:${m}`;
$('.datefield').attr('max', today_max);