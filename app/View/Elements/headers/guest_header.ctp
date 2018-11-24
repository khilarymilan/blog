<header class="l-header  js-header">
    <div class="l-header-top u-clear">
    <div class="l-header-logo">
        <div class="logo ">
            <?php 
                echo $this->Html->image('logo.png', [
                    'alt' => 'BLOG', 
                    'width' => '253', 
                    'height' => '28',
                    'url' => ['controller' => 'posts', 'action' => 'index']
                ]); 
            ?>
        </div>
    </div>
    <div class="l-header-hamburger">
        <a href="#" class="hamburger js-hamburger" >
            <span class="hamburger-item"></span>
            <span class="hamburger-item"></span>
            <span class="hamburger-item"></span>
        </a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="display: none; font-size:50px;">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
</header>
<!--end header-->

<nav class="nav js-nav">
    <ul class="nav-list">
        <li class="nav-item">
            <a href="/posts" class="nav-link">TOP</a>
        </li>
        <li class="nav-item">
            <a href="https://www.facebook.com/facebook/" class="nav-link" target="_blank">Facebook</a>
        </li>
        <li class="nav-item">
            <a href="https://twitter.com/twitter" class="nav-link" target="_blank">Twitter</a>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    $(function() {
        $('.hamburger').click( function() {
            $(this).css({'display': 'none'});
            $(".close").css({'display': 'block'});
            $(".js-nav").attr('class', 'nav is-active');
        });
        $('.close').click( function() {
            $(this).css({'display': 'none'});
            $(".hamburger").css({'display': 'block'});
            $(".is-active").attr('class', 'nav js-nav');
        });
    });
</script>