 <!-- <?php 
$current_url = $_SERVER['REQUEST_URI']; 
$hide_nav = (strpos($current_url, 'admin/enquiry/add/'.$company_code) !== false);
?>  -->

<!-- <?php if (!$hide_nav) : ?> -->
<div class="application-navigation container">
    <ul class="application-navigation__ul">
        <!-- <li class="application-navigation__li">
            <a href="<?php echo base_url('admin/dashboard'); ?>"
                class="application-navigation__a <?php echo ($controller == 'dashboard') ? 'application-navigation__a--active' : ''; ?>">Dashboard</a>
        </li> -->
        
        <li class="application-navigation__li">
            <a href="<?php echo base_url('admin/enquiry/index/0'); ?>"
                class="application-navigation__a <?php echo ($controller == 'enquiry' || $controller == 'Enquiry') ? 'application-navigation__a--active' : ''; ?>">Inbox <span id="tabs__nav_pending_table_count" class="">
                <?php if ($unread_count > 0) { ?>
    <span><?php echo $unread_count; ?></span>
<?php } ?>
            </span></a>


                
        </li>

        <li class="application-navigation__li">
            <a href="<?php echo base_url('admin/users/index/0'); ?>"
                class="application-navigation__a <?php echo ($controller == 'users') ? 'application-navigation__a--active' : ''; ?>">Settings</a>
        </li>

        <li class="application-navigation__li">
            <a href="<?php echo base_url('admin/reports/index/0'); ?>"
                class="application-navigation__a <?php echo ($controller == 'reports') ? 'application-navigation__a--active' : ''; ?>">Reports</a>
        </li>

        <li class="application-navigation__li">
            <a href="<?php echo base_url('admin/login/logout'); ?>" class="application-navigation__a">Logout</a>
        </li>
    </ul>
</div>
<!-- <?php endif; ?> -->

<!-- <script>
    setInterval(function () {
  location.reload(); // reloads the entire page
}, 6000); // refresh every 6 seconds

</script> -->
