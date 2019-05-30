<nav class="light-green">
    <div class="container">
        <div class="nav-wrapper">
            <a href="index.php?page=home" class="brand-logo">Blog</a>

            <a href="#" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <li class="<?php echo ($page == "dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"><i class="material-icons">dashboard</i></a></li>
            </ul>

            <ul class="side-nav" id="mobile-menu">
                <li class="<?php echo ($page == "dashboard")?"active" : ""; ?>"><a href="index.php?page=dashboard"<i class="material-icons">dashboard</i></a></li>
            </ul>

        </div>
    </div>
</nav>