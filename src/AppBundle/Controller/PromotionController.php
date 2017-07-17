<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Service\PromotionService;
use AppBundle\Serializer\CustomSerializer;
use Psr\Log\LoggerInterface;
use AppBundle\Exception\ServiceException;
use Symfony\Component\HttpFoundation\Response;

class PromotionController extends Controller{
    
    private $logger;
    
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    
    /**
     * @Route("/promotion/all", name="getAllOpen")
     * @Method({"GET"})
     */
    public function getAllOpenPromotions(Request $request){
        $promotions = $this->container->get('ruilen.promotion_service')->getAllActivePromotions();
        $this->logger->debug("Found ". sizeof($promotions) . " promotions");
        return CustomSerializer::writeJson($promotions);
    }
    
    /**
     * @Route("/promotion/{id}", name="getPromotion")
     * @Method({"GET"})
     */
    public function getPromotion($id){
        $promotion = $this->container->get('ruilen.promotion_service')->getPromotionDetails($id);
        return CustomSerializer::writeJson($promotion);
    }
    
    
    /**
     * @Route("/promotion/", name="setPromotion")
     * @Method({"POST"})
     */
    public function setPromotion(Request $request){
        try{
            $promotion = CustomSerializer::toObject($request->getContent(),'AppBundle\Entity\Promotion');
            $promotion = $this->container->get('ruilen.promotion_service')->setPromotionDetails($promotion);
            return CustomSerializer::writeJson($promotion);
        }catch(ServiceException $e){
            $this->logger->error("Could not write promotion to database: ". $e->getMessage());
            return new Response("Could not write promotion to database: ". $e->getMessage(), Response::HTTP_BAD_REQUEST);
        }
    }
    
    
}
?>
