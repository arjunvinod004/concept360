<div class="application-content dashboard-content">
    <div class="application-content__container container-fluid">
        <div class="search-add-new-dish-list-combo">
            <div class="add-new-dish-list-combo">
                <a href="#" class="add-new-dish-btn btn1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="<?php echo base_url(); ?>assets/admin/images/add-new-dish-icon.svg" alt="add new dish"
                        class="add-new-dish__icon" width="23" height="23">
                    Visitors Form
                </a>
                <a class="add-refresh ">
                    <img src="<?php echo base_url(); ?>assets/admin/images/refresh.png" alt="add new dish"
                        class="add-new-dish__icon" width="43" height="23">
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
                        <th>Sl No</th>
                        <!-- <th>date</th> -->
                        <th>Visitor Name</th>
                        <!-- <th>Phone Number</th> -->
                        <!-- <th>Email</th> -->
                        <!-- <th>Company</th>  -->
                        <th>Purpose Of Visit</th>
                        <th>Contact Authorities</th>
                        <th>Date & Time</th>

                        <th>Actions</th>

                    </tr>
                </thead>
                <tbody>


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
                <div class="row">
                    <div class="col-md-4">
                        <label for="" class="form-label">Task Name</label>
                        <input type="text" class="form-control" name="task_name">
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="due_date">
                    </div>

                    <div class="col-md-4">
                        <label for="" class="form-label">Priority</label>
                        <select class="form-select" name="purpose_of_visit" id="purpose_of_visit">
                            <option value="">Select purpose</option>
                            <option value="High Priority">High Priority</option>
                            <option value="Low Priority">Low Priority</option>
                            <option value="others">Others</option>
                        </select>
                    </div>


                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save</button>
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