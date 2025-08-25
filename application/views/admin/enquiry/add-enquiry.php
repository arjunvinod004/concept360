<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/admin/css/enquiry.css">
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
    type="text/css" />

   
</head>
<body>
    <div class="enquiry">
        <div class="phone-container">
            <div class="logo-container">
                <img src="<?php echo base_url();?>assets/admin/images/emigo-logo.png" alt="Emigo Logo" class="logo">
            </div>

            <div class="form-header">Visitor Form</div>
    
            <form id="add-new-enquiry" method="post" enctype="multipart/form-data" >
                <input type="hidden" name="company_id" value="<?= $selected_company; ?>">
                <div class="enquiry-group">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                    </div>
                    
                    <input type="text" class="enquiry-control" name="visitor_name" placeholder="Visitor Name" required>
                    
                </div>

                <div class="form__validation">
                    <span id="visitor_name_error"
                        class="error errormsg mt-2"><?= form_error('visitor_name'); ?></span>
                </div>

                

                <div class="enquiry-group">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                    </div>
                    <input type="tel" class="enquiry-control" name="phone_number" placeholder="Mobile" required>
                </div>

                <div class="form__validation"><span id="phone_number_error"
                    class="error errormsg mt-2"><?= form_error('phone_number'); ?></span>
            </div>


                <div class="enquiry-group">
                    <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                    </div>
                    <input type="email" class="enquiry-control" placeholder="Email" name="email" required>
                </div>


                <div class="form__validation"><span id="email_error"
                    class="error errormsg mt-2"><?= form_error('email'); ?></span></div>
        
           
                

                
                <div class="enquiry-group">
                  <div class="icon">
                  <svg fill="#000000" width="18px" height="18px" viewBox="-2 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m18.845 17.295c-1.008-1.345-2.437-2.327-4.089-2.754l-.051-.011-1.179 1.99c-.002.552-.448.998-1 1-.55 0-1-.45-1.525-1.774 0-.009 0-.021 0-.032 0-.691-.56-1.25-1.25-1.25s-1.25.56-1.25 1.25v.033-.002c-.56 1.325-1.014 1.774-1.563 1.774-.552-.002-.998-.448-1-1l-1.142-1.994c-1.702.44-3.13 1.421-4.126 2.746l-.014.019c-.388.629-.628 1.386-.655 2.197v.007c.005.15 0 .325 0 .5v2c0 1.105.895 2 2 2h15.5c1.105 0 2-.895 2-2v-2c0-.174-.005-.35 0-.5-.028-.817-.268-1.573-.666-2.221l.011.02zm-14.345-12.005c0 2.92 1.82 7.21 5.25 7.21 3.37 0 5.25-4.29 5.25-7.21 0-.019 0-.042 0-.065 0-2.9-2.351-5.25-5.25-5.25s-5.25 2.351-5.25 5.25v.068z" fill="#e91e63"/></svg>
                  </div>
                    <select class="enquiry-control" name="purpose_of_visit" id="purpose_of_visit" >
                        <option value="">Select purpose</option>
                        <option value="Person meeting"> Personal meeting</option>
                        <option value="business meeting"> Business Meeting</option>
                        <option value="vendor supplier">Vendor/supplier</option>
                        <option value="delivery pickup">Delivery/pickup</option>
                        <option value="interview">Interview</option>
                        <option value="others">Others</option>
                    </select>
                    
                </div>

                <div class="form__validation">
                    <span id="purpose_of_visit_error"
                        class="error errormsg mt-2"><?= form_error('purpose_of_visit'); ?></span>
                </div>

                
                <div class="enquiry-group" style="display: none;" id="other_textbox">
                    <div class="icon">
                    <svg width="18px" height="18px" viewBox="0 0 1024 1024"   version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M234.666667 938.666667H192c-12.8 0-21.333333-8.533333-21.333333-21.333334v-42.666666h85.333333v42.666666c0 12.8-8.533333 21.333333-21.333333 21.333334zM832 938.666667h-42.666667c-12.8 0-21.333333-8.533333-21.333333-21.333334v-42.666666h85.333333v42.666666c0 12.8-8.533333 21.333333-21.333333 21.333334z" fill="#e91e63" /><path d="M576 149.333333h-128c-36.266667 0-64 27.733333-64 64v64h42.666667v-64c0-12.8 8.533333-21.333333 21.333333-21.333333h128c12.8 0 21.333333 8.533333 21.333333 21.333333v64h42.666667v-64c0-36.266667-27.733333-64-64-64z" fill="#e91e63" /><path d="M853.333333 917.333333H170.666667c-46.933333 0-85.333333-38.4-85.333334-85.333333V320c0-46.933333 38.4-85.333333 85.333334-85.333333h682.666666c46.933333 0 85.333333 38.4 85.333334 85.333333v512c0 46.933333-38.4 85.333333-85.333334 85.333333z" fill="#e91e63" /></svg> 
                    </div>
                    <input type="text" name="company_name" id="company_name" class="enquiry-control" placeholder="Preferred Course" required>
                </div>

                <div class="form__validation">
                    <span id="company_name_error"
                        class="error errormsg mt-2"><?= form_error('company_name'); ?></span>
                </div>
                
                <div class="enquiry-group" id="contact">
                  <div class="icon">
                  <svg version="1.1" height="18px" width="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 297 297" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 297 297">
  <g>
    <path d="M148.51,117.216c32.317,0,58.608-26.291,58.608-58.608S180.827,0,148.51,0c-32.317,0-58.608,26.291-58.608,58.608   S116.193,117.216,148.51,117.216z" fill="#e91e63"/>
    <path d="m227.154,145.618c-0.025-0.008-0.073-0.026-0.098-0.032-7.631-1.864-30.999-5.133-30.999-5.133-2.638-0.812-5.457,0.585-6.406,3.188l-35.174,96.509c-2.029,5.567-9.903,5.567-11.932,0l-35.174-96.509c-0.766-2.102-2.75-3.42-4.876-3.42-0.504,0-24.531,3.369-32.53,5.358-21.858,5.435-35.645,26.929-35.645,49.329v80.302c0,12.034 9.756,21.79 21.79,21.79h184.782c12.034,0 21.79-9.756 21.79-21.79v-80.569c-0.001-22.303-14.328-42.096-35.528-49.023z" fill="#e91e63"/>
    <path d="m161.775,138.613c-1.404-1.53-3.456-2.299-5.532-2.299h-15.485c-2.076,0-4.129,0.77-5.532,2.299-2.173,2.368-2.489,5.789-0.946,8.462l8.278,12.479-3.875,32.69 7.631,20.3c0.744,2.042 3.631,2.042 4.375,0l7.631-20.3-3.875-32.69 8.278-12.479c1.541-2.673 1.225-6.094-0.948-8.462z" fill="#e91e63"/>
  </g>
</svg>
                  </div>
                    <input id="contact_person" type="text" class="enquiry-control" placeholder="name of the person" required name="contact_person" >
                </div>

                <div class="form__validation">
                    <span id="contact_person_error"
                        class="error errormsg mt-2"><?= form_error('contact_person'); ?></span>
                </div>
                
                <button type="submit" class="submit-btn" id="addNewEnquiry">Submit</button>
            </form>
            
            <div class=" enquiry-footer">
                <p>Powered By EMIGO</p>
                <div class="locations">Dubai | India</div>
            </div>
        </div>
    </div>




<!-- Add Bootstrap CSS -->

<!-- Add Bootstrap JS and jQuery -->
 <script src="<?php echo base_url();?>assets/admin/js/jquery-3.7.1.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/admin/js/ownerscripts.js"></script> 


</body>


</html>