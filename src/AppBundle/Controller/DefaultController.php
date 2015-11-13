<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Figures\FigureFactory;

class DefaultController extends Controller
{
    /**
     * @Route("/draw_images", name="draw_images")
     * @Method("POST")
     */
    public function drawImagesAction(Request $request)
    {
        $figures = $request->request->get('form');

        $figureFactory = new FigureFactory();
        $svg_figures = [];
        foreach ($figures as $figure) {
            /** @var \AppBundle\Figures\FigureInterface $figure_class */
            $figure_class = $figureFactory->getFigure($figure['type']); // square|circle|triangle
            $svg_figures[] = $figure_class->drawFigure($figure['params']);
        }

        return $this->render('default/draw.html.twig', array(
            'svg_figures' => $svg_figures,
        ));

        print_r($figures); die();
    }

    /**
     * @Route("/", name="homepage")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $figure_types = [
            'circle',
            'square',
            'triangle',
        ];

        $line_types = [
          'thin', 'thick', 'dotted',
        ];

        $line_colors = [
            'red', 'blue', 'green',
        ];

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
            'figure_types' => $figure_types,
            'line_types' => $line_types,
            'line_colors' => $line_colors,
        ));
    }

}
