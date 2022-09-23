<div>
<?php if(isset($_SESSION['flash'])): ?>
        <p> <?php echo $_SESSION['flash']??""; ?> </p>
        <?php unset($_SESSION['flash']);
        endif;
        ?>
</div>