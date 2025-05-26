<?php

namespace App\Services;

use MoonShine\Contracts\ColorManager\ColorManagerContract;

class ThemeApplier
{
    /**
     * Create a new class instance.
     */
    public function __construct(private ColorManagerContract $colorManager) {}

    public function theme1(): void
    {
        $this->colorManager->background('#17202a')
            ->content('#1c2833')
            ->tableRow('#212f3c')
            ->borders('#34495e')
            ->buttons('#34495e')
            ->dividers('#5d6d7e')
            ->primary('#ca6f1e')
            ->secondary('#f5b041')
            ->successBg('#117a65')
            ->successText('#82e0aa')
            ->warningBg('#b7950b')
            ->warningText('#f7dc6f')
            ->errorBg('#7b241c')
            ->errorText('#f5b7b1')
            ->infoBg('#21618c')
            ->infoText('#85c1e9');

        $this->colorManager->successBg('#1e8449')
            ->successBg('#117a65', dark: true)
            ->successText('#82e0aa', dark: true)
            ->warningBg('#b7950b', dark: true)
            ->warningText('#f7dc6f', dark: true)
            ->errorBg('#a93226', dark: true)
            ->errorText('#f5b7b1', dark: true)
            ->infoBg('#21618c', dark: true)
            ->infoText('#85c1e9', dark: true);
    }

    public function theme2(): void
    {
        $this->colorManager->background('#121212')
            ->content('#1a1a1a')
            ->tableRow('#333333')
            ->borders('#4f4f4f')
            ->buttons('#5d6d7e')
            ->dividers('#7f8c8d')
            ->primary('#2980b9')
            ->secondary('#16a085')
            ->successBg('#1abc9c')
            ->successText('#a3e4d7')
            ->warningBg('#f39c12')
            ->warningText('#fad7a0')
            ->errorBg('#c0392b')
            ->errorText('#f1948a')
            ->infoBg('#34495e')
            ->infoText('#d6eaf8');

        $this->colorManager->successBg('#239b56', dark: true)
            ->successText('#7dcea0', dark: true)
            ->warningBg('#d68910', dark: true)
            ->warningText('#f9e79f', dark: true)
            ->errorBg('#a93226', dark: true)
            ->errorText('#f5b7b1', dark: true)
            ->infoBg('#1c2833', dark: true)
            ->infoText('#85c1e9', dark: true);
    }
}
