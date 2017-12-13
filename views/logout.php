<?php
session_unset();
session_destroy();
header("Location: /index.php?page=login");
?>
<script>
    window.location.replace("?page=login");
</script>