<?php

namespace Hayder\NavigationButtons\Actions;

use Filament\Actions\Action;

class GoToNextRecordAction extends Action
{
    public static function make($name = 'next'): static
    {
        return parent::make($name)
            ->label('')
            ->action('goToNextRecord')
            ->icon('heroicon-o-arrow-right')
            ->color('primary');
    }
}
