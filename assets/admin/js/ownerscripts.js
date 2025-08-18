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

    var base_url = 'http://localhost/visitor-management-application/';
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

    $('#addNewEnquiry').click(function (e) {
        e.preventDefault(); // Prevent the default form submission behavior

        let formData = new FormData($('#add-new-enquiry')[0]); // Capture form data

        // Clear all previous error messages
        $('.error-message').html('');

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
                        window.location.href = base_url + 'admin/Enquiry/success';

                        // $('#successModal .modal-body').text('Enquiry saved successfully');
                        // $('#successModal').modal('show');
                        $('#add-new-enquiry')[0].reset();
                        $('#other_textbox').hide();
                        $('#visitor_name_error').html('');
                        $('#phone_number_error').html('');
                        $('#email_error').html('');
                        $('#purpose_of_visit_error').html('');
                        $('#company_name_error').html('');
                        $('#contact_person_error').html('');
                        $('#general_error').html('');
                        ;

                        setTimeout(function () {
                            $('#successModal').modal('hide');
                        }, 2000);
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
                        if (response.errors.visitor_name) {
                            $('#visitor_name_error').html(response.errors.visitor_name);
                        } else {
                            $('#visitor_name_error').html('');
                        }

                        if (response.errors.phone_number) {
                            $('#phone_number_error').html(response.errors.phone_number);
                        }
                        else {
                            $('#phone_number_error').html('');
                        }

                        if (response.errors.email) {
                            $('#email_error').html(response.errors.email);
                        }
                        else {
                            $('#email_error').html('');
                        }

                        if (response.errors.purpose_of_visit) {
                            $('#purpose_of_visit_error').html(response.errors.purpose_of_visit);
                        }
                        else {
                            $('#purpose_of_visit_error').html('');
                        }

                        if (response.errors.company_name) {
                            $('#company_name_error').html(response.errors.company_name);
                        } else {
                            $('#company_name_error').html('');
                        }

                        if (response.errors.contact_person) {
                            $('#contact_person_error').html(response.errors.contact_person);
                        } else {
                            $('#contact_person_error').html('');
                        }
                    }
                }
            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
            }
        });
    });
    // $('#addNewEnquiry').click(function () {
    //     e.preventDefault(); 
    //     let formData = new FormData($('#add-new-enquiry')[0]); // Capture form data

    //     $.ajax({
    //         url: base_url + "admin/Enquiry/save", // URL to the controller method
    //         type: 'POST',
    //         data: formData,
    //         dataType: 'json',
    //         processData: false,
    //         contentType: false,
    //         success: function (response) {
    //             console.log(response);
    //             if (response.success=='success') {
    //                 $('#successModal .modal-body').text('Enquiry saved successfully');
    //                 $('#successModal').modal('show');
    //                 $('#add-new-enquiry')[0].reset();
    //             } 

    //             else {
    //                 if (response.errors.visitor_name) {
    //                     $('#visitor_name_error').html(response.errors.visitor_name);
    //                 } else {
    //                     $('#visitor_name_error').html('');
    //                 }

    //                 if (response.errors.phone_number) {
    //                     $('#phone_number_error').html(response.errors
    //                         .phone_number);
    //                 } else {
    //                     $('#phone_number_error').html('');
    //                 }

    //                 if (response.errors.email) {
    //                     $('#email_error').html(response.errors.email);
    //                 } else {
    //                     $('#email_error').html('');
    //                 }

    //                 if (response.errors.purpose_of_visit) {
    //                     $('#purpose_of_visit_error').html(response.errors
    //                         .purpose_of_visit);
    //                 } else {
    //                     $('#purpose_of_visit_error').html('');
    //                 }

    //                 if (response.errors.contact_person) {
    //                     $('#contact_person_error').html(response.errors.contact_person);
    //                 } else {
    //                     $('#contact_person_error').html('');
    //                 }

    //                 // if (response.errors.remarks) {
    //                 //     $('#remarks_error').html(response.errors
    //                 //         .remarks);
    //                 // } else {
    //                 //     $('#remarks_error').html('');
    //                 // }

    //                 // if (response.errors.visitor_message) {
    //                 //     $('#visitor_message_error').html(response.errors
    //                 //         .visitor_message);
    //                 // } else {
    //                 //     $('#visitor_message_error').html('');
    //                 // }

    //                 if (response.errors.company_name) {
    //                     $('#company_name_error').html(response.errors
    //                         .company_name);
    //                 } else {
    //                     $('#company_name_error').html('');
    //                 }
    //             }


    //         },
    //         error: function (xhr) {
    //             $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
    //         }
    //     });
    // });





    //3.Edit Enquiry
    $(document).on('click', '.edit-btn', function () {
        var id = $(this).attr('data-id');
        $('#hiddenField').val(id);
        $('#enquiry_id_new').val(id);
        //   alert(id);
        $.ajax({
            url: base_url + "admin/Enquiry/getEnquiryDetails",
            type: 'POST',
            data: {
                id: id
            },
            dataType: 'json',
            success: function (response) {
                let dateStr = response.data.created_date; // '2025-04-07 18:07:51'
                let [datePart, timePart] = dateStr.split(' ');
                let [year, month, day] = datePart.split('-');
                let formattedDateTime = `${day}-${month}-${year} ${timePart}`;
                


                $('#created_date').val(formattedDateTime);
                $('#visitor_name').val(response.data
                    .visitor_name);
                $('#phone_number').val(response.data
                    .phone_number);
                $('#email').val(response.data
                    .email);
                $('#company_id').val(response.data
                    .company_id);
                $('#purpose_of_visit').val(response.data.purpose_of_visit);
                $('#contact_person').val(response.data
                    .contact_person);
                $("#seen_by_name").val(response.data.seen_by);
                // $('#remarks').val(response.data
                //     .remarks);
                // $('#visitor_message').val(response.data.visitor_message);
                $('#company_name').val(response.data.company_name);

            },
            error: function () {
                alert('An error occurred while fetching data.');
            }
        });
    });

    //4.Update Enquiry
    $(document).on('click', '#update-btn', function () {
        let enquiry_id = $('#enquiry_id_new').val(); // Get product_id value
        $('#company_id').prop('disabled', false);
        let formData = new FormData($('#productForm')[
            0]);

        formData.append('enquiry_id_new', enquiry_id);

        $.ajax({
            url: base_url + "admin/Enquiry/updateEnquirydetails",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the Content-Type header
            success: function (response) {
                console.log(response.data);

                if (response.data.errors) {
                    if (response.errors.visitor_name) {
                        $('#visitor_name_error').html(response.errors
                            .visitor_name);
                    } else if (response.errors.phone_number) {
                        $('#phone_number_error').html(response.errors
                            .phone_number);
                    } else if (response.errors.email) {
                        $('#email_error').html(response.errors
                            .email_hindi);
                    } else if (response.errors.company_id) {
                        $('#company_id_error').html(response.errors
                            .company_id);
                    }
                    else if (response.errors.purpose_of_visit) {
                        $('#purpose_of_visit_error').html(response.errors
                            .purpose_of_visit);
                    }

                    else if (response.errors.contact_person) {
                        $('#contact_person_error').html(response.errors
                            .contact_person);
                    }

                    else if (response.errors.remarks) {
                        $('#remarks_error').html(response.errors
                            .remarks);
                    }

                    else if (response.errors.visitor_message) {
                        $('#visitor_message_error').html(response.errors
                            .visitor_message);
                    }

                }
                else {
                    $('#Edit-dish').modal('hide');
                    $('#successModal .modal-body').text('Enquiry updated successfully');
                    $('#successModal').modal('show');
                }
            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr
                    .responseText +
                    '</p>');
            }
        });

    });

    //5.Add user functionality
    $("#addusers").click(function () {
        // Get the value from the input field
        var productID = $("#user_id").val();
        $("#user_company_id").val(productID);
        //  alert(productID);
    })



    $("#add_user").click(function () {
        let user_id = $('#user_company_id').val();
        //  alert(user_id);
        let formData = new FormData($('#adduserr')[0]);
        // alert(formData);
        formData.append('user_company_id', user_id);

        $.ajax({
            url: base_url + "admin/Users/save", // URL to the controller method
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    $('#successModal .modal-body').text('User saved successfully');
                    $('#successModal').modal('show');
                    $("#adduser").modal("hide");
                } else {

                    if (typeof response.errors === 'string') {
                        $('#general_error').html(response.errors);
                    }

                    if (response.errors.user_name) {
                        $('#user_name_error').html(response.errors.user_name);
                    } else {
                        $('#user_name_error').html('');
                    }

                    if (response.errors.user_email) {
                        $('#user_email_error').html(response.errors
                            .user_email);
                    } else {
                        $('#user_email_error').html('');
                    }

                    if (response.errors.user_address) {
                        $('#user_address_error').html(response.errors.user_address);
                    } else {
                        $('#user_address_error').html('');
                    }

                    if (response.errors.user_phoneno) {
                        $('#user_phoneno_error').html(response.errors
                            .user_phoneno);
                    } else {
                        $('#user_phoneno_error').html('');
                    }

                    if (response.errors.user_username) {
                        $('#user_username_error').html(response.errors.user_username);
                    } else {
                        $('#user_username_error').html('');
                    }

                    if (response.errors.user_password) {
                        $('#user_password_error').html(response.errors
                            .user_password);
                    } else {
                        $('#user_password_error').html('');
                    }

                    if (response.errors.role) {
                        $('#user_role_error').html(response.errors
                            .role);
                    } else {
                        $('#user_role_error').html('');
                    }
                }

            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr.responseText + '</p>');
            }
        });
    });

    //6.Edit user
    $(document).on("click", ".edit-user", function () {
        // alert(1);
        var id = $(this).attr('data-id');
        $('#edit_user_id').val(id);
        // alert(id);

        $.ajax({
            url: base_url + "admin/Users/getUserDetails", // URL to the controller method
            type: 'POST',
            data: {
                edit_user_id: id
            },
            dataType: 'json',

            success: function (response) {
                console.log("User Data:", response); // Debug the response
                if (response.data) {
                    $('#user_name').val(response.data
                        .Name);
                    $('#user_email').val(response.data
                        .UserEmail);
                    $('#user_address').val(response.data
                        .UserAddress);
                    $('#user_phoneno').val(response.data
                        .UserPhoneNumber);
                    $('#user_username').val(response.data
                        .UserName);
                    $('#user_password').val(response.data
                        .UserPassword);
                    $('#role').val(response.data
                        .userroleid);

                    $('#list-users').modal('hide');

                    $("#edituser").modal("show");

                }
            },
        });
    });




    //.7Update user
    $("#update_user").click(function () {
        var user_id = $('#edit_user_id').val();
        let formData = new FormData($('#edituserr')[0]);
        formData.append('edit_user_id', user_id);
        $.ajax({
            url: base_url + "admin/Users/updateUserdetails",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false, // Prevent jQuery from processing the data
            contentType: false, // Prevent jQuery from setting the Content-Type header
            success: function (response) {
                if (response.data.errors) {
                    if (response.errors.user_name) {
                        $('#user_name_error').html(response.errors.user_name);
                    } else {
                        $('#user_name_error').html('');
                    }

                    if (response.errors.user_email) {
                        $('#user_email_error').html(response.errors
                            .user_email);
                    } else {
                        $('#user_email_error').html('');
                    }

                    if (response.errors.user_address) {
                        $('#user_address_error').html(response.errors.user_address);
                    } else {
                        $('#user_address_error').html('');
                    }

                    if (response.errors.user_phoneno) {
                        $('#user_phoneno_error').html(response.errors
                            .user_phoneno);
                    } else {
                        $('#user_phoneno_error').html('');
                    }

                    if (response.errors.user_username) {
                        $('#user_username_error').html(response.errors.user_username);
                    } else {
                        $('#user_username_error').html('');
                    }

                    // if (response.errors.user_password) {
                    //     $('#user_password_error').html(response.errors
                    //         .user_password);
                    // } else {
                    //     $('#user_password_error').html('');
                    // }

                    if (response.errors.role) {
                        $('#user_role_error').html(response.errors
                            .role);
                    } else {
                        $('#user_role_error').html('');
                    }
                    if (response.errors) {
                        alert(response.errors);
                    }
                }
                else {
                    $('#successModal .modal-body').text('User Updated successfully');
                    $('#successModal').modal('show');
                    $('#edituser').modal('hide');
                }
            },
            error: function (xhr) {
                $('#response').html('<p>An error occurred: ' + xhr
                    .responseText +
                    '</p>');
            }
        });
    });

    //8.Delete User
    $(document).on("click", ".delete-user", function () {
        var id = $(this).attr('data-id');
        $('#delete_id').val(id);
        $('#list-users').modal('hide');
        $('#deleteuser').modal('show');

    })

    $('#yes_del_user').click(function () {
        $.ajax({
            method: "POST",
            url: base_url + "admin/Users/DeleteUser",
            data: {
                'id': $('#delete_id').val()
            },
            success: function (data) {
                console.log(data);
                window.location.href = '';
            }
        });
    });

    //9.Change password
    $(document).on("click", ".password-change", function () {
        var id = $(this).attr('data-id');
        // alert(id);
        $('#user_password_change').val(id);
        $('#list-users').modal('hide');
        $('#passwordchange').modal('show');
    })

    $('#change_password').click(function () {
        let formData = new FormData($('#PasswordChange')[0]);
        $.ajax({
            url: base_url + "admin/Users/ChangePassword",
            type: 'POST',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function (response) {
                if (response.success) {
                    console.log(response);
                    location.reload();
                } else {
                    if (response.errors && response.errors.password_changes) {
                        $('#password_change_error').html(response.errors.password_changes);
                    }
                }
            },
        })
    })




    //10 Edit user in companies

    $(document).on('click', '.edit-company', function () {
        var id = $(this).attr('data-id');
        $('#user_id').val(id);
        $.ajax({
            method: "POST",
            url: base_url + "admin/Users/get_users_by_company_id",
            data: {
                'company_id': id
            },
            success: function (response) {
                console.log(response);
                $('#list-users .table-responsive-sm').html(response); // Insert table data
                $('#list-users').modal('show'); // Show modal
                $('#edituser').modal('hide');
                $('[data-bs-toggle="tooltip"]').tooltip(); // Reinitialize tooltips
            }
        });
    });

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
                // window.location.href = '';
            }
        });
    });






    $(document).ready(function () {
        $('#purpose_of_visit').change(function () {
            let selectedValue = $(this).val();
            let $input = $('#other_textbox input');

            if (selectedValue === 'business meeting') {
                $('#other_textbox').show();
                $input.attr("placeholder", "Enter Company Name");
                $input.attr("name", "company_name");  // <-- important!
            } else if (selectedValue === 'vendor supplier') {
                $('#other_textbox').show();
                $input.attr("placeholder", "Enter Vendor or Supplier Name");
                $input.attr("name", "company_name");
            } else if (selectedValue === 'others') {
                $('#other_textbox').show();
                $input.attr("placeholder", "Enter your purpose");
                $input.attr("name", "company_name");
            } else if (selectedValue === 'delivery pickup') {
                $('#other_textbox').show();
                $input.attr("placeholder", "Enter the delivery or pickup name");
                $input.attr("name", "company_name");
            }
            else {
                $('#other_textbox').hide();
                // $('#contact').hide();
                $input.removeAttr("name"); // Remove name if not required
            }

        });
    });



    $(document).ready(function () {
        $('#purpose_of_visit').change(function () {
            let selectedValue = $(this).val();

            if (selectedValue === 'interview') {
                $('#contact').hide();
                $('#contact_person_error').hide(); // 👈 hide the error span too

            } else {
                $('#contact').show();
                $('#contact_person_error').show();
            }
        });
    });












    $('#reports').click(function () {
        var company_id = $(this).data('company-id');
        const currentDate = new Date().toISOString().split('T')[0];
        if (!$('#report-from-date').val()) {
            $('#report-from-date').val(currentDate);
        }
        if (!$('#report-to-date').val()) {
            $('#report-to-date').val(currentDate);
        }
        const fromDate = $('#report-from-date').val();
        const toDate = $('#report-to-date').val();
        const selectedUserId = $('#users').val();

        fetchReport(company_id, fromDate, toDate, selectedUserId);


        $('#report-from-date').on('change', function () {
            const fromDate = $(this).val();
            //  alert(fromDate);
            const toDate = $('#report-to-date').val();
            const selectedUserId = $('#users').val();
            fetchReport(company_id, fromDate, toDate, selectedUserId);
        });

        // Set up change listener for TO date
        $('#report-to-date').on('change', function () {
            const toDate = $(this).val();
            const fromDate = $('#report-from-date').val();
            const selectedUserId = $('#users').val();
            fetchReport(company_id, fromDate, toDate, selectedUserId);
        });

        // Set up change listener for USERS dropdown
        $('#users').on('change', function () {
            const selectedUserId = $(this).val();
            const fromDate = $('#report-from-date').val();
            const toDate = $('#report-to-date').val();
            fetchReport(company_id, fromDate, toDate, selectedUserId);
        });

    });





    function fetchReport(company_id, fromDate, toDate, selectedId) {
        $.ajax({
            url: base_url + 'admin/Reports/fetchUsersReport',
            method: 'POST',
            data: {
                company_id: company_id,
                from_date: fromDate,
                to_date: toDate,
                users_id: selectedId
            },
            dataType: 'html',
            success: function (response) {
                console.log(response);
                $('#reportContainer').html(response);
            }
        });
    }




    // reoport on enquiry

    $('#enquiry').click(function () {
        var company_id = $(this).data('company-id');
        // alert(company_id);
        const currentDate = new Date().toISOString().split('T')[0];
        // if (!$('#enquiry-from-date').val()) {
        //     $('#enquiry-from-date').val(currentDate);
        // }
        // if (!$('#enquiry-to-date').val()) {
        //     $('#enquiry-to-date').val(currentDate);
        // }
        const fromDate = $('#enquiry-from-date').val();
        const toDate = $('#enquiry-to-date').val();

        fetchEnquiryReport(company_id, fromDate, toDate);


        $('#enquiry-from-date').on('change', function () {
            const fromDate = $(this).val();
            const toDate = $('#enquiry-to-date').val() || null; // Use `|| null` for clarity
            fetchEnquiryReport(company_id, fromDate, toDate);
        });


        // Set up change listener for TO date
        $('#enquiry-to-date').on('change', function () {
            const toDate = $(this).val();
            const fromDate = $('#enquiry-from-date').val() || null; // Use `|| null` for clarity
            fetchEnquiryReport(company_id, fromDate, toDate);
        });

        // Set up change listener for USERS dropdown
        // $('#users').on('change', function () {
        //     const selectedUserId = $(this).val();
        //     const fromDate = $('#report-from-date').val();
        //     const toDate = $('#report-to-date').val();
        //     // fetchReport(company_id,fromDate, toDate, selectedUserId);
        // });

    });



    function fetchEnquiryReport(company_id, fromDate, toDate, selectedId) {
        $.ajax({
            url: base_url + 'admin/Reports/fetchEnquiryReport',
            method: 'POST',
            data: {
                company_id: company_id,
                from_date: fromDate,
                to_date: toDate,
                users_id: selectedId
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






    // $('#reports').click(function () {
    //     var company_id = $(this).data('company-id');
    //     // alert(company_id);
    //     const currentDate = new Date().toISOString().split('T')[0];
    //     // $('#report-date').val(currentDate);

    //     // fetchReport(company_id, currentDate); // Initial fetch on button click

    //     // Set up event listener for date change (only once)
    //     $('#report-from-date').off('change').on('change', function () {
    //         const newDate = $(this).val();
    //         alert(newDate);
    //          fetchReport(company_id, newDate); // Fetch with new date
    //     });

    //     $('#report-to-date').off('change').on('change', function () {
    //         const newDate = $(this).val();
    //         alert(newDate);
    //          fetchReport(company_id, newDate); // Fetch with new date
    //     });

    //     $('#users').off('change').on('change', function () {
    //         const newDate = $(this).val();
    //      $('#report-to-date').val(newDate) || $('#report-from-date').val(newDate);
    //         var selectedId = $(this).val();
    //         alert(selectedId);
    //         alert(newDate);
    //         console.log("Selected ID:", selectedId);
    //          fetchReport(company_id,selectedId);
    //     });

    // });


    // function fetchReport(company_id, date, selectedId) {
    //     $.ajax({
    //         url: base_url + 'admin/Reports/fetchEnquiryReport',
    //         method: 'POST',
    //         data: {
    //             company_id: company_id,
    //             date: date,
    //             users_id: selectedId
    //         },
    //         dataType: 'html',
    //         success: function (response) {
    //             console.log(response);
    //             // $('#reportContainer').html(response);
    //         }
    //     });
    // }


    // $('#reports').click(function() {
    //     var company_id = $(this).data('store-id');
    //     //  alert(company_id);
    //     const currentDate = new Date().toISOString().split('T')[0];

    //     $('#order-date').val(currentDate);
    //      alert(currentDate);
    //         $.ajax({
    //             url: base_url + 'admin/Reports/fetchDeliveryReport',
    //             method: 'POST',
    //             data: {
    //                 company_id: company_id,
    //                 date: $('#order-date').val()
    //             },
    //             dataType: 'html',
    //             success: function(response) {
    //                 console.log(response);
    //                 $('#reportContainer').html(response);
    //             }
    //         });

    // });




});


