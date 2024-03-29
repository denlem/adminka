<?php


namespace App\Controller\Admin;


use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepositoryInterface;
use App\Service\User\UserService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminUserController extends AbstractController
{

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserRepositoryInterface $userRepository,
                                UserService $userService)
    {
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * @Route("/admin/user", name="admin_user")
     * @return Response
     */
    public function index()
    {
        $varsForRender['title'] = 'Пользователи';
        $varsForRender['users'] = $this->userRepository->getAll();

        return $this->render('admin/user/index.html.twig', $varsForRender);
    }

    /**
     * @Route("/admin/user/create", name="admin_user_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function createAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if(($form->isSubmitted()) && ($form->isValid()))
        {
            $this->userService->handleCreate($user);
            $this->addFlash('success', 'Пользователь создан!');
            return $this->redirectToRoute('admin_user');
        }
        $varsForRender['title'] = 'Форма создания пользователя';
        $varsForRender['form'] = $form->createView();

        return $this->render('admin/user/form.html.twig', $varsForRender);

    }

    /**
     * @Route("/admin/user/update/{userId}", name="admin_user_update")
     * @param Request $request
     * @param int $userId
     * @return RedirectResponse|Response
     */
    public function updateAction(Request $request, int $userId)
    {
        $user = $this->userRepository->getOne($userId);
        $formUser = $this->createForm(UserType::class, $user);
        $formUser->handleRequest($request);

        if ($formUser->isSubmitted() && $formUser->isValid()){
            $this->userService->handleUpdate($user);
            $this->addFlash('success', 'Изменения сохранены!');
            return $this->redirectToRoute('admin_user');
        }

        $varsForRender['title'] = 'Редактрование Пользователя';
        $varsForRender['form'] = $formUser->createView();

        return $this->render('admin/user/form.html.twig', $varsForRender);
    }
}
