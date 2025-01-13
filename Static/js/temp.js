function myFunction(id) {
    $('#vehicleid').val(id);
    $('#staticBackdrop').modal('show');
}


$(document).ready(function () {
    var currentDate = new Date().toISOString().split("T")[0];
    $("#from").attr("min", currentDate);
    $("#too").attr("min", currentDate);

    $("#from").change(function () {
        $("#too").val('');
        var selectedDate = $(this).val();
        $("#too").attr("min", selectedDate);
    });


    $("#too").change(function () {
        var stardate = $("#from").val();
        var enddate = $(this).val();
        var vehicleid = $('#vehicleid').val();
        var type = $('#type').val();
        if (stardate == "") {
            error_alert
                ('Select starting date');
        } else {
            $.ajax({
                type: "GET",
                url: "../Action/customerAction.php",
                data: {
                    stardate: stardate,
                    enddate: enddate,
                    vehicleid: vehicleid,
                    type: type,
                    command: "checkAvailability"
                },
                timeout: 10000,
                success: function (data) {
                    console.log(data);
                    error_alert
                        (data);
                    if (data == "Available") {
                        $("#myButton").prop("disabled", false);

                    } else {
                        $("#myButton").prop("disabled", true);

                    }
                }
            });
        }
    });
});

function GetBookings(type) {
    if (type == "-1") {
        $("#myBookings").html("");
    } else {
        $.ajax({
            type: "GET",
            url: "./tempBookings.php",
            data: { Vehicle: type },
            timeout: 10000,
            success: function (response) {
                $("#myBookings").html(response);
            }
        });

    }
}
function GetMyBookings(type) {
    if (type == "-1") {
        $("#myBookings").html("");
    } else {
        $.ajax({
            type: "GET",
            url: "./customBookings.php",
            data: { Vehicle: type },
            timeout: 10000,
            success: function (response) {
                $("#myBookings").html(response);
            }
        });

    }
}
function GetMyOrders(type) {
    if (type == "-1") {
        $("#myBookings").html("");
    } else {
        $.ajax({
            type: "GET",
            url: "./CustomOrders.php",
            data: { Vehicle: type },
            timeout: 10000,
            success: function (response) {
                $("#myBookings").html(response);
            }
        });

    }
}

function Feedback(id, Type) {
    $('#vehicleid').val(id);
    $('#type').val(Type);
    $('#staticBackdrop').modal('show');

}

function Validation(temp) {
    if (temp == 'customer') {
        var licence = "custom";
    } else {
        var licence = $('#licence').val();
    }
    var name = $('#name').val();
    var age = $('#age').val();
    var email = $('#emali').val();
    var phoneNumber = $('#contact').val();
    var address = $('#address').val();
    var password = $('#password').val();
    var confirmPassword = $('#con_password').val();
    var emailPattern = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    var phoneNumberPattern = /^[0-9]{10}$/;

    if (name == "") {
        error_alert
            ('Name is required');
        return false;
    }
    if (age == "") {
        error_alert
            ('Age is required');
        return false;
    }
    if (!emailPattern.test(email)) {
        error_alert
            ("Invalid  Email id");
        return false;
    }
    if (!phoneNumberPattern.test(phoneNumber)) {
        error_alert
            ("Invalid Phone number");
        return false;
    }
    if (address == "") {
        error_alert
            ('Address is required');
        return false;
    }
    if (licence == "") {
        error_alert
            ('licence no is required');
        return false;
    }

    if (password == "") {
        error_alert
            ('password is required');
        return false;
    }
    if (password.length < 8) {
        error_alert
            ('Password must be at least 8 characters long');
        return false;
    }

    if (password !== confirmPassword) {
        error_alert
            ('Passwords do not match with confirm password');
        return false;
    }
    return true;

}

function error_alert
    (message) {
    Swal.fire({
        icon: "error",
        title: "Oops...",
        text: message,
    });
}
function success_alert
    (message) {
    Swal.fire({
        icon: "success",
        title: "Success",
        text: message,
    });
}