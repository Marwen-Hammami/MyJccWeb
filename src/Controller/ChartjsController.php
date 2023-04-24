<?php

namespace App\Controller;

use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;

class ChartjsController extends AbstractController
{
    #[Route('/chartjs2', name: 'app_chartjs')]
    public function index(VoteRepository $voteRepository, ChartBuilderInterface $chartBuilder): Response
    {
        // Get the number of votes by day
    $votesByDay = $voteRepository->getVotesByDay();

    // Format the data for the chart
    $labels = array_keys($votesByDay);
    $data = array_values($votesByDay);

    // Create the chart
    $chart = $chartBuilder->createChart(Chart::TYPE_LINE);
    $chart->setData([
        'labels' => $labels,
        'datasets' => [
            [
                'label' => 'Number of Votes per Day',
                'backgroundColor' => 'rgb(255, 99, 132)',
                'borderColor' => 'rgb(255, 99, 132)',
                'data' => $data,
            ],
        ],
    ]);
    
    $chart->setOptions([/* ... */]);

    return $this->render('chartjs/index.html.twig', [
        'controller_name' => 'ChartjsController',
        'chart' => $chart,
    ]);

}
}
