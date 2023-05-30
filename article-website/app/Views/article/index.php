
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Quản lý sách</title>

</head>
<body>
    <div class="container">
    <h1 class="text-center mb-3 mt-5 text-success">Article</h1>
    <a href="index.php?controller=article&action=create_article" class = "btn btn-success" style="width: 10%;">Thêm mới</a>

    <table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created</th> 
            <th scope="col">Edit</th>
             <th scope="col">Delete</th>
        </tr>
    </thead>
  <tbody>
  <?php 
  $count = 0;
     foreach ($articles as $article) {
      $count ++;
     ?>  
    <tr>
      
      <td><?= $count ?></td>
      <td><?= $article->getTitle()?></td>
      <td><?= $article->getContent() ?></td>
      <td><?= date('d-m-Y', strtotime($article->getCreated()));?></td>
      <td>
        <a href="index.php?controller=article&action=edit_article&id=<?= $article->getId() ?>"><i class="bi bi-pencil-square"></i></a>
      </td>
        <td>
            <a onclick = "return confirm('Bạn có chắc chắn muốn xóa sách này không ?');"  href="index.php?controller=article&action=del_article&id=<?=$article->getId() ?>" > <i class="bi bi-trash3-fill"></i> </a>
        </td>
    </tr>
    <?php
    
    }
    ?>
  </tbody>
</table>
</div>

</body>
</html>