<!--start l-contents-->
<div class="l-container u-clear">
    <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <?php echo $this->Flash->render('error'); ?>
        <div class="archive">
            <ul class="archive-list">
                <?php foreach($posts as $post) : ?>
                <li class="archive-item">
                    <article class="card">
                        <?php 
                            echo '<a href="/posts/view/' . $post['Post']['id'] . '" class="card-link">';
                            echo $this->Html->image($post['Post']['image'], ['class' => 'card-image'])
                        ?>
                            <div class="card-bottom">
                                <h1 class="card-title"><?php echo $post['Post']['title']; ?></h1>
                                <time class="card-date" datetime="2016-9-16">
                                    <?php echo $post['Post']['created']; ?>
                                </time>
                            </div>
                        </a>
                    </article>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
        <a href="#" class="archive-button">
            <div class="button">
                <a href="/posts/archive"><p class="button-text">More</p></a>
            </div>
        </a>
    </main>
    <!--end l-main-->
</div>
<!--end l-contents-->