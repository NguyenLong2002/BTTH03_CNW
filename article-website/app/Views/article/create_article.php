
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Thêm mới sách</title>
</head>
<body>
    <div class="container">
        <h1>Thêm mới sách </h1>
        
    <form action="index.php?controller=article&action=processCreated" method = "POST">
        <div class="mb-3">
            <label for="title" >Title</label>
            <input type="text" class="form-control" id="title" name = "title">
        </div>
        <div class="mb-3">
            <label for="content" >Content</label>
            <input type="text" class="form-control" id="content" name = "content">
        </div>
        <div class="mb-3">
            <label for="created" >Created</label>
            <input type="text" class="form-control" id="created"  name = "created">
        </div>
        
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
    </div>
</body>
</html>
