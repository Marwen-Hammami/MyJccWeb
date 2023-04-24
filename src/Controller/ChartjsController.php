<?php

namespace App\Controller;

use App\Repository\VoteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\MyJccWeb\Chartjs\Builder\ChartBuilderInterface;
use Symfony\MyJccWeb\Chartjs\Model\Chart;

class ChartjsController extends AbstractController
{
    #[Route('/chartjs', name: 'app_chartjs')]
    public function index(VoteRepository $voteRepository, ChartBuilderInterface $chartBuilderInterface): Response
    {
        $votes = $voteRepository->findAll();

        $labels = [];
        $data = [];
        foreach ($votes as $vote) {
            $labels[] = $vote->getDateVote()->format('d/m/Y');
            $data[] = $vote->getValeur();
        }

        $chart = $chartBuilderInterface->createChart(Chart::TYPE_LINE);
        $chart->setData([
            'labels' => $labels,
            'datasets' => [
                [
                    'label' => 'Votes/Jour',
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
