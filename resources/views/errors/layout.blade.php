<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') — NovaStyle</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=anton:400|inter:400,500,600&display=swap" rel="stylesheet" />
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }
            html, body {
                background-color: #0A0A0A;
                color: #F5F3EE;
                font-family: 'Inter', sans-serif;
                height: 100vh;
            }
            .container {
                height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                text-align: center;
                padding: 2rem;
            }
            .logo {
                font-family: 'Anton', sans-serif;
                font-size: 2rem;
                letter-spacing: 0.05em;
                margin-bottom: 3rem;
            }
            .logo span { color: #E8261C; }
            .code {
                font-family: 'Anton', sans-serif;
                font-size: 8rem;
                line-height: 1;
                color: #E8261C;
                letter-spacing: 0.05em;
            }
            .message {
                font-family: 'Anton', sans-serif;
                font-size: 1.5rem;
                letter-spacing: 0.05em;
                text-transform: uppercase;
                color: #F5F3EE;
                margin: 1.5rem 0;
            }
            .description {
                color: #8A8A8A;
                font-size: 0.9rem;
                max-width: 400px;
                line-height: 1.6;
                margin-bottom: 2.5rem;
            }
            .btn {
                display: inline-block;
                background-color: #E8261C;
                color: #F5F3EE;
                font-family: 'Anton', sans-serif;
                text-transform: uppercase;
                letter-spacing: 0.1em;
                padding: 0.85rem 2rem;
                text-decoration: none;
                font-size: 0.85rem;
                transition: background-color 0.15s;
            }
            .btn:hover { background-color: #C41E16; }
            .divider {
                width: 60px;
                height: 3px;
                background-color: #E8261C;
                margin: 0 auto 1.5rem;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <a href="https://novastyle-production.up.railway.app" class="logo"></a>
            @yield('content')
            <a href="https://novastyle-production.up.railway.app" class="btn">Retour à l'accueil</a>
        </div>
    </body>
</html>