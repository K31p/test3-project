<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension2Extension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            //new TwigFilter('tuitionCalc', [$this, 'doSomething']),
        ];
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('tuitionCalc', [$this, 'doSomething']),
        ];
    }

    public function doSomething($tuition, $country)
    {
        $koersUSD = 1.1806;
        $koersFRK = 6.55957;
        $koersCHA = 7.9277;
        $koersBIT = 0.8478;
        $koers = $koersFRK;

        if($country == '1'){
            $koers = $koersFRK;

        }elseif ($country == '2'){
            $koers = $koersUSD;

        }elseif ($country == '3'){
            $koers = $koersBIT;

        }elseif ($country == '4'){
            $koers = $koersCHA;

        }

        $newTuition= $tuition*$koers;

        return $newTuition;
    }
}
