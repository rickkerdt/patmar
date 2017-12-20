<?php
/**
 * Created by PhpStorm.
 * User: rickpaassen
 * Date: 20-12-17
 * Time: 09:52
 */
?>
<div class="container mx-auto storing" style="margin-top: ">
    <div class="row">


        <div class="col-md-8 mx-auto jumbotron">
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

            <select name="categorie" required>
                <option readonly="readonly" selected value="0">Categorie</option>
                <?php foreach($categorylist as $category) : ?>
                    <option value="<?php echo $category["CategoryID"] ?>"><?php echo $category["Name"] ?></option>
                <?php endforeach; ?>
            </select>
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
        <style>
            #storing {
                width: inherit;
                margin: 0 auto;
            }
        </style>

    </div>
</div>
</div>
</div>
