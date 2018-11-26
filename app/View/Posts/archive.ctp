<!--start l-contents-->
<div class="l-container u-clear">
   <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <div class="page-number">
            <?php echo $this->Paginator->counter('Page {:page}/{:pages}');?>
        </div>
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