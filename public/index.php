    <?php
    include_once "admin/master/header.php";
    ?>
    <aside id="sidebar" class="sidebar">
        <section class="sidebar-container">
            <section class="sidebar-wrapper">
                <a href="./admin/clinic/index.php" class="sidebar-link">
                    <i class="fas fa-home"></i>
                    <span>مدیریت کلینیک</span>
                </a>

                <a href="./admin/policlinic/index.php" class="sidebar-link">
                    <i class="fas fa-bars"></i>
                    <span>مدیریت مطب</span>
                </a>
                <section class="sidebar-group-link">
                    <section class="sidebar-dropdown-toggle">
                        <i class="fas fa-users icon"></i>
                        <span>مدیریت کاربران</span>
                        <i class="fas fa-angle-left angle"></i>
                    </section>
                    <section class="sidebar-dropdown">
                        <a href="./admin/patients/index.php">بیماران</a>
                        <a href="./admin/doctors/index.php">پزشکان</a>
                        <a href="./admin/secretaries/index.php">منشی ها</a>
                        <a href="./admin/users/index.php">کاربران</a>
                    </section>
                </section>
            </section>
    </aside>
    <div class="container">
    </div>
    <?php
    include_once "admin/master/footer.php";
    ?>