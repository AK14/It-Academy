<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <!-- Styles -->
    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- Scripts -->
    <script type="text/javascript" href="../../vendor/twbs/bootstrap/dist/js/bootstrap.js">
    </script>

</head>
<body>
<div class="nav navbar-default navbar-static-top ">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>

        </button>
        <a class="navbar-brand" href="">Главная</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a class="dropdown-toggle" href="<?= \App\Controllers\Controller::url('forum')?>">Форум</a></li>
                <li class="dropdown"><a class="dropdown-toggle" href="">Статьи</a></li>
            </ul>
        </div>
    </div>
</div>
