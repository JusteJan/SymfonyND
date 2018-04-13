<?php


namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{

    /**
     * @Route("/studentinfo", name="student_info")
     */
    public function getStudentInfo(Request $request)
    {
        $source = $request->get('utm_source');
        $campaign = $request->get('utm_campaign');
        $term = $request->get('utm_term');
        $content = $request->get('utm_content');

        return $this->render('students/studentinfo.html.twig', [
            'student' => $term,
            'project' => $content,
            'mentor' => $campaign
        ]);
    }
}