<!--start l-contents-->
<div class="l-container u-clear">
    <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <?php 
            echo $this->Flash->render('danger');

            echo $this->Form->create('User', ['class' => 'form']);
            echo $this->Form->input('username', ['label' => ['text' => 'USER ID', 'class' => 'form-title'], 'class' => 'input input-text', 'div' => false]);
             echo $this->Form->input('password', ['label' => ['text' => 'PASSWORD', 'class' => 'form-title'], 'class' => 'input input-text', 'div' => false]);
        ?>
            <!-- <label for="user-id" class="form-title">USER ID</label>
            <input type="text" id="user-id" class="input input-text" name="data[User][username]">
            <label for="password" class="form-title">PASSWORD</label>
            <input type="text" id="password" class="input input-text" name="data[User][password]"> -->
            <label for="submit" class="form-button">
                <div class="button">
                    <p class="button-text">Login</p>
                </div>
            </label>
            <input type="submit" id="submit" class="input input-submit">
        <?php echo $this->Form->end();?>
    </main>
    <!--end l-main-->
</div>
