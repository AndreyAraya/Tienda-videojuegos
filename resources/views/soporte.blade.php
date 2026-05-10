<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheGameVault — Soporte</title>
    @vite(['resources/css/app.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #0b0d10;
            --bg2: #11141a;
            --bg3: #181c24;
            --accent: #00e5a0;
            --accent2: #00b87a;
            --text: #e8eaf0;
            --muted: #7a8099;
            --card: #13161e;
            --border: #1f2330;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2.5rem;
            height: 64px;
            background: rgba(11, 13, 16, .85);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text);
            text-decoration: none;
        }

        .nav-logo span {
            color: var(--accent);
        }

        .nav-center {
            display: flex;
            gap: 2rem;
        }

        .nav-center a {
            color: var(--muted);
            text-decoration: none;
            font-size: .85rem;
            font-weight: 500;
            letter-spacing: .5px;
            text-transform: uppercase;
            transition: color .2s;
        }

        .nav-center a:hover {
            color: var(--text);
        }

        .nav-center a.active {
            color: var(--accent);
            border-bottom: 2px solid var(--accent);
        }

        .btn-login {
            border: 1px solid var(--accent);
            color: var(--accent);
            background: transparent;
            padding: .45rem 1.2rem;
            border-radius: 4px;
            font-size: .8rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, color .2s;
        }

        .btn-login:hover {
            background: var(--accent);
            color: #000;
        }

        /* HERO */
        .support-hero {
            margin-top: 64px;
            padding: 4rem 5% 3rem;
            background: linear-gradient(135deg, #0f1319 0%, #12171f 50%, #0b0d10 100%);
            border-bottom: 1px solid var(--border);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .support-hero::before {
            content: '';
            position: absolute;
            top: -60px;
            left: 50%;
            transform: translateX(-50%);
            width: 400px;
            height: 400px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(0, 229, 160, .06) 0%, transparent 70%);
            pointer-events: none;
        }

        .support-hero h1 {
            font-family: 'Rajdhani', sans-serif;
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: .8rem;
        }

        .support-hero h1 span {
            color: var(--accent);
        }

        .support-hero p {
            color: var(--muted);
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        /* STATUS BAR */
        .status-bar {
            background: rgba(0, 229, 160, .07);
            border-top: 1px solid rgba(0, 229, 160, .15);
            border-bottom: 1px solid rgba(0, 229, 160, .15);
            padding: .7rem 5%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .7rem;
            font-size: .82rem;
            color: var(--accent);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--accent);
            box-shadow: 0 0 6px var(--accent);
            animation: blink 2s infinite;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1
            }

            50% {
                opacity: .3
            }
        }

        /* CONTACT GRID */
        .content {
            padding: 3rem 5%;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.25rem;
            margin-bottom: 3rem;
        }

        .contact-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.8rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            transition: border-color .2s, transform .2s;
            text-decoration: none;
            color: inherit;
        }

        .contact-card:hover {
            border-color: rgba(0, 229, 160, .35);
            transform: translateY(-3px);
        }

        .contact-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: rgba(0, 229, 160, .1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            font-size: 1.3rem;
        }

        .contact-icon.blue {
            background: rgba(0, 120, 255, .12);
            color: #4da6ff;
        }

        .contact-icon.purple {
            background: rgba(130, 80, 255, .12);
            color: #a78bfa;
        }

        .contact-icon.red {
            background: rgba(255, 80, 80, .1);
            color: #ff6b6b;
        }

        .contact-label {
            font-size: .72rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
        }

        .contact-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.15rem;
            font-weight: 700;
        }

        .contact-value {
            font-size: .85rem;
            color: var(--muted);
        }

        .contact-cta {
            display: inline-flex;
            align-items: center;
            gap: .4rem;
            font-size: .8rem;
            color: var(--accent);
            font-weight: 600;
            margin-top: .3rem;
        }

        .contact-cta i {
            font-size: .7rem;
            transition: transform .2s;
        }

        .contact-card:hover .contact-cta i {
            transform: translateX(4px);
        }

        /* FAQ */
        .section-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.3rem;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: .7rem;
        }

        .section-title::before {
            content: '';
            display: inline-block;
            width: 4px;
            height: 1.1em;
            background: var(--accent);
            border-radius: 2px;
        }

        .faq-list {
            display: flex;
            flex-direction: column;
            gap: .7rem;
            margin-bottom: 3rem;
        }

        .faq-item {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }

        .faq-question {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.3rem;
            cursor: pointer;
            font-weight: 500;
            font-size: .9rem;
            transition: background .15s;
            user-select: none;
        }

        .faq-question:hover {
            background: rgba(255, 255, 255, .02);
        }

        .faq-question i {
            color: var(--muted);
            transition: transform .3s;
            font-size: .8rem;
        }

        .faq-item.open .faq-question i {
            transform: rotate(180deg);
            color: var(--accent);
        }

        .faq-answer {
            display: none;
            padding: 0 1.3rem 1rem;
            color: var(--muted);
            font-size: .85rem;
            line-height: 1.7;
            border-top: 1px solid var(--border);
            padding-top: .8rem;
        }

        .faq-item.open .faq-answer {
            display: block;
        }

        /* HOURS */
        .hours-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 1.8rem;
            margin-bottom: 3rem;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: .5rem;
            margin-top: 1.2rem;
        }

        .day-col {
            text-align: center;
        }

        .day-name {
            font-size: .65rem;
            color: var(--muted);
            text-transform: uppercase;
            margin-bottom: .4rem;
        }

        .day-bar-wrap {
            height: 60px;
            background: var(--border);
            border-radius: 4px;
            display: flex;
            align-items: flex-end;
            overflow: hidden;
        }

        .day-bar {
            width: 100%;
            background: linear-gradient(180deg, var(--accent), var(--accent2));
            border-radius: 4px;
            transition: height .5s ease;
        }

        .day-hours {
            font-size: .65rem;
            color: var(--muted);
            margin-top: .4rem;
        }

        .day-col.today .day-name {
            color: var(--accent);
        }

        .day-col.today .day-bar {
            background: linear-gradient(180deg, #fff, var(--accent));
        }

        /* FOOTER */
        footer {
            background: var(--bg2);
            border-top: 1px solid var(--border);
            padding: 2rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        footer .logo {
            font-family: 'Rajdhani', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
        }

        footer .logo span {
            color: var(--accent);
        }

        footer p {
            color: var(--muted);
            font-size: .8rem;
        }

        footer .footer-links {
            display: flex;
            gap: 1.5rem;
        }

        footer .footer-links a {
            color: var(--muted);
            font-size: .8rem;
            text-decoration: none;
            transition: color .2s;
        }

        footer .footer-links a:hover {
            color: var(--accent);
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="nav-logo">THE<span>GAMEVAULT</span></a>
        <div class="nav-center">
            <a href="{{ route('home') }}">Tienda</a>
            <a href="{{ route('videojuegos.biblioteca') }}">Biblioteca</a>
            <a href="{{ route('comunidad') }}">Comunidad</a>
            <a href="{{ route('soporte') }}" class="active">Soporte</a>
        </div>
        <div class="nav-right">
        </div>
    </nav>

    <!-- HERO -->
    <div class="support-hero">
        <h1>Centro de <span>Soporte</span></h1>
        <p>Estamos aquí para ayudarte. Elegí el canal que mejor se adapte a tu necesidad.</p>
    </div>

    <!-- STATUS -->
    <div class="status-bar">
        <div class="status-dot"></div>
        Todos los sistemas operando con normalidad · Tiempo de respuesta promedio: <strong style="margin-left:.3rem">~2 horas</strong>
    </div>

    <div class="content">

        <!-- CONTACT CARDS -->
        <div class="section-title">Contactanos</div>
        <div class="contact-grid">

            <a href="mailto:soporte@tiendadejuegos.com" class="contact-card">
                <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                <div>
                    <div class="contact-label">Correo electrónico</div>
                    <div class="contact-title">soporte@THEGAMEVAULT.com</div>
                    <div class="contact-value">Respuesta en menos de 24 h.</div>
                </div>
                <div class="contact-cta">Enviar correo <i class="fas fa-arrow-right"></i></div>
            </a>

            <a href="#" class="contact-card">
                <div class="contact-icon blue"><i class="fab fa-discord"></i></div>
                <div>
                    <div class="contact-label">Discord</div>
                    <div class="contact-title">discord.gg/THEGAMEVAULT</div>
                    <div class="contact-value">Chat en tiempo real con la comunidad.</div>
                </div>
                <div class="contact-cta">Unirse al servidor <i class="fas fa-arrow-right"></i></div>
            </a>

            <a href="#" class="contact-card">
                <div class="contact-icon purple"><i class="fab fa-twitter"></i></div>
                <div>
                    <div class="contact-label">Twitter / X</div>
                    <div class="contact-title">@THEGAMEVAULT</div>
                    <div class="contact-value">Actualizaciones y noticias oficiales.</div>
                </div>
                <div class="contact-cta">Seguirnos <i class="fas fa-arrow-right"></i></div>
            </a>

            <div class="contact-card">
                <div class="contact-icon red"><i class="fas fa-phone"></i></div>
                <div>
                    <div class="contact-label">Teléfono</div>
                    <div class="contact-title">+506 2222-1234</div>
                    <div class="contact-value">Lunes a viernes · 8 am – 6 pm</div>
                </div>
                <div class="contact-cta">Horario de atención <i class="fas fa-arrow-right"></i></div>
            </div>

        </div>

        <!-- HOURS CHART -->
        <div class="section-title">Horario de atención</div>
        <div class="hours-card">
            <p style="color:var(--muted);font-size:.85rem;">Nuestro equipo atiende de lunes a viernes. Los fines de semana respondemos por correo.</p>
            <div class="hours-grid">
                @php
                $days = [
                ['name'=>'Lun', 'pct'=>85, 'label'=>'8–6pm'],
                ['name'=>'Mar', 'pct'=>90, 'label'=>'8–6pm'],
                ['name'=>'Mié', 'pct'=>75, 'label'=>'8–6pm'],
                ['name'=>'Jue', 'pct'=>88, 'label'=>'8–6pm'],
                ['name'=>'Vie', 'pct'=>70, 'label'=>'8–6pm'],
                ['name'=>'Sáb', 'pct'=>25, 'label'=>'Email'],
                ['name'=>'Dom', 'pct'=>15, 'label'=>'Email'],
                ];
                $today = date('N'); // 1=Mon … 7=Sun
                @endphp
                @foreach($days as $i => $d)
                <div class="day-col {{ ($i+1) == $today ? 'today' : '' }}">
                    <div class="day-name">{{ $d['name'] }}</div>
                    <div class="day-bar-wrap">
                        <div class="day-bar" style="height:{{ $d['pct'] }}%"></div>
                    </div>
                    <div class="day-hours">{{ $d['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- FAQ -->
        <div class="section-title">Preguntas frecuentes</div>
        <div class="faq-list">
            @php
            $faqs = [
            ['q'=>'¿Cómo puedo ver mis juegos comprados?',
            'a'=>'Dirigite a la sección "Biblioteca" en el menú de navegación. Ahí encontrás todos los juegos que adquiriste en tu cuenta.'],
            ['q'=>'¿Puedo pedir un reembolso?',
            'a'=>'Sí, dentro de las primeras 48 horas de la compra, siempre y cuando no hayas ejecutado el juego más de 2 horas. Contactanos por correo con tu número de pedido.'],
            ['q'=>'¿Los precios incluyen impuestos?',
            'a'=>'Los precios mostrados no incluyen impuestos locales. Al momento del pago se calculará el IVA correspondiente según tu región.'],
            ['q'=>'¿Puedo transferir un juego a otro usuario?',
            'a'=>'Por el momento las licencias no son transferibles. Cada juego queda vinculado a la cuenta que realizó la compra.'],
            ['q'=>'¿Qué métodos de pago aceptan?',
            'a'=>'Aceptamos tarjetas Visa, Mastercard, PayPal y transferencia SINPE Móvil para clientes en Costa Rica.'],
            ['q'=>'¿Cómo reporto un problema técnico?',
            'a'=>'Podés escribirnos a soporte@tiendadejuegos.com describiendo el problema, tu sistema operativo y una captura de pantalla si es posible.'],
            ];
            @endphp
            @foreach($faqs as $faq)
            <div class="faq-item">
                <div class="faq-question">
                    <span>{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down"></i>
                </div>
                <div class="faq-answer">{{ $faq['a'] }}</div>
            </div>
            @endforeach
        </div>

    </div>

    <footer>
        <div class="logo">THE<span>GAMEVAULT</span></div>
        <p>© {{ date('Y') }} THEGAMEVAULT. Todos los derechos reservados.</p>
        <div class="footer-links">
            <a href="{{ route('soporte') }}">Soporte</a>
            <a href="{{ route('comunidad') }}">Comunidad</a>
        </div>
    </footer>

    <script>
        // FAQ accordion
        document.querySelectorAll('.faq-question').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
                if (!isOpen) item.classList.add('open');
            });
        });
    </script>
</body>

</html>