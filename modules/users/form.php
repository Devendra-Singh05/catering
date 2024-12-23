this is users forms.


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Image Display</title>
    <style>
        /* Container for the product image with a fixed size of 300x200 pixels */
        .product-container {
            width: 300px;
            height: 200px;
            overflow: hidden; /* Ensures the image fits within the frame */
            border: 1px solid #ccc; /* Optional border for visibility */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        /* Style for the image to ensure it fits properly in the container */
        .product-container img {
            width: 100%; /* Scale the width of the image to 100% of the container */
            height: 100%; /* Scale the height of the image to 100% of the container */
            object-fit: cover; /* Ensures the image covers the frame, cropping if necessary */
        }

        /* Style for the product title and description */
        .product-info {
            text-align: center;
        }
    </style>
</head>
<body>

    <h2>Product Display</h2>
    
    <!-- Example product container -->
    <div class="product-container">
        <img src="https://via.placeholder.com/300x200" alt="Product Image">
    </div>
    
    <!-- Product Information -->
    <div class="product-info">
        <h3>Product Name</h3>
        <p>Description of the product goes here.</p>
    </div>

</body>
</html>
