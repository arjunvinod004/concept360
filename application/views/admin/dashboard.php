<div class="application-content main-menu-content">
    <div class="application-content__container container">
        <div class="application-main-menus">
            <div class="application-main-menus__image">
                <img src="<?php echo base_url();?>assets/admin/images/main-menu-image.webp" alt="main menu image"
                    class="application-main-menus__image-img" width="330" height="430">
            </div>
            <div class="application-main-menus__content">
                <a href="<?php echo base_url('admin/enquiry/index/0'); ?>" class="application-main-menus__items">
                    <span class="application-main-menus__items-icon-wrapper">
                        <img src="<?php echo base_url();?>assets/admin/images/enquiry-icon.png"
                            alt="dishes icon" class="application-main-menus__items-icon-img" width="39" height="39">
                    </span>
                    <span class="application-main-menus__items-name">
                       Inbox
                    </span>
                </a>

                <?php if($role_id == 1): ?>
                    <a href="<?php echo base_url('admin/users/index/0'); ?>" class="application-main-menus__items">
                    <span class="application-main-menus__items-icon-wrapper">
                        <img src="<?php echo base_url();?>assets/admin/images/companies.png"
                            alt="monitor icon" class="application-main-menus__items-icon-img" width="39" height="39">
                    </span>
                    <span class="application-main-menus__items-name">
                       Settings
                    </span>
                </a>
                <?php endif; ?>
               
                <!-- <a href="<?php echo base_url(''); ?>" class="application-main-menus__items">
                    <span class="application-main-menus__items-icon-wrapper">
                        <img src="<?php echo base_url();?>assets/admin/images/main-menu-report-icon.svg"
                            alt="dishes icon" class="application-main-menus__items-icon-img" width="39" height="39">
                    </span>
                    <span class="application-main-menus__items-name">
                        Reports
                    </span>
                </a>
                <a href="<?php echo base_url('owner/settings'); ?>" class="application-main-menus__items">
                    <span class="application-main-menus__items-icon-wrapper">
                        <img src="<?php echo base_url();?>assets/admin/images/main-menu-settings-icon.svg"
                            alt="dishes icon" class="application-main-menus__items-icon-img" width="39" height="39">
                    </span>
                    <span class="application-main-menus__items-name">
                        Settings
                    </span>
                </a> -->
            </div>
        </div>
    </div>
</div>