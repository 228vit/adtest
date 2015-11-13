<?php
/**
 * Created by PhpStorm.
 * User: vit
 * Date: 11/13/15
 */

namespace AppBundle\Figures;


class Triangle implements FigureInterface
{

    /**
     * Draw SVG triangle shape
     *
     * @param array $params
     * @return array
     */
    public function drawFigure($params)
    {
        $x = rand(10, 50);
        $x1 = $x + 10;
        $x2 = $x + 60;
        $x3 = $x + 35;

        $stroke = isset($params['line_color']) ? $params['line_color'] : '';
        $stroke_dasharray = 'none';
        switch ($params['line_type']) {
            case 'thin':
                $stroke_width = 2;
                break;
            case 'thick':
                $stroke_width = 5;
                break;
            case 'dotted':
                $stroke_width = 3;
                $stroke_dasharray = '5 5';
                break;
            default:
                $stroke_width = 3;

        }

        return "<polygon points='{$x1},2  {$x2},2  {$x3},52'
            style=\"stroke: {$stroke}; stroke-width: {$stroke_width}; stroke-dasharray: {$stroke_dasharray}; fill: none;\" />";
    }
}