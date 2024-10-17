<br>
<div style="max-width: 640px; margin: auto; text-align: center;">
    <div>
        <a href="terms.php" class="link">Terms of use</a>
        <a href="authors.php" class="link">Authors</a>
    </div>
    <p>PHP: <?php echo(phpversion()); ?> | MySQL: <?php echo($db->query('SELECT VERSION()')->fetchColumn()); ?></p>

    <p> | 
        <?php
            foreach ($links as $name => $link){
                echo('<a href="'. $link .'">'. $name .'</a> | ');
            }
        ?>
    </p>
</div>