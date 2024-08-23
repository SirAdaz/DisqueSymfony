<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Form\DisqueType;
use App\Repository\DisqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class DisqueController extends AbstractController
{
    private $disqueRepository;
    public function __construct(DisqueRepository $disqueRepository){
        $this->disqueRepository = $disqueRepository;
    }
    #[Route('/disque', name: 'app_disque', methods:['get'])]
    public function index(): Response
    {
        $disques = $this->disqueRepository->findAll();
        return $this->render('disque/index.html.twig', [
            'disques' => $disques
        ]);
    }

    #[Route('/disque/{id}', name: 'app_disque_show', methods:['get'])]
    public function show( int $id): Response
    {
        $disque = $this->disqueRepository->find($id);
        return $this->render('disque/show.html.twig', [
            'disque' => $disque
        ]);
    }

    #[Route("/disquecreate", name:"app_disque_create", methods: ["get","post"])]

    public function new(Request $request, EntityManagerInterface $manager): Response{
        // création d'un nouveau livre
        $disque = new Disque();
        // création d'un formulaire
        $form = $this->createForm(DisqueType::class, $disque);
        // traitement du formulaire
        $form->handleRequest($request);
        //si me formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on recupere le manager
            $manager->persist($disque);
            // on enregistre le livre
            $manager->flush();
            // on redirige vers la liste de livre
            return $this->redirectToRoute("app_disque");
        }
        return $this->render("disque/create.html.twig", [
            "form"=> $form->createView(),
        ]);
    }
    #[Route("/disque/edit/{id}", name:"app_disque_edit", methods: ["GET","post"])]
    public function edit(DisqueRepository $disqueRepository, $id, Request $request, EntityManagerInterface $manager): Response{
        // on recupere le livre a modifier par son id
        $disque = $disqueRepository ->findOneBy(["id" => $id]);
        // on cree le formulaire
        $form = $this->createForm(DisqueType::class, $disque);
        // on traite le formulaire
        $form->handleRequest($request);
        //si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on enregistre le livre
            $disque = $form ->getData();
            $manager ->persist($disque);
            $manager->flush();
            return $this->redirectToRoute("app_disque");
        }
        return $this->render("disque/edit.html.twig", [
            "form"=> $form->createView(),
        ]);
    }
    #[Route("/disque/delete/{id}", name:"app_disque_delete", methods: ["get","POST"])]
    public function delete(DisqueRepository $disqueRepository, $id,  EntityManagerInterface $manager): Response{
        // on recupere le disque par son id
        $disque = $disqueRepository ->findOneBy(["id"=> $id]);
        //si le disque n'existe pas
        if(!$disque){
            // on affiche un message d'erreur
            $this->addFlash("danger","Le disque n\' existe pas");
            //on redirige vers la liste des disques
            return $this->redirectToRoute("app_disque");
        }
        // on supprime le livre
        $manager->remove($disque);
        $manager->flush();
        // on affiche un message de confirmation
        $this->addFlash("success","Le disque a ete supprime");
        return $this->redirectToRoute("app_disque");
    }
}
