<?php

namespace App\Patterns\Strategies;


abstract class _BaseStrategy
{
    protected IStrategy $strategy;

    abstract public function useStrategy(string $strategy): void;
    abstract public function execute($data);

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
    }
}


interface IStrategy
{
    public function doAlgorithm($data);
}
