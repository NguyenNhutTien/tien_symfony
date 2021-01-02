<?php

namespace App\Controller;

use App\Entity\LeapYear;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LeapYearController
{
    /**
     * @Route("is_leap_year/{year}", name="is_leap_year")
     * @param Request $request
     * @param $year
     * @return Response
     */
    public function index(Request $request, $year)
    {
        $leapYear = new LeapYear();
        if ($leapYear->isLeapYear($year)) {
            return new Response('Yep, this is a leap year!');
        }

        return new Response('Nope, this is not a leap year.');
    }


}
