<header>
    <!-- Image and text -->

    <nav class="navbar navbar-dark navbar-expand-lg fixed-top navbar-custom mx-auto"
         style=" background-color: #00769f;">
        <div class="d-lg-none d-xl-none navbar-brand">A5 Deco - Patmar</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-left col" href="#">
                <div id="navlogo" class=" d-none d-lg-block d-xl-block">
                    <img src="/resource/assets/logo.png" height="128" width="128"
                         style="padding-top: 0px; position: absolute; border-radius: 35%" alt="1">
                </div>
            </a>
            <ul class="navbar-nav mx-auto w-100 justify-content-center">
                <li class="nav-item active">
                    <a class="nav-link" href="?page=index">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Openingstijden</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        Samenwerking
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Partners</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Storing Melden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=quotation">Offerte Aanvraag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto justify-content-end">
                <li class="nav-item">
                    <?php if (!isset($_SESSION["loggedIn"])) : ?>
                        <a class="nav-link" href="?page=login">Login</a>
                    <?php elseif ($_SESSION["loggedIn"] != ""): ?>
                        <a class="nav-link" href="?page=logout">Logout</a>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>
    <script>
        $(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    console.log("works");
                    $('#navlogo > img').fadeOut();
                }
                else if ($(this).scrollTop() < 200) {
                    $('#navlogo > img').fadeIn();
                }
            });
        });
    </script>
</header>