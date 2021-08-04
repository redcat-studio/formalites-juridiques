<?php

namespace App\Controller\Admin;

use App\Entity\CompanyStatus;
use App\Form\CompanyStatusType;
use App\Repository\CompanyStatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/company/status")
 */
class CompanyStatusController extends AbstractController
{
    /**
     * @Route("/", name="company_status_index", methods={"GET"})
     */
    public function index(CompanyStatusRepository $companyStatusRepository): Response
    {
        return $this->render('admin/company_status/index.html.twig', [
            'company_statuses' => $companyStatusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_status_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $companyStatus = new CompanyStatus();
        $form = $this->createForm(CompanyStatusType::class, $companyStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($companyStatus);
            $entityManager->flush();

            return $this->redirectToRoute('company_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_status/new.html.twig', [
            'company_status' => $companyStatus,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_status_show", methods={"GET"})
     */
    public function show(CompanyStatus $companyStatus): Response
    {
        return $this->render('admin/company_status/show.html.twig', [
            'company_status' => $companyStatus,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_status_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CompanyStatus $companyStatus): Response
    {
        $form = $this->createForm(CompanyStatusType::class, $companyStatus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_status/edit.html.twig', [
            'company_status' => $companyStatus,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_status_delete", methods={"POST"})
     */
    public function delete(Request $request, CompanyStatus $companyStatus): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyStatus->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($companyStatus);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_status_index', [], Response::HTTP_SEE_OTHER);
    }
}
