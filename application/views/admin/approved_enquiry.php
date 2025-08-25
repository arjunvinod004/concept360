<div class="application-content dashboard-content">
    <div class="application-content__container container-fluid">

        <div class="table-responsive">
            <table class="table table-bordered mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Id</th>
                        <!-- <th>date</th> -->
                        <th>Visitor Name</th>
                        <!-- <th>Phone Number</th> -->
                        <!-- <th>Email</th> -->
                        <!-- <th>Company</th>  -->
                        <th>Purpose Of Visit</th>
                      
                        <th>Date & Time</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>

              <?php foreach ($all_approved_enquiries as $enquiry) { ?>
    <tr>
        <th scope="row"><?php echo $enquiry['id']; ?></th>
        <td><?php echo $enquiry['task_name']; ?></td>
        <td><?php echo $enquiry['purpose_of_visit']; ?></td>
        <td><?php echo $enquiry['date']; ?></td>
        <td>
        <a data-bs-toggle="modal" data-bs-target="#delete-enquiry" data-id="<?php echo $enquiry['id']; ?>" href="" class="btn btn-danger btn-sm enquiry-delete">Delete</a>
    </td>
    </tr>
<?php } ?>


                </tbody>
            </table>
        </div>
        <div class="pagination-wrapper">
            <?= $pagination; ?>
        </div>
    </div>
</div>


<!-- Modal For Add Visitor -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Visitor Form</h1>
                <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add-new-task" method="post" enctype="multipart/form-data" >
                <div class="row"> 
                    
                    <div class="col-md-4">
                        <label for="" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="task_name">
                          <span id="task_name_error" class="error errormsg mt-2"></span>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date">
                        <span id="task_due_date_error" class="error errormsg mt-2"></span>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Priority</label>
                        <select class="form-select" name="purpose_of_visit" id="purpose_of_visit">
                            <option value=""> Select Priority</option>
                            <option value="High Priority">High Priority</option>
                            <option value="Low Priority">Low Priority</option>
                            <option value="others">Others</option>
                        </select>
                          <span id="purpose_of_visit_error" class="error errormsg mt-2"></span>
                    </div>
                  
  </form>
                </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-primary" id="savetask">Save</button>
            </div>
        </div>
    </div>
</div>




<!-- Change Description -->
<div class="modal fade emigo-modal" id="Edit-dish" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content p-3" style="width:80%;">
            <div class="modal-header emigo-modal__header">
                <input class="created-date" id="created_date" name="created_date" value=""></input>
                <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body  emigo-modal__body">
                <input type="hidden" id="hiddenField" name="product_id" value="">
                <div class="row">
                    <form class="product-details-form" id="productForm" method="post" enctype="multipart/form-data">
                        <!-- name and phoneno -->
                        <div class="contact-item dual-input-row">
                            <input type="hidden" id="enquiry_id_new" name="enquiry_id">
                            <div class="contact-text">
                                <i class="fas fa-user input-icon"></i>
                                <input type="text" class="contact-input" id="visitor_name" name="visitor_name" value="">
                                <div class="input-separator"></div>
                            </div>
                            <div class="contact-text">
                                <i class="fas fa-phone input-icon"></i>
                                <input type="text" class="contact-input" id="phone_number" name="phone_number" value="">
                            </div>

                        </div>

                        <!-- // -->

                        <!-- email and company -->

                        <div class="contact-item dual-input-row">

                            <div class="contact-text">
                                <i class="fas fa-solid fa-house input-icon"></i>
                                <input type="text" class="contact-input" id="company_name" name="company_name" value="">
                                <div class="input-separator"></div>
                            </div>
                            <div class="contact-text">
                                <i class="fa-solid fa-user-tie input-icon"></i>
                                <input type="text" class="contact-input" name="purpose_of_visit" id="purpose_of_visit">

                            </div>

                        </div>

                        <!-- contact Authority and seen by -->

                        <div class="contact-item dual-input-row">
                            <?php if ($role_id ==1 || $role_id ==2) { ?>
                            <div class="contact-text">
                                <i class="fa-solid fa-eye input-icon"></i>
                                <input type="text" class="contact-input" id="seen_by_name" name="seen_by_name" value="">
                                <div class="input-separator"></div>
                            </div>
                            <?php } ?>

                            <div class="contact-text">
                                <i class="fa-solid fa-user-tie  input-icon"></i>
                                <input type="text" class="contact-input" id="contact_person" name="contact_person"
                                    value="">

                            </div>

                        </div>



                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end -->


<!-- delete user -->
<div class="modal fade " id="delete-enquiry" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- if response within jquery -->
                <div class="message d-none" role="alert"></div>
                <input type="hidden" name="id" id="delete_id" value="" />
                <?php echo are_you_sure; ?>
            </div>
            <div class="modal-footer"><button class="btn btn-primary" type="button" data-bs-dismiss="modal">No</button>
                <button class="btn btn-secondary" id="yes_del_user" type="button" data-bs-dismiss="modal">Yes</button>
            </div>

            </form>
        </div>
    </div>
</div>
<!-- delete user -->



<!-- Confirmation Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="emigo-modal__heading" id="exampleModalLabel"></h1>
                <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary reload-close-btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Confirmation Modal -->