<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form with Icon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Button Customization */
        .btn-submit {
            background-color: #007bff;
            color: #fff;
            font-weight: 500;
            padding: 12px 30px;
            border-radius: 30px;
            text-transform: uppercase;
            width: 100%;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        /* Smaller Icon inside button */
        .btn-submit i {
            font-size: 14px;
            margin-right: 10px;
        }

        /* Aligning Item Details section in a single line */
        .col-custom {
            margin-right: 15px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <h2 class="text-center">Booking Form</h2>
            <form>
                <!-- General Information Section -->
                <div class="form-section">
                    <h5>General Information</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter your name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="text" id="mobile" class="form-control" placeholder="Enter your mobile number" name="mobile" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="place" class="form-label">Place</label>
                            <input type="text" id="place" class="form-control" name="place" placeholder="Enter Place Details" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="select date for booking" class="form-label">Date</label>
                            <input type="date" id="select date for booking" name="select date for booking" class="form-control" placeholder="select date for booking" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="purpose" class="form-label">Purpose</label>
                        <textarea id="purpose" class="form-control" rows="3" name="purpose" placeholder="Enter the purpose of booking"></textarea>
                    </div>
                </div>

                <!-- Item Details Section -->
                <div class="form-section">
                    <h5>Item Details</h5>
                    <div class="row">
                        <div class="col-md-2 mb-3">
                            <label for="item" class="form-label">Select Item</label>
                            <select id="item" class="form-select" name="item">
                                <option value="" selected disabled>Select an item</option>
                                <option value="item1">Item 1</option>
                                <option value="item2">Item 2</option>
                                <option value="item3">Item 3</option>
                            </select>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="price_per_unit" class="form-label">Price</label>
                            <input type="text" id="price_per_unit" name="price_per_unit" class="form-control" placeholder="Price" readonly>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="qty" class="form-label">Quantity</label>
                            <input type="number" id="qty" name="qty" class="form-control" placeholder="Quantity" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="discount_per_unit" class="form-label">Discount</label>
                            <input type="number" id="discount_per_unit" name="discount_per_unit" class="form-control" placeholder="Discount" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="after_discount_price_per_unit" class="form-label">Final Price</label>
                            <input type="number" id="after_discount_price_per_unit" name="after_discount_price_per_unit" class="form-control" placeholder="Final Price" min="1" required>
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="total" class="form-label">Total</label>
                            <input type="number" id="quantity" name="total" class="form-control" placeholder="total" min="1" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane"></i> Submit Booking
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

