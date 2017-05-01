<div id="footer-social-icons-container">
<?php for($i = 0; $i < $iconUrlArrLength; $i++): ?>
    <?php if( !empty($iconUrlArr[$i])): ?>
        <?php if (!empty($linkArr[$i])): ?>
            <a class="footer-social-link" target="_blank" href="<?php echo $linkArr[$i] ?>">
        <?php else: ?>
            <a class="footer-social-link" href="#">
        <?php endif; ?>
                <img src="<?php echo esc_url($iconUrlArr[$i]) ?>" width="36px" height="36px" />
            </a>
    <?php endif; ?>
<?php endfor; ?>   
</div>