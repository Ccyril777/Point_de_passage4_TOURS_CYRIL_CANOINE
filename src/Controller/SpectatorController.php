<?php

namespace App\Controller;

use App\Entity\Spectator;
use App\Form\SpectatorType;
use App\Repository\SpectatorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/spectator")
 */
class SpectatorController extends AbstractController
{
    /**
     * @Route("/", name="spectator_index", methods={"GET"})
     */
    public function index(SpectatorRepository $spectatorRepository): Response
    {
        return $this->render('spectator/index.html.twig', [
            'spectators' => $spectatorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="spectator_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $spectator = new Spectator();
        $form = $this->createForm(SpectatorType::class, $spectator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spectator);
            $entityManager->flush();

            return $this->redirectToRoute('spectator_index');
        }

        return $this->render('spectator/new.html.twig', [
            'spectator' => $spectator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spectator_show", methods={"GET"})
     */
    public function show(Spectator $spectator): Response
    {
        return $this->render('spectator/show.html.twig', [
            'spectator' => $spectator,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="spectator_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Spectator $spectator): Response
    {
        $form = $this->createForm(SpectatorType::class, $spectator);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('spectator_index');
        }

        return $this->render('spectator/edit.html.twig', [
            'spectator' => $spectator,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="spectator_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Spectator $spectator): Response
    {
        if ($this->isCsrfTokenValid('delete'.$spectator->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($spectator);
            $entityManager->flush();
        }

        return $this->redirectToRoute('spectator_index');
    }
}
