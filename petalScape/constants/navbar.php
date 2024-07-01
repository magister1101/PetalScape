<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        .notification-button {
            position: relative;
            cursor: pointer;
        }

        .notification-window {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            width: 300px;
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;

        }

        .notification-window ul {
            list-style: none;
            margin: 0;
            padding: 0;
            color: #6C7275;
            font-family: "Poppins", sans-serif;
            font-weight: 500;

            font-style: normal;
        }

        .notification-window li {
            padding: 10px;
            border-bottom: 1px solid #eee;

        }

        .notification-window li:last-child {
            border-bottom: none;
        }
    </style>
    <?php
    error_reporting(0);
    $itemCount = 0;

    if (isset($_SESSION['id'])) {
        $userId = $_SESSION['id'];
        $itemCartCounterQuery = "SELECT SUM(quantity) AS itemCount FROM cart WHERE accountId = '$userId'";
        $itemCartCounterResult = mysqli_query($conn, $itemCartCounterQuery);

        if ($itemCartCounterResult) {
            $itemCartCounterRow = mysqli_fetch_assoc($itemCartCounterResult);
            $itemCount = $itemCartCounterRow['itemCount'] ? $itemCartCounterRow['itemCount'] : 0;
        }
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationButton = document.querySelector('.notification-button');
            const notificationWindow = document.querySelector('.notification-window');
            const notificationList = document.querySelector('.notification-list');

            notificationButton.addEventListener('click', function() {
                fetch('fetch_order_status.php')
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Data fetched:', data); // Check data in console
                        renderNotifications(data); // Render notifications
                        notificationWindow.style.display = 'block'; // Show notification window
                    })
                    .catch(error => {
                        console.error('Fetch error:', error); // Log fetch errors
                    });
            });

            // Function to render notifications
            function renderNotifications(data) {
                notificationList.innerHTML = '';
                data.forEach(notification => {
                    const {
                        name,
                        status
                    } = parseNotification(notification);
                    const li = document.createElement('li');
                    li.textContent = `${name} - ${getStatusLabel(status)}`;
                    notificationList.appendChild(li);
                });
            }

            // Function to parse notification string and extract name and status
            function parseNotification(notification) {
                // Example notification format: "Product: Mint and Honey - Status: 4"
                const nameStartIndex = notification.indexOf('Product: ') + 'Product: '.length;
                const nameEndIndex = notification.indexOf(' - Status:');
                const name = notification.substring(nameStartIndex, nameEndIndex).trim();

                const statusIndex = notification.lastIndexOf('Status: ') + 'Status: '.length;
                const status = parseInt(notification.substring(statusIndex));

                return {
                    name,
                    status
                };
            }

            // Function to get status label based on status number
            function getStatusLabel(status) {
                switch (status) {
                    case 0:
                        return 'Waiting for Payment';
                    case 1:
                        return 'Accepted Payment / To be Shipped';
                    case 3:
                        return 'Out for Delivery';
                    case 4:
                        return 'Cancelled Order';
                    default:
                        return 'Unknown Status';
                }
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const itemCount = <?php echo $itemCount; ?>;
            const itemsInCartDiv = document.querySelector('.itemsInCart');
            itemsInCartDiv.textContent = itemCount;
        });
    </script>

</head>

<body>
    <div class="navbar-container">
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="catalogue.php">Explore</a>
        </div>

        <div class="search-bar">
            <form action="catalogue.php" method="get">
                <input class="search-btn-img" type="image" src="img/search-ico.png">
                <!-- style="width: 35px;margin-left:-270px;margin-top:.3%;position:absolute" -->
                <input class="search-btn" type="text" name="search" placeholder="Search..." style="padding-left: 25%;">

            </form>
        </div>

        <div class="navbar-img">
            <div class="notification-button">
                <img src="img/bell.png">
                <div class="notification-window">
                    <a href="profile.php?section=view-orders" style="text-decoration: none;">
                        <ul class="notification-list"></ul>
                    </a>
                </div>
            </div>
            <div class="cart-NumberofItems">
                <div class="itemsInCart"></div>
                <a href="myCart_Customer.php"><img class="cart" src="img/cart.png"></a>

            </div>

            <a href="functions/func_profile.php"><img src="img/profile.png"></a>

        </div>
    </div>
</body>

</html>