<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Form\ModifierUserAdminType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class LiseUserController extends Controller
{
    /**
     * @Route("/lise/user", name="lise_user")
     */
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();
        $u = array();
        foreach ($users as $user){
            if($user != $this->getUser()){
                array_push($u,$user);
            }
        }
        return $this->render('lise_user/index.html.twig', [
            'controller_name' => 'LiseUserController',
            'users' => $u,
        ]);
    }

    /**
     * @Route("/lise/user/remove/{id}", name="lise_user_remove")
     * @ParamConverter("user", options={"mapping"={"id"="id"}})
     */
    public function remove(User $user, EntityManagerInterface $entityManager)
    {
        //on remove l appartenance de l utilisateur a toutes ses videos
        /*foreach ($user->getMovies() as $movie) {
            $user->removeMovie($movie);
        }*/
        $entityManager->remove($user);
        $entityManager->flush();
        $this->addFlash('notice', 'utilisateur supprimé!');
        return $this->redirectToRoute('lise_user');
    }
    /**
     * @Route("/lise/user/edit/{id}", name="lise_user_edit")
     * @ParamConverter("user", options={"mapping"={"id"="id"}})
     */
    public function edit(Request $request, EntityManagerInterface $entityManager,
                         UserRepository $userRepository, int $id)
    {
        $user = $userRepository->find($id);
        $form =$this->createForm(ModifierUserAdminType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();
            $this->addFlash('notice', 'Changement(s) effectué(s)!');
            return $this->redirectToRoute('lise_user');
        }
        return $this->render('lise_user/editindex.html.twig', [
            'controller_name' => 'EdituserController',
            'form' => $form->createView(),
        ]);
    }
}
