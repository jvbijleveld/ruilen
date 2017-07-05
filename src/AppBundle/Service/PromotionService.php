<?php
namespace src\AppBundle\Service;

interface PromotionService{
    
    public function getAllActivePromotions();
    
    public function getPromotionDetails(int $promoId);
    
    public function setPromotionDetails($promotion);
    
}
