<?php

$data= db('menu')->filter(['availablity'=>'yes']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catering Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
        }

        .menu-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            margin-top: 30px;
            text-align: center;
        }

        .category-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #007bff;
            margin-top: 30px;
            text-align: center;
            text-transform: uppercase;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            margin: 10px 0;
            padding: 20px;
            transition: transform 0.3s;
        }

        .menu-item:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-item img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .item-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #333;
            margin-top: 15px;
        }

        .item-description {
            font-size: 1.1rem;
            color: #555;
            margin-top: 10px;
        }

        .item-price {
            font-size: 1.3rem;
            color: #28a745;
            font-weight: bold;
            margin-top: 15px;
        }

        .menu-container {
            margin: 0 auto;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .menu-item {
                margin: 15px 0;
            }

            .menu-title {
                font-size: 2rem;
            }

            .category-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>

    <div class="container menu-container">
        <h1 class="menu-title">Catering Menu</h1>

        <!-- Appetizers Section -->
        <div class="category-title">Appetizers</div>
        <div class="row">
            <!-- Menu Item 1 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Appetizer 1">
                    <h3 class="item-title">Mini Spring Rolls</h3>
                    <p class="item-description">Delicious vegetarian spring rolls served with a tangy dipping sauce.</p>
                    <p class="item-price">$9.99</p>
                </div>
            </div>

            <!-- Menu Item 2 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Appetizer 2">
                    <h3 class="item-title">Chicken Skewers</h3>
                    <p class="item-description">Tender chicken skewers grilled to perfection, served with a zesty marinade.</p>
                    <p class="item-price">$12.99</p>
                </div>
            </div>

            <!-- Menu Item 3 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Appetizer 3">
                    <h3 class="item-title">Stuffed Mushrooms</h3>
                    <p class="item-description">Savory mushrooms filled with cheese, herbs, and spices, baked to perfection.</p>
                    <p class="item-price">$10.99</p>
                </div>
            </div>
        </div>

        <!-- Main Courses Section -->
        <div class="category-title">Main Courses</div>
        <div class="row">
            <!-- Menu Item 4 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Main Course 1">
                    <h3 class="item-title">Grilled Salmon</h3>
                    <p class="item-description">Fresh salmon fillet grilled to perfection with a lemon butter sauce.</p>
                    <p class="item-price">$22.99</p>
                </div>
            </div>

            <!-- Menu Item 5 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Main Course 2">
                    <h3 class="item-title">Roast Beef</h3>
                    <p class="item-description">Juicy roast beef served with mashed potatoes and gravy.</p>
                    <p class="item-price">$18.99</p>
                </div>
            </div>

            <!-- Menu Item 6 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Main Course 3">
                    <h3 class="item-title">Vegetable Stir-Fry</h3>
                    <p class="item-description">A mix of seasonal vegetables stir-fried in a light soy sauce.</p>
                    <p class="item-price">$14.99</p>
                </div>
            </div>
        </div>

        <!-- Sides Section -->
        <div class="category-title">Sides</div>
        <div class="row">
            <!-- Menu Item 7 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Side 1">
                    <h3 class="item-title">Garlic Mashed Potatoes</h3>
                    <p class="item-description">Creamy mashed potatoes with a hint of garlic.</p>
                    <p class="item-price">$5.99</p>
                </div>
            </div>

            <!-- Menu Item 8 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Side 2">
                    <h3 class="item-title">Caesar Salad</h3>
                    <p class="item-description">Fresh romaine lettuce, croutons, and parmesan cheese in Caesar dressing.</p>
                    <p class="item-price">$6.99</p>
                </div>
            </div>

            <!-- Menu Item 9 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Side 3">
                    <h3 class="item-title">Roasted Vegetables</h3>
                    <p class="item-description">Seasonal vegetables roasted with olive oil and herbs.</p>
                    <p class="item-price">$7.99</p>
                </div>
            </div>
        </div>

        <!-- Desserts Section -->
        <div class="category-title">Desserts</div>
        <div class="row">
            <!-- Menu Item 10 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Dessert 1">
                    <h3 class="item-title">Chocolate Cake</h3>
                    <p class="item-description">Decadent chocolate cake with rich frosting.</p>
                    <p class="item-price">$8.99</p>
                </div>
            </div>

            <!-- Menu Item 11 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Dessert 2">
                    <h3 class="item-title">Cheesecake</h3>
                    <p class="item-description">Classic cheesecake topped with strawberry sauce.</p>
                    <p class="item-price">$9.99</p>
                </div>
            </div>

            <!-- Menu Item 12 -->
            <div class="col-md-4 col-sm-6">
                <div class="menu-item">
                    <img src="https://via.placeholder.com/300x200" alt="Dessert 3">
                    <h3 class="item-title">Fruit Tart</h3>
                    <p class="item-description">A light tart filled with cream and topped with fresh fruit.</p>
                    <p class="item-price">$7.99</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<form method="post">
<table class="table table-stripted border" id='myTable'>
    <thead class="table-dark">
        <tr>
            <th>S.No</th>
            
            <th>Item Name</th>
            <th>Category</th>
            <th>Status</th>
          
        </tr>
    </thead>
    <tbody>
        <?php
        $index=0;
        foreach($data as $info){?>
        <tr>
            <td><?=++$index?></td>
            
            <td>
         
            <?=$info['item'];?>
        </td>
            <td><?=$info['category'];?></td>
            <td><?=$info['availablity'];?></td>
       
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>

</form>