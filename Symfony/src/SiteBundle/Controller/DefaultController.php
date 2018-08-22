<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use SiteBundle\Entity\Patient;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteBundle:Default:index.html.twig');
    }

    public function creerConsultationAction(Request $request)
    {
        //return $this->render('SiteBundle:Default:index.html.twig');
        $patient = new Patient();
        $patient->setDateConsultation(new \DateTime());
        $formBuilder = $this->get('form.factory')->createBuilder(FormType::class,$patient);
        $formBuilder
            ->add('Name',TextType::class, array('label' => 'Nom', 'required' => true ))
            ->add('Prenom',TextType::class, array('label' => 'Prénom', 'required' => true ))
            ->add('PrescriptionG',TextType::class, array('label' => 'Prescription oeil gauche', 'required' => true ))
            ->add('PrescriptionD',TextType::class, array('label' => 'Prescription oeil droit', 'required' => true ))
            ->add('Enregistrer',SubmitType::class)
        ;

        $form = $formBuilder->getForm();
        
        // Si la requÃªte est en POST
        if ($request->isMethod('POST')) {
            // On fait le lien RequÃªte <-> Formulaire
            // Ã€ partir de maintenant, la variable $image contient les valeurs entrÃ©es dans le formulaire par le visiteur
            $form->handleRequest($request);

            // On vÃ©rifie que les valeurs entrÃ©es sont correctes
            // (Nous verrons la validation des objets en dÃ©tail dans le prochain chapitre)
            if ($form->isValid()) {
            // On enregistre notre objet $image dans la base de donnÃ©es, par exemple
                $em = $this->getDoctrine()->getManager();
                $em->persist($patient);
                $em->flush();
                
                 // On redirige vers la page de visualisation de l'annonce nouvellement crÃ©Ã©e
                //return $this->render('SiteBundle:Default:feedback_creation.html.twig');
                return $this->render('SiteBundle:Default:creer_patient.html.twig', array(
                    'form' => $form->createView(),
                ));
            }
        }
        // On passe la mÃ©thode createView() du formulaire Ã  la vue
        // afin qu'elle puisse afficher le formulaire toute seule
        return $this->render('SiteBundle:Default:creer_patient.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    public function consultationAction($id)
    {
        $patient = new Patient();
        $repository = $this->getDoctrine()->getManager()->getRepository('SiteBundle:Patient');
        $patient = $repository->findOneBy(
                array('id' => $id)
            );
        return $this->render('SiteBundle:Default:consultation.html.twig', array(
            'patient' => $patient,
        ));
    }

    public function listeConsultationAction(){
        $repository = $this->getDoctrine()->getManager()->getRepository('SiteBundle:Patient');
        $patients = $repository->findAll();
        return $this->render('SiteBundle:Default:liste-consultation.html.twig', array(
            'patients' => $patients,
        ));
    }

}
