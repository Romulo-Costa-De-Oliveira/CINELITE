<?php include "cabecalho.php" ?>

<?php

require "./util/Mensagem.php";

$controller = new FilmesController();
$filmes = $controller->index();

?>

<body>
    <nav class="nav-extended ">
        <div class="nav-wrapper">
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li class="active"><a href="/">Galeria</a></li>
                <li><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>CINELITE</h1>
        </div>
        <div class="nav-content">
            <ul class="tabs tabs-transparent ">
                <li class="tab"><a class="active" href="/">Todos</a></li>
                <li class="tab"><a href="/favoritos">Favoritos</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <?php foreach ($filmes as $filme) : ?>
            <div class="col s7 m4 l4 xl3">
                <div class="card hoverable card-serie">
                    <div class="card-image">
                        <img src="<?= $filme->poster ?>" class="activator" />
                        <button class="btn-fav btn-floating halfway-fab waves-effect waves-light purple darken-2"
                            data-id="<?= $filme->id ?>">
                            <i class="material-icons"><?= ($filme->favorito) ? "favorite" : "favorite_border" ?></i>
                        </button>
                    </div>

                    <div class="card-content">
                        <p class="valign-wrapper">
                            <i class="material-icons amber-text">star</i><?= $filme->nota ?>
                        </p>
                        <span class="card-title activator grey-text text-darken-4">
                            <?= substr($filme->titulo, 0, 10) . "..." ?>
                        </span>
                    </div>

                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4"><?= $filme->titulo ?><i
                                class="material-icons right">close</i></span>
                        <p><?= substr($filme->sinopse, 0, 800) . " ..."  ?></p>

                        <button class="waves-effect waves-light btn-small right red accent-2 btn-delete"
                            data-id="<?= $filme->id ?>">
                            <i class="material-icons">delete</i>
                        </button>
                    </div>

                </div>
            </div>
            <?php endforeach ?>

        </div>


        <?= Mensagem::mostrar(); ?>

        <script>
        document.querySelectorAll(".btn-fav").forEach(btn => {
            btn.addEventListener("click", e => {
                const id = btn.getAttribute("data-id")
                fetch(`/favoritar/${id}`).then(response => response.json()).then(response => {
                        if (response.success === "ok") {
                            if (btn.querySelector("i").innerHTML === "favorite") {
                                btn.querySelector("i").innerHTML = "favorite_border"
                            } else {
                                btn.querySelector("i").innerHTML = "favorite"
                            }
                        }
                    })
                    .catch(error => {
                        M.toast({
                            html: 'Erro ao favoritar'
                        })
                    })
            })
        });

        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", e => {
                const id = btn.getAttribute("data-id")
                const requestConfig = {
                    method: "DELETE",
                    header: new Headers()
                }
                fetch(`/filmes/${id}`, requestConfig).then(response => response.json()).then(
                        response => {
                            if (response.success === "ok") {
                                const card = btn.closest(".col")
                                card.classList.add("fadeOut")
                                setTimeout(() => card.remove(), 1000)

                            }
                        })
                    .catch(error => {
                        M.toast({
                            html: 'Erro ao apagar'
                        })
                    })
            })
        });
        </script>

</body>

</html>