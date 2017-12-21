<?php
/**
 * Created by PhpStorm.
 * User: rickpaassen
 * Date: 12/18/2017
 * Time: 09:34
 */
$storingen = new Storingdash();
$pagination = 0;
if (isset($_GET["pagination"]))
    $pagination = intval($_GET["pagination"]);

$storingenlist = $storingen->getStoringenList($pagination);
?>

<div class="row">
    <div class="col-md-12">
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row">
                    <div class="col-md-1">
                        <strong>HOI</strong>
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
            <?php foreach ($storingenlist as $storing) : ?>
                <li class="list-group-item">
                    <form action="/dashboard/" method="get">
                        <input type="hidden" name="page" value="storingfull">
                        <input type="hidden" name="StoringID" value="<?php echo $storing["StoringID"]; ?>">
                        <div class="row">
                            <div class="col-md-1">
                                <?php echo $storing["StoringID"]; ?>
                            </div>
                            <div class="col-md-3">
                                <?php echo $storing["FirstName"]." ".$storing["LastName"]; ?>
                            </div>
                            <div class="col-md-6">
                                <?php print_r($storingenlist); ?>
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