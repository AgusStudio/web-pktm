<?php $this->load->view('header');?>
<body>
	<div class="wrapper-page" style="margin-top: 5px">
        <div class="panel panel-pages" style="background-color: #0093dd">
            <div> 
                <h3 class="text-center text-white"><img class="thumb-lg img-thumbnail m-t-15" src="<?php echo base_url('assets/images/bps.png');?>"><br/>Pendataan<br/>Keluarga Tidak Mampu</h3>
            </div> 
            <div class="panel-body" style="padding-top: 0px">
            <form class="form-horizontal" action="<?php echo $action;?>" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input name="username" class="form-control input-lg " type="text" placeholder="Username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input name="password" class="form-control input-lg" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <select name="wilayah" class="form-control input-lg" required="">
                            <option value=" ">Pilih Wilayah</option>
                            <?php foreach ($view_wilayah as $view_wilayah): ?>
                                <option value="<?php echo $view_wilayah->id_rt;?>"><?php echo "RT: ".$view_wilayah->rt."/RW: ".$view_wilayah->rw."/Desa: ".$view_wilayah->nama_desa;?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">                    
	                    <label for="checkbox-signup" class="text-white">
	                        <?php echo $message;?>
	                    </label>
                    </div>                   
                </div>
                <div class="form-group text-center">
                    <div class="col-xs-12">
                        <button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-primary">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup" class="text-white pull-left">
                                Remember me
                            </label>
                            <a href="recoverpw.html" class="pull-right text-white"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                        
                    </div>
                </div> 
            </form> 
            </div>                                 
            
        </div>
    </div>
<?php $this->load->view('footer');?>