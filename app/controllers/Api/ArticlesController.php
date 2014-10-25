<?php

namespace Api;

use BaseController;
use JsonResponse;
use Article;
use Lang;

class ArticlesController extends BaseController {
    
    protected $article;
    
    public function __construct(Article $article) {
        $this->article = $article;
    }
    
    public function getArticles() {
        $articles = $this->article->all();
        
        return JsonResponse::success(array(
            'articles' => $articles->toArray()
        ));
    }
    
    public function getArticle($id) {
        $article = $this->article->find($id);
        
        if (!$article) {
            return JsonResponse::error(Lang::get('messages.article_not_found'));
        }
        
        return JsonResponse::success(array(
            'article' => $article->toArray()
        ));
    }

}