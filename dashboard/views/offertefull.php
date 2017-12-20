<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 20-12-2017
 * Time: 12:43
 */

$offerte = new Offertedash();
$offerte = $offerte->getOfferte($_GET["Offerteid"]);
$bericht = $offerte["Bericht"];
?>
<div class="row">
    <div class="col-md-12">
        <ul class="list-group">
            <li class="list-group-item">
                <form action="/dashboard/" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Contactnummer</strong>
                        </div>
                        <input type="hidden" name="Offerteid" value="<?php echo $offerte["Offerteid"]; ?>">
                        <div class="col-md-9">
                            <?php echo $offerte["Offerteid"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Naam</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $offerte["Naam"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Adres</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $offerte["Adres"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Woonplaats</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $offerte["Woonplaats"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $offerte["Email"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Telefoonnummer</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $offerte["Telefoonnummer"]; ?>
                        </div>
                    </div>
                    <div class="row" style="height: 200px;">
                        <div class="col-md-3">
                            <strong>Bericht</strong>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <?php print nl2br($bericht) ?>
                            </div>
                        </div>
            </li>
        </ul>
    </div>
</div>
