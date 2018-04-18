<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class StudentController extends Controller
{
    /**
     * @Route("/validation/{key}", name="validation")
     * @Method("POST")
     */
    public function validationAction(Request $request, $key)
    {
        $data = json_decode($request, true)['input'];
    }
}