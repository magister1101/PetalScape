<?php
include 'config.php';
session_start();

// Check if user ID is set in the session
if (isset($_SESSION['id'])) {
    $userId = $_SESSION['id'];
    
    // Fetch user data from the database
    $sqlPullUser = "SELECT firstName, lastName, userName, email FROM accounts WHERE id = $userId";
    $resultPullUser = $conn->query($sqlPullUser);

    if ($resultPullUser->num_rows > 0) {
        $user = $resultPullUser->fetch_assoc();
        $fullName = $user['firstName'] . ' ' . $user['lastName'];
    } else {
        // Handle case where user is not found
        $fullName = 'Guest';
        $user = ['email' => 'guest@example.com'];
    }

    // Check if user is not an admin
    $queryAdmin = "SELECT isAdmin FROM accounts WHERE id = '$userId'";
    $resultAdmin = mysqli_query($conn, $queryAdmin);
    $rowsAdmin = mysqli_fetch_assoc($resultAdmin);
    $adminCheck = $rowsAdmin["isAdmin"];

    if ($adminCheck != '1') {
        ?>

        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = 'https://embed.tawk.to/6682f9449d7f358570d5e46f/1i1nprg5a';
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();

            Tawk_API.onLoad = function() {
                // Set Visitor Attributes
                Tawk_API.setAttributes({
                    'userName': '<?php echo addslashes($user["userName"]); ?>',
                    'email': '<?php echo addslashes($user["email"]); ?>',
                    'fullName': '<?php echo addslashes($fullName); ?>',
                    'hash': '<?php echo $userId; ?>'
                }, function(error) {});
            };
        </script>

        <?php
    }
} else {
    // echo "User not logged in.";
}
?>
