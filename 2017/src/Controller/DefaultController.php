<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function index(): Response
    {
        return $this->render('index.html.twig');
    }

    public function day(int $number): Response
    {
        $formatter = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);

        $serviceReference = sprintf('day_%s', str_replace('-', '_', $formatter->format($number)));

        if (!$this->has($serviceReference)) {
            throw new \InvalidArgumentException(sprintf('No service found for reference "%s"', $serviceReference));
        }

        /** @var \App\Day\DayInterface $dayService */
        $dayService = $this->get($serviceReference);

        return $this->render('day.html.twig', [
            'day' => ucfirst($formatter->format($number)),
            'questions' => sprintf('http://adventofcode.com/2017/day/%d', $number),
            'input' => sprintf('/input/%s.txt', str_replace('-', '', $formatter->format($number))),
            'answerOne' => $dayService->partOne(),
            'answerTwo' => $dayService->partTwo()
        ]);
    }
}
