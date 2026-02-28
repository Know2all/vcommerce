# vcommerce
This e-commerce plugin transforms the way customers shop online by integrating real-time video engagement directly into your product pages. Instead of static images and descriptions, customers can explore products through interactive video experiences that bring items to life.

## 1. Include the Assets

Add the following tags to the `<head>` section of your HTML:

```html
<!-- Vcommerce Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Know2all/vcommerce@v1.5/vcommerce.css">
<!-- The Plugin Script -->
<script src="https://cdn.jsdelivr.net/gh/Know2all/vcommerce@v1.5/vcommerce.js"></script>
```

## 2. Add the Container

Place an empty `div` where you want the reels to appear:

```html
<div id="vcommerce-instance-1"></div>
```

## 3. Initialize the Plugin

Add a `<script>` tag before the closing `</body>` tag to initialize the plugin with your data:

```javascript
const products = [
    {
        id: "p1",
        name: "Premium Watch",
        price: "₹1,999",
        mrp: "₹4,999",
        discount: "60%",
        category: "Electronics",
        ytLink: "https://www.youtube.com/shorts/VIDEO_ID",
        image: "fallback-image.jpg"
    }
];

const vcommerce = new Vcommerce('vcommerce-shop', {
    products: products,
    logo:"SHOP NAME",
    title: 'New Arrivals',
    webhookUrl: 'https://your-wesite.com/webhook.php',
    onWebhookSuccess: (data) => {
        console.log('Webhook triggered successfully:', data);
    }
});

vcommerce.init();
```

## Configuration Options

| Option | Type | Default | Description |
| :--- | :--- | :--- | :--- |
| `products` | Array | `[]` | List of product objects to display. |
| `title` | String | `'Trending Reels'` | The heading displayed above the reels. |
| `logo` | String | `'Shop Name'` | The shop name shows on top left corner of reel. |
| `webhookUrl` | String | `null` | Endpoint to send Like and Cart events. |
| `onWebhookSuccess` | Function | `null` | Callback after a successful webhook call. |
| `autoLoadDependencies` | Boolean | `true` | Automatically loads Google Fonts and Material Icons. |

## Webhook Data Format

The plugin sends a POST request to your `webhookUrl` with the following JSON structure:

```json
{
  "event": "product_liked",
  "timestamp": "2026-02-28T15:00:00Z",
  "data": {
    "productId": "p1"
  }
}
```

Events: `product_liked`, `cart_update`.
