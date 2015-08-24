<?php
/**
 * Created by PhpStorm.
 * User: Ondrej
 * Date: 8/12/2015
 * Time: 12:00 PM
 */

namespace App;

use Kdyby;

class Articles extends \Nette\Object
{
	private $em;
	private $articles;

	public function __construct(Kdyby\Doctrine\EntityManager $em)
	{
		$this->em = $em;
		$this->articles = $em->getRepository(Article::getClassName());
		// $this->articles = $em->getRepository(App\Article::getClassName()); // for older PHP
	}

	public function publish(Article $article)
	{
		// validate that the article has title and content, or whatever you want to validate here
		$article->published = TRUE;
		$this->em->persist($article);
		// don't forget to call $em->flush() in your presenter
	}

	public function getArticles(){
		return $this->articles;
	}

}