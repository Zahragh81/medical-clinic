<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>تقویم کامل - برنامه‌ها | فرست - قالب مدیریت بوت‌استرپ</title>

    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico">

    <!-- Icons -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/flag-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/rtl/core.css" class="template-customizer-core-css">
    <link rel="stylesheet" href="../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css">
    <link rel="stylesheet" href="../assets/css/demo.css">
    <link rel="stylesheet" href="../assets/vendor/css/rtl/rtl.css">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendor/libs/typeahead-js/typeahead.css">
    <link rel="stylesheet" href="../assets/vendor/libs/fullcalendar/fullcalendar.css">
    <link rel="stylesheet" href="../assets/vendor/libs/flatpickr/flatpickr.css">
    <link rel="stylesheet" href="../assets/vendor/libs/select2/select2.css">
    <link rel="stylesheet" href="../assets/vendor/libs/quill/editor.css">
    <link rel="stylesheet" href="../assets/vendor/libs/formvalidation/dist/css/formValidation.min.css">

    <!-- Page CSS -->

    <link rel="stylesheet" href="../assets/vendor/css/pages/app-calendar.css">
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="../assets/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>

<body>










    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-fluid border-0" placeholder="جستجو ..." aria-label="Search...">
        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
    </div>
    </div>
    </nav>

    <!-- / Navbar -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card app-calendar-wrapper">
                <div class="row g-0">
                    <!-- Calendar Sidebar -->
                    <div class="col app-calendar-sidebar" id="app-calendar-sidebar">
                        <div class="border-bottom p-4 my-sm-0 mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary btn-toggle-sidebar" data-bs-toggle="offcanvas" data-bs-target="#addEventSidebar" aria-controls="addEventSidebar">
                                    <i class="bx bx-plus"></i>
                                    <span class="align-middle">افزودن رویداد</span>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <!-- inline calendar (flatpicker) -->
                            <div class="ms-n2">
                                <div class="inline-calendar"></div>
                            </div>

                            <hr class="container-m-nx my-4">

                            <!-- Filter -->
                            <div class="mb-4">
                                <small class="text-small text-muted text-uppercase align-middle">فیلتر</small>
                            </div>

                            <div class="form-check mb-2 pb-1">
                                <input class="form-check-input select-all" type="checkbox" id="selectAll" data-value="all" checked>
                                <label class="form-check-label" for="selectAll">مشاهده همه</label>
                            </div>

                            <div class="app-calendar-events-filter">
                                <div class="form-check form-check-danger mb-2 pb-1">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-personal" data-value="personal" checked>
                                    <label class="form-check-label" for="select-personal">شخصی</label>
                                </div>
                                <div class="form-check mb-2 pb-1">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-business" data-value="business" checked>
                                    <label class="form-check-label" for="select-business">کسب و کار</label>
                                </div>
                                <div class="form-check form-check-warning mb-2 pb-1">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-family" data-value="family" checked>
                                    <label class="form-check-label" for="select-family">خانواده</label>
                                </div>
                                <div class="form-check form-check-success mb-2 pb-1">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-holiday" data-value="holiday" checked>
                                    <label class="form-check-label" for="select-holiday">تعطیلات</label>
                                </div>
                                <div class="form-check form-check-info">
                                    <input class="form-check-input input-filter" type="checkbox" id="select-etc" data-value="etc" checked>
                                    <label class="form-check-label" for="select-etc">سایر</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Calendar Sidebar -->

                    <!-- Calendar & Modal -->
                    <div class="col app-calendar-content">
                        <div class="card shadow-none border-0">
                            <div class="card-body pb-0">
                                <!-- FullCalendar -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                        <div class="app-overlay"></div>
                        <!-- FullCalendar Offcanvas -->
                        <div class="offcanvas offcanvas-end event-sidebar" tabindex="-1" id="addEventSidebar" aria-labelledby="addEventSidebarLabel">
                            <div class="offcanvas-header border-bottom">
                                <h6 class="offcanvas-title" id="addEventSidebarLabel">افزودن رویداد</h6>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <form class="event-form pt-0" id="eventForm" onsubmit="return false">
                                    <div class="mb-3">
                                        <label class="form-label" for="eventTitle">عنوان</label>
                                        <input type="text" class="form-control" id="eventTitle" name="eventTitle" placeholder="عنوان رویداد">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventLabel">برچسب</label>
                                        <select class="select2 select-event-label form-select" id="eventLabel" name="eventLabel">
                                            <option data-label="primary" value="Business" selected>کسب و کار</option>
                                            <option data-label="danger" value="Personal">شخصی</option>
                                            <option data-label="warning" value="Family">خانواده</option>
                                            <option data-label="success" value="Holiday">تعطیلات</option>
                                            <option data-label="info" value="ETC">سایر</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventStartDate">تاریخ شروع</label>
                                        <input type="text" class="form-control" id="eventStartDate" name="eventStartDate" placeholder="تاریخ شروع">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventEndDate">تاریخ پایان</label>
                                        <input type="text" class="form-control" id="eventEndDate" name="eventEndDate" placeholder="تاریخ پایان">
                                    </div>
                                    <div class="mb-3">
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input allDay-switch">
                                            <span class="switch-toggle-slider">
                                                <span class="switch-on"></span>
                                                <span class="switch-off"></span>
                                            </span>
                                            <span class="switch-label">تمام روز</span>
                                        </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventURL">آدرس URL رویداد</label>
                                        <input type="url" class="form-control" id="eventURL" name="eventURL" placeholder="https://www.google.com">
                                    </div>
                                    <div class="mb-3 select2-primary">
                                        <label class="form-label" for="eventGuests">افزودن مهمانان</label>
                                        <select class="select2 select-event-guests form-select" id="eventGuests" name="eventGuests" multiple>
                                            <option data-avatar="1.png" value="Jane Foster">تونی استارک</option>
                                            <option data-avatar="3.png" value="Donna Frank">پیتر پارکر</option>
                                            <option data-avatar="5.png" value="Gabrielle Robertson">استیو راجرز</option>
                                            <option data-avatar="7.png" value="Lori Spears">اولیور کویین</option>
                                            <option data-avatar="9.png" value="Sandy Vega">بروس وین</option>
                                            <option data-avatar="11.png" value="Cheryl May">کلینت بارتون</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventLocation">مکان</label>
                                        <input type="text" class="form-control" id="eventLocation" name="eventLocation" placeholder="مکان رویداد">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="eventDescription">شرح</label>
                                        <textarea class="form-control" name="eventDescription" id="eventDescription"></textarea>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-sm-between justify-content-start my-4">
                                        <div>
                                            <button type="submit" class="btn btn-primary btn-add-event me-sm-3 me-1">افزودن</button>
                                            <button type="submit" class="btn btn-primary btn-update-event d-none me-sm-3 me-1">
                                                به‌روزرسانی
                                            </button>
                                            <button type="reset" class="btn btn-label-secondary btn-cancel me-sm-0 me-1" data-bs-dismiss="offcanvas">
                                                انصراف
                                            </button>
                                        </div>
                                        <div><button class="btn btn-label-danger btn-delete-event d-none">حذف</button></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /Calendar & Modal -->
                </div>
            </div>
        </div>
        <!-- / Content -->



        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/libs/hammer/hammer.js"></script>

    <script src="../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../assets/vendor/libs/typeahead-js/typeahead.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/fullcalendar/fullcalendar.js"></script>
    <script src="../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
    <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
    <script src="../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
    <script src="../assets/vendor/libs/select2/select2.js"></script>
    <script src="../assets/vendor/libs/select2/i18n/fa.js"></script>
    <script src="../assets/vendor/libs/jdate/jdate.js"></script>
    <script src="../assets/vendor/libs/flatpickr/flatpickr-jdate.js"></script>
    <script src="../assets/vendor/libs/flatpickr/l10n/fa-jdate.js"></script>
    <script src="../assets/vendor/libs/moment/moment.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/app-calendar-events.js"></script>
    <script src="../assets/js/app-calendar.js"></script>
</body>

</html>