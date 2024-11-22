<?php if(isset($_SESSION['user']['token'])): ?>
    <div class="side">
        <a class="href" href="index.php">Home</a><br>
        <a class="href" href="feed.php">News</a><br>
        <a class="href" href="search.php">Search</a><br>
        <a class="href" href="settings.php">Settings</a><br><hr>
        <a href="logout.php">Logout</a><hr>
    </div>
<?php else : ?>
    <div class="side">
        <a href="login.php">Login</a><br>
        <a href="reg.php">Register</a><hr>
    </div>
<?php endif; ?>