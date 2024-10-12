<?php

namespace Hayder\NavigationButtons\Actions;

use Filament\Actions\Action;

class GoToPreviousRecordAction extends Action
{
    public static function make($name = 'previous'): static
    {
        return parent::make($name)
            ->label('')
            ->action('goToPreviousRecord')
            ->icon('heroicon-o-arrow-left')
            ->color('primary');
    }
}
