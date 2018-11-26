<!--start l-contents-->
<div class="l-container u-clear">
    <!--start l-main-->
    <main class="l-main js-main">
        <div class="l-main-block"></div>
        <?php 
            echo $this->Flash->render('error');
            echo $this->Form->create('Post', ['class' => 'form', 'type' => 'file']);
        ?>
            <label for="image" class="form-title">EYE CATCH IMAGE
                <div class="form-file u-clear">
                    <span class="form-file-button">UPLOAD</span>
                    <p id="image-name"></p>
                </div>
            </label>
            <input type="file" id="image" class="input input-image" name="data[Post][image]">
            <?php 
                // echo $this->Form->input('image', ['type' => 'file', 'label' => ['text' => 'EYE CATCH IMAGE', 'class' => 'form-title', 'after' => '<div class="form-file u-clear"></div>'], 'class' => 'input input-text', 'div' => false, 'required' => false]);
                echo $this->Form->input('title', ['label' => ['text' => 'TITLE', 'class' => 'form-title'], 'class' => 'input input-text', 'div' => false, 'required' => false]);
                echo $this->Form->input('body', ['label' => ['text' => 'CONTENTS', 'class' => 'form-title'], 'class' => 'input input-contents', 'div' => false, 'required' => false]);
            ?>  
            <label for="submit" class="form-button">
                <div class="button">
                    <p class="button-text">Submit</p>
                </div>
            </label>
            <input type="submit" id="submit" class="input input-submit">
        <?php $this->Form->end(); ?>
        <a href="/posts/list" class="form-button">
            <div class="button">
                <p class="button-text">Back</p>
            </div>
        </a>
    </main>
    <!--end l-main-->
</div>
<!--end l-contents-->
