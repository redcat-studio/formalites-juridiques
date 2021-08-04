<?php

namespace App\Controller\Admin;

use App\Entity\CompanyAssociate;
use App\Form\CompanyAssociateType;
use App\Repository\CompanyAssociateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/company/associate")
 */
class CompanyAssociateController extends AbstractController
{
    /**
     * @Route("/", name="company_associate_index", methods={"GET"})
     */
    public function index(CompanyAssociateRepository $companyAssociateRepository): Response
    {
        return $this->render('admin/company_associate/index.html.twig', [
            'company_associates' => $companyAssociateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_associate_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $companyAssociate = new CompanyAssociate();
        $form = $this->createForm(CompanyAssociateType::class, $companyAssociate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($companyAssociate);
            $entityManager->flush();

            return $this->redirectToRoute('company_associate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_associate/new.html.twig', [
            'company_associate' => $companyAssociate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_associate_show", methods={"GET"})
     */
    public function show(CompanyAssociate $companyAssociate): Response
    {
        return $this->render('admin/company_associate/show.html.twig', [
            'company_associate' => $companyAssociate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_associate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CompanyAssociate $companyAssociate): Response
    {
        $form = $this->createForm(CompanyAssociateType::class, $companyAssociate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_associate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_associate/edit.html.twig', [
            'company_associate' => $companyAssociate,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_associate_delete", methods={"POST"})
     */
    public function delete(Request $request, CompanyAssociate $companyAssociate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyAssociate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($companyAssociate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_associate_index', [], Response::HTTP_SEE_OTHER);
    }
}
