<?php

namespace App\Controller;

use App\Adapter\JsonAdapter;
use App\Builder\ParserBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends Controller
{
    /**
     * @Route("/main/parser", name="main_parser", methods={"POST"})
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function getJsonAction(Request $request)
    {
        $parser = $this->get(JsonAdapter::class)->create($request->getContent());
        if (!$parser) {
            return new JsonResponse(['error' => 'Not valid request']);
        }
        $this->get(ParserBuilder::class)->build($parser);

        return new JsonResponse([
            'text' => $parser->getText(),
        ]);
    }
}