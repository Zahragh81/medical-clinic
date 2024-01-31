<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../../assets/css/animate.min.css">
    <link rel="stylesheet" href="../../assets/css/grid.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <title>نوبت دهی کلینیک پزشکی</title>
</head>

<body dir="rtl">
    <header class="header">
        <section class="sidebar-header" style="background-color: #404E67;">
            <section class="d-flex justify-content-between flex-md-row-reverse px-2">
                <span id="sidebar-toggle-show" class="d-inline d-md-none pointer"><i class="fas fa-toggle-off"></i></span>
                <span id="sidebar-toggle-hide" class="d-none d-md-inline pointer"><i class="fas fa-toggle-on"></i></span>
                <span style="color: #fff;">کلینیک</span>
                <span class="d-md-none" id="menu-toggle"><i class="fas fa-ellipsis-h"></i></span>
            </section>
        </section>
        <section class="body-header" id="body-header">
            <section class="d-flex justify-content-between">
                <section>
                    <span class="mr-5">
                        <span id="search-area" class="search-area d-none">
                            <i id="search-area-hide" class="fas fa-times pointer"></i>
                            <input id="search-input" type="text" class="search-input">
                            <i class="fas fa-search pointer"></i>
                        </span>
                        <i id="search-toggle" class="fas fa-search p-1 d-none d-md-inline pointer"></i>
                    </span>

                    <span id="full-screen" class="pointer p-1 d-none d-md-inline mr-5">
                        <i id="screen-compress" class="fas fa-compress d-none"></i>
                        <i id="screen-expand" class="fas fa-expand "></i>
                    </span>
                </section>
                <section>
                    <span class="ml-2 ml-md-4 position-relative">
                        <span id="header-notification-toggle" class="pointer">
                            <i class="far fa-bell"></i><sup class="badge badge-danger">4</sup>
                        </span>
                        <section id="header-notification" class="header-notifictation rounded">
                            <section class="d-flex justify-content-between">
                                <span class="px-2">
                                    نوتیفیکیشن ها
                                </span>
                                <span class="px-2">
                                    <span class="badge badge-danger">جدید</span>
                                </span>
                            </section>

                            <ul class="list-group rounded px-0">
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <img class="notification-img" src="../../assets/images/avatar-2.jpg" alt="avatar">
                                        <section class="media-body pr-1">
                                            <h5 class="notification-user">محمد هاشمی</h5>
                                            <p class="notification-text">این یک متن تستی است</p>
                                            <p class="notification-time">30 دقیقه پیش</p>
                                        </section>
                                    </section>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <img class="notification-img" src="../../assets/images/avatar-2.jpg" alt="">
                                        <section class="media-body pr-1">
                                            <h5 class="notification-user">محمد هاشمی</h5>
                                            <p class="notification-text">این یک متن تستی است</p>
                                            <p class="notification-time">30 دقیقه پیش</p>
                                        </section>
                                    </section>
                                </li>
                                <li class="list-group-item list-group-item-action">
                                    <section class="media">
                                        <img class="notification-img" src="../../assets/images/avatar-2.jpg" alt="">
                                        <section class="media-body pr-1">
                                            <h5 class="notification-user">محمد هاشمی</h5>
                                            <p class="notification-text">این یک متن تستی است</p>
                                            <p class="notification-time">30 دقیقه پیش</p>
                                        </section>
                                    </section>
                                </li>
                            </ul>
                        </section>
                    </span>

                    <span class="ml-3 ml-md-5 position-relative">
                        <span id="header-profile-toggle" class="pointer">
                            <img class="header-avatar" src="../../assets/images/avatar-2.jpg" alt="">
                            <span class="header-username">کامران محمدی</span>
                            <i class="fas fa-angle-down"></i>
                        </span>
                        <section id="header-profile" class="header-profile rounded">
                            <section class="list-group rounded">
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-cog"></i>تنظیمات
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-user"></i>کاربر
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="far fa-envelope"></i>پیام ها
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-lock"></i>قفل صفحه
                                </a>
                                <a href="#" class="list-group-item list-group-item-action header-profile-link">
                                    <i class="fas fa-sign-out-alt"></i>خروج
                                </a>
                            </section>
                        </section>
                    </span>
                </section>
            </section>
        </section>
    </header>

    <section class="body-container">