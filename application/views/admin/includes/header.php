<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <title>Dashboard | Emigo </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Emigo" name="description" />
    <meta content="CVS" name="author" />

    <link rel="shortcut icon" href="<?php echo base_url();?>assets/admin/images/favicon.ico">
    <link href="<?php echo base_url();?>assets/admin/css/crm-responsive.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/classic.min.css" rel="stylesheet" /> <!-- 'classic' theme -->
    <link href="<?php echo base_url();?>assets/admin/fonts/css/all.min.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/admin/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/icon.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/styles.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/admin/css/visitor-custom-styles.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="application-header">
        <div class="application-header__container container">
            <div class="application-header__brand">
                <a href="<?php echo base_url();?>/owner/dashboard" class="application-header__brand-logo">
                    <img src="https://static.wixstatic.com/media/8e71ed_7e1d4ea1255f4fecad5e9d9748dcd87e~mv2.png/v1/fill/w_416,h_124,al_c,q_85,usm_0.66_1.00_0.01,enc_avif,quality_auto/concept%20360%20logo.png" alt="brand lgo"
                        class="application-header__brand-logo-img" width="97" height="97">
                </a>
                <div class="application-header__brand-address">
                    <h2 class="application-header__brand-name"><?php echo $store_disp_name; ?></h2>
                    <!-- <p class="application-header__brand-address"><img class="mx-1" width="18" height="18" src="https://img.icons8.com/ios-glyphs/30/person-male.png" alt="person-male"/><?php echo $get_user_name; ?></p> -->
                </div>
            </div>
            <div class="application-header__provider">
                <!-- <img src="<?php echo base_url();?>assets/admin/images/choose-my-sketch.png" alt="choose my food logo"
                    class="application-header__provider-img" width="150" height="37"> -->
                <div class="application-header__provider-description"><?php echo $get_user_name; ?></div>
            </div>
        </div>

    </div>