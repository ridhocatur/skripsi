<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fa fa-fw fa-archive"></i>
    <span>Data</span>
  </a>
  <div id="collapseTwo" class="collapse <?= $this->uri->segment(1) == 'bahanbantu' || $this->uri->segment(1) == 'kayulog' || $this->uri->segment(1) == 'vinir' || $this->uri->segment(1) == 'supplier' || $this->uri->segment(1) == 'bahanmasuk' || $this->uri->segment(1) == 'kayumasuk' || $this->uri->segment(1) == 'vinirmasuk' || $this->uri->segment(1) == 'gluemix' || $this->uri->segment(1) == 'plywood' ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Data Master:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'bahanbantu' ? 'active' : '' ?>" href="bahanbantu">Bahan Bantu</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'kayulog' ? 'active' : '' ?>" href="kayulog">Kayu Log</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'vinir' ? 'active' : '' ?>" href="vinir">Vinir</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'supplier' ? 'active' : '' ?>" href="supplier">Supplier</a>
    <h6 class="collapse-header">Barang Masuk:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'bahanmasuk' ? 'active' : '' ?>" href="bahanmasuk">Bahan Bantu</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'kayumasuk' ? 'active' : '' ?>" href="kayumasuk">Kayu Log</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'vinirmasuk' ? 'active' : '' ?>" href="vinirmasuk">Vinir</a>
    <h6 class="collapse-header">Barang Keluar:</h6>
      <a class="collapse-item <?= $this->uri->segment(1) == 'gluemix' ? 'active' : '' ?>" href="gluemix">Gluemix</a>
      <a class="collapse-item <?= $this->uri->segment(1) == 'plywood' ? 'active' : '' ?>" href="plywood">Plywood</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
  <a class="nav-link" href="laporan"><i class="fa fa-fw fa-file"></i><span> Laporan</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  EXTRAS
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?= $this->uri->segment(1) == 'pegawai' ? 'active' : '' ?>">
  <a class="nav-link" href="pegawai"><i class="fa fa-users"></i><span> Pegawai</span></a>
</li>
<li class="nav-item <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
  <a class="nav-link" href="kategori"><i class="fa fa-tags"></i><span> Kategori</span></a>
</li>
<li class="nav-item <?= $this->uri->segment(1) == 'ukuran' ? 'active' : '' ?>">
  <a class="nav-link" href="ukuran"><i class="fa fa-arrows-alt"></i><span> Ukuran</span></a>
</li>
<li class="nav-item <?= $this->uri->segment(1) == 'jeniskayu' ? 'active' : '' ?>">
  <a class="nav-link" href="jeniskayu"><i class="fa fa-cogs"></i><span> Jenis Kayu</span></a>
</li>