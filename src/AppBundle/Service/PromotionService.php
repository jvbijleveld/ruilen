<?php
namespace AppBundle\Service;

use Psr\Log\LoggerInterface;

interface PromotionService{
    
    public function __construct($em, LoggerInterface $logger);
    
    public function getAllActivePromotions();
    
    public function getPromotionDetails(int $promoId);
    
    public function setPromotionDetails($promotion);
    
}
