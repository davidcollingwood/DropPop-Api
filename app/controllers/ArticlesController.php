<?php

class ArticlesController extends BaseController {
    
    protected $article;
    
    public function __construct(Article $article) {
        $this->article = $article;
    }
    
	public function getArticles() {
        $articles = $this->article->all();
        
		return View::make('articles.articles')->with('articles', $articles);
	}
	
	public function getNewArticle() {
        $article = new $this->article;
        
    	return View::make('articles.article')->with('article', $article);
	}
	
	public function saveArticle() {
        $data = Input::all();
        
    	$article = new $this->article;
    	$article->title = $data['title'];
    	$article->content = $data['content'];
    	$article->author = $data['author'];
    	$article->save();
    	
    	return Redirect::route('articles.all');
	}
	
	public function getArticle($id) {
    	$article = $this->article->findOrFail($id);
    	
    	return View::make('articles.article')->with('article', $article);
	}
	
	public function postArticle($id) {
    	$data = Input::all();
    	
    	$article = $this->article->findOrFail($id);
    	$article->title = $data['title'];
    	$article->content = $data['content'];
    	$article->author = $data['author'];
    	$article->save();
    	
    	return Redirect::route('articles.all');
	}
	
	public function deleteArticle($id) {
    	$this->article->destroy($id);
    	
    	return Redirect::route('articles.all');
	}

}