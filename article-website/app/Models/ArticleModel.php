<?php
class ArticleModel{
    // Thuộc tính
    private $id;
    private $title;
    private $content;
    private $created;
   
    public function __construct($id, $title,$content,$created){
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->created = $created;
      
    }

    // Setter và Getter
    public function getId(){
        return $this->id;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getContent(){
        return $this->content;
    }
    public function getCreated(){
        return $this->created;
    }
    



    //set 
    public function setTitle($title){
        $this->title = $title;
    }
    public function setCreated($created){
        $this->created = $created;
    }
    public function setContent($content){
        $this->content = $content;
    }
  
    
}