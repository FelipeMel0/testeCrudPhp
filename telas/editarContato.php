<?php

// require_once('../conexao.php');
include('../acoes/acoes.php');

$id_contato = $_GET["id_contato"];

$sql = "SELECT * FROM tbl_contato WHERE id_contato = $id_contato";
$resultado = mysqli_query($conexao, $sql);
$contato = mysqli_fetch_array($resultado);

$sql = $conexao->query("SELECT * from tbl_contato where id_contato = $id_contato");

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../js/mascaras.js" defer></script>
    <title>Edição de contatos</title>
</head>

<body>

    <header>
        <nav class="navbar d-flex justify-content-start">
            <a href="#">
                <img src="../assets/logo_alphacode.png" alt="">
            </a>
            <h1 class="text-white">
                Edição de contatos
            </h1>
        </nav>
    </header>


    <main>

        <form method="POST" class="row mb-5" action="">

            <?php
            while ($contato = $sql->fetch_object()) {
            ?>

                <div class="form-group col-md-6">
                    <label for="inputNome">Nome completo</label>
                    <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputNome" name="nome" placeholder="Ex.: Letícia Pacheco dos Santos" maxlength="200" value="<?= htmlspecialchars($contato->nome) ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDataNasc">Data de nascimento</label>
                    <input type="text" class="form-control rounded-0 p-0 mb-5 date" id="inputDataNasc" name="data_nascimento" placeholder="Ex.: 03/10/2003" value="<?= date('d/m/Y', strtotime($contato->data_nascimento)) ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail">E-mail</label>
                    <input type="email" class="form-control rounded-0 p-0 mb-5" id="inputEmail" name="email" placeholder="Ex.: leticia@gmail.com" maxlength="200" value="<?= htmlspecialchars($contato->email) ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputProfissao">Profissão</label>
                    <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputProfissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" maxlength="200" value="<?= htmlspecialchars($contato->profissao) ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTelefone">Telefone para contato</label>
                    <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputTelefone" name="telefone_contato" placeholder="Ex.: (11)4033-2019" value="<?= htmlspecialchars($contato->telefone_contato) ?>" maxlength="200">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputCelular">Celular para contato</label>
                    <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputCelular" name="celular_contato" placeholder="Ex.: (11)98493-2039" maxlength="200" value="<?= htmlspecialchars($contato->celular_contato) ?>" required>
                </div>

                <div class="form-group col-md-6">
                    <div>
                        <input value="" class="form-check-input" type="checkbox" id="checkboxWhatsapp" name="celular_tem_whatsapp" <?php if ($contato->celular_tem_whatsapp == 1) echo 'checked'; ?> />
                        <label class="form-check-label" for="checkboxWhatsapp">
                            Número de celular possui Whatsapp
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-6">
                    <div>
                        <input value="" class="form-check-input" type="checkbox" id="checkboxEmail" name="notificacoes_email" <?php if ($contato->notificacoes_email == 1) echo 'checked'; ?> />
                        <label class="form-check-label" for="checkboxEmail">
                            Enviar notificações por E-mail
                        </label>
                    </div>
                </div>

                <div class="form-group col-md-6 mb-5">
                    <div>
                        <input value="" class="form-check-input" type="checkbox" id="checkboxSms" name="notificacoes_sms" <?php if ($contato->notificacoes_sms == 1) echo 'checked'; ?> />
                        <label class="form-check-label" for="checkboxSms">
                            Enviar notificações por SMS
                        </label>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary p-2 m-1" style="background-color: #56B2DF; border-color: #56B2DF; font-weight: bold;" type="submit" name="editar">Editar contato</button>
                    <a href="./index.php" class="btn btn-danger m-1 text-center" style="font-weight: bold;">Cancelar</a>
                </div>

            <?php } ?>


        </form>


    </main>

    <footer class="text-white text-center p-4 d-flex justify-content-between align-items-center mt-auto">


        <span>Termos | Políticas</span>
        <div class="d-flex align-items-center">
            <span>© Copyright 2023 | Desenvolvido por</span>
            <img src="../assets/logo_rodape_alphacode.png" alt="Logo Alphacode" id="logoRodape">
        </div>
        <span>©Alphacode IT Solutions 2023</span>


    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js"></script>


</body>

</html>