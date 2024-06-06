<?php  session_start(); ?>
<div class="bg-sidebar vh-100 w-50 position-fixed">
            <div class="log d-flex justify-content-between">
                <h1 class="E-classe text-start ms-3 ps-1 mt-3 h6 fw-bold">Trade2z</h1>
                <i class="far fa-times h4 me-3 close align-self-end d-md-none"></i>
            </div>
            <div class="img-admin d-flex flex-column align-items-center text-center gap-2">
                <img class="rounded-circle" src="../assets/img/admin logo.jpeg" alt="img-admin" height="120" width="120">
                 <div class="h6 fw-bold">
                 <span style="display: inline-block;">Hello!</span>
                 <span style="display: inline-block; margin-left: 5px;">Admin</span></div>

            </div>
            <div class=" bg-list d-flex flex-column align-items-center fw-bold gap-2 mt-4 ">
                <ul class="d-flex flex-column list-unstyled">
                    <li class="h7"><a class="nav-link text-dark" href="dashboard.php"><i
                            class="fal fa-home-lg-alt me-2"></i> <span>Home</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="userinfo.php"><i
                                class="fas fa-users me-2"></i> <span>Users</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="crypto.php"><i
                                class="fab fa-bitcoin me-2"></i> <span>Currency</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="expert.php"><i
                                class="fas fa-user-tie me-2"></i> <span>Expert</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="blogs.php"><i
                                class="fas fa-blog me-2"></i> <span>Blogs</span></a></li>
<div class="dropdown">
    <a class="nav-link text-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-chalkboard"></i> <span>Workshop</span>
    </a>
    <ul class="dropdown-menu bg-yellow" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="seminar.php"><i class="far fa-calendar-alt me-2"></i><span>Seminar</span></a></li>
        <li><a class="dropdown-item" href="expertsession.php"><i class="fas fa-comment"></i><span>Session</span></a></li>
    </ul>
</div>


                 <!--    <li class="h7"><a class=" nav-link text-dark" href="seminar.php"><i
                                class="far fa-calendar-alt me-2"></i> <span>Seminar</span></a></li>
                    <li class="h7"><a class=" nav-link text-dark" href="transaction.php"><i
                                class="fas fa-exchange-alt me-2"></i> <span>Transaction</span></a></li> -->

<div class="dropdown">
    <a class="nav-link text-dark dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-money-bill-alt"></i> <span>Finance</span>
    </a>
    <ul class="dropdown-menu bg-yellow" aria-labelledby="dropdownMenuLink">
        <li><a class="dropdown-item" href="transaction.php"><i
                                class="fas fa-exchange-alt me-2"></i><span>Transaction</span></a></li>
        <li><a class="dropdown-item" href="wallet.php"><i
                                class="fas fa-wallet me-2"></i> <span>Wallet</span></a></li>
    </ul>
</div>
<style>
.dropdown-menu.bg-yellow {
    background-color: #ffffe0;
}
.dropdown:hover .dropdown-menu {
    display: block;
}
</style>


                    <!-- <li class="h7"><a class=" nav-link text-dark" href="wallet.php"><i
                                class="fas fa-wallet me-2"></i> <span>Wallet</span></a></li>       -->               
                    <li class="h7"><a class=" nav-link text-dark" href=""><i
                                class="fal fa-cog me-2"></i> <span>Settings</span></a></li>

                <ul class="logout d-flex justify-content-start list-unstyled">
                    <li class=" h7"><a class="nav-link text-dark" href="../../login-signup.php"><span>Logout</span><i
                                class="fal fa-sign-out-alt ms-2"></i></a></li>
                </ul>
            </div>

        </div>