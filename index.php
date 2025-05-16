<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8"/>
    <title>Semana 01 - Exemplo 08</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table-dark tbody tr {
            transition: background-color 0.3s ease; /* Transi��o suave para o efeito hover */
        }
        .table-dark tbody tr:hover {
            background-color: #495057; /* Cor de fundo escura ao passar o mouse */
            color: #ffffff; /* Cor do texto ao passar o mouse */
        }
        .table img {
            max-width: 50px;
            height: auto;
            opacity: 0.3;
            transition: opacity 0.3s ease;
        }
        .table img:hover {
            opacity: 1;
        }
    </style>
</head>

<body class="container mt-5">
    <h3><span class="badge badge-dark">Filmes</span> Exemplo 08 - Listagem Filmes - Usando base64</h3>
    <?php
        include_once('conexao.php');
        
        $query = mysqli_query($conexao, "SELECT * FROM tabfilmes ORDER BY Id");

        if (!$query) {
            echo '<div class="alert alert-danger" role="alert">
                    Query Inválida: ' . mysqli_error($conexao) . '
                  </div>';
            die();
        }

        if (mysqli_num_rows($query) > 0) {
            echo '<div class="table-responsive">';
            echo '<table class="table table-dark table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th width="30px" class="text-center">Data</th>';
            echo '<th width="100px class="text-center">Filme</th>';
            echo '<th width="250px class="text-center">Descrição</th>';
            echo '<th width="100px class="text-center">IMDB</th>';
            echo '<th width="100px class="text-center">Imagem</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($dados = mysqli_fetch_array($query)) {
                $imagem = empty($dados['imagem']) ? 'SemImagem.png' : htmlspecialchars($dados['imagem']);
                $id = base64_encode($dados['id']);
                echo '<tr>';
                echo '<td class="text-center">' . htmlspecialchars(date('d/m/Y', strtotime($dados['data']))) . '</td>';
                echo '<td>' . htmlspecialchars($dados['filme']) . '</td>';
                echo '<td>' . htmlspecialchars($dados['descricao']) . '</td>';
                echo '<td class="text-center">' . number_format($dados['imdb'], 1) . '</td>';
                echo '<td class="text-center">
                        <a href="verfilme.php?id=' . $id . '">
                            <img src="imagens/' . $imagem . '" alt="Imagem do produto" title="Clique para ver o Filme">
                        </a>
                      </td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-warning" role="alert">
                    Nenhum dado encontrado.
                  </div>';
        }

        mysqli_close($conexao);
    ?>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
