<?php
namespace AppBundle\Service;

interface PromotionService{
    
    public function __construct($em);
    
    public function getAllActivePromotions();
    
    public function getPromotionDetails(int $promoId);
    
    public function setPromotionDetails($promotion);
    
}
