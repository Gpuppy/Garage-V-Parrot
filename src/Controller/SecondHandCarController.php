<?php

namespace App\Controller;


//use Aws\CacheInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Form\SearchForm;
use App\Model\SearchData;
use App\Repository\SecondHandCarRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;




class SecondHandCarController extends AbstractController
{
    public function __construct(private readonly EntitymanagerInterface $entityManager, private readonly CacheInterface $cache)
    {

    }


    #[Route('/SecondHandCar', name: 'app_second_hand_car'/*, methods: ['GET']*/)]
    public function index(SecondHandCarRepository $secondHandCarRepository, Request $request) : Response
    {
        $data = new SearchData();
        $data->page = $request->get('page', 1);
        $form = $this->createForm(SearchForm::class, $data);
        $form->handleRequest($request);

        //[$min, $max] = $secondHandCarRepository->findMinMax($data);
        $searchParams = [
            'page' => $data->page,
            'query' => $data->query ?? '',
            'min' => $data->min ?? '',
            'max' => $data->max ?? '',
        ];
        $cacheKey = 'second_hand_cars_' . md5(json_encode($searchParams));
        $minMaxKey = 'second_hand_car_minmax_' . md5(json_encode($searchParams));

        $secondHandCars = $this->cache->get($cacheKey, function (ItemInterface $item) use ($secondHandCarRepository, $data) {
            $item->expiresAfter(3600);
            return $secondHandCarRepository->findSearch($data);
        });

        [$min, $max] = $this->cache->get($minMaxKey, function (ItemInterface $item) use ($secondHandCarRepository, $data) {
            $item->expiresAfter(3600);
            return $secondHandCarRepository->findSearch($data);
        });



        //$secondHandCars = $secondHandCarRepository->findSearch($data);
        if($request->get('ajax')) {
            return new JsonResponse([
                'content' => $this->renderView('second_hand_car/_second_hand_cars.html.twig', ['SecondHandCars' => $secondHandCars]),
                'sorting' => $this->renderView('second_hand_car/_sorting.html.twig', ['SecondHandCars' => $secondHandCars]),
                'pagination' => $this->renderView('second_hand_car/_pagination.html.twig', ['SecondHandCars' => $secondHandCars])
            ]);
        }

        return $this->render('second_hand_car/index.html.twig', [
            'SecondHandCars' => $secondHandCars,
            'form' => $form->createView(),
             'min' => $min,
             'max' => $max,


        ]);
    }

}

