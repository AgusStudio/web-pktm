<div class="left side-menu" style="position:fixed">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="<?php if($user->foto==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$user->foto); } ?>" alt="Photo" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $user->ketua_rt;?></a>
                </div>
                <p class="text-muted m-0"><?php echo "RT: ".$user->rt."/RW: ".$user->rw;?></p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="<?php echo base_url();?>" class="waves-effect"><i class="md md-home"></i><span> Home </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('welcome/keluarga');?>" class="waves-effect"><i class="fa fa-users"></i><span> Data Keluarga </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/penjadwalan');?>" class="waves-effect"><i class="fa fa-calendar"></i><span> Jadwal Pendataan </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/profile');?>" class="waves-effect"><i class="fa fa-user"></i><span> Profile </span></a>
                </li>
                <li>
                    <a href="<?php echo site_url('welcome/laporan');?>" class="waves-effect"><i class="fa  fa-file"></i><span> Laporan </span></a>
                </li>
				<li>
                    <a href="<?php echo site_url('welcome/logout');?>" class="waves-effect"><i class="md md-settings-power"></i><span> Logout </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>