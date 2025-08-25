<div class="application-content reports-content">
  <div
    class="application-content__container reports-content__container container"
  >
    <!--<h1 class="application-content__page-heading">Reports</h1>-->
    <div class="reports-content__data">
      <div class="modal-container" >
        <a
          class="modal-trigger reports-content__item user"
          data-company-id="<?php echo $company_id; ?>"
          data-name="SALES" id="enquiry"
        >
          <img
            src="<?php echo base_url();?>assets/admin/images/user-icon.svg"
            alt="dollar icon"
            class="reports-content__item-icon"
          />
          <h2 class="reports-content__item-text">Enquiry</h2>
        </a>
        <div class="modal-window">
          <div class="modal-wrapper">
            <div class="modal-data">
              <div class="table-responsive-sm">
                <form action="" class="row g-3">
                    <input type="hidden" id="company_id" value="<?php echo $company_id;?>">
                  <div class="col-md-3">
                    <label for="date" class="form-label">Date</label>
                    <input
                      type="date"
                      class="form-control"
                      id="enquiry-date"
                      name="date"
                    />
                  </div>

                 

               
                  <div id="enquiryContainer" style="max-height: 510px; overflow: scroll">
                    <table
                      class="table table-striped table-bordered table-hover"
                      id="dataTables-example"
                    >
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Dine In</th>
                          <th>Pickup</th>
                          <th>Delivery</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td colspan="4" class="text-center">
                            No user data available.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
            </div>
            <div class="close-icon"></div>
          </div>
        </div>
      </div>

      <!-- <div class="modal-container">
                <a class="modal-trigger reports-content__item delivery" data-store-id="<?php echo $company_id; ?>"
                    data-name="SALES">
                    <img src="<?php echo base_url();?>assets/admin/images/delivery-icon.svg" alt="dollar icon"
                        class="reports-content__item-icon">
                    <h2 class="reports-content__item-text">Delivery</h2>
                </a>
                <div class="modal-window">
                    <div class="modal-wrapper">
                        <div class="modal-data">
                            <iframe id="table_iframe_delivery" height="750px" width="100%"></iframe>
                        </div>
                        <div class="close-icon"></div>
                    </div>
                </div>
            </div> -->
    </div>
  </div>
</div>


