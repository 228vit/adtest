<?php
/**
 * Created by PhpStorm.
 * User: vit
 * Date: 11/13/15
 */

namespace AppBundle\Figures;


interface FigureInterface
{
    /**
     * Draw concrete figure
     *
     * @param array $params
     * @return mixed
     */
    public function drawFigure($params);
}