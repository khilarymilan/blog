<!--start header-->
<header class="l-header l-header-admin js-header">
    <div class="l-header-top u-clear">
        <div class="l-header-logo">
            <?php 
                echo $this->Html->image('logo-admin.png', [
                    'alt' => 'BLOG', 
                    'width' => '138', 
                    'height' => '28',
                    'url' => ['controller' => 'posts', 'action' => 'list'],
                ]); 
            ?>
        </div>
        <div class="l-header-text">
            <p>ADMIN PAGE</p>
        </div>
    </div>
</header>
<!--end header-->