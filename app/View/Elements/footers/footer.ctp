<footer class="l-footer ">
    <?php echo in_array($this->params['action'], $guest_pages) ? $this->element('/footers/scroll_button') : ''; ?>
    <div class="l-footer-copyright">
        <small class="copyright">&copy;copyright</small>
    </div>
</footer>