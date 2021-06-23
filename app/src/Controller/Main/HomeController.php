<?php


namespace App\Controller\Main;

use App\Repository\PostRepositoryInterface;
use App\Service\Post\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
class HomeController extends AbstractController
{
    /**
     * @var PostRepositoryInterface
     */
    private $postRepository;

    public function __construct(PostService $postService,
                                PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        $posts = $this->postRepository->findAll();

        return $this->render('main/index.html.twig', ['title' => 'Проект по изучению', 'posts' => $posts]);
    }
}