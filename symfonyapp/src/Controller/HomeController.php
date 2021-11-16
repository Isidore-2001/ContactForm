<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use App\Entity\ContactForm;
use App\Entity\Departement;
use App\Form\DepartementType;
use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

use Twig\Environment;

class HomeController extends AbstractController{

    private $twig;

    public function __construct(Environment $twig){
        $this->twig = $twig;

    }


    

   /**
     * @Route("/contact", name="contact", format="utf8", locale="fr")
     */

    public function add(Request $request, EntityManagerInterface $entityManager,\Swift_Mailer $mailer) : Response
    {

        
        $contact = new ContactForm(); // Création d'un objet Formulaire
        $form = $this->createForm( ContactFormType::class, $contact); // création du formulaire
        $contactForm = $form->handleRequest($request);

        
         
        if($form->isSubmitted() && $form->isValid()) // Vérification si tout es ok
{
            //dd($contactForm->getData());
            $message = (new \Swift_Message('new message'))
                ->setFrom($contactForm->getData()->getMail())
                ->setTo($contactForm->get('Departement')->getData()->getEmail())
                ->setBody(
                    $this->renderView(

                        'email/email.html.twig',
                        ['contact' => $contact]
                    ),
                        'text/html'
                );
                // envoi du mail
            $mailer->send($message);
            
            // enregistrement dans la base de données
            $entityManager->persist($contact);
            $entityManager->flush();
            $this->addFlash('success', 'Votre e-mail a bien été envoyé');

            
            return $this->redirectToRoute('contact');
            
        }
        
        
        return $this->render('pages/home.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    
}