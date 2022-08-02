<?php
    //require_once('./../views/Additional/header.php');
    $articles = (new App\Controller\Admin\AdminController())->index();
?>

<div class="container">
<div class="row">
    <div class="col-lg-8">
        <h3>Article List <a href="/admin/article/create.php"><button class="btn btnx-xs btn-success">create new article</button></a></h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article ) : ?>
                    <tr>
                        <th scope="row"><?= $article->id ?></th>
                        <td><?= $article->title ?></td>
                        <td>
                            <a href="/admin/article/delete.php?id=<?= $article->id ?>"><button type="button" class="btn btn-danger btn-xs">delete</button></a>
                            <a href="/admin/article/edit.php?id=<?= $article->id ?>"><button type="button" class="btn btn-primary btn-xs">edit</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>
</div>