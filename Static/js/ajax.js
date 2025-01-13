
function UpdateCarStatus(id, flag) {
    Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Action/ownerAction.php",

                data: {
                    id: id,
                    flag: flag,
                    command: "updateCarStatus"
                },
                timeout: 10000,
                success: function () {
                    document.location.reload()
                }
            });

        } else if (result.isDenied) {
        }
    })

}
function UpdateBikeStatus(id, flag) {
    Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Action/ownerAction.php",

                data: {
                    id: id,
                    flag: flag,
                    command: "updateBikeStatus"
                },
                timeout: 10000,
                success: function () {
                    document.location.reload()
                }
            });

        } else if (result.isDenied) {
        }
    })

}


function BookingStatus(id, flag) {
    Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Action/ownerAction.php",

                data: {
                    id: id,
                    flag: flag,
                    command: "updateBookingStatus"
                },
                timeout: 10000,
                success: function () {
                    document.location.reload()
                }
            });

        } else if (result.isDenied) {
        }
    })
}
function MakePayment(id, flag) {
    Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "../Action/ownerAction.php",

                data: {
                    id: id,
                    flag: flag,
                    command: "updateBookingStatus"
                },
                timeout: 10000,
                success: function () {

                    // window.open("https://paytm.com/", "_blank");
                    window.open("../Customer/PaymentPage.php", "_blank");

                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Payement completed successfully.',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(function () {
                        document.location.reload()

                    });

                }
            });

        } else if (result.isDenied) {
        }
    })
}


function UpdateStatus(id, flag, command) {
    Swal.fire({
        title: 'Are you sure?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Yes',
        denyButtonText: 'No',
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
        
            $.ajax({
                type: "POST",
                url: "../Action/adminAction.php",

                data: {
                    id: id,
                    flag: flag,
                    command:command
                },
                timeout: 10000,
                success: function () {
                    document.location.reload()
                }
            });
        
        
        
        
        }
    })

}





