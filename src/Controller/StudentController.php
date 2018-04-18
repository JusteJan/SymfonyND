<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class StudentController extends Controller
{
    const STUDENT_DATA = 'data.json';

    /**
     * @Route("/people")
     */
    public function inputAction()
    {
        return $this->render('input/index.html.twig');
    }

    /**
     * @Route("/validation/{key}", name="validation")
     * @Method({"POST"})
     */
    public function validationAction(Request $request, $key)
    {
        try {
            $data = json_decode($request->getContent(), true)['input'];
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid Method'], Response::HTTP_BAD_REQUEST);
        }

        $validationData = $this->getData();

        switch ($key) {
            case 'name':
            case 'team':
                return new JsonResponse(['valid' => in_array(strtolower($data), $validationData[$key])]);
        }

        return new JsonResponse(['error' => 'Invalid method'], Response::HTTP_BAD_REQUEST);
    }

    private function getData()
    {
        $dataJson = file_get_contents(self::STUDENT_DATA);
        $data = json_decode($dataJson, true);
        $teams = [];
        $students = [];
        foreach ($data as $teamName => $teamData) {
            $teams[] = strtolower($teamName);
            foreach($teamData['members'] as $student) {
                $students[] = strtolower($student);
            }
        }

        return [
            'team' => $teams,
            'name' => $students
        ];
    }
}