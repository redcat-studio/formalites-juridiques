<?php

namespace App\Controller;


use App\Service\MailerService;
use App\Service\MessageService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Payment;
use Datetime;
use App\Entity\CompanyIdentity;
/**
 * @Route("/checkout/payment")
 */
class PaiementController extends AbstractController
{
    const STATUS_DONE = 1;
    const STATUS_NONE = 0;

    private $session;
    private $email;
    private $baseUrl;

    public function __construct(SessionInterface $session,  RequestStack $requestStack)
    {
        $this->session = $session;
        $this->email = 'sallrouget';
        $this->baseUrl = $requestStack->getCurrentRequest()->getSchemeAndHttpHost();
    }
  
    /**
     * @Route("/stripe-checkout", name="checkout_stripe")
     */
    public function checkout_stripe()
    {
        
    
            \Stripe\Stripe::setApiKey('sk_test_51EcKKYD2nsmvhKGSoUEhsC8sABxNioFRSQhj68FSTMv89UwchJh6WOGSMnLrJ3Z3ED66MkRgdbPYlRX2BRTxUK45006q3DjILP');
            $session = \Stripe\Checkout\Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    'price_data' => [
                        'currency' => 'eur',
                        'product_data' => [
                            'name' => 'Formalites-Juridique',
                        ],
                        'unit_amount' => 99 * 100,
                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'success_url' => $this->generateUrl('payment_success', [], UrlGeneratorInterface::ABSOLUTE_URL),
                'cancel_url' => $this->generateUrl('payment_error', [], UrlGeneratorInterface::ABSOLUTE_URL),
            ]);
    
            $this->session->set('status', 'payer');
            
            return new JsonResponse(['id' => $session->id]);
        
        
       
    }

    /**
     * @Route("/success", name="payment_success")
     */
    public function success(Request $request)
    {
       //MailerService $mailerService,MessageService $messageService
       $companyIdentity = new CompanyIdentity();
       $companyIdentity = $this->session->get('company');
       $payment = new Payment();
       $payment->setStatus("payer");
       $payment->setAmount("99.00");
       $payment->setDateAt(new Datetime());
       $payment->setNamecompany($companyIdentity->getName());
       
       $manager = $this->getDoctrine()->getManager();
       
       $manager->persist($payment);
       $manager->flush();
        // if ($this->session->get('status') == "payer") {
        //     $this->session->set('status', "Not-payer");
        //     $companyIdentity = new CompanyIdentity();
        //     $companyIdentity = $this->session->get('company');
        //     $payment = new Payment();
        //     $payment->setStatus("payer");
        //     $payment->setAmount("99.00");
        //     $payment->setDateAt(new Datetime());
        //     $payment->setCompany($companyIdentity);
        //     $manager = $this->getDoctrine()->getManager();
            
        //     $manager->persist($payment);
        //     $manager->flush();
        //     // $mailerService->send(
        //     //     "Numero de commande",
        //     //     "contact@makeupbouquet.fr",
        //     //     $this->getUser()->getEmail(),
        //     //     'payment/_email.html.twig',
        //     //     [
        //     //         "firstname" =>$this->command->getFirstname(),
        //     //         "lastname" => $this->command->getLastname(),
        //     //         "code" => $this->command->getCommandNumber()
        //     //     ]
        //     // );
          
            
        //     // $messageService->addSuccess("Message bien envoyé");

        //     // $this->session->set('command_payment', null);

        //     return $this->render('payment/success.html.twig', [
        //         'payer' => 'payer'
        //     ]);
        // } 
          
        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/error", name="payment_error")
     */
    public function error()
    {
       

        if ($this->status =="payer") {

            return $this->render('payment/error.html.twig');
        }
        
        return $this->redirectToRoute('home');
    }

  
}
