<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 19-12-2017
 * Time: 13:38
 */
$contact = new Contactdash();
$contact = $contact->getContact($_GET["Contactid"]);
$bericht = $contact["Bericht"];
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
                        <input type="hidden" name="userID" value="<?php echo $contact["Contactid"]; ?>">
                        <div class="col-md-9">
                            <?php echo $contact["Contactid"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Naam</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $contact["Naam"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Adres</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $contact["Adres"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Woonplaats</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $contact["Woonplaats"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $contact["Email"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Telefoonnummer</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $contact["Telefoonnummer"]; ?>
                        </div>
                    </div>
                    <div class="row" style="height: 200px;">
                        <div class="col-md-3 text-truncate">
                            <strong>Bericht</strong>
                        </div>
                        <div class="col-md-9 text-truncate">
                            <div class="form-group">
                                <table>
                                    <td>
                                        <?php print $bericht ?>
                                    </td>
                                </table>
                            <!-- <textarea rows="6" class="form-control" name="bericht" id="Bericht"
                                      placeholder= style="width: 100%"></textarea> -->

                        </div>
                    </div>
            </li>
    </ul>
</div>
</div>
