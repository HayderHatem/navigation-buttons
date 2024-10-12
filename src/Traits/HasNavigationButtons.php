<?php

namespace Hayder\NavigationButtons\Traits;

use Filament\Notifications\Notification;

trait HasNavigationButtons
{
    protected function getOrderColumn(): string
    {
        return config('navigation-buttons.order_column', 'id');
    }

    protected function getOrderDirection(): string
    {
        return config('navigation-buttons.order_direction', 'asc');
    }

    protected function getPreviousRecord()
    {
        $orderColumn = $this->getOrderColumn();
        $currentValue = $this->record->{$orderColumn};

        return $this->getResource()::getModel()::where($orderColumn, '<', $currentValue)
            ->orderBy($orderColumn, 'desc')
            ->first();
    }

    protected function getNextRecord()
    {
        $orderColumn = $this->getOrderColumn();
        $currentValue = $this->record->{$orderColumn};

        return $this->getResource()::getModel()::where($orderColumn, '>', $currentValue)
            ->orderBy($orderColumn, 'asc')
            ->first();
    }

    public function goToPreviousRecord()
    {
        $previous = $this->getPreviousRecord();

        if ($previous) {
            return redirect()->to($this->getResource()::getUrl('edit', ['record' => $previous]));
        }

        // Notify if no previous record is found
        Notification::make()
            ->title('No previous record found')
            ->danger()
            ->body('You are already at the first record.')
            ->send();
    }

    public function goToNextRecord()
    {
        $next = $this->getNextRecord();

        if ($next) {
            return redirect()->to($this->getResource()::getUrl('edit', ['record' => $next]));
        }

        // Notify if no next record is found
        Notification::make()
            ->title('No next record found')
            ->danger()
            ->body('You are already at the last record.')
            ->send();
    }
}
