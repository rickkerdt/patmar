<?php if ($_SESSION["permission"] != "1") : ?>
    <div class='alert alert-danger'><strong>Fout!</strong> Niet toegestaan!</div>
<?php elseif ($_SESSION["permission"] == "1"):

$storing = new Storingdash();
$storing = $storing->getStoring($_GET["StoringID"]);
$bericht = $storing["Explanation"];
?>
<div class="row">
    <div class="col-md-12">
        <ul class="list-group">
            <li class="list-group-item">
                <form action="/dashboard/" method="get">
                    <div class="row">
                        <div class="col-md-3">
                            <strong>Storingnummer</strong>
                        </div>
                        <input type="hidden" name="StoringID" value="<?php echo $storing["StoringID"]; ?>">
                        <div class="col-md-9">
                            <?php echo $storing["StoringID"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Naam</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $storing["FirstName"]." ".$storing["LastName"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Adres</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $storing["StreetName"]." ".$storing["HouseNumber"].$storing["Addition"]." ".$storing["ZipCode"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Woonplaats</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $storing["City"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-truncate">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-9">
                            <?php echo $storing["Email"]; ?>
                        </div>
                        <div class="col-md-3 text-truncate">
                            <strong>Telefoonnummer</strong>
                        </div>
                        <div class="col-md-9">
                            <?php if($storing["PhoneNumber"] == NULL){echo "Deze gebruiker heeft geen telefoonnummer opgegeven";
                            } else {echo $storing["PhoneNumber"];}; ?>
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