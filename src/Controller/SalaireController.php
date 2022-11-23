<?php

namespace App\Controller;

use App\Entity\Salaire;
use App\Form\SalaireType;
use App\Repository\SalaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/salaire')]
class SalaireController extends AbstractController
{
    #[Route('/home', name: 'app_salaire_home', methods: ['GET'])]
    public function home(SalaireRepository $salaireRepository): Response
    {
        return $this->render('salaire/home.html.twig', );
       
    }
    #[Route('/', name: 'app_salaire_index', methods: ['GET'])]
    public function index(SalaireRepository $salaireRepository): Response
    {
        return $this->render('salaire/index.html.twig', [
            'salaires' => $salaireRepository->findAll(),
        ]);
       
    }
    #[Route('/a', name: 'app_salaire_indexx', methods: ['GET'])]
    public function indexx(SalaireRepository $salaireRepository): Response
    {
        return $this->render('salaire/indexx.html.twig', [
            'salaires' => $salaireRepository->findAll(),
        ]);
       
    }
    #[Route('/new', name: 'app_salaire_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SalaireRepository $salaireRepository): Response
    {
        $salaire = new Salaire();
        $form = $this->createForm(SalaireType::class, $salaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salaireRepository->save($salaire, true);

            return $this->redirectToRoute('app_salaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salaire/new.html.twig', [
            'salaire' => $salaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/A', name: 'app_salaire_show', methods: ['GET'])]
    public function show(Salaire $salaire): Response
    {
        return $this->render('salaire/show.html.twig', [
            'salaire' => $salaire,
        ]);
    }
    #[Route('/{id}', name: 'app_salaire_showF', methods: ['GET'])]
    public function showF(Salaire $salaire): Response
    {
        return $this->render('salaire/showF.html.twig', [
            'salaire' => $salaire,
        ]);
    }


    #[Route('/{id}/edit', name: 'app_salaire_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Salaire $salaire, SalaireRepository $salaireRepository): Response
    {
        $form = $this->createForm(SalaireType::class, $salaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $salaireRepository->save($salaire, true);

            return $this->redirectToRoute('app_salaire_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('salaire/edit.html.twig', [
            'salaire' => $salaire,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_salaire_delete', methods: ['POST'])]
    public function delete(Request $request, Salaire $salaire, SalaireRepository $salaireRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salaire->getId(), $request->request->get('_token'))) {
            $salaireRepository->remove($salaire, true);
        }

        return $this->redirectToRoute('app_salaire_index', [], Response::HTTP_SEE_OTHER);
    }
}
