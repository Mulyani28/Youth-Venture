<!-- 
<?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?> -->


									
<div class="app-navbar flex-shrink-0">
								<!--begin::Search-->
							

								
								
								<!--begin::User menu-->
								<div class="app-navbar-item ms-1 ms-md-4" id="kt_header_user_menu_toggle">
									<!--begin::Menu wrapper-->
									<div class="cursor-pointer symbol symbol-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									<?php if(isset($_SESSION['st_image'])) : ?>
											<img src="<?php echo URLROOT ."/public/".$_SESSION['st_image'];?>" class="rounded-3" alt="user" />
											<?php else : ?>
												<img src="<?php echo URLROOT ?>/public/assets/media/avatars/804946.png" class="rounded-3" alt="user" />
                                                <?php endif; ?>

									</div>
									<!--begin::User account menu-->
									<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
										<!--begin::Menu item-->
										<div class="menu-item px-3">
											<div class="menu-content d-flex align-items-center px-3">
												<!--begin::Avatar-->
											
												<div class="symbol symbol-50px me-5">
												<!-- $studentProfile->st_image; -->
												<?php if(isset($_SESSION['st_image'])) : ?>
													<img alt="Logo" src="<?php echo URLROOT ."/public/".$_SESSION['st_image'];?>" />
                                                <?php else : ?>
													<img alt="Logo" src="<?php echo URLROOT ?>/public/assets/media/avatars/804946.png" />
													<!-- <img alt="Logo" src="<?php echo URLROOT ?>/public/assets/media/avatars/<?php echo $studentProfile->st_image; ?>" /> -->

                                                <?php endif; ?>
										

													<!-- <img alt="Logo" src="<?php echo URLROOT ?>/public/assets/media/avatars/<?php echo $studentProfile->st_image; ?>" /> -->

												</div>
												<!--end::Avatar-->
												<!--begin::Username-->
												<div class="d-flex flex-column">
													<div class="fw-bold d-flex align-items-center fs-5">
													<?php if(isset($_SESSION['firstname'])) : ?>
														<?php echo $_SESSION['firstname']; ?>
													<?php else : ?>
														 <?php echo $_SESSION['username']; ?>
														 <?php endif; ?>

													<span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2"><?php echo ucfirst($_SESSION['roles']); ?></span></div>
													<a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
														<?php echo $_SESSION['email']; ?>
													</a>
												</div>
												<!--end::Username-->
											</div>
										</div>
										<!--end::Menu item-->
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->

										<?php if(isset($_SESSION['email'])) : ?>

										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="<?php echo URLROOT; ?>/pages/studProfile" class="menu-link px-5">My Profile</a>

										</div>
										<!--end::Menu item-->
										<!--begin::Menu item-->
										<div class="menu-item px-5">
											<a href="<?php echo URLROOT; ?>/views/index" class="menu-link px-5">
												<span  class="menu-text">My Dashboard</span>
											</a>
										</div>
										<!--end::Menu item-->
										<?php endif; ?>

										
										<!--begin::Menu separator-->
										<div class="separator my-2"></div>
										<!--end::Menu separator-->

										<!--begin::Menu item-->
									
										<!--end::Menu item-->
										<!--begin::Menu item-->
										
										<!--end::Menu item-->
										<!--begin::Menu item-->
										
										<div class="menu-item px-5">
										<?php 					
										
										if(isset($_SESSION['email'])) : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/logout" class="menu-link px-5">Logout</a>
                                                <?php else : ?>
                                                    <a href="<?php echo URLROOT; ?>/users/login" class="menu-link px-5">Login</a>
                                                <?php endif; ?>
										</div>

										<!--end::Menu item-->
									</div>
									<!--end::User account menu-->
									<!--end::Menu wrapper-->
								</div>
								<!--end::User menu-->
								<!--begin::Header menu toggle-->
								<div class="app-navbar-item d-lg-none ms-2 me-n2" title="Show header menu">
									<div class="btn btn-flex btn-icon btn-active-color-primary w-30px h-30px" id="kt_app_header_menu_toggle">
										<i class="ki-duotone ki-element-4 fs-1">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</div>
								</div>
								<!--end::Header menu toggle-->
								<!--begin::Aside toggle-->
								<!--end::Header menu toggle-->
							</div>
							