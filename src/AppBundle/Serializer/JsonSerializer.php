<?php

namespace AppBundle\Serializer;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class JsonSerializer {
	
	private $encoders;
	private $normalizers;
	private $serializer;
	
	public function __construct(){
		$this->encoders = array(new XmlEncoder(), new JsonEncoder());
		$this->normalizers = array(new ObjectNormalizer());
		$this->serializer = new Serializer($this->normalizers, $this->encoders);
	}
	
	public function serialize($object){
		return $this->serializer->serialize($object, 'json');
	}
	
	public function deserialize($data, $object){
	    return $this->serializer->deserialize($data, $object, 'json');
	}

}

?>