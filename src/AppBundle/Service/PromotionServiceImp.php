<?php
namespace AppBundle\Service;

use AppBundle\Repository\PromotionRepository;
use AppBundle\Entity\Promotion;

class PromotionServiceImp implements PromotionService {
    
    private $promotionRepository;
    
    public function __construct(){
     //   $this->promotionRepository = new PromotionRepository();
    }
    
    public function getAllActivePromotions(){
        //return $this->promotionRepository->getAllActivePromotions();
        return $this->mockActivePromotions();
    }
 
    private function mockActivePromotions(){
        $promotion = new Promotion();
        $promotion->setId(1);
        $promotion->setName('foo promotion');
    
        return array($promotion);    
    }
    
    public function getPromotionDetails(int $promoId){
        
    }
    
    public function setPromotionDetails($promotion){
        
    }

}
