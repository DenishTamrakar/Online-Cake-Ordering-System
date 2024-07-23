<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table,
        th,
        tr,
        td {
            text-align: center;
            justify-content: center;
        }

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input {
            padding: 8px;
            width: 150px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            /* Remove outline on focus */
        }
    </style>
    <title>Home Page</title>
</head>

<body>
    <?php
    include '../includes/nav.php';
    if (!isset($_SESSION['user_id'])) {
        header('location:../login-page.php?value=5');
    }
    ?>
    <div class="d-flex">
        <?php
        include '../includes/side-bar.php';
        ?>
        <div id="container" class="container-fluid mx-3 mt-1 p-5">
            <?php
            if (isset($_GET['value'])) {
                if ($_GET['value'] == 1) {
                    echo "<div class='alert alert-success alert-dismissible'  >
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                <strong>Information Saved!</strong></div>";
                }
            }
            ?>
            <div class="d-flex align-item-center mb-2">
                <div class="bg-info text-info my-1" width="30px" height="10px">a</div>
                <div class="h1 ms-2">Cake List</div>
            </div>
            <div class="h6 mb-3">Please choose from cakes available today:</div>
            <form action="order-place.php" method="POST" class="p-2 rounded border border-secondary">
                <table text-align="center" class="shadow p-2 table table-striped table-info rounded-pill">
                    <tr class="bg-info">
                        <th>S.N</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Order Number</th>
                    </tr>
                    <?php
                    $count = 0;
                    include '../includes/connection.php';
                    $query = "SELECT * FROM cake where cake_status = 1";
                    $result = $con->query($query);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <tr class="bg-info">
                                <td><?php echo $row['cake_id']; ?></td>
                                <td><img class="border border-info rounded" src="../img/<?php echo $row['cake_img'], ".jpg"; ?>" alt="" height="70px" width="70px"></td>
                                <td><?php echo $row['cake_name']; ?></td>
                                <td><?php echo $row['cake_desc']; ?></td>
                                <td><?php echo $row['cake_price']; ?></td>
                                <td class=""><input type="number" name="<?php echo "quantity", $row['cake_id']; ?>" class="cake-quantity" min='0' max='9' value='0'></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </table>
                <div class="container-fluid d-flex justify-content-center">
                    <button type="submit" id="orderButton" class="btn btn-success my-3" disabled>Order</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include '../includes/footer.php';
    ?>
</body>
<script>
    // Select all input elements with class cake-quantity
    const quantityInputs = document.querySelectorAll('.cake-quantity');

    // Add event listener to each input
    quantityInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            // Calculate sum of all input values
            let sum = 0;
            quantityInputs.forEach(function(input) {
                sum += parseInt(input.value);
            });

            // Enable or disable the submit button based on the sum
            const orderButton = document.getElementById('orderButton');
            if (sum > 0) {
                orderButton.removeAttribute('disabled');
            } else {
                orderButton.setAttribute('disabled', 'disabled');
            }
        });
    });
</script>
</html>