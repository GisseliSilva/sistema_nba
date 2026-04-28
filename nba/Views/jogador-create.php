<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Jogador NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <style>
        :root{
            --nba-blue: #1D428A;
            --nba-red: #C8102E;
            --nba-white: #FFFFFF;
            --nba-dark: #0B1624;
            --nba-card: rgba(10, 18, 30, 0.92);
            --nba-border: rgba(255, 255, 255, 0.12);
            --nba-text: #EAF0F8;
            --nba-muted: #AAB7C5;
        }

        *{
            box-sizing: border-box;
        }

        body{
            margin: 0;
            min-height: 100vh;
            font-family: Arial, sans-serif;
            color: var(--nba-text);
            background:
                linear-gradient(135deg, rgba(11, 22, 36, 0.96), rgba(29, 66, 138, 0.72)),
                url('assets/fundo.png') center/cover no-repeat fixed;
            padding: 32px 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        body::before{
            content: "";
            position: fixed;
            inset: 0;
            backdrop-filter: blur(5px);
            -webkit-backdrop-filter: blur(5px);
            z-index: -1;
        }

        .container{
            width: 100%;
            max-width: 760px;
            background: var(--nba-card);
            border: 1px solid var(--nba-border);
            border-top: 4px solid var(--nba-orange);
            border-radius: 28px;
            padding: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.45);
        }

        .badge{
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(249, 115, 22, 0.18);
            color: var(--nba-white);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: .8px;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        h1{
            margin: 0;
            text-align: center;
            color: var(--nba-white);
            font-size: 32px;
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

        .grupo-campo{
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label{
            color: var(--nba-white);
            font-weight: bold;
            font-size: 14px;
        }

        input,
        select{
            width: 100%;
            padding: 13px 14px;
            border-radius: 14px;
            border: 1px solid rgba(29, 66, 138, 0.35);
            background: #F4F7FB;
            color: #1F2937;
            outline: none;
            transition: .25s;
            font-size: 15px;
        }

        input:focus,
        select:focus{
            border-color: var(--nba-orange);
            box-shadow: 0 0 0 4px rgba(249, 115, 22, 0.15);
        }

        .linha-dupla{
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .acoes{
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
        }

        .btn,
        .btn-voltar{
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 999px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 15px;
            transition: .25s;
        }

        .btn{
            background: linear-gradient(135deg, var(--nba-red), #ff3657);
            color: var(--nba-white);
            box-shadow: 0 10px 22px rgba(200, 16, 46, 0.25);
        }

        .btn-voltar{
            background: transparent;
            border: 1px solid rgba(255,255,255,0.22);
            color: var(--nba-white);
        }

        .btn:hover,
        .btn-voltar:hover{
            transform: translateY(-1px);
            filter: brightness(1.05);
        }

        @media (max-width: 700px){
            .container{
                padding: 20px;
            }

            h1{
                font-size: 26px;
            }

            .linha-dupla,
            .acoes{
                grid-template-columns: 1fr;
                flex-direction: column;
            }

            .btn,
            .btn-voltar{
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="badge">NBA Player Manager</div>
        <h1>Cadastrar Jogador NBA</h1>
        <div class="subtitulo">Adicione jogadores ao elenco do time escolhido.</div>

        <form action="index.php?action=salvar-jogador" method="post">
            <div class="grupo-campo">
                <label>Nome</label>
                <input type="text" name="nome" required placeholder="Ex.: LeBron James">
            </div>

            <div class="linha-dupla">
                <div class="grupo-campo">
                    <label>Posição</label>
                    <input type="text" name="posicao" required placeholder="Ex.: Ala / Armador">
                </div>

                <div class="grupo-campo">
                    <label>Número da Camisa</label>
                    <input type="number" name="numero_camisa" min="0" max="99" required placeholder="Ex.: 23">
                </div>
            </div>

            <div class="grupo-campo">
                <label>Seleção / Time NBA</label>
                <select name="selecao_id" required>
                    <option value="">Selecione</option>
                    <?php foreach ($todasSelecoes as $s): ?>
                        <option value="<?= $s['id'] ?>" <?= (isset($selecao) && $selecao && $selecao['id'] == $s['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($s['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="acoes">
                <a href="index.php?action=elenco&selecao_id=<?= $selecao['id'] ?? '' ?>" class="btn-voltar">Voltar para Elenco</a>
                <button type="submit" class="btn">Salvar Jogador</button>
            </div>
        </form>
    </div>
</body>
</html>