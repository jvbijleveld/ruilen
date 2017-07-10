<?php
namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Enum\PromotionStatusEnum;

class PromotionRepository extends EntityRepository {
    
    public function getAllActivePromotions(){
        $query =  $this->getEntityManager()->createQuery('SELECT p FROM AppBundle:Promotion p WHERE p.status = :status ORDER BY p.name ASC')->setParameter('status', PromotionStatusEnum::ACTIVE);
        return $query->getResult();
    }
    
    
}

?>
