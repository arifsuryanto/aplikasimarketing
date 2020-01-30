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
                            <h5 class="card-title" align="center"> AM's Name</h5>
                        </div>
                        </center>
                        
                        <form>
                        <div class="form-group">
                            <label for="username">Code</label>
                            <input type="text" class="form-control" id="kode_am" name="kode_am" value="<?=$profile->kode_am;?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="nama_am" name="name_am" value="<?=$profile->nama_am;?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="<?=$profile->password;?>">
                            <input type="text" class="form-control" id="kode" value="<?=$profiles->kode_am;?>">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" value="<?=$profiles->nama_am;?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" value="<?=$profiles->password;?>">
                        </div>
                        <button type="submit" class="btn btn-warning">Change</button>
                        </form>
                       
                            		
					</div>
				</div>
            </div>
        </div>
	</div>
</div>
