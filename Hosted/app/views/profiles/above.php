<?php
                    foreach ($data['studentProfile'] as $studentProfile) :
                                    ?>
                                    <?php endforeach; ?>
                                    <div class="card mb-5 mb-xl-10">
								<div class="card-body pt-9 pb-0">
									<!--begin::Details-->
									<div class="d-flex flex-wrap flex-sm-nowrap">
										<!--begin: Pic-->
										<div class="me-7 mb-4">
											<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                            <img src="<?php echo URLROOT."/public/".$studentProfile->st_image; ?>" alt="image">
												<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
											</div>
										</div>
										<!--end::Pic-->
										<!--begin::Info-->
										<div class="flex-grow-1">
											<!--begin::Title-->
											<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
												<!--begin::User-->
												<div class="d-flex flex-column">
													<!--begin::Name-->
													<div class="d-flex align-items-center mb-2">
													<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo $studentProfile->firstname; ?></a>
														<a href="#">
															<i class="ki-duotone ki-verify fs-1 text-primary">
																<span class="path1"></span>
																<span class="path2"></span>
															</i>
														</a>
													</div>
													<!--end::Name-->
													<!--begin::Info-->
													<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
														<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
														<i class="ki-duotone ki-profile-circle fs-4 me-1">
															<span class="path1"></span>
															<span class="path2"></span>
															<span class="path3"></span>
														</i><?php echo $studentProfile->roles; ?></a>
														<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
														<i class="ki-duotone ki-geolocation fs-4 me-1">
															<span class="path1"></span>
															<span class="path2"></span>
														</i><?php echo $studentProfile->city; ?></a>
														<a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
														<i class="ki-duotone ki-sms fs-4">
															<span class="path1"></span>
															<span class="path2"></span>
														</i><?php echo $studentProfile->email; ?></a>
													</div>
													<div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
														Test
													</div>
													<!--end::Info-->
												</div>
												<!--end::User-->
												<!--begin::Actions-->
												<div class="d-flex my-4">
													<a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
														<i class="ki-duotone ki-check fs-3 d-none"></i>
														<!--begin::Indicator label-->
														<span class="indicator-label">Follow</span>
														<!--end::Indicator label-->
														<!--begin::Indicator progress-->
														<span class="indicator-progress">Please wait... 
														<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
														<!--end::Indicator progress-->
													</a>
													<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>

												</div>
												<!--end::Actions-->
											</div>
											<!--end::Title-->
											<!--begin::Stats-->
											
										</div>
										<!--end::Info-->
									</div>
									<!--end::Details-->
									
									
									<!--begin::Navs-->
								</div>
							</div>