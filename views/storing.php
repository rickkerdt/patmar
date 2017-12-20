<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 14-12-2017
 * Time: 09:29
 */
?>
<div class="container" style="margin-top: 100px">
    <div class="row">

        <div class="col">&nbsp;</div>
        <div class="col-md-6 jumbotron">
            <h1 class="text">Storing melden</h1>

            <br>
            <p> Heeft u een storing aan uw product?&nbsp;<span style="line-height: 1.4;">Dan kunt u dit melden via onderstaand formulier.
            Wij zullen dan zo spoedig mogelijk contact met u opnemen.
            Voor een directe reactie kunt u ook bellen tijdens kantooruren.</span></p>
            <br>

            <form action="?page=storing" method="post">
                <!-- Als er errors voor komen worden die gegeven -->
                <?php if (count($errors) > 0) : ?>
    <?php foreach ($errors as $error) : ?>
        <div class="alert alert-warning">
            <strong>Fout!</strong> <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
<div class="form-group">
    <!-- Wanneer er geen errors voor komen wordt er een succes gegeven aan de user -->
    <?php if ($_SESSION["sent"]): $_SESSION["sent"] = false; ?>
        <div class="alert alert-success"><strong>Uw storing is succesvol verzonden.</strong></div>
    <?php endif; ?>
</div><!-- HTML form-->
<div class="form-group">
    <div class="row">
        <div class="form-group">

            <input type="email" class="form-control" name="email" id="email"
                   placeholder="voorbeeld@mail.nl *">
        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <input type="text" class="form-control" name="naam" id="name"
                   placeholder="Naam *">
        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <input type="text" class="form-control" name="adres" id="adres"
                   placeholder="Straatnaam + huisnummer ">
        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <input type="text" class="form-control" name="woonplaats" id="woonplaats"
                   placeholder="Woonplaats *">
        </div>
    </div>
    <div class="row">
        <div class="form-group">

            <input cols="40" type="text" class="form-control" name="telefoonnummer" id="Telefoonnummer"
                   placeholder="Telefoonnummer *">
        </div>
    </div>
    <div class="row">

        <div class="form-group">

                            <textarea rows="4" cols="40" class="form-control" name="bericht" id="Bericht"
                                      placeholder="Bericht *"></textarea>
        </div>
    </div>
    <div class="form-group">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>
    </div>
    <div class="row">
        <div class="form-group">
            <input type="submit" value="Versturen" name="storingsend">

            <br>
            <br>
            <p style="font-size: 0.9em;">Velden met een * zijn verplicht.</p>
        </div>

    </div>
</div>
</form>
</div>
<div class="col d-none d-sm-block d-md-none"></div>
<div class="col-md-3 d-none d-lg-block d-xl-block float-left" style="padding-left: 4%;padding-bottom: 50px;">
    <div class="card">
        <div class="card-block" style="padding-left: 5px; border-color: #00769f">
            <h3 class="card-title"></h3>
            <p class="card-text">
            <h6 class="card-subtitle">A5 Patmar Marknesse</h6>
            Hoge Sluiswal 47<br>
            8316 AA Marknesse<br>
            TEL: 0527 - 61 22 77<br>

            <p>info@patmar.nl<br>
            </p>

            <br><h6 class="card-subtitle">A5 Patmar Meppel</h6>
            Johan van Oldenbarneveltstraat 3<br>
            7942 GZ Meppel<br>
            Tel. 0522 - 24 48 88<br>

            <p>info@patmar.nl<br>
            </p>

        </div>
    </div>
</div>
</div>
</div>
