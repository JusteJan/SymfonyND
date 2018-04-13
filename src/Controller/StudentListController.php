<?php

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class StudentListController extends Controller
{

    const STUDENT_DATA = 'data.json';

    /**
     * @Route("/students", name="student_list")
     */
    public function listStudentsAction()
    {
        $dataJson = file_get_contents(self::STUDENT_DATA);
        $data = json_decode($dataJson, true);

        return $this->render('students/studentlist.html.twig', [
            'studentList' => $data
        ]);
    }
}