<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Article;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);

        $articles = $repo->findAll();


        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('blog/home.html.twig', [
            "title" => 'Blogani',
            "age" => 14
        ]);
    }

    /**
     * @Route("/blog/new", name="blog_create")
     */
    public function create()
    {
        $article = new Article();
        $form  = $this->createFormBuilder($article)
                      ->add('title', TextType::class, [
                          'attr' => [
                              'placeholder' => "Titre de l'article",
                          ]
                      ])
                      ->add('content', TextareaType::class, [
                        'attr' => [
                            'placeholder' => "Contenu de l'article",
                        ]
                    ])
                      ->add('image', TextType::class, [
                        'attr' => [
                            'placeholder' => "Image de l'article",
                        ]
                    ])
                      ->getForm();

        return $this->render('blog/create.html.twig', [
            'formArticle' => $form->createView()
        ]);
    }

    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);

        return $this->render('blog/show.html.twig', [
            'article'=> $article
        ]);
    }

    
}
