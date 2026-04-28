<?php
$status = $_GET['status'] ?? '';
$msg = $_GET['msg'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Time NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <style>
        :root{
            --nba-blue: #1D428A;
            --nba-red: #C8102E;
            --nba-white: #FFFFFF;
            --nba-dark: #0B1624;
            --nba-card: rgba(13, 24, 40, 0.88);
            --nba-border: rgba(255, 255, 255, 0.12);
            --nba-text: #EAF0F8;
            --nba-muted: #AAB7C5;
        }

        *{ box-sizing: border-box; }

        body{
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            color: var(--nba-text);
            background:
                linear-gradient(135deg, rgba(11, 22, 36, 0.96), rgba(29, 66, 138, 0.72)),
                url('assets/fundo.png') center/cover no-repeat fixed;
        }

        body::before{
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            z-index: -1;
        }

        .container{
            width: 100%;
            max-width: 760px;
            background: var(--nba-card);
            border: 1px solid var(--nba-border);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.45);
        }

        .badge{
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(200, 16, 46, 0.18);
            color: var(--nba-white);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        h2{
            margin: 0;
            text-align: center;
            color: var(--nba-white);
            font-size: 30px;
        }

        .subtitulo{
            text-align: center;
            color: var(--nba-muted);
            margin: 10px 0 24px;
            font-size: 14px;
        }

        form{
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .campo{
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label{
            color: var(--nba-white);
            font-weight: bold;
            font-size: 14px;
        }

        input{
            width: 100%;
            padding: 13px 14px;
            border-radius: 14px;
            border: 1px solid rgba(29, 66, 138, 0.35);
            background: #F4F7FB;
            color: #1F2937;
            outline: none;
            transition: .25s;
        }

        input:focus{
            border-color: var(--nba-red);
            box-shadow: 0 0 0 4px rgba(200, 16, 46, 0.15);
        }

        .acoes{
            margin-top: 8px;
            display: flex;
            gap: 12px;
            justify-content: space-between;
        }

        .btn{
            flex: 1;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 12px 18px;
            border-radius: 999px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: .25s;
        }

        .btn-voltar{
            background: transparent;
            border: 1px solid rgba(255,255,255,0.22);
            color: var(--nba-white);
        }

        .btn-voltar:hover{
            background: rgba(255,255,255,0.08);
        }

        .btn-salvar{
            background: linear-gradient(135deg, var(--nba-red), #ff3657);
            color: var(--nba-white);
            box-shadow: 0 10px 22px rgba(200, 16, 46, 0.25);
        }

        .btn-salvar:hover{
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        .mensagem{
            margin: 0 0 18px 0;
            padding: 14px 18px;
            border-radius: 14px;
            color: #fff;
            font-weight: bold;
        }

        .mensagem.erro{ background: rgba(185, 28, 28, 0.92); }
        .mensagem.sucesso{ background: rgba(22, 101, 52, 0.92); }

        @media (max-width: 600px){
            .container{ padding: 20px; }
            h2{ font-size: 24px; }
            .acoes{ flex-direction: column; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="badge">NBA Team Manager</div>
        <h2>Cadastrar Time NBA</h2>
        <div class="subtitulo">Cadastre um novo time com conferência, divisão e títulos.</div>

        <?php if (!empty($msg)): ?>
            <div class="mensagem <?= $status === 'sucesso' ? 'sucesso' : 'erro' ?>">
                <?= htmlspecialchars($msg, ENT_QUOTES, 'UTF-8') ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=salvar">
            <div class="campo">
                <label>Nome do time:</label>
                <input type="text" name="nome" required placeholder="Ex.: Los Angeles Lakers">
            </div>

            <div class="campo">
                <label>Conferência:</label>
                <input type="text" name="conferencia" required placeholder="Ex.: Western Conference">
            </div>

            <div class="campo">
                <label>Divisão:</label>
                <input type="text" name="divisao" required placeholder="Ex.: Pacific Division">
            </div>

            <div class="campo">
                <label>Títulos da NBA:</label>
                <input type="number" name="titulos" min="0" placeholder="Ex.: 17">
            </div>

            <div class="acoes">
                <a href="index.php" class="btn btn-voltar">Voltar</a>
                <button type="submit" class="btn btn-salvar">Salvar Time</button>
            </div>
        </form>
    </div>
</body>
</html>