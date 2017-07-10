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
     * @ORM\OneToMany(targetEntity="Card", mappedBy="promotion", cascade={"persist"})
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
    
    public function setId(int $i){
       return $this->id = $i;
    }
    
    public function getId():int {
        return $this->id;
    }
    
    public function setName(string $name){
        return $this->name = $name;
    }
    
    public function getName():string {
        return $this->name;    
    }
    
    public function getCards() {
        return $this->cards;
    }
    
}
?>