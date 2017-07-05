<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PromotionRepository")
 * @ORM\Table(name="promotion")
 */
class Promotion {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="card", mappedBy="id", cascade={"persist"})
     */
    private $cards;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name; 
    
    /** 
     * @ORM\Column(type="string", length=1)
     */
    private $status;
    
    
    public function getId():int {
        return $this->id;
    }
    
    public function getCards() {
        return $this->cards;
    }
    
}