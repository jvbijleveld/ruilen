<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Serializer\JsonSerializer;
use AppBundle\Service\PromotionService;

class PromotionController extends Controller{
    
    private $serializer;
    
    public function __construct(){
        $this->serializer = new JsonSerializer();
    }
    
    /**
     * @Route("/promotion/all", name="getAllOpen")
     */
    public function getAllOpenPromotions(Request $request){
        $promotionService = $this->container->get('ruilen.promotion_service');
        $promotions = $promotionService->getAllActivePromotions();
        
        $response = new Response($this->serializer->serialize($promotions));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
}
