<?php
session_start();

if(!isset($_SESSION['user_login'])){
    header('location:login.php');
}

$logged_id = $_SESSION['logged_id'];
$_select_log = "SELECT * FROM users WHERE id = $logged_id";
$_select_log_res = mysqli_query($db_connection, $_select_log);
$_after_assoc_log = mysqli_fetch_assoc($_select_log_res);

$msg = "SELECT * FROM  messages order by id desc";
$msg_res = mysqli_query($db_connection, $msg);

$unread = "SELECT COUNT(*) as total FROM messages WHERE status=0";
$unread_res = mysqli_query($db_connection, $unread);
$_after_assoc_unread = mysqli_fetch_assoc($unread_res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/Easyway_Regform/image/favicon.png">
	<link rel="stylesheet" href="/Easyway_Regform/assets/vendor/chartist/css/chartist.min.css">
    <link href="/Easyway_Regform/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="/Easyway_Regform/assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/Easyway_Regform/assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        .card{
            height: auto;
        }
        .nav-header .logo-abbr{
            max-width: 35px;
        }
    </style>
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="/Easyway_Regform/image/logo.svg" alt="">
                <!-- sqrEloquent -->
                <!-- <img class="logo-compact" src="/Easyway_Regform/assets/images/logo-text.png" alt=""> -->
                <img class="brand-title" src="/Easyway_Regform/assets/images/logo-text.png" alt="">
                
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">
								Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">

							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M22.75 15.8385V13.0463C22.7471 10.8855 21.9385 8.80353 20.4821 7.20735C19.0258 5.61116 17.0264 4.61555 14.875 4.41516V2.625C14.875 2.39294 14.7828 2.17038 14.6187 2.00628C14.4546 1.84219 14.2321 1.75 14 1.75C13.7679 1.75 13.5454 1.84219 13.3813 2.00628C13.2172 2.17038 13.125 2.39294 13.125 2.625V4.41534C10.9736 4.61572 8.97429 5.61131 7.51794 7.20746C6.06159 8.80361 5.25291 10.8855 5.25 13.0463V15.8383C4.26257 16.0412 3.37529 16.5784 2.73774 17.3593C2.10019 18.1401 1.75134 19.1169 1.75 20.125C1.75076 20.821 2.02757 21.4882 2.51969 21.9803C3.01181 22.4724 3.67904 22.7492 4.375 22.75H9.71346C9.91521 23.738 10.452 24.6259 11.2331 25.2636C12.0142 25.9013 12.9916 26.2497 14 26.2497C15.0084 26.2497 15.9858 25.9013 16.7669 25.2636C17.548 24.6259 18.0848 23.738 18.2865 22.75H23.625C24.321 22.7492 24.9882 22.4724 25.4803 21.9803C25.9724 21.4882 26.2492 20.821 26.25 20.125C26.2486 19.117 25.8998 18.1402 25.2622 17.3594C24.6247 16.5786 23.7374 16.0414 22.75 15.8385ZM7 13.0463C7.00232 11.2113 7.73226 9.45223 9.02974 8.15474C10.3272 6.85726 12.0863 6.12732 13.9212 6.125H14.0788C15.9137 6.12732 17.6728 6.85726 18.9703 8.15474C20.2677 9.45223 20.9977 11.2113 21 13.0463V15.75H7V13.0463ZM14 24.5C13.4589 24.4983 12.9316 24.3292 12.4905 24.0159C12.0493 23.7026 11.716 23.2604 11.5363 22.75H16.4637C16.284 23.2604 15.9507 23.7026 15.5095 24.0159C15.0684 24.3292 14.5411 24.4983 14 24.5ZM23.625 21H4.375C4.14298 20.9999 3.9205 20.9076 3.75644 20.7436C3.59237 20.5795 3.50014 20.357 3.5 20.125C3.50076 19.429 3.77757 18.7618 4.26969 18.2697C4.76181 17.7776 5.42904 17.5008 6.125 17.5H21.875C22.571 17.5008 23.2382 17.7776 23.7303 18.2697C24.2224 18.7618 24.4992 19.429 24.5 20.125C24.4999 20.357 24.4076 20.5795 24.2436 20.7436C24.0795 20.9076 23.857 20.9999 23.625 21Z" fill="#0B2A97"/>
									</svg>
									<div class="pulse-css"><?=$_after_assoc_unread['total']?></div>
                                </a>
                                <div class="dropdown-menu rounded dropdown-menu-right">
                                    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 height380">
										<ul class="timeline">
                                            <?php foreach($msg_res as $msg){ ?>
											<li>
												<a href="../message/view.php?id=<?=$msg['id']?>">
                                                    <div class="timeline-panel">
                                                        <div class="media-body">
                                                            <h6 class="mb-1"><strong><?=$msg['name']?></strong> Send you Message</h6>
                                                            <small class="d-block"><?=date('d-m-y, h:i:s a', strtotime($msg['created_at']))?></small>
                                                        </div>
                                                    </div>
                                                </a>
											</li>
                                            <?php } ?>
										</ul>
									</div>
                                    <a class="all-notification" href="/Easyway_Regform/message/message.php">See all Messeges <i class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
                                    <?php if($_after_assoc_log['photo'] == null){?>
                                        <img src="/Easyway_Regform/assets/images/profile/17.jpg" width="20" alt=""/>
                                    <?php }else{?>
                                        <img src="/Easyway_Regform/Uploads/users/<?= $_after_assoc_log['photo']?>" width="20" alt=""/>
                                    <?php }?>
									<div class="header-info">
										<span class="text-black"><strong><?= $_after_assoc_log['name']?></strong></span>
                                        <?php if($_after_assoc_log['role'] != null){ ?>
										<p class="fs-12 mb-0">
                                            <?php if($_after_assoc_log['role'] == 1){
                                                echo 'Super Admin';
                                            }else if($_after_assoc_log['role'] == 2){
                                                echo 'Admin';
                                            }else if($_after_assoc_log['role'] == 3){
                                                echo 'Moderator';
                                            }else if($_after_assoc_log['role'] == 4){
                                                echo 'Editor';
                                            }else{
                                                echo 'Member';
                                            } ?>
                                        </p>
                                        <?php }?>
									</div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="/Easyway_Regform/users/Profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="/Easyway_Regform/Logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/Dashboard.php">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <?php if($_after_assoc_log['role'] == 1){?>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/users/Users.php">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Users</span>
						</a>
                    </li>
                    <?php }?>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/Logo/logo.php">
							<i class="flaticon-381-controls-3"></i>
							<span class="nav-text">Logo</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/About/about.php">
							<i class="flaticon-381-internet"></i>
							<span class="nav-text">About</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/Skill/skill.php">
							<i class="flaticon-381-heart"></i>
							<span class="nav-text">Skill</span>
						</a>
                    </li>
                    <li><a href="/Easyway_Regform/service/service.php" class="has-arrow ai-icon">
							<i class="flaticon-381-settings-2"></i>
							<span class="nav-text">Services</span>
						</a>
					</li>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/portfolio/portfolio.php">
							<i class="flaticon-381-notepad"></i>
							<span class="nav-text">Portfolio</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/feedback/feedback.php">
							<i class="flaticon-381-network"></i>
							<span class="nav-text">Testimonial</span>
						</a>
                    </li>
                    <li><a class="has-arrow ai-icon" href="/Easyway_Regform/message/message.php">
							<i class="flaticon-381-layer-1"></i>
							<span class="nav-text">Message</span>
						</a>
                    </li>
                </ul>
				<div class="add-menu-sidebar">
					<img src="images/calendar.png" alt="" class="mr-3">
					<p class="	font-w500 mb-0">Create Workout Plan Now</p>
				</div>
				<div class="copyright">
					<p><strong>sqrEloquent Fitness Admin Dashboard</strong> © 2024 All Rights Reserved</p>
					<p>Made with <span class="heart"></span> by Tamzid Hossen</p>
				</div>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">