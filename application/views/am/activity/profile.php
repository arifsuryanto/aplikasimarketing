<br><br><br>
<div class="main-panel">
    <div class="page-inner">
        <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<div>
							<h4 class="card-title" align="center">My Profile</h4>
						</div>
                    </div>
					<div class="card-body">
                        <center>
                        <div class="avatar avatar-xxl">
							<img src="<?=base_url('assets/')?>img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                            <h5 class="card-title" align="center"> <?=$profile->nama_am;?></h5>
                        </div>
                        </center>
                        
                        <form method="post" action="<?=base_url('activity_am/profile')?>">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="id_am" name="id_am" value="<?=$profile->id_am;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Code</label>
                            <input type="text" class="form-control" id="kode" value="<?=$profile->kode_am;?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" value="<?=$profile->nama_am;?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="<?=$profile->password;?>">
                        </div>
                        <button type="submit" name="change" class="btn btn-warning">Change</button>
                        </form>
                       
                            		
					</div>
				</div>
            </div>
        </div>
	</div>
</div>
