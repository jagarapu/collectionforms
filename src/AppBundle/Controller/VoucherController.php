<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Voucher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\VoucherCollection;
use AppBundle\Form\VoucherCollectionType;
use AppBundle\Form\VoucherType as VoucherForm;

class VoucherController extends Controller
{
    /**
     * @Route("/voucher/new", name="new_voucher_entry", options = {"expose" = true})
     */
    public function newCollectionAction(Request $request)
    {
        $voucherCollection = new VoucherCollection();

        $form = $this->createForm(
            VoucherCollectionType::class,
            $voucherCollection
        );
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $vouchers = $voucherCollection->getVouchers();
                foreach ($vouchers as $voucher) {
                    $em->persist($voucher);
                }
                $em->flush();

                return $this->redirect($this->generateUrl('new_voucher_entry'));
            }
        }

        return $this->render(
            'default/newCollection.html.twig',
            [
                'form' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/voucher/{id}/edit", name="edit_voucher_entry", options = {"expose" = true})
     * @ParamConverter(name="voucher", Class="AppBundle:Voucher")
     */
    public function voucherEditAction(Request $request, Voucher $voucher)
    {
        $form = $this->createForm(
            VoucherForm::class,
            $voucher
        );
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($voucher);
                $em->flush();

                return $this->redirect(
                    $this->generateUrl('voucher_list')
                );
            }
        }

        return $this->render(
            'default/voucher_edit.html.twig',
            [
                'form' => $form->createView(),
                'voucher' => $voucher,
            ]
        );
    }

    /**
     * @Route("/vouchers", name="voucher_list",  options = {"expose" = true}, defaults = {"id" = 0})
     */
    public function postedAction()
    {
        $voucherTypes = $this->getDoctrine()->getRepository(Voucher::class)->findAll();

        return $this->render(
            'default/voucher_list_page.html.twig',
            [
                'voucherTypes' => $voucherTypes,
            ]
        );
    }


}