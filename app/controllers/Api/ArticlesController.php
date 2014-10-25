<?php

namespace Api;

class ArticlesController {
    
    protected $article;
    
    public function __construct(Article $article) {
        $this->article = $article;
    }
    
    public function get() {
        $articles = $this->article->all();
        
        return JsonResponse::success(array(
            'articles' => $articles->toArray()
        ));
    }

}