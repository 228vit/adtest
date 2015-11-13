<?php
/**
 * Created by PhpStorm.
 * User: vit
 * Date: 11/13/15
 */

namespace AppBundle\Figures;


class Square implements FigureInterface
{

    /**
     * Draw SVG square shape
     *
     * @param array $params
     * @return array
     */
    public function drawFigure($params)
    {
        $size = rand(20, 50);
        $x = rand(20, 50);
        $y = rand(20, 50);
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

        return "<rect x=\"{$x}\" y=\"{$y}\" height=\"{$size}\" width=\"{$size}\"
            style=\"stroke: {$stroke}; stroke-width: {$stroke_width}; stroke-dasharray: {$stroke_dasharray}; fill: none;\" />";
    }
}