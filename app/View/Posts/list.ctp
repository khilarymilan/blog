<!--start l-contents-->
<div class="l-container u-clear">
    <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <a href="/posts/add" class="l-main-button">
            <div class="button">
                <p class="button-text">New Article</p>
            </div>
        </a>
        <?php echo $this->Flash->render('error'); ?>
        
        <ul class="archive archive-admin">
            <?php foreach ($posts as $post) : ?>
                <li class="archive-item">
                    <?php echo '<a href="/posts/edit/' . $post['Post']['id'] . '" class="post-article">'; ?>
                        <time class="post-article-date" datetime="2016-9-16">
                            <?php echo strtoupper(date('d M, Y', strtotime($post['Post']['created']))); ?>
                        </time>
                        <h1 class="post-article-title"><?php echo $post['Post']['title']; ?></h1>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="paginate">
           <?php
                if($this->Paginator->counter('{:pages}') > 1) {
                    echo $this->Paginator->prev($this->Html->tag('span', '', ['class' => 'paginate-prev-arrow']), ['class' => 'paginate-prev', 'tag' => false, 'escape' => false], null, ['class' => 'paginate-prev is-disable', 'tag' => false]);
                    echo $this->Paginator->numbers(['class' => 'paginate-number', 'currentClass' => 'paginate-number is-current', 'separator' => '']); 
                    echo $this->Paginator->next($this->Html->tag('span', '', ['class' => 'paginate-next-arrow']), ['class' => 'paginate-next', 'tag' => false, 'escape' => false], null, ['class' => 'paginate-next is-disable']);
                }
            ?>
        </div>
    </main>
    <!--end l-main-->
</div>
<!--end l-contents-->