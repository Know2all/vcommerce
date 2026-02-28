<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vcommerce CDN Test</title>
    <!-- Use local files to simulate CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Know2all/vcommerce@v1.5/vcommerce.css">
    <style>
        body {
            margin: 0;
            padding: 20px;
            background-color: #121212;
            color: white;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        header {
            margin-bottom: 40px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>External Site Demo</h1>
            <p>This page simulates an external website using the Vcommerce plugin via local links.</p>
        </header>

        <!-- The Plugin Container -->
        <div id="vcommerce-instance-1"></div>
    </div>

    <!-- The Plugin Script -->
    <script src="https://cdn.jsdelivr.net/gh/Know2all/vcommerce@v1.5/vcommerce.js"></script>
    <script>

        async function initPlugin() {
            const response = await fetch('/webhook.php?action=get_products');
            const products = await response.json();

            const vcommerce = new Vcommerce('vcommerce-instance-1', {
                products: products,
                logo:"GANAPATHY CRACKERS",
                title: 'Live Shop Reels',
                webhookUrl: '/webhook.php', // Self-pointing webhook for demo
                onWebhookSuccess: (data) => {
                    console.log(data);
                }
            });
            vcommerce.init();
        }
        document.addEventListener('DOMContentLoaded', initPlugin);
    </script>
</body>
</html>
