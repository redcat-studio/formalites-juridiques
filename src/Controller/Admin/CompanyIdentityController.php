<?php

namespace App\Controller\Admin;

use App\Entity\CompanyIdentity;
use App\Form\CompanyIdentityType;
use App\Repository\CompanyIdentityRepository;
use App\Repository\CompanyStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/company/identity")
 */
class CompanyIdentityController extends AbstractController
{
    /**
     * @Route("/", name="company_identity_index", methods={"GET"})
     */
    public function index(CompanyIdentityRepository $companyIdentityRepository): Response
    {
        return $this->render('admin/company_identity/index.html.twig', [
            'company_identities' => $companyIdentityRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_identity_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $companyIdentity = new CompanyIdentity();
        $form = $this->createForm(CompanyIdentityType::class, $companyIdentity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($companyIdentity);
            $entityManager->flush();

            return $this->redirectToRoute('company_identity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_identity/new.html.twig', [
            'company_identity' => $companyIdentity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_identity_show", methods={"GET"})
     */
    public function show(CompanyIdentity $companyIdentity,int $id,CompanyStatusRepository $companyStatusRepository): Response
    {
       
        return $this->render('admin/company_identity/show.html.twig', [
            'company_identity' => $companyIdentity,
            'company_status' => $companyStatusRepository->findOneBy(["company_id" =>$id])
            
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_identity_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CompanyIdentity $companyIdentity): Response
    {
        $form = $this->createForm(CompanyIdentityType::class, $companyIdentity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_identity_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_identity/edit.html.twig', [
            'company_identity' => $companyIdentity,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_identity_delete", methods={"POST"})
     */
    public function delete(Request $request, CompanyIdentity $companyIdentity): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyIdentity->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($companyIdentity);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_identity_index', [], Response::HTTP_SEE_OTHER);
    }
}
