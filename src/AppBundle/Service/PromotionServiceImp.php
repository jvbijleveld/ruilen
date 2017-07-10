<?php
namespace AppBundle\Service;

use Psr\Log\LoggerInterface;
use AppBundle\Entity\Promotion;

use Doctrine\ORM\EntityManager;

class PromotionServiceImp implements PromotionService {
    
    private $em;
    private $logger;
    private $promotionRepository;
    
    public function __construct($em, LoggerInterface $logger){
        $this->em = $em;
        $this->logger = $logger;
        $this->promotionRepository = $em->getRepository(Promotion::class);
    }
    
    public function getAllActivePromotions(){
        $this->logger->debug("Retreiving all active promotions");
        return $this->promotionRepository->getAllActivePromotions();
    }
    
    public function getPromotionDetails(int $promoId){
        return $this->promotionRepository->findOneById($promoId);
    }
    
    public function setPromotionDetails($promotion){
        
    }
    
    private function mockActivePromotions(){
        $promotion = new Promotion();
        $promotion->setId(1);
        $promotion->setName('foo promotion');
        
        return array($promotion);
    }

}

?>