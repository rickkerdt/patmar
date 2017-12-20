<!-- Dit is de navigatie balk boven de pagina -->
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
            <!-- Hier worden de links gelegt om tussen de veschillende pagina's te navigeren-->
            <ul class="navbar-nav mx-auto w-100 justify-content-center">
                <li class="nav-item <?php if ($_GET["page"] == "index" || !isset($_GET["page"])) {
                    echo "active";
                } ?>">
                    <a class="nav-link" href="?page=index">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#myModal">Openingstijden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET["page"] == "dealers") {
                        echo "active";
                    } ?>" href="?page=dealers">Samenwerking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET["page"] == "storing") {
                        echo "active";
                    } ?>" href="?page=storing">Storing Melden</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET["page"] == "offerte") {
                        echo "active";
                    } ?>" href="?page=offerte">Offerte Aanvraag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($_GET["page"] == "contact") {
                        echo "active";
                    } ?>" href="?page=contact">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto justify-content-end">
                <?php if (!isset($_SESSION["loggedIn"])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=login">Login</a>
                    </li>
                <?php elseif ($_SESSION["loggedIn"] != ""): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard/?page=agenda">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=logout">Logout</a>
                    </li>
                <?php endif; ?>
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
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="col" style="padding-bottom: 50px">
                    <div class="modal-header ">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&nbsp &nbsp</span>
                        </button>
                        <h5 class="modal-title mx-auto" style="text-align: center;" id="exampleModalLabel"><b>
                                Openingstijden</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>

                <div class="modal-body text-center">
                    <b>A5 Patmar Marknesse</b><br>
                    maandag t/m vrijdag<br>
                    van 10.00 - 17.00 uur<br>
                    zaterdag van 9.00 - 13.00 uur<br>
                    lunchpauze 12.00-13.00 uur<br>
                    -----------------------------<br>
                    <b>A5 Patmar Meppel</b><br>
                    maandag gesloten.<br>
                    dinsdag t/m vrijdag<br>
                    van 10.00 - 17.00 uur<br>
                    zaterdag van 10.00 - 16.00 uur<br>


                </div>
            </div>
        </div>
    </div>
</header>