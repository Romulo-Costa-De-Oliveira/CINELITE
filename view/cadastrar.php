<?php include "cabecalho.php" ?>

<body>

    <nav class="nav-extended">
        <div class="nav-wrapper">
            <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Galeria</a></li>
                <li class="active"><a href="/novo">Cadastrar</a></li>
            </ul>
        </div>
        <div class="nav-header center">
            <h1>CINELITE</h1>
        </div>
    </nav>

    <div class="row">
        <form method="POST" enctype="multipart/form-data">
            <div class="col s6 offset-s3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Cadastrar Filme</span>


                        <div class="row">
                            <div class="input-field col s12">
                                <input type="text" class="validate" name="titulo" required>
                                <label for="titulo">Título do Filme</label>
                            </div>
                        </div>

                        <!--input sinopse-->
                        <div class="row">

                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea class="materialize-textarea" name="sinopse"></textarea>
                                    <label for="sinopse">Sinopse</label>
                                </div>
                            </div>

                        </div>

                        <!--input nota-->
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="nota" type="number" step=".1" min="0" max="10" class="validate" required>
                                <label for="nota">Nota</label>
                            </div>
                        </div>

                        <!--input poster-->

                        <div class="file-field input-field">
                            <div class="btn purple lighten-2">
                                <span>Poster</span>
                                <input type="file" name="poster_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea class="materialize-textarea" name="poster"></textarea>
                                <label for="poster">Link do poster</label>
                            </div>
                        </div>

                        <!--enviar formulario-->
                        <div class="card-action">
                            <a class="btn wwaves-effect waves-light grey" href="/">Cancelar</a>
                            <button type="submit" class="waves-effect waves-light btn purple">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>