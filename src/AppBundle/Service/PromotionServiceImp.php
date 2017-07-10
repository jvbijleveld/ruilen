<?php
namespace AppBundle\Service;

//use AppBundle\Repository\PromotionRepository;
use AppBundle\Entity\Promotion;

use Doctrine\ORM\EntityManager;

class PromotionServiceImp implements PromotionService {
    
    private $em;
    
    public function __construct($em){
        $this->em = $em;
    }
    
    public function getAllActivePromotions(){
        return $this->em->getRepository(Promotion::class)->getAllActivePromotions();
    }
    
    public function getPromotionDetails(int $promoId){
        
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
