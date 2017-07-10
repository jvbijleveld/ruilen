<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Service\PromotionService;
use AppBundle\Serializer\ResponseWriter;
use Psr\Log\LoggerInterface;

class PromotionController extends Controller{
    
    private $logger;
    
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    
    /**
     * @Route("/promotion/all", name="getAllOpen")
     */
    public function getAllOpenPromotions(Request $request){
        $promotions = $this->container->get('ruilen.promotion_service')->getAllActivePromotions();
        $this->logger->debug("Found ". sizeof($promotions) . " promotions");
        return ResponseWriter::writeJson($promotions);
    }
    
    /**
     * @Route("/promotion/{id}", name="getPromotion")
     */
    public function getPromotion($id){
        $promotion = $this->container->get('ruilen.promotion_service')->getPromotionDetails($id);
        return ResponseWriter::writeJson($promotion);
    }
    
}
?>
