<?php

namespace App\Presenters;

use App\Posts;
use Nette;
use App\Model;
use App\Article;


class HomepagePresenter extends BasePresenter
{

	/**
	 * @inject
	 * @var \Kdyby\Doctrine\EntityManager
	 */
	public $EntityManager;

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';

		$dao = $this->EntityManager->getRepository(Article::getClassName());
		$this->template->articles = $dao->findAll();


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
