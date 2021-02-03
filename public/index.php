<?php require_once "../vendor/autoload.php"; ?>
<html lang="en">
<head>
    <title>Onze <?= getenv("APP_ENV") ?> omgeving</title>
</head>
<body>
<h1><?= strtoupper(getenv("APP_ENV")) ?> JONGUH</h1>
<pre><code><?php
        $query = \App\Database::prepare("select * from users");
        $query->execute();
        $result = $query->fetchAll();

        var_dump($result);
        ?></code></pre>
</body>
</html>
