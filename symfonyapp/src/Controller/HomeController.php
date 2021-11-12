<?php
// src/Controller/LuckyController.php
namespace App\Controller;
use App\Entity\ContactForm;
use App\Form\ContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class HomeController extends AbstractController{

    private $twig;

    public function __construct(Environment $twig){
        $this->twig = $twig;

    }


    

   /**
     * @Route("/contact", name="contact", format="utf8", locale="fr")
     */

    public function add(Request $request, EntityManagerInterface $entityManager) : Response
    {

       

        $contact = new ContactForm();
        $form = $this->createForm( ContactFormType::class, $contact);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->addFlash('success', 'Votre email est bien envoyé');
            $entityManager->persist($contact);
            $entityManager->flush();
            
        }

        
        return $this->render('pages/home.html.twig', [
            'form' => $form->createView()
        ]);
    }


    public function number(){
        $number = random_int(0, 100);

        return new Response(
            $this->twig->render('pages/home.html.twig')
        );
    }
}