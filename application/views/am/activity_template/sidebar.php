<!-- Sidebar --> 
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?=base_url('assets/')?>img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									
								<?php
									echo $this->session->userdata('kode_am'); 
									
								?>
								
									<span class="user-level">Account Marketing</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?=base_url('activity_am/profile')?>">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('activity_am/index')?>">
								<span>Plan</>
							</a>
                        </li>
                        
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('activity_am/activity')?>">
								<span>Activity</span>
							</a>
                        </li>
                        
						<li class="nav-item">
							<a class="nav-link" href="<?=base_url('activity_am/customer')?>">
								<span>Customer</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->