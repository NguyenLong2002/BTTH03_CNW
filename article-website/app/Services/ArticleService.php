<?php
// require_once APP_ROOT . '\app\Services\ArticleService.php';
require_once APP_ROOT .'\app\Configs\DBConnection.php';
require_once APP_ROOT . '\app\Models\ArticleModel.php';

class ArticleService
{
    public function getAllArticles()
    {
        $dbConn = new DBConnection(); 
        $conn = $dbConn->getConnection(); 

        $sql = "SELECT * FROM article ORDER by id DESC ";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new ArticleModel($row['id'], $row['title'],$row['content'], $row['created']);
            array_push($articles, $article);
        }
         
        return $articles;
    }

    public function createArticle()
    {
        $dbConn = new DBConnection(); 
        $conn = $dbConn->getConnection(); 

        $title = $_POST['title'];
        $content = $_POST['content'];
        $created = $_POST['created'];

        $sql="INSERT INTO article (title, content, created) VALUES (:title, :content, :created)";
        $stmt = $conn->prepare($sql);
        // Bind values to the placeholders
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':created', $created);

        // Execute the query
        if ($stmt->execute()) {
            header("Location: index.php?controller=article&action=index");
            exit;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
        $dbConn = null;       
    }
    public function getDetailArticle(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        $id = $_GET['id'];
        // B2. Truy vấn
        $sql = "SELECT * FROM article  WHERE id = $id";
        
        $stmt = $conn->query($sql);
        $row = $stmt->fetch();
        $article = new ArticleModel($row['id'], $row['title'], $row['content'], $row['created']);
        return $article;
    }
    public function editArticle(){
        $dbConn = new DBConnection(); 
        $conn = $dbConn->getConnection(); 

        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $created = $_POST['created'];
        $createdDateTime = DateTime::createFromFormat('d-m-Y', $created);
        $errors = DateTime::getLastErrors();

        if ($createdDateTime !== false && $errors['warning_count'] === 0 && $errors['error_count'] === 0) {
            $created = $createdDateTime->format('Y-m-d');
        } else {
            // Xử lý khi giá trị $created không hợp lệ
        }
        $editSql = "UPDATE article SET id=:id,title=:title, content=:content, created=:created WHERE id='$id'";
        $stmt = $conn->prepare($editSql);
        // Bind values to the placeholders
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':title', $title);
        $stmt->bindValue(':content', $content);
        $stmt->bindValue(':created', $created);

        // Execute the query
        if ($stmt->execute()) {
            header("Location: index.php?controller=article&action=index");
            exit;
        } else {
            echo "Error: " . $stmt->errorInfo()[2];
        }
        $dbConn = null;  
    }

    public function delArticle(){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $Id = $_GET['id'];

        $delArticleSql = "DELETE FROM article WHERE id = '$Id'  ";
        $stmt = $conn->prepare( $delArticleSql);
        $stmt->execute();
        // Bước 03: Trả về dữ liệu
        if($stmt->execute()){
            header("Location: index.php?controller=article&action=index");
        }   
    }
}
