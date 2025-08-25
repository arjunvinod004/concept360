<div class="application-content dashboard-content">
    <div class="application-content__container container-fluid">
        <div class="search-add-new-dish-list-combo">
            <div class="add-new-dish-list-combo">
                <a href="#" class="add-new-dish-btn btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo base_url(); ?>assets/admin/images/add-new-dish-icon.svg" alt="add new dish"
                        class="add-new-dish__icon" width="23" height="23">
                    Visitors Form
                </a>
                
                <a class="add-refresh  ">
                  
                </a>

                <form class="product-search__form search">
                    <input type="text" id="search_product" placeholder="Enter Your Keyword" name="search"
                        class="product-search__field search-input1">
                    <button type="submit" class="product-search__button"><img
                            src="<?php echo base_url(); ?>assets/admin/images/product-search-icon.svg" width="22"
                            height="23" alt="SearchIcon" class="product-search__icon"></button>
                    <ul id="autocomplete-results1" class="autocomplete-results">
                    </ul>
                </form>
            </div>

        </div>

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

              <?php foreach ($enquiries as $enquiry) { 
                $dueDate = date('Y-m-d', strtotime($enquiry['date']));
                $today   = date('Y-m-d');
                $rowClass = ($dueDate == $today) ? 'due-soon' : '';
                //  $dueDate   = strtotime($enquiry['date']); // enquiry date
                // $now = time();                      // current timestamp
                // $diffHours = ($dueDate - $now) / 3600;    // difference in hours

    // add CSS class if within 24 hrs
    // $rowClass = ($diffHours > 0 && $diffHours <= 24) ? 'due-soon' : '';
                ?>

                
    <tr class="<?php echo $rowClass; ?>">
        <th scope="row"><?php echo $enquiry['id']; ?></th>
        <td><?php echo $enquiry['task_name']; ?></td>
        <td><?php echo $enquiry['purpose_of_visit']; ?></td>
        <td><?php echo $enquiry['date']; ?></td>
        <td>
             <a class="btn btn-primary approved"  data-id="<?php echo $enquiry['id']; ?>"  href="#">
      <i class="fa-solid fa-check mx-1"></i>Approved</a>
        <a class="btn btn-success edit-visitor" data-bs-toggle="modal"  data-bs-target="#editModal" data-id="<?php echo $enquiry['id']; ?>" ><i class="fa fa-edit mx-1"></i>Edit</a>
          <a data-bs-toggle="modal" data-bs-target="#delete-enquiry" data-id="<?php echo $enquiry['id']; ?>" href="" class="btn btn-danger enquiry-delete"> <i class="fa-solid fa-trash mx-1"></i> Delete</a>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Visitor Form</h1>
        <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="add-new-task" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row"> 
            <div class="col-md-4">
              <label for="" class="form-label">Task Name</label>
              <input type="text" class="form-control" name="task_name">
              <span id="task_name_error" class="error errormsg mt-2"></span>
              <span id="general_error" class="error errormsg mt-2"></span>
            </div>

            <div class="col-md-4">
              <label for="" class="form-label">Due Date</label>
              <input type="date" class="form-control" name="due_date">
              <span id="task_due_date_error" class="error errormsg mt-2"></span>
            </div>

            <div class="col-md-4">
              <label for="" class="form-label">Priority</label>
              <select class="form-select" name="purpose_of_visit" id="purpose_of_visit">
                <option value="">Select Priority</option>
                <option value="High Priority">High Priority</option>
                <option value="Low Priority">Low Priority</option>
                <option value="others">Others</option>
              </select>
              <span id="purpose_of_visit_error" class="error errormsg mt-2"></span>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="savetask">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>




<!-- edit visitor -->


<!-- Modal For Add Visitor -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" >
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                
                <h1 class="modal-title fs-5" id="exampleModalLabel">Visitor Form</h1>
                <button type="button" class="emigo-close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="update-new-task" method="post" enctype="multipart/form-data" >
                <div class="row"> 
                    <input type="hidden" id="edit_id" value="">
                    <div class="col-md-4">
                        <label for="" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="task_name_edit" id="task_name_edit" value="">
                          <span id="task_name_edit_error" class="error errormsg mt-2"></span>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date_edit" id="due_date_edit" value="">
                        <span id="task_due_date_edit_error" class="error errormsg mt-2"></span>
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Priority</label>
                        <select class="form-select" name="purpose_of_visit_edit" id="purpose_of_visit_edit">
                            <option value=""> Select Priority</option>
                            <option value="High Priority">High Priority</option>
                            <option value="Low Priority">Low Priority</option>
                            <option value="others">Others</option>
                        </select>
                          <span id="purpose_of_visit_edit_error" class="error errormsg mt-2"></span>
                    </div>
                  
  </form>
                </div>

            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-primary" id="updatetask">Update</button>
            </div>
        </div>
    </div>
</div>





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