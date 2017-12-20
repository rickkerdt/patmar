<?php if ($_SESSION["permission"] != "1") : ?>
    <div class='alert alert-danger'><strong>Fout!</strong> Niet toegestaan!</div>
<?php elseif ($_SESSION["permission"] == "1"):

    $users = new Account();
    $pagination = 0;
    if (isset($_GET["pagination"]))
        $pagination = intval($_GET["pagination"]);

    $userlist = $users->getUserList($pagination);
    ?>

    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-1">
                            <strong>UserID</strong>
                        </div>
                        <div class="col-md-4">
                            <strong>Email</strong>
                        </div>
                        <div class="col-md-4 text-truncate">
                            <strong>Hash</strong>
                        </div>
                        <div class="col-md-1">
                            <strong>Functie</strong>
                        </div>
                        <div class="col-md-2 text-truncate">
                            <strong>&nbsp;</strong>
                        </div>
                    </div>
                </li>
                <?php foreach ($userlist as $user) : ?>
                    <li class="list-group-item">
                        <form action="/dashboard/" method="get">
                            <input type="hidden" name="page" value="accountedit">
                            <input type="hidden" name="userID" value="<?php echo $user["UserID"]; ?>">
                            <div class="row">
                                <div class="col-md-1">
                                    <?php echo $user["UserID"]; ?>
                                </div>
                                <div class="col-md-4">
                                    <?php echo $user["Email"]; ?>
                                </div>
                                <div class="col-md-4 text-truncate">
                                    <?php echo $user["PassHash"]; ?>
                                </div>
                                <div class="col-md-1 text-truncate">
                                    <?php echo $user["Functionname"]; ?>
                                </div>
                                <div class="col-md-2 text-truncate">
                                    <input type="submit" value="Bewerk" class="btn btn-light float-right">
                                </div>
                            </div>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <div class="btn-group" role="group" aria-label="Basic example">
                <button id="back" <?php if ($pagination == 0) echo "disabled"; ?> type="button"
                        class="btn btn-secondary">Vorige
                </button>
                <button type="button" class="btn btn-primary"><?php echo $pagination + 1 ?></button>
                <button id="next" <?php if (count($userlist) < 10) echo "disabled"; ?> type="button"
                        class="btn btn-secondary">Volgende
                </button>
            </div>
            <script>
                $(function () {
                    $("#back").on('click', function () {
                        window.location.replace("/dashboard?page=accounts&pagination=<?php echo $pagination - 1 ?>")
                    });
                    $("#next").on('click', function () {
                        window.location.replace("/dashboard?page=accounts&pagination=<?php echo $pagination + 1 ?>")
                    })
                })
            </script>
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>
<?php endif; ?>