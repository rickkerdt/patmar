<?php
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
                <div class="row">
                    <div class="col-md-1">
                        <strong>Nummer</strong>
                    </div>
                    <div class="col-md-3 text-truncate">
                        <strong>Naam</strong>
                    </div>
                    <div class="col-md-6 text-truncate">
                        <strong>Bericht</strong>
                    </div>
                    <div class="col-md-2 text-truncate">
                        <strong>&nbsp;</strong>
                    </div>
                </div>
            </li>
            <?php foreach ($contactlist as $contact) : ?>
                <li class="list-group-item">
                    <form action="/dashboard/" method="get">
                        <input type="hidden" name="page" value="contactfull">
                        <input type="hidden" name="Contactid" value="<?php echo $contact["Contactid"]; ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <?php echo $contact["Contactid"]; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo $contact["Naam"]; ?>
                            </div>
                            <div class="col-md-6 text-truncate">
                                <?php echo $contact["Bericht"]; ?>
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
            <button id="back" <?php if($pagination == 0) echo "disabled"; ?> type="button" class="btn btn-secondary">Vorige</button>
            <button type="button" class="btn btn-primary"><?php echo $pagination + 1 ?></button>
            <button id="next" <?php if(count($userlist) < 10) echo "disabled"; ?> type="button" class="btn btn-secondary">Volgende</button>
        </div>
        <script>
            $(function () {
                $("#back").on('click', function () {
                    window.location.replace("/dashboard?page=accounts&pagination=<?php echo $pagination - 1 ?>")
                })
                $("#next").on('click', function () {
                    window.location.replace("/dashboard?page=accounts&pagination=<?php echo $pagination + 1 ?>")
                })
            })
        </script>
    </div>
    <div class="col-md-4">&nbsp;</div>
</div>