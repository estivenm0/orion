<?php

namespace App\Traits;

use MoonShine\Support\Enums\PageType;

trait Properties
{
    protected function title(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    protected function async(bool $isAsync): static
    {
        $this->isAsync = $isAsync;

        return $this;
    }

    protected function column(string $column): static
    {
        $this->column = $column;

        return $this;
    }

    protected function columnSelection(bool $columnSelection): static
    {
        $this->columnSelection = $columnSelection;

        return $this;
    }

    protected function with(array $with): static
    {
        $this->with = $with;

        return $this;
    }

    protected function createInModal(bool $createInModal): static
    {
        $this->createInModal = $createInModal;

        return $this;
    }

    protected function editInModal(bool $editInModal): static
    {
        $this->editInModal = $editInModal;

        return $this;
    }

    protected function detailInModal(bool $detailInModal): static
    {
        $this->detailInModal = $detailInModal;

        return $this;
    }

    protected function allInModal(): static
    {
        return $this->createInModal(true)
            ->editInModal(true)
            ->detailInModal(true);
    }

    protected function sortColumn(string $sortColumn): static
    {
        $this->sortColumn = $sortColumn;

        return $this;
    }

    protected function itemsPerPage(int $itemsPerPage): static
    {
        $this->itemsPerPage = $itemsPerPage;

        return $this;
    }

    protected function stickyTable(bool $stickyTable): static
    {
        $this->stickyTable = $stickyTable;

        return $this;
    }

    protected function errorsAbove(bool $errorsAbove): static
    {
        $this->errorsAbove = $errorsAbove;

        return $this;
    }

    protected function precognitive(bool $precognitive): static
    {
        $this->isPrecognitive = $precognitive;

        return $this;
    }

    protected function redirectAfterSave(PageType $redirectAfterSave): static
    {
        $this->redirectAfterSave = $redirectAfterSave;

        return $this;
    }
}
