<?php
/**
 * Created by PhpStorm.
 * User: vit
 * Date: 11/13/15
 */
namespace AppBundle\Figures;

class FigureFactory
{
    /**
     * @var array
     */
    protected $figure_types;

    /**
     * Ограничимся 3мя типами фигур
     */
    public function __construct()
    {
        $this->figure_types = [
            'circle' => __NAMESPACE__.'\Circle',
            'square' => __NAMESPACE__.'\Square',
            'triangle' => __NAMESPACE__.'\Triangle',
        ];
    }

    public function getFigure($type)
    {
        if (!array_key_exists($type, $this->figure_types)) {
            throw new \Exception("Bad request, {$type} does not available", 401);
        }

        $class_name = $this->figure_types[$type];
        if (!class_exists($class_name)) {
            throw new \Exception("Class: {$class_name} is not implemented yet", 500);
        }

        // create new object and return
        return new $class_name;
    }

}