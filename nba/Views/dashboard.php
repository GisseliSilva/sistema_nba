<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard NBA</title>
    <link rel="shortcut icon" href="../assets/ball.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue:   #1D428A;
            --red:    #C8102E;
            --white:  #FFFFFF;
            --dark:   #080F1C;
            --card:   rgba(12, 22, 38, 0.88);
            --border: rgba(255,255,255,0.09);
            --text:   #E8EFF8;
            --muted:  #7A90A8;
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: var(--dark);
            background-image:
                radial-gradient(ellipse 80% 60% at 10% 0%, rgba(29,66,138,0.35) 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 90% 100%, rgba(200,16,46,0.18) 0%, transparent 55%);
            padding: 36px 20px 60px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
        }

        /* HEADER */
        header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 6px;
            margin-bottom: 40px;
            padding-bottom: 28px;
            border-bottom: 1px solid var(--border);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2.5px;
            text-transform: uppercase;
            color: var(--red);
        }

        .eyebrow::before {
            content: '';
            width: 22px; height: 2px;
            background: var(--red);
            border-radius: 2px;
        }

        h1 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(40px, 6vw, 60px);
            line-height: 1;
            color: var(--white);
            letter-spacing: 1px;
        }

        h1 span { color: var(--red); }

        /* CARDS DE DESTAQUE */
        .kpi-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
            margin-bottom: 36px;
        }

        .kpi-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 28px 24px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            position: relative;
            overflow: hidden;
        }

        .kpi-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            border-radius: 20px 20px 0 0;
        }

        .kpi-card.total::before  { background: linear-gradient(90deg, var(--blue), #2a5fd4); }
        .kpi-card.titulos::before { background: linear-gradient(90deg, var(--red), #ff3657); }
        .kpi-card.east::before   { background: linear-gradient(90deg, #dc2626, #f87171); }
        .kpi-card.west::before   { background: linear-gradient(90deg, #1d4ed8, #60a5fa); }

        .kpi-icon {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .kpi-val {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 52px;
            line-height: 1;
            color: var(--white);
        }

        .kpi-card.total  .kpi-val  { color: #60a5fa; }
        .kpi-card.titulos .kpi-val { color: #f87171; }

        .kpi-lbl {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--muted);
        }

        /* SEÇÃO CONFERÊNCIAS */
        .section-title {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .conf-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 14px;
            margin-bottom: 36px;
        }

        .conf-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .conf-info {}
        .conf-name {
            font-weight: 700;
            font-size: 16px;
            color: var(--white);
            margin-bottom: 4px;
        }

        .conf-sub {
            font-size: 12px;
            color: var(--muted);
        }

        .conf-badge {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 40px;
            line-height: 1;
        }

        .conf-badge.east { color: #f87171; }
        .conf-badge.west { color: #60a5fa; }

        .conf-bar-wrap {
            height: 4px;
            background: rgba(255,255,255,0.07);
            border-radius: 4px;
            margin-top: 12px;
            overflow: hidden;
        }

        .conf-bar {
            height: 100%;
            border-radius: 4px;
        }

        .conf-bar.east { background: linear-gradient(90deg, var(--red), #f87171); }
        .conf-bar.west { background: linear-gradient(90deg, var(--blue), #60a5fa); }

        /* TABELA COMPLETA */
        .table-section { margin-bottom: 36px; }

        .table-wrap {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
        }

        table { width: 100%; border-collapse: collapse; }

        thead th {
            background: rgba(29,66,138,0.55);
            color: var(--muted);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 13px 18px;
            text-align: left;
            border-bottom: 1px solid var(--border);
        }

        thead th:last-child { text-align: center; }

        tbody td {
            padding: 14px 18px;
            font-size: 14px;
            border-bottom: 1px solid var(--border);
            color: var(--text);
            vertical-align: middle;
        }

        tbody tr:last-child td { border-bottom: none; }
        tbody tr:hover td { background: rgba(255,255,255,0.04); }

        .conf-tag {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 700;
        }

        .conf-tag.east { background: rgba(200,16,46,0.2); color: #f87171; border: 1px solid rgba(200,16,46,0.3); }
        .conf-tag.west { background: rgba(29,66,138,0.3); color: #60a5fa; border: 1px solid rgba(29,66,138,0.4); }

        .total-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 24px;
            color: var(--white);
            text-align: center;
        }

        /* BOTÃO VOLTAR */
        .acoes {
            display: flex;
            justify-content: flex-start;
        }

        .btn-voltar {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 24px;
            border-radius: 12px;
            text-decoration: none;
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--muted);
            font-weight: 600;
            font-size: 14px;
            transition: .2s;
        }

        .btn-voltar:hover {
            border-color: rgba(255,255,255,0.25);
            color: var(--white);
        }

        @media (max-width: 600px) {
            .kpi-val { font-size: 40px; }
            .conf-card { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- HEADER -->
        <header>
            <div class="eyebrow">NBA · Painel Geral</div>
            <h1>Dash<span>board</span></h1>
        </header>

        <!-- CONFERÊNCIAS -->
        <?php if (!empty($dashboardPorGrupo)): ?>
        <p class="section-title">Distribuição por Conferência</p>
        <div class="conf-grid">
            <?php foreach ($dashboardPorGrupo as $item):
                $conf = $item['conferencia'] ?? '';
                $isEast = stripos($conf, 'east') !== false || stripos($conf, 'leste') !== false;
                $cls = $isEast ? 'east' : 'west';
                $pct = $dashboardTotalSelecoes > 0 ? round(($item['total'] / $dashboardTotalSelecoes) * 100) : 0;
            ?>
            <div class="conf-card">
                <div class="conf-info" style="flex:1">
                    <div class="conf-name"><?= htmlspecialchars($conf) ?></div>
                    <div class="conf-sub"><?= $item['total'] ?> times · <?= $pct ?>% da liga</div>
                    <div class="conf-bar-wrap">
                        <div class="conf-bar <?= $cls ?>" style="width:<?= $pct ?>%"></div>
                    </div>
                </div>
                <div class="conf-badge <?= $cls ?>"><?= $item['total'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

        <!-- TABELA DETALHADA -->
        <div class="table-section">
            <p class="section-title">Resumo Detalhado</p>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Métrica</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Times cadastrados na liga</td>
                            <td><span class="total-num"><?= $dashboardTotalSelecoes ?></span></td>
                        </tr>
                        <tr>
                            <td>Títulos somados de todos os times</td>
                            <td><span class="total-num"><?= $dashboardTotalTitulos ?></span></td>
                        </tr>
                        <?php foreach ($dashboardPorGrupo as $item):
                            $conf = $item['conferencia'] ?? '';
                            $isEast = stripos($conf, 'east') !== false || stripos($conf, 'leste') !== false;
                            $cls = $isEast ? 'east' : 'west';
                        ?>
                        <tr>
                            <td>
                                <span class="conf-tag <?= $cls ?>"><?= htmlspecialchars($conf) ?></span>
                            </td>
                            <td><span class="total-num"><?= $item['total'] ?> times</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- VOLTAR -->
        <div class="acoes">
            <a href="index.php" class="btn-voltar">
                Voltar para Times
            </a>
        </div>

    </div>
</body>
</html>