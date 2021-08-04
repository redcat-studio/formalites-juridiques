<?php

namespace App\Controller\Admin;

use App\Entity\CompanyExecutive;
use App\Form\CompanyExecutiveType;
use App\Repository\CompanyExecutiveRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/company/executive")
 */
class CompanyExecutiveController extends AbstractController
{
    /**
     * @Route("/", name="company_executive_index", methods={"GET"})
     */
    public function index(CompanyExecutiveRepository $companyExecutiveRepository): Response
    {
        return $this->render('admin/company_executive/index.html.twig', [
            'company_executives' => $companyExecutiveRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="company_executive_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $companyExecutive = new CompanyExecutive();
        $form = $this->createForm(CompanyExecutiveType::class, $companyExecutive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($companyExecutive);
            $entityManager->flush();

            return $this->redirectToRoute('company_executive_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_executive/new.html.twig', [
            'company_executive' => $companyExecutive,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_executive_show", methods={"GET"})
     */
    public function show(CompanyExecutive $companyExecutive): Response
    {
        return $this->render('admin/company_executive/show.html.twig', [
            'company_executive' => $companyExecutive,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="company_executive_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CompanyExecutive $companyExecutive): Response
    {
        $form = $this->createForm(CompanyExecutiveType::class, $companyExecutive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_executive_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/company_executive/edit.html.twig', [
            'company_executive' => $companyExecutive,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="company_executive_delete", methods={"POST"})
     */
    public function delete(Request $request, CompanyExecutive $companyExecutive): Response
    {
        if ($this->isCsrfTokenValid('delete'.$companyExecutive->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($companyExecutive);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_executive_index', [], Response::HTTP_SEE_OTHER);
    }
}
