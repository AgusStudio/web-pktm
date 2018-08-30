<div class="left side-menu" style="position: fixed">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php if($user->foto==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$user->foto); } ?>" alt="Photo" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $user->nama_admin;?></a>
                </div>
                <p class="text-muted m-0">BPS</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url('admin');?>" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/kategori');?>" class="waves-effect"><i class="fa fa-cubes"></i><span> Kategori Variabel </span></a>
                </li>
                <li>
                    <a href="<?php echo base_url('admin/variabel/Nasional');?>" class="waves-effect"><i class="fa fa-database"></i><span> Variabel Nasional </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/variabel/Lokal');?>" class="waves-effect"><i class="fa fa-database"></i> Variabel Lokal  </a>
                </li>
				<li>
                    <a href="<?php echo site_url('admin/jadwal');?>" class="waves-effect"><i class="fa fa-calendar"></i><span> Jadwal Pendataan </span></a>
                </li>
				<li>
                    <a href="#" class="waves-effect"><i class="fa fa-cogs"></i><span> Setting </span><span class="pull-right"><i class="fa fa-angle-down pull-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('admin/indeks');?>"> Indeks Kemiskinan </a></li>
                        <li><a href="<?php echo base_url('admin/rt');?>"> Data RT </a></li>
                        <li><a href="<?php echo base_url('admin/profile');?>"> Profile </a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/laporan');?>" class="waves-effect"><i class="fa fa-file"></i><span> Laporan </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('admin/logout');?>" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>