<?php
function isStudent($userRole) {
    return strtolower($userRole) === 'student';
}
?>

<div class="app-sidebar-menu overflow-hidden flex-column-fluid">
              <!--begin::Menu wrapper-->
              <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper">
                <!--begin::Scroll wrapper-->
                <div id="kt_app_sidebar_menu_scroll" class="scroll-y my-5 mx-3" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer" data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true"
                style = "height: 738px">
                  <!--begin::Menu-->
                  <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_app_sidebar_menu" data-kt-menu="true" data-kt-menu-expand="false">

                    <!--begin:Menu item-->
                    <div class="menu-item pt-5">
                      <!--begin:Menu content-->
                      <div class="menu-content">
                        <span class="menu-heading fw-bold text-uppercase fs-7">Dashboard</span>
                      </div>
                      <!--end:Menu content-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item for Posts Options-->
                    
                    <!--end:Menu item-->
                    <!-- begin:Menu item for Activities -->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                      <!--begin:Menu link-->
                      <span class="menu-link">
                        <span class="menu-icon">
                          <i class="ki-duotone ki-element-7 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                          </i>
                        </span>
                        <span class="menu-title">Activities</span>
                        <span class="menu-arrow"></span>
                      </span>
                      <!--end:Menu link-->
                      <!--begin:Menu sub-->
                      <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item for Manage Posts-->
                        <div class="menu-item">
                          <!--begin:Menu link-->
                          <a class="menu-link" href="<?php echo URLROOT; ?>/activities">
                            <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Manage Activities</span>
                          </a>
                          <!--end:Menu link-->

                          
                        </div>
                        <!--end:Menu item-->
                        <!--begin:Menu item for Create Post-->
                        <?php if (isset($_SESSION['roles']) && $_SESSION['roles'] == "student") : 
                          ?>
    <!-- Content for student role -->
    <div class="menu-item">
        <!-- Your student-specific content goes here -->
        <a class="menu-link" href="<?php echo URLROOT; ?>/activities/linklist">
                            <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Available Activities</span>
                          </a>
    </div>
<?php elseif(isset($_SESSION['roles']) && $_SESSION['roles'] != "student") : ?>
    <!-- Content for other roles -->
    <div class="menu-item">
        <!-- Your content for other roles goes here -->
        <a class="menu-link" href="<?php echo URLROOT; ?>/activities/create">
                            <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Create Activities</span>
                          </a>
    </div>
    <?php else : ?>
<?php endif; ?>
                        <!--end:Menu item-->
                      </div>
                      <!--end:Menu sub-->
                    </div>
                    <!-- end:Menu item -->
                    <!-- begin:Menu item for Registration-->
                    
                                        <!-- end:Menu item -->
                    <!--  begin:Menu item for Feedback
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                          begin:Menu link
                                          <span class="menu-link">
                                            <span class="menu-icon">
                                              <i class="ki-duotone ki-element-7 fs-2">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                              </i>
                                            </span>
                                            <span class="menu-title">Feedback</span>
                                            <span class="menu-arrow"></span>
                                          </span>
                                          end:Menu link-->
                                          <!--begin:Menu sub
                                          <div class="menu-sub menu-sub-accordion">
                                            begin:Menu item for Manage Posts-->
                                            <div class="menu-item">
                                              <!--begin:Menu link
                                              <a class="menu-link" href="<?php echo URLROOT; ?>/feedbacks">
                                                <span class="menu-bullet">
                                                  <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Manage Feedback</span>
                                              </a>
                                              end:Menu link-->
                                            </div>
                                            <!--end:Menu item
                                            begin:Menu item for Create Post
                                            <div class="menu-item">
                                              begin:Menu link
                                              <a class="menu-link" href="<?php echo URLROOT; ?>/posts/create">
                                                <span class="menu-bullet">
                                                  <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Create Feedback</span>
                                              </a>
                                              end:Menu link
                                            </div>
                                            end:Menu item
                                          </div>
                                          end:Menu sub
                                        </div>
                                         end:Menu item -->
                    <!-- begin:Menu item for Rewards-->
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                      <!--begin:Menu link-->
                      <span class="menu-link">
                        <span class="menu-icon">
                          <i class="ki-duotone ki-element-7 fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                          </i>
                        </span>
                        <span class="menu-title">Rewards</span>
                        <span class="menu-arrow"></span>
                      </span>
                      <!--end:Menu link-->
                      <!--begin:Menu sub-->
                      <div class="menu-sub menu-sub-accordion">

                        <!--begin:Menu item for Create Post-->
                        <div class="menu-item">
                          <!--begin:Menu link-->
                          <a class="menu-link" href="<?php echo URLROOT; ?>/rewards/index.php">
                            <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Rewards Showcase</span>
                          </a>
                          <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                        

                        <!--begin:Menu item for Create Post-->
                        <div class="menu-item">
                          <!--begin:Menu link-->
                          <a class="menu-link" href="<?php echo URLROOT; ?>/rewards/claimrewards">
                            <span class="menu-bullet">
                              <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Claimed Rewards</span>
                          </a>
                          <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->
                      </div>
                      <!--end:Menu sub-->
                    </div>
                    <!-- end:Menu item -->
                          
                  
                
                  </div>
                  <!--end::Menu-->
                </div>
                <!--end::Scroll wrapper-->
              </div>
              <!--end::Menu wrapper-->
            </div>
            <!--end::sidebar menu-->
