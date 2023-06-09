<?php

namespace App\Controller;

use App\Entity\Employe;
use App\Form\EmployeType;
use App\Repository\EmployeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EmployeController extends AbstractController
{
    #[Route('/', name: 'employe')]
    #[Route('/filter/{filtre}', name:"filter_employe")]
    public function index(EmployeRepository $repo, Request $globals, EntityManagerInterface $manager, $filtre=null): Response
    {
           
        switch($filtre)
        {
            case 'nom_a':
            $salarie = $repo->findBy([],['nom' => 'ASC']);
            break;
            case 'nom_d':
            $salarie = $repo->findBy([],['nom' => 'DESC']);
            break;
            case 'sal_a':
            $salarie = $repo->findBy([],['salaire' => 'ASC']);
            break;
            case 'sal_d':
            $salarie = $repo->findBy([],['salaire' => 'DESC']);
            break;
            default:
            $salarie = $repo->findAll();  
        }
        
        $employe = new Employe;

        $form = $this->createForm(EmployeType::class, $employe);
        $form->handleRequest($globals);

        if($form->isSubmitted() && $form->isValid())
        {
            $manager->persist($employe);
            $manager->flush();
            return $this->redirectToRoute('employe');
        }

        return $this->render('employe/index.html.twig', [
            'salaries' => $salarie,
            'form' => $form->createView()
        ]);
    }

    
 

    #[Route('/add', name:'add_employe')]
    #[Route('/edit/{id}', name:'edit_employe')]
    public function form(Request $globals, EntityManagerInterface $manager, Employe $salarie=null)
    {
        if($salarie==null)
        {
            $salarie = new Employe;
        }

        $formEmploye =$this->createForm(EmployeType::class, $salarie);
        $formEmploye->handleRequest($globals);

        if($formEmploye->isSubmitted() && $formEmploye->isValid())
        {
            $manager->persist($salarie);
            $manager->flush();
            return $this->redirectToRoute('employe');
        }
        
        return $this->renderForm('/employe/form.html.twig',[
            'formEmploye'   =>$formEmploye,
            'editMode'      =>$salarie->getId() !==null,      
        ]);
    }
    
    #[Route('/delete/{id}', name:'delete_employe')]
    public function delete(EntityManagerInterface $manager, Employe $salarie)
    {
        $manager->remove($salarie);
        $manager->flush();
        return $this->redirectToRoute('employe');
    }

    #[Route('/show', name:'show_poste')]
    public function show(EmployeRepository $repo)
    {
        $salarie = $repo->findBy([],['poste' => 'developpeur']);
        return $this->render('employe/filternom.html.twig',[
                   'salaries' => $salarie
       ]);
    }

    
}
