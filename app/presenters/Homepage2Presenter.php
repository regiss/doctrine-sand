<?php

namespace App\Presenters;

use App\Posts;
use Nette;
use App\Model;
use App\Article;


class Homepage2Presenter extends BasePresenter
{

	/**
	 * @inject
	 * @var \App\Articles
	 */
	public $articles;

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';

		$dao = $this->articles;
		$this->template->articles = $dao->getArticles()->findAll();


//		$post = new Posts();
//		$post->title = 'New title';
//		$post->text = 'New text New textNew text';
//		$post->created_at = new \Nette\Utils\DateTime;
//
//
//		$this->EntityManager->persist($post);
//		$this->EntityManager->flush();

//		$dao = $this->EntityManager->getRepository(Posts::getClassName());
//		$dao->setTitle('test');


//		$dao->__call('set', ['title' => 'my title']);

//		dump($dao->__isset('title'));
//		$dao->__set('title', 'test');




	}

}
