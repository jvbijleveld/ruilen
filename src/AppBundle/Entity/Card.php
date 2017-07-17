<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="card")
 */
class Card {
    
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="promotion", inversedBy="cards", cascade={"persist"})
     */
    private $promotion;
    
    /**
     * @ORM\Column(type="integer")
     */
    private $index;
    
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $groupName;
    
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;
    
    
    public function getId():int{
        return $this->id;
    }
    
    public function getIndex():int{
        return $this->index;
    }
    
    public function setIndex(int $index){
        $this->index = $index;
    }
    
    public function getGroup():string {
        return $this->groupName;
    }
    
    public function setGroup(String $group){
        $this->groupName = $group;
    }
    
    public function getName():string {
        return $this->name;
    }
    
    public function setName(string $name){
        $this->name = $name;
    }
    
    public function __toString(){
        return '[card][id]'.$this->id.'[/id][index]'.$this->index.'[/index][group]'.$this->groupName.'[/group][name]'.$this->name.'[/name][/card]';
    }
    
}