<?php  
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;


#[Route('/blog', requirements:['_locale' => 'en|es|fr'], name:'blog_')]
class BlogController extends  AbstractController
{
    #[Route('/{_locale}', name:'index')]
    public function index(): Response
    {
        $response = new Response();

$response->setContent('<html><body><h1>Hello world!</h1></body></html>');
$response->setStatusCode(Response::HTTP_OK);
        echo 'invoked';
        return $response;
    }

#[Route('/{_locale}/posts/{slug}', name:'show')]
    public function show(): Response
    {
        $result = new Response();
        return $result->setContent('<html><body><p>Test</p></body></html>');
    }
    
}