//1. Scroll top jquery
//2.Add enquiry
//3.Edit Enquiry
//4.Update Enquiry
//5.Add user functionality
//6.Edit user window showing with details
//7.Update user
//8.Delete User
//9.Change password
//10.Edit user in companies
$(document).ready(function () {

    $('.add-refresh').click(function () {
        location.reload();
    });

    var base_url = 'http://localhost/concept360/';
    // var base_url = 'https://qr-experts.com/emigo-visitor/';

    //new DataTable('#example');
    $(document).on('click', '.emigo-close-btn , .reload-close-btn, .emigo-btn', function () {
        location.reload();
    });

    // common reload
    // setInterval(function () {
    //     location.reload(); // reloads the entire page
    //   }, 1000); // refresh every 6 seconds



    //1. Scroll top jquery
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#goToTop').fadeIn();
        } else {
            $('#goToTop').fadeOut();
        }
    });

    $('#goToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 600);
        return false;
    });

    //2.Add enquiry

    $('#savetask').click(function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        let formData = new FormData($('#add-new-task')[0]); // Capture form data


        $.ajax({
            url: base_url + "admin/Enquiry/save",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);

                if (response.success === 'success') {

                    setTimeout(function () {
                        // window.location.href = base_url + 'admin/Enquiry/success';
                       
                       $('#add-new-task')[0].reset();
                        $('#task_name_error').html('');
                        $('#task_due_date_error').html('');
                        $('#purpose_of_visit_error').html('');
                         $('#exampleModal').modal('hide');
                        $('#successModal .modal-body').text('Enquiry saved successfully');
                        $('#successModal').modal('show');
                        setTimeout(function () {
                            $('#successModal').modal('hide');
                            location.reload();
                        }, 1000);


                    }, 1000);
                } else {
                    // Check if this is a duplicate entry error
                    if (typeof response.errors === 'string') {
                        // Display the general error message somewhere
                        $('#general_error').html(response.errors);
                    } else if (response.errors.duplicate) {
                        // Display the duplicate entry error
                        $('#general_error').html(response.errors.duplicate);
                    }
                    else {
                        // Handle field-specific validation errors
                        if (response.errors.task_name) {
                            $('#task_name_error').html(response.errors.task_name);
                        } else {
                            $('#task_name_error').html('');
                        }

                        if (response.errors.due_date) {
                            $('#task_due_date_error').html(response.errors.due_date);
                        }
                        else {
                            $('#task_due_date_error').html('');
                        }

                       

                        if (response.errors.purpose_of_visit) {
                            $('#purpose_of_visit_error').html(response.errors.purpose_of_visit);
                        }
                        else {
                            $('#purpose_of_visit_error').html('');
                        }

                       
                    }
                }
            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
            }
        });
    });



    $('#updatetask').click(function (e) {
        e.preventDefault(); // Prevent the default form submission behavior
      var updateid= $('#edit_id').val();
    //   alert(updateid);
        let formData = new FormData($('#update-new-task')[0]); // Capture form data
formData.append('edit_id', updateid);

        $.ajax({
            url: base_url + "admin/Enquiry/updateEnquirydetails",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);

                if (response.success === 'success') {

                   
                        // window.location.href = base_url + 'admin/Enquiry/success';
                        // $('#editModal').modal('hide');
                        // $('#successModal .modal-body').text('Enquiry Updated successfully');
                        // $('#successModal').modal('show');
                        $('#task_name_edit_error').html('');
                        $('#task_due_date_edit_error').html('');
                        $('#purpose_of_visit_edit_error').html('');

                         $('#editModal').modal('hide');

    // When edit modal is fully hidden, show success modal
        $('#successModal .modal-body').text('Enquiry Updated successfully');
        $('#successModal').modal('show');

        setTimeout(function () {
            $('#successModal').modal('hide');
            location.reload();
        }, 1500);
   


                    
                } else {
                    // Check if this is a duplicate entry error
                    if (typeof response.errors === 'string') {
                        // Display the general error message somewhere
                        $('#general_error').html(response.errors);
                    } else if (response.errors.duplicate) {
                        // Display the duplicate entry error
                        $('#general_error').html(response.errors.duplicate);
                    }
                    else {
                        // Handle field-specific validation errors
                        if (response.errors.task_name_edit) {
                            $('#task_name_edit_error').html(response.errors.task_name_edit);
                        } else {
                            $('#task_name_edit_error').html('');
                        }

                        if (response.errors.due_date_edit) {
                            $('#task_due_date_edit_error').html(response.errors.due_date_edit);
                        }
                        else {
                            $('#task_due_date_edit_error').html('');
                        }

                       

                        if (response.errors.purpose_of_visit_edit) {
                            $('#purpose_of_visit_edit_error').html(response.errors.purpose_of_visit_edit);
                        }
                        else {
                            $('#purpose_of_visit_edit_error').html('');
                        }

                      
                    }
                }
            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
            }
        });
    });
   
  

// approved function in a button click
    $(document).on('click', '.approved', function () {
     var is_approved = $(this).attr('data-id');
     $.ajax({
         method: "POST",
         url: base_url + "admin/Enquiry/approved",
         data: {
             'id': is_approved
         },
         success: function (data) {
             console.log(data);
             $('#successModal .modal-body').text('Enquiry Approved successfully');
             $('#successModal').modal('show');
             setTimeout(function () {
                 $('#successModal').modal('hide');  
                 location.reload(); 
             },2000);
         }
     })
    })


   $(document).on('click', '.edit-visitor', function () {
         var id = $(this).attr('data-id');
        //  alert(id);
         $('#edit_id').val(id);

         $.ajax({
             method: "POST",
             url: base_url + "admin/Enquiry/getEnquiryDetails",
             data: {
                 'id': id
             },
             dataType: 'json',
             success: function (response) {
                 console.log(response.data);
                //  let date = response.data.due_date;
                 $('#task_name_edit').val(response.data.task_name);
                $('#due_date_edit').val(response.data.date); 
                 $('#purpose_of_visit_edit').val(response.data.purpose_of_visit);

                 $('#editModal').modal('show'); // ✅ open here after filling
                
             }
         })

    })


    // 11 delete in enquiry
    $(document).on('click', '.enquiry-delete', function () {
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
    })

    $('#yes_del_user').click(function () {
        $.ajax({
            method: "POST",
            url: base_url + "admin/Enquiry/DeleteEnquiry",
            data: {
                'id': $('#delete_id').val()
            },
            success: function (data) {
                console.log(data);
                location.reload();
                // window.location.href = '';
            }
        });
    });




    // report on enquiry

    $('#enquiry').click(function () {
        var company_id = $(this).data('company-id');
        // alert(company_id);
        const fromDate = $('#enquiry-date').val();
        fetchEnquiryReport(company_id, fromDate);


        $('#enquiry-date').on('change', function () {
            const fromDate = $(this).val();
            fetchEnquiryReport(company_id, fromDate);
        });

    });



    function fetchEnquiryReport(company_id, fromDate) {
        $.ajax({
            url: base_url + 'admin/Reports/fetchEnquiryReport',
            method: 'POST',
            data: {
                company_id: company_id,
                from_date: fromDate,
              
            },
            dataType: 'html',
            success: function (response) {
                console.log(response);
                $('#enquiryContainer').html(response);
            }
        });
    }


    // search on enquiry 

    $('#search_product').on('keyup', function () {
        const value = $(this).val();
        $.ajax({
            url: base_url + 'admin/Enquiry/searchproduct',
            method: 'POST',
            data: {
                value: value
            },
            dataType: 'html',
            success: function (response) {
                console.log(response);
                $('.table-responsive').html(response); // Insert table data
            }
        });

    });



});


