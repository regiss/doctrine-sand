<?php

namespace App\Presenters;

use App\Posts;
use Kdyby\Doctrine\EntityManager;
use Nette;
use App\Model;
use App\Article;
use Nette\Application\ApplicationException;
use Tracy\Debugger;


class BlogPresenter extends BasePresenter
{
	const refactoringCondition = 'ok';

	/**
	 * @inject
	 * @var \App\Articles
	 */
	public $articles;


	/**
	 * @inject
	 * @var EntityManager
	 */
	public $EntityManager;

	public function renderDefault()
	{
		$this->template->anyVariable = 'any value';

//		$dao = $this->articles;
		$this->template->articles = $this->articles->getArticles()->findAll();

		$posts                 = $this->EntityManager->getRepository(Posts::getClassName());
		$this->template->posts = $posts->findAll();

		$this->template->myparametr = $this->context->parameters['first_parametr'];

//		$this->template->test = $this->doSomeRefactoring('Hello world from blog');

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



		try {
			$this->checkNum(2);
			\Tracy\Debugger::barDump('If you see this, the number is 1 or below');

		} catch (Nette\Application\BadRequestException $e) {
			Debugger::log('Message: ' . $e->getMessage());
			var_dump($e->getMessage());
		}
//		finally {
//			\Tracy\Debugger::barDump('Got here Finally');
//		}

	}

	public function checkNum($number)
	{
		if ($number > 1) {

			dump('cool before throw');
			throw new Nette\Application\BadRequestException("Value must be 1 or below");
		}
//		dump('cool');
		return FALSE;
	}

//	public function doSomeRefactoring($name)
//	{
//
//		if ($name == '' . self::refactoringCondition . '') {
//
//			echo $name;
//		}
//	}
}
