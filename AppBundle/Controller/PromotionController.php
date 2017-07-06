<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Serializer\JsonSerializer;


class PromotionController extends AbstractController{
    
    private $promotionService;
    
    public function __construct(PromotionService $service){
        $this->promotionService = $service;      
    }
 
    /**
     * @Route("/promotion/all", name="getAllOpen")
     */
    public function getAllOpenPromotions(Request $request){
        return JsonSerializer::serialize($service->getAllActivePromotions());
    }
    
}
