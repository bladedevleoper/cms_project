<?php

interface ShapeInterface
{
    public function draw();
    public function colour();
}

class Circle implements ShapeInterface
{
    public function draw(){}
    public function colour(){}
}

class Square implements ShapeInterface
{
    public function draw(){}
    public function colour(){}
}

class Line implements ShapeInterface
{
    public function draw(){}
    public function colour(){}
}

class Painter
{
    public function addShape(ShapeInterface $shape)
    {
        return $shape->draw();
    }
    
}

$shape = new Square();
$artist = new Painter();
$artist->addShape($shape);
