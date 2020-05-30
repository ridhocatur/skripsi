<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>">
<img src="<?= base_url(); ?>assets/img/logotrp.jpg" alt="Logo" style="width:40px;">
  <div class="sidebar-brand-text mx-3">PT. TRP</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="./">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Data Utama
</div>

<!-- Nav Item - Pages Collapse Menu -->
<?php if ($this->session->userdata('level') == 'admin') {
  $this->load->view("page/sidebar/admin.php");
} elseif ($this->session->userdata('level') == 'manager') {
  $this->load->view("page/sidebar/manager.php");
} else {
  $this->load->view("page/sidebar/user.php");
}
?>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->