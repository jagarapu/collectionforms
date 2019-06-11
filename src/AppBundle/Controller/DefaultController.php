<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Doctrine\Common\Collections\ArrayCollection;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            // persist user object
            $em->persist($user);
            $em->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),

        ]);
    }


    /**
     * @Route("/{id}/edit" , name="edit_user")
     * @ParamConverter(name="group", Class="AppBundle:User")
     * */
    public function editAction(Request $request, User $user)
    {
        $em = $this->getDoctrine()->getManager();
        if (!$user) {
            throw $this->createNotFoundException('No task found for id '.$user->getId());
        }

//        $originalExp = new ArrayCollection();
//
//        // Create an ArrayCollection of the current Tag objects in the database
//        foreach ($user->getExp() as $exp) {
//            $originalExp->add($exp);
//        }
        $editForm = $this->createForm(UserType::class, $user);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
//            foreach ($originalExp as $exp) {
//                // check if the exp is in the $user->getExp()
//                if ($user->getExp()->contains($exp) === false) {
//                    $em->remove($exp);
//                }
//            }

            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('user_list'));

        }
        return $this->render(
            'default/edit.html.twig',
            [
                'form' => $editForm->createView(),
                'user' => $user,
                'id' => $user->getId(),
            ]
        );

    }

    /**
     * @Route("/list" , name="user_list")
     */
    public function listAction()
    {
        $objects = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render(
            'default/list.html.twig',
            [
                'objects' => $objects,
            ]
        );
    }

}
