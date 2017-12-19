<?php
/**
 * Created by PhpStorm.
 * User: joppe
 * Date: 19-12-2017
 * Time: 13:38
 */
$users = new Contactdash();
$pagination = 0;
if (isset($_GET["pagination"]))
    $pagination = intval($_GET["pagination"]);

$contactlist = $users->getContactList($pagination);
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
                        <div class="col-md-1">
                            <?php echo $contact["Contactid"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-truncate">
                            <strong>Naam</strong>
                        </div>
                        <div class="col-md-4">
                            <?php echo $contact["Naam"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-truncate">
                            <strong>Adres</strong>
                        </div>
                        <div class="col-md-4">
                            <?php echo $contact["Adres"]; ?>
                        </div>
                        <div class="col-md-2 text-truncate">
                            <strong>Woonplaats</strong>
                        </div>
                        <div class="col-md-4">
                            <?php echo $contact["Woonplaats"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-truncate">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-4">
                            <?php echo $contact["Email"]; ?>
                        </div>
                        <div class="col-md-2 text-truncate">
                            <strong>Telefoonnummer</strong>
                        </div>
                        <div class="col-md-4">
                            <?php echo $contact["Telefoonnummer"]; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-truncate">
                            <strong>Bericht</strong>
                        </div>
                        <div class="col-md-8 text-truncate">
                            <?php echo $contact["Bericht"]; ?>
                        </div>
                    </div>
            </li>
            <?php foreach ($contactlist

            as $contact) : ?>
            <li class="list-group-item">
                <form action="/dashboard/" method="get">
                    <input type="hidden" name="page" value="contactfull">

                    <div class="col-md-2 text-truncate">
                        <strong>&nbsp;</strong>
                    </div>
                    <div class="col-md-3">
                        <?php echo $contact["Naam"]; ?>
                    </div>

                    <div class="col-md-2 text-truncate">
                        <input type="submit" value="Alles Weergeven" class="btn btn-light float-right">
                    </div>

    </div>
    </form>
    </li>
    <?php endforeach; ?>
    </ul>
</div>
</div>
<div class="row">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4">
        <div class="btn-group" role="group" aria-label="Basic example">
            <button id="back" <?php if ($pagination == 0) echo "disabled"; ?> type="button" class="btn btn-secondary">
                Vorige
            </button>
            <button type="button" class="btn btn-primary"><?php echo $pagination + 1 ?></button>
            <button id="next" <?php if (count($userlist) < 10) echo "disabled"; ?> type="button"
                    class="btn btn-secondary">Volgende
            </button>
        </div>
    </div>
    <div class="col-md-4">&nbsp;</div>
</div>
