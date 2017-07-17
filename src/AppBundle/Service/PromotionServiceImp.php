<?php
namespace AppBundle\Service;

use Psr\Log\LoggerInterface;
use AppBundle\Entity\Promotion;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use AppBundle\Exception\InvalidEntityException;
use AppBundle\Exception\ServiceException;
use AppBundle\Enum\PromotionStatusEnum;
use Doctrine\DBAL\Exception\DriverException;


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
        try{
            $record = $this->validatePromotion($promotion);
            $record->setName($promotion->getName());
            $record->setStatus($promotion->getStatus());
        
            $this->em->flush();
        
            return $record;
        }catch(InvalidEntityException $e){
            throw new ServiceException("Could not save promotion to the database ". $e);
        }   
   }
    
   private function validatePromotion($promotion){
       if(!$promotion->getName()){
           throw new InvalidEntityException('Wrong name value found in promotion '. $promotion);
       }
       
       try{
           new PromotionStatusEnum($promotion->getStatus());
       }catch(UnexpectedValueException $u){
           throw new InvalidEntityException('Wrong status value found in promotion '. $promotion);
       }
       
       if($promotion->getId()){
            $record = $this->getPromotionDetails($promotion->getId());
            if(!$record){
                throw new InvalidEntityException('Promotion record not found '. $promotion);
            }else{
                return $record;
            }
       }else{
           return new Promotion();
       }
   }
   
    private function mockActivePromotions(){
        $promotion = new Promotion();
        $promotion->setId(1);
        $promotion->setName('foo promotion');
        
        return array($promotion);
    }

}

?>