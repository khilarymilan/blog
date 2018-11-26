<!--start l-main-->
<main class="l-main js-main">
    <div class="l-main-block"></div>
    <div class="single">
        <?php echo $this->Html->image($post['Post']['image'], ['class' => 'single-image']); ?>
        <div class="l-container u-clear">
            <h1 class="single-title"><?php echo $post['Post']['title']; ?></h1>
            <time class="single-date" datetime="2016-9-16"><?php echo $post['Post']['created']; ?></time>
            <p class="single-desc" style="white-space: pre-wrap;"><?php echo $post['Post']['body']; ?></p>
            <div class="single-button">
                <div class="button">
                    <a href="/posts/index"><p class="button-text">Top</p></a>
                </div>
            </div>
        </div>
    </div>
</main>
<!--end l-main-->