<?php if ($_SESSION["permission"] != "1") : ?>
    <div class='alert alert-danger'><strong>Fout!</strong> Niet toegestaan!</div>
<?php elseif ($_SESSION["permission"] == "1"):

$offertes = new Offertedash();
$pagination = 0;
if (isset($_GET["pagination"]))
    $pagination = intval($_GET["pagination"]);

$offertelist = $offertes->getOfferteList($pagination);
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
            <?php foreach ($offertelist as $offerte) : ?>
                <li class="list-group-item">
                    <form action="/dashboard/" method="get">
                        <input type="hidden" name="page" value="offertefull">
                        <input type="hidden" name="Offerteid" value="<?php echo $offerte["Offerteid"]; ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <?php echo $offerte["Offerteid"]; ?>
                            </div>
                                <div class="col-md-3">
                                <?php echo $offerte["Naam"]; ?>
                            </div>
                            <div class="col-md-6 text-truncate">
                                <?php echo $offerte["Bericht"]; ?>
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
            <button id="next" <?php if(count($offertlist) < 10) echo "disabled"; ?> type="button" class="btn btn-secondary">Volgende</button>
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
<?php endif; ?>