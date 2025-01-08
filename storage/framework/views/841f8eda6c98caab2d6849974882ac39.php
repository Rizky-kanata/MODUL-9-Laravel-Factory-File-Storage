<?php
    $currentRouteName = Route::currentRouteName();
?>

<nav class="navbar navbar-expand-md navbar-dark bg-primary">
    <div class="container">
        <a href="<?php echo e(route('home')); ?>" class="navbar-brand mb-0 h1"><i class="bi-hexagon-fill me-2"></i> Data Master</a>

        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <hr class="d-md-none text-white-50">

            <ul class="navbar-nav flex-row flex-wrap">
                <li class="nav-item col-2 col-md-auto"><a href="<?php echo e(route('home')); ?>"
                        class="nav-link <?php if($currentRouteName == 'home'): ?> active <?php endif; ?>">Home</a></li>
                <li class="nav-item col-2 col-md-auto"><a href="<?php echo e(route('employees.index')); ?>"
                        class="nav-link <?php if($currentRouteName == 'employees.index'): ?> active <?php endif; ?>">Employee</a></li>
            </ul>

            <hr class="d-md-none text-white-50">

            <!-- Dropdown for user profile and logout -->
            <?php if(auth()->guard()->check()): ?>
                <div class="dropdown ms-md-auto">
                    <a class="btn btn-outline-light my-2" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi-person-circle me-1"></i> My Profile
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">My Profile</a></li>
                        <li>
                            <form action="<?php echo e(route('logout')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
    </div>
</nav>
<?php /**PATH C:\laragon\www\Laravel\MODUL8T\resources\views/layouts/nav.blade.php ENDPATH**/ ?>