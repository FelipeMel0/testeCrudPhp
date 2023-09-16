<?php
include('../acoes/acoes.php');

require_once('../conexao.php');

$sql = "SELECT * FROM tbl_contato";

$resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../js/mascaras.js" defer></script>
    <script src="../js/confirmarExclusao.js" defer></script>
    <title>Contatos</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar d-flex justify-content-start">
            <a href="#">
                <img src="../assets/logo_alphacode.png" alt="">
            </a>
            <h1 class="text-white">
                Cadastro de contatos
            </h1>
        </nav>
    </header>


    <main>

        <form method="post" class="row mb-5" action="../acoes/acoes.php">


            <div class="form-group col-md-6 ">
                <label for="inputNome">Nome completo</label>
                <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputNome" name="nome" placeholder="Ex.: Letícia Pacheco dos Santos" maxlength="200" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputDataNasc">Data de nascimento</label>
                <input type="text" class="form-control rounded-0 p-0 mb-5 date" id="inputDataNasc" name="data_nascimento" placeholder="Ex.: 03/10/2003" data-inputmask="'alias': 'date'" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">E-mail</label>
                <input type="email" class="form-control rounded-0 p-0 mb-5" id="inputEmail" name="email" placeholder="Ex.: leticia@gmail.com" maxlength="200" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputProfissao">Profissão</label>
                <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputProfissao" name="profissao" placeholder="Ex.: Desenvolvedora Web" maxlength="200" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputTelefone">Telefone para contato</label>
                <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputTelefone" name="telefone_contato" placeholder="Ex.: (11)4033-2019">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCelular">Celular para contato</label>
                <input type="text" class="form-control rounded-0 p-0 mb-5" id="inputCelular" name="celular_contato" placeholder="Ex.: (11)98493-2039" required>
            </div>

            <div class="form-group col-md-6">
                <div>
                    <input value="" class="form-check-input" type="checkbox" id="checkboxWhatsapp" name="celular_tem_whatsapp" checked />
                    <label class="form-check-label" for="checkboxWhatsapp">
                        Número de celular possui Whatsapp
                    </label>
                </div>
            </div>

            <div class="form-group col-md-6">
                <div>
                    <input value="" class="form-check-input" type="checkbox" id="checkboxEmail" name="notificacoes_email" checked />
                    <label class="form-check-label" for="checkboxEmail">
                        Enviar notificações por E-mail
                    </label>
                </div>
            </div>

            <div class="form-group col-md-6 mb-5">
                <div>
                    <input value="" class="form-check-input" type="checkbox" id="checkboxSms" name="notificacoes_sms" checked />
                    <label class="form-check-label" for="checkboxSms">
                        Enviar notificações por SMS
                    </label>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary p-2" style="background-color: #56B2DF; border-color: #56B2DF; font-weight: bold;" type="submit" name="cadastrar">Cadastrar contato</button>
            </div>


        </form>

        <hr>
        <div class="table-responsive">

            <table class="table shadow-sm mt-5">

                <thead>
                    <tr>
                        <th class="thTitulo text-center" scope="col">Nome</th>
                        <th class="thTitulo text-center" scope="col">Data de nascimento</th>
                        <th class="thTitulo text-center" scope="col">E-mail</th>
                        <th class="thTitulo text-center" scope="col">Celular para contato</th>
                        <th class="thTitulo text-center" scope="col">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    while ($contato = mysqli_fetch_array($resultado)) {

                    ?>
                        <tr>
                            <th class="text-center dadosContato"><?php echo $contato["nome"] ?></th>
                            <th class="text-center dadosContato"><?php echo date('d/m/Y', strtotime($contato['data_nascimento'])) ?></th>
                            <th class="text-center dadosContato"><?php echo $contato["email"] ?></th>
                            <th class="text-center dadosContato"><?php echo $contato["celular_contato"] ?></th>
                            <th class="text-center dadosContato">
                                <a href="../telas/editarContato.php?id_contato=<?php echo $contato['id_contato'] ?>" class="text-decoration-none">
                                    <img src="../assets/editar.png" alt="">
                                </a>

                                <a href="../acoes/acoes.php?id_contato=<?php echo $contato['id_contato'] . '&acao=deletar' ?>" class="text-decoration-none deletarContato">
                                    <img src="../assets/excluir.png" alt="">
                                </a>
                            </th>
                        </tr>

                    <?php } ?>
                </tbody>

            </table>
            
        </div>

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