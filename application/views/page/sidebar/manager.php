<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa fa-fw fa-archive"></i>
    <span>Data</span>
  </a>
  <div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'bahanbantu' || $this->uri->segment(1) == 'kayulog' || $this->uri->segment(1) == 'vinir' || $this->uri->segment(1) == 'bahanmasuk' || $this->uri->segment(1) == 'kayumasuk' || $this->uri->segment(1) == 'vinirmasuk' || $this->uri->segment(1) == 'gluemix' || $this->uri->segment(1) == 'plywood' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Data Master:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'bahanbantu' ? 'active' : '' ?>" href="<?= base_url('bahanbantu'); ?>">Bahan Bantu</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'kayulog' ? 'active' : '' ?>" href="<?= base_url('kayulog'); ?>">Kayu Log</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'vinir' ? 'active' : '' ?>" href="<?= base_url('vinir'); ?>">Vinir</a>
    <h6 class="collapse-header">Barang Masuk:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'bahanmasuk' ? 'active' : '' ?>" href="<?= base_url('bahanmasuk'); ?>">Bahan Bantu</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'kayumasuk' ? 'active' : '' ?>" href="<?= base_url('kayumasuk'); ?>">Kayu Log</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'vinirmasuk' ? 'active' : '' ?>" href="<?= base_url('vinirmasuk'); ?>">Vinir</a>
    <h6 class="collapse-header">Barang Keluar:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'gluemix' ? 'active' : '' ?>" href="<?= base_url('gluemix'); ?>">Gluemix</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'plywood' ? 'active' : '' ?>" href="<?= base_url('plywood'); ?>">Plywood</a>
    </div>
  </div>
</li>