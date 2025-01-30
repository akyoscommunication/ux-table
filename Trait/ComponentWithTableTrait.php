<?php

namespace Akyos\UXTable\Trait;

use Akyos\UXPagination\Trait\ComponentWithPaginationTrait;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveArg;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

trait ComponentWithTableTrait
{
    use ComponentWithPaginationTrait;

    #[ExposeInTemplate(name: 'table', getter: 'getTable')]
    private ?string $table = null;

    public ?string $trTemplate = null;

    public ?string $tableTemplate = '@UXTable/table/table.html.twig';

    public function getTable(): false|string
    {;
        return $this->render($this->tableTemplate, array_merge([
            'elements' => $this->getElements(),
            'trTemplate' => $this->trTemplate,
            'tHeader' => $this->getTHeader(),
            'paginate' => $this->paginate,
            'sort' => $this->sort,
            'sortDirection' => $this->sortDirection,
        ], $this->getTrTemplateVars()))->getContent();
    }

    protected function getTrTemplateVars(): array
    {
        return [];
    }

    abstract protected function getTHeader(): iterable;
    #[LiveAction]
    public function sortColumn(#[LiveArg] string $sort, #[LiveArg] string $direction): void
    {
        $this->sort = $sort;
        $this->sortDirection = $direction;
    }
}
