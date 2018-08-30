<div class="topbar" style="background-color: #0093dd">
<!-- LOGO -->
<div class="topbar-left" style="background-color: #0093dd">
    <div class="text-center">
        <a href="<?php echo base_url(); ?>" class="logo"><img src="<?php echo base_url('assets/images/bps.png');?>" class="thumb-md"><span> <?php echo $user->nama_desa;?></span></a>
    </div>
</div>
<!-- Button mobile view to collapse sidebar menu -->
<div class="navbar navbar-default" role="navigation" style="background-color: #0093dd">
    <div class="container">
        <div class="">
            <div class="pull-left">
                <button class="button-menu-mobile open-left">
                    <i class="fa fa-bars"></i>
                </button>
                <span class="clearfix"></span>
            </div>
            <ul class="nav navbar-nav navbar-right pull-right">
                <li class="hidden-xs">
                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="fa fa-expand"></i></a>
                </li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php if($user->foto==''){ echo base_url('assets/users/userdefault.png');}else{ echo base_url('assets/users/'.$user->foto); } ?>" class="img-circle"></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('welcome/profile');?>"><i class="fa fa-user"></i> Profil</a></li>
                        <li><a href="<?php echo site_url('welcome/logout');?>"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
</div>