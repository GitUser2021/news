<?php

include "guzzle.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <title>NEWS</title>
</head>
<body>
<div class="container main">
    <header>
        <h1 id="top">Portal de noticias</h1>
        <nav>
            <ul>
                <li><a href="index.php?category=general">general</a></li>
                <li><a href="index.php?category=technology">tecnologia</a></li>
                <li><a href="index.php?category=science">ciencia</a></li>
                <li><a href="index.php?category=health">salud</a></li>
                <li><a href="index.php?category=sports">deportes</a></li>
                <li><a href="index.php?category=business">negocios</a></li>
                <li><a href="index.php?category=entertainment">entretenimiento</a></li>
            </ul>
        </nav>
        <div class="container" id="search-bar">
            <div class="icono">
                <svg class="bi bi-search" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z"
                          clip-rule="evenodd"/>
                    <path fill-rule="evenodd"
                          d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z"
                          clip-rule="evenodd"/>
                </svg>
            </div>
            <input type="text" id="input-news" placeholder="buscador de noticias">
        </div>

        <div class="resultados text-center">
            <?php
            if ($news->totalResults >= 100) {
                $news->totalResults = 100;
                echo '100';
            } else {
                echo $news->totalResults;
            }
            ?>
            resultados encontrados.
        </div>
        <br>

    </header>
    <main class="container">

        <div id="cards" class="row row-cols-1 row-cols-md-2">

            <?php
            //                if (isset($news->articles))
            $articulos = count($news->articles);
            for ($i = 0; $i < $articulos; $i++) {
                $title = $news->articles[$i]->title;
                $image = $news->articles[$i]->urlToImage;
                $content = $news->articles[$i]->content;
                $autor = $news->articles[$i]->author;
                $fuente = $news->articles[$i]->source->name;
                $url = $news->articles[$i]->url;
                $description = $news->articles[$i]->description;
                $news->articles[$i]->description != '' ? $description = $news->articles[$i]->description : $description = $news->articles[$i]->title;
                ?>
                <div class="col mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $title ?> </h5>
                            <img src=" <?= $image ?> " class="card-img-top">
                        </div>
                        <p class="card-text"> <?= $description ?></p>
                        <p class="card-text"> <?= $content ?></p>
                        <p class="card-text"> Autor: <?= $autor ?> </p>
                        <p class="card-text"> Fuente: <?= $fuente ?><a href="<?= $url ?>"> ...Continuar leyendo...</a>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
        $resultados = $news->totalResults;
        if ($resultados > 0) ?>
            <span class="subir"><a href="#top">Volver arriba<svg class="bi bi-file-arrow-up svg-up" width="1em"
                                                                 height="1em" viewBox="0 0 16 16" fill="currentColor"
                                                                 xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                            d="M4 1h8a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V3a2 2 0 012-2zm0 1a1 1 0 00-1 1v10a1 1 0 001 1h8a1 1 0 001-1V3a1 1 0 00-1-1H4z"
                            clip-rule="evenodd"/>
                      <path fill-rule="evenodd"
                            d="M4.646 7.854a.5.5 0 00.708 0L8 5.207l2.646 2.647a.5.5 0 00.708-.708l-3-3a.5.5 0 00-.708 0l-3 3a.5.5 0 000 .708z"
                            clip-rule="evenodd"/>
                      <path fill-rule="evenodd" d="M8 12a.5.5 0 00.5-.5v-6a.5.5 0 00-1 0v6a.5.5 0 00.5.5z"
                            clip-rule="evenodd"/>
                    </svg></a></span>
        <?php ?>

        <div class="paginator">
            <?php if ($resultados > 1) { ?>
                <span class="resultados">mas resultados</span>
                <?php for ($i = 1; $i < ($resultados / PAGE_SIZE) + 1; $i++) { ?>
                    <a href="<?= 'index.php?q=' . $q . '&category=' . $category . '&page=' . $i ?>"><?= $i ?></a>
                <?php } ?>
            <?php } ?>
        </div>
    </main>
    <footer class="container-fluid">
        <div class="container-fluid">Gastón Vázquez &copy; 2020</div>
    </footer>
</div>
</body>
<script src="script.js"></script>
</html>