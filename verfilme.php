<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <title>Semana 01 - Exemplo 08</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-img-top {
            max-width: 510px; /* 70% maior do que 300px */
            height: auto; /* Mantém a proporção da imagem */
        }
        .card-footer {
            background-color: #f8f9fa; /* Cor de fundo do footer */
            padding: 1rem; /* Ajusta o padding do footer */
        }
        .card-footer .btn {
            width: 100%; /* Botão ocupa toda a largura do footer */
        }
        .card-img-container {
            flex: 0 0 auto;
            max-width: 510px; /* Define a largura máxima da imagem */
        }
        .card-body {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .card-body .details {
            margin-left: 20px;
        }
        .card-body p {
            margin-bottom: 0.5rem;
        }
        .card-body .description {
            text-align: justify; /* Justifica o texto da descrição */
        }
    </style>
</head>

<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3>Detalhes do Produto</h3>
                </div>
                <div class="card-body d-flex">
                    <div class="card-img-container">
                        <?php
                            include_once('conexao.php');

                            $id = intval(base64_decode($_GET['id'])); // Decodifica e garante que o ID é um inteiro

                            $query = mysqli_query($conexao, "SELECT * FROM tabfilmes WHERE id = $id");

                            if (!$query) {
                                echo '<div class="alert alert-danger" role="alert">
                                        Query Inválida: ' . mysqli_error($conexao) . '
                                      </div>';
                                die();
                            }

                            // Define a conexão com o charset UTF-8
                            mysqli_set_charset($conexao, "utf8");

                            $dados = mysqli_fetch_array($query);

                            // Se não houver imagem, usa uma imagem padrão
                            $imagem = empty($dados['imagem']) ? 'SemImagem.png' : htmlspecialchars($dados['imagem']);

                            echo '<img src="imagens/' . $imagem . '" class="card-img-top" alt="Imagem do produto">';
                        ?>
                    </div>
                    <div class="details">
                        <p><b>Data: </b> <?php echo htmlspecialchars($dados['data']); ?></p>
                        <p><b>Filme: </b> <?php echo htmlspecialchars($dados['filme']); ?></p>
                        <p><b>Imagem: </b> <?php echo htmlspecialchars($dados['imagem']); ?></p>
                        <p class="description"><b>Descrição:</b> <?php echo htmlspecialchars($dados['descricao']); ?></p>
                        <p><b>Imdb: </b><?php echo number_format($dados['imdb'], 1); ?></p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="javascript:window.history.go(-1)" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
