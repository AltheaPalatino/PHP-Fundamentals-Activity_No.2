<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        .receipt {
            border: 1px dashed;
            width: 400px;
            padding: 20px;
            margin: 20px auto;
            text-align: center;
        }

        .receipt h1 {
            margin-bottom: 20px;
        }

        h1 {
           color: red;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>RECEIPT</h1>

        <?php
        // Set timezone for accurate date and time
        date_default_timezone_set('Asia/Manila');  // Replace with your timezone if necessary

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Process form data
            $item = $_POST['item'];
            $quantity = $_POST['quantity'];
            $cash = $_POST['cash'];

            // Calculate total price based on selected item
            $price = 0;
            $itemName = "";

            switch ($item) {
                case 'icecream':
                    $price = 50;
                    $itemName = "Ice Cream";
                    break;
                case 'fries':
                    $price = 65;
                    $itemName = "Fries";
                    break;
                case 'cake':
                    $price = 100;
                    $itemName = "Slice Cake";
                    break;
                default:
                    echo "<p>Invalid item selected.</p>";
                    exit();
            }

            $total = $price * $quantity;

            // Display receipt details
            echo "<p>Item: " . $itemName . "</p>";
            echo "<p>Quantity: " . $quantity . "</p>";
            echo "<p>Total Price: " . $total . " PHP</p>";
            echo "<p>You Paid: " . $cash . " PHP</p>";

            if ($cash >= $total) {
                $change = $cash - $total;
                echo "<p>CHANGE: " . $change . " PHP</p>";
            } else {
                $remaining = $total - $cash;
                echo "<p>Insufficient cash. Please add " . $remaining . " PHP.</p>";
            }

            // Display the current date and time in "09/27/2024 08:57:16 AM" format
            $currentDateTime = date('m/d/Y h:i:s A');  // Example: 09/27/2024 08:57:16 AM
            echo "<p>Date & Time: " . $currentDateTime . "</p>";
        } else {
            echo "<p>No data submitted.</p>";
        }
        ?>
    </div>

    <div style="text-align: center;">
        <button><a href="index.html">Back to Order Form</a></button>
    </div>
</body>
</html>
