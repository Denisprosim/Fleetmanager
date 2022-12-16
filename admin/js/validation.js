$().ready(function () {
    var $fuelForm = $(".fuel-form");
    var $driverForm = $(".driver-form");
    var $vehicleForm = $(".vehicle-form");
    var $expenseForm = $(".expense-form");
    var $serviceForm = $(".service-form");
    var $insuranceForm = $(".insurance-form");
    var $issuesForm = $(".issues-form");
    var $reminderRenewalForm = $(".reminders-form");
    var $reminderServiceForm = $(".reminders-service-form");
    var $loginForm = $(".login-form");

    $loginForm.validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 40
            },
            password: {
                required: true,
                maxlength: 100
            },            
        },
        messages: {
            email: {
                required: "Vyplňte email",
                email: "Zadaný email není platný",
                maxlength: 15
            },
            password: {
                required: "Vyplňte heslo",
                maxlength: "Maximální délka je 100 znaků"
            },
        }
    });

    $fuelForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                },
                drivers_name: {
                    required: true,
                },
                datetime: {
                    required: true,

                },
                distance: {
                    required: true,
                },
                amount: {
                    required: true,
                },
                price: {
                    required: true,
                }
            },
            messages: {
                vehicles_name: {
                    required: 'Prosím vyplňte název vozidla'
                },
                drivers_name: {
                    required: 'Prosím vyplňte jméno řidiče'
                },
                datetime: {
                    required: 'Prosím vyplňte datum tankování',
                },
                distance: {
                    required: 'Prosím vyplňte nájezd',
                },
                amount: {
                    required: 'Prosím vyplňte počet natankovaných litrů',
                },
                price: {
                    required: 'Prosím vyplňte zaplacenou částku',
                }
            }
        });
    });

    $driverForm.each(function () {
        $(this).validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                    dateISO: true
                },
                info: {
                    maxlength: 30
                },
                tel: {
                    rangelength: [9, 12]
                },
                email: {
                    email: true,
                }
            },
            messages: {
                name: {
                    required: "Vyplňte jméno řídiče",
                },
                date: {
                    required: "Vyplňte datum ve formátu YYYY-mm-dd",
                },
                info: {
                    maxlength: "Příliš mnoho znaků"
                },
                tel: {
                    rangelength: "Telefonní číslo může mít minimálně 9 a maximalně 12 znaků",
                },
                email: {
                    email: "Vyplňte platný email",
                }
            }
        });
    });

    $vehicleForm.each(function () {
        $(this).validate({
            rules: {
                vehicle: {
                    required: true,
                    maxlength: 15,
                    remote: {
                        url: "/admin/code.php",
                        type: "POST"
                    }           
                },
                year: {
                    required: true,
                    range: [1900, 2100]
                },
                brand: {
                    required: true,
                    maxlength: 10
                },
                model: {
                    maxlength: 15
                },
                vin: {
                    rangelength: [17, 17]
                },
                distance: {
                    maxlength: 8
                },
                spz: {
                    maxlength: 7
                }
            },
            messages: {
                vehicle: {
                    required: "Vyplňte název vozidla",
                    maxlength: "Příliš dlouhý název",
                    remote: "Název existuje",
                },
                brand: {
                    required: "Vyplňte název značky",
                },
                year: {
                    required: "Vyplňte rok výroby",
                    range: "Neplatný rok výroby"
                },
                distance: {
                    maxlength: 8
                },
                model: {
                    maxlength: "Maximální délka modelu vozidla je 15 znaků"
                },
                vin: {
                    rangelength: "Zadejte platné VIN"
                },
                distance: {
                    maxlength: "Maximalní délka nájezdu je 8 znaků"
                },
                spz: {
                    maxlength: "Maximální délka SPZ je 7 znaků"
                }
            }
        });
    });

    $expenseForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                    dateISO: true
                },
                type: {
                    required: true,
                    maxlength: 20
                },
                info: {
                    maxlength: 30
                },
                price: {
                    maxlength: 9
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                date: {
                    required: "Vyplňte datum",
                    dateISO: "Vyplňte rok ve formátu YYYY-mm-dd"
                },
                type: {
                    required: "Vyplňte typ nákladu",
                    maxlength: "Maximální délka je 20 znaků"
                },
                info: {
                    maxlength: "Maximální délka je 30 znaků"
                },
                price: {
                    maxlength: "Maximální délka je 9 znaků"
                }
            }
        });
    });

    $serviceForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                    dateISO: true
                },
                distance: {
                    maxlength: 8
                },
                info: {
                    maxlength: 30
                },
                price: {
                    maxlength: 9
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                date: {
                    required: "Vyplňte datum",
                    dateISO: "Vyplňte rok ve formátu YYYY-mm-dd"
                },
                distance: {
                    maxlength: "Maximalní délka nájezdu je 8 znaků"
                },
                info: {
                    maxlength: "Maximální délka je 30 znaků"
                },
                price: {
                    maxlength: "Maximální délka je 9 znaků"
                }
            }
        });
    })

    $insuranceForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                drivers_name: {
                    required: true,
                    maxlength: 15
                },
                datetime: {
                    required: true,
                },
                distance: {
                    maxlength: 8
                },
                info: {
                    required: true,
                    maxlength: 30
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                drivers_name: {
                    required: "Vyplňte jméno řídiče",
                },
                datetime: {
                    required: "Vyplňte datum",
                },
                distance: {
                    maxlength: "Maximalní délka nájezdu je 8 znaků"
                },
                info: {
                    required: "Vyplňte základní info k pojistné údálosti",
                    maxlength: "Maximální délka je 30 znaků"
                }
            }
        });
    });

    $issuesForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                    dateISO: true
                },
                description: {
                    required: true,
                    maxlength: 30
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                date: {
                    required: "Vyplňte datum",
                },
                description: {
                    required: "Vyplňte základní info",
                    maxlength: "Maximální délka je 30 znaků"
                }
            }
        });
    });

    $reminderRenewalForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                task: {
                    required: true,
                    maxlength: 30
                },
                date: {
                    required: true,
                    dateISO: true
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                task: {
                    required: "Vyplňte základní info",
                    maxlength: "Maximální délka je 30 znaků"
                },
                date: {
                    required: "Vyplňte datum",
                }
            }
        });
    });

    $reminderServiceForm.each(function () {
        $(this).validate({
            rules: {
                vehicles_name: {
                    required: true,
                    maxlength: 15
                },
                date: {
                    required: true,
                    dateISO: true
                },
                task: {
                    required: true,
                    maxlength: 30
                }
            },
            messages: {
                vehicles_name: {
                    required: "Vyplňte název vozidla",
                    maxlength: 15
                },
                date: {
                    required: "Vyplňte datum",
                },
                task: {
                    required: "Vyplňte základní info",
                    maxlength: "Maximální délka je 30 znaků"
                }
            }
        });
    });
    

});