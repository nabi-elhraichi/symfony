<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Article;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { 
            $article = new Article();
            $article->setTitle("Title de l'article n°1")
                    ->setContent("<p>Contenu de l'article n°1</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
                    
            $manager->persist($article);

            $article1 = new Article();
            $article1->setTitle("Title de l'article n°2")
                    ->setContent("<p>Contenu de l'article n°2</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
                    
            $manager->persist($article1);

            $article2 = new Article();
            $article2->setTitle("Title de l'article n°3")
                    ->setContent("<p>Contenu de l'article n°3</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
                    
            $manager->persist($article2);

            $article4 = new Article();
            $article4->setTitle("Title de l'article n°4")
                    ->setContent("<p>Contenu de l'article n°4</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
                    
            $manager->persist($article4);

            $article5 = new Article();
            $article5->setTitle("Title de l'article n°5")
                    ->setContent("<p>Contenu de l'article n°5</p>")
                    ->setImage("http://placehold.it/350x150")
                    ->setCreatedAt(new \DateTime());
                    
            $manager->persist($article5);
        

        $manager->flush();
        
        
    }
}
