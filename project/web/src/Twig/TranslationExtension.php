<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class TranslationExtension extends AbstractExtension
{
    private $translator;

    public function __construct($translator)
    {
        $this->translator = $translator; // Injectez ici votre service de traduction
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('trans', [$this, 'translate']),
        ];
    }

    public function translate(string $key): string
    {
        // Utilisez ici votre logique de traduction
        return $this->translator->translate($key);
    }
}