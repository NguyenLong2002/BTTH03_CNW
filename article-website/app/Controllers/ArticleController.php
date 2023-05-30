
<?php

require_once APP_ROOT . '\app\Services\ArticleService.php';
class ArticleController
{
    public function index(){
       
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        require_once APP_ROOT .'\app\Views\article\index.php';
    }
    public function show_article(){

    }
    public function create_article(){
        $articleService = new ArticleService();
        require_once APP_ROOT .'\app\views\article\create_article.php';
    }
    public function edit_article(){
        $articleService = new ArticleService();
        $detailArticle = $articleService->getDetailArticle();
        require_once APP_ROOT .'\app\views\article\edit_article.php';
    }
    public function processEdit(){
        $articleService = new ArticleService();
        $processEdit = $articleService->editArticle();
    }
    public function processCreated(){
        $articleService = new ArticleService();
        $processCreated = $articleService-> createArticle();
    }
    public function del_article(){
        $articleService = new ArticleService();
        $processEdit = $articleService->delArticle();
    }
}
