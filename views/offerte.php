<!-- Offerte  -->
<div class="container" style="margin-top: 100px">
    <div class="row"></div>
        <div class="col-md-6 mx-auto jumbotron">
            <h1 class="text">Offerte aanvragen</h1>

    <br>
    <p>&nbsp;<span style="line-height: 1.4;">Vul onderstaand formulier in voor een offerte.<br/>
            Wij zullen zo spoedig mogelijk contact met u opnemen.<br/>
            Voor vragen kunt u ook bellen tijdens kantooruren of mailen via ons contact formulier.</span></p>
    <br>

    <form action="?page=offerte" method="post" enctype="multipart/form-data">
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
                <div class="alert alert-success"><strong>Uw offerteaanvraag is succesvol verzonden.</strong></div>
            <?php endif; ?>
        </div>
        <!-- HTML form-->
        <div class="form-group">
            <div class="row">
                <div class="form-group">

                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="voorbeeld@mail.nl *" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">

                    <input type="text" class="form-control" name="naam" id="name"
                           placeholder="Naam *" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">

                    <input type="text" class="form-control" name="adres" id="adres"
                           placeholder="Straatnaam + huisnummer *" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">

                    <input type="text" class="form-control" name="woonplaats" id="woonplaats"
                           placeholder="Woonplaats *" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group">

                    <input cols="40" type="text" class="form-control" name="telefoonnummer" id="Telefoonnummer"
                           placeholder="Telefoonnummer *" required>
                </div>
            </div>
            <div class="row">

                <div class="form-group">

                            <textarea rows="4" cols="40" class="form-control" name="bericht" id="Bericht"
                                      placeholder="Bericht *" required></textarea>
                </div>
            </div>
            <!--Upload knop voor foto's-->
            <div>
                Klik om een bestand te uploaden:</br>
                <input type="file" name="bestand" id="BestandUpload"></br>

            </div>

            <!--Google recaptcha-->
            <div class="form-group">
                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                <div class="g-recaptcha" data-sitekey="6LdLDzwUAAAAAO4DFj_pzlNNfrDeZ_up8UjwA_xj"></div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input type="submit" value="Versturen" name="offertesend">

                    <br>
                    <br>
                    <p style="font-size: 0.9em;">Velden met een * zijn verplicht.</p>
                </div>

            </div>
        </div>
    </form>
</div>
</div>