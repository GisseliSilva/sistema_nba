<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Time NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <style>
        :root{
            --nba-blue: #1D428A;
            --nba-red: #C8102E;
            --nba-white: #FFFFFF;
            --nba-dark: #0B1624;
            --nba-card: rgba(13, 24, 40, 0.92);
            --nba-border: rgba(255, 255, 255, 0.12);
            --nba-input: #F4F7FB;
            --nba-text: #EAF0F8;
            --nba-muted: #AAB7C5;
        }

        * {
            box-sizing: border-box;
        }

        body{
            font-family: Arial, sans-serif;
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--nba-text);
            background:
                linear-gradient(135deg, rgba(11, 22, 36, 0.90), rgba(29, 66, 138, 0.75)),
                url('assets/fundo.png') center/cover no-repeat fixed;
        }

        body::before{
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: -1;
        }

        .container {
            width: 100%;
            max-width: 720px;
            background: var(--nba-card);
            border: 1px solid var(--nba-border);
            border-radius: 22px;
            padding: 32px;
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.45);
        }

        h2{
            margin: 0 0 16px 0;
            color: var(--nba-white);
            font-size: 30px;
            text-align: center;
            letter-spacing: 0.5px;
        }

        .info {
            background: rgba(29, 66, 138, 0.22);
            padding: 16px;
            border-radius: 16px;
            margin-bottom: 20px;
            color: var(--nba-text);
            border: 1px solid rgba(255,255,255,0.10);
        }

        .info strong{
            display: block;
            font-size: 18px;
            color: var(--nba-white);
            margin-bottom: 4px;
        }

        .info small {
            color: var(--nba-muted);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 20px;
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

        input { 
            width: 100%;
            padding: 13px 14px;
            border: 1px solid rgba(29, 66, 138, 0.35);
            border-radius: 14px;
            font-size: 15px;
            outline: none;
            background: var(--nba-input);
            color: #1F2937;
            transition: 0.25s;
        }

        input:focus {
            border-color: var(--nba-red);
            box-shadow: 0 0 0 4px rgba(200, 16, 46, 0.15);
        }

        .acoes {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            gap: 12px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border: none;
            border-radius: 999px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.25s;
            min-width: 150px;
            text-decoration: none;
        }

        .btn-cancelar {
            background: transparent;
            color: var(--nba-white);
            border: 1px solid rgba(255, 255, 255, 0.22);
        }

        .btn-cancelar:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .btn-salvar {
            background: linear-gradient(135deg, var(--nba-red), #ff3657);
            color: var(--nba-white);
            box-shadow: 0 10px 22px rgba(200, 16, 46, 0.25);
        }

        .btn-salvar:hover {
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        @media (max-width: 600px) {
            .container{
                padding: 22px;
            }

            h2{
                font-size: 24px;
            }

            .acoes{
                flex-direction: column;
            }

            .btn{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Editar Time NBA</h2>
        
        <div class="info">
            <strong><?= htmlspecialchars($time['nome']) ?></strong> 
            <small>(Criado em <?= date('d/m/Y H:i', strtotime($time['criado_em'])) ?>)</small>
        </div>

        <form method="POST" action="index.php?action=atualizar">
            <input type="hidden" name="id" value="<?= htmlspecialchars($time['id']) ?>">
            
            <div class="campo">
                <label>Nome do time:</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($time['nome']) ?>" required>
            </div>

            <div class="campo">
                <label>Conferência:</label>
                <input type="text" name="conferencia" value="<?= htmlspecialchars($time['conferencia'] ?? '') ?>" required>
            </div>

            <div class="campo">
                <label>Divisão:</label>
                <input type="text" name="divisao" value="<?= htmlspecialchars($time['divisao'] ?? '') ?>" required>
            </div>

            <div class="campo">
                <label>Títulos da NBA:</label>
                <input type="number" name="titulos" min="0" value="<?= htmlspecialchars($time['titulos']) ?>" required>
            </div>
            
            <div class="acoes">
                <a href="index.php" class="btn btn-cancelar">Cancelar</a>
                <button type="submit" class="btn btn-salvar">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>