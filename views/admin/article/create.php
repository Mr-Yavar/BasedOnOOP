<?php

?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 ">
            <h2>Create Article</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-8">

            <form action="/admin/article/create.php" method="post">
                <div class="form-group">
                    <label >title</label>
                    <input type="text" class="form-control" name="title" placeholder="Title ..." value="<?= old('title') ?>">
                </div>
                <div class="form-group">
                    <label >body</label>
                    <textarea name="body" rows="10" class="form-control" placeholder="Body ..."><?= old('body') ?></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-info">create</button>
                </div>
            </form>
        </div>

    </div>
    <!-- /.row -->




</div>
<!-- /.container -->