<?php
namespace AppBundle\Serializer;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Serializer\JsonSerializer;


class CustomSerializer {
    
    private $logger;
    
    public function __construct(LoggerInterface $logger){
        $this->logger = $logger;
    }
    
    public static final function writeJson($resp){
        $serializer = new JsonSerializer();
        $response = new Response($serializer->serialize($resp));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    public static function toObject($data, $object){
        $serializer = new JsonSerializer();
        return $serializer->deserialize($data, $object);
    }
    
}

?>