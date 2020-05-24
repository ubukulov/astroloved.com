$(document).ready(function(){
    // $("#get_my_pdc").on('click', function(){
    //     var date_birth = $("#date_birth").val();
    //     var email = $("#email").val();
    //
    //     $.ajax({
    //         type: 'POST',
    //         url: 'https://astroloved.com/mail.php',
    //         data: {'db': date_birth, 'email': email},
    //         success: function(res){
    //             if (res == 1) {
    //                 $('#exampleModal').addClass('fade').modal('toggle');
    //                 $('#successModal').removeClass('fade').modal('toggle');
    //             }
    //         }
    //     })
    // });
    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    $("#birth_date").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:2020'
    });
});
