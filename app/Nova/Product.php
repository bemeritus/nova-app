<?php

namespace App\Nova;

use App\Nova\Metrics\NewProducts;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    public static $showColumnBorders = true;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'name'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()
                ->sortable()
                ->textAlign('center'),

            Text::make('Name')
                ->required()
                ->sortable()
                ->showOnPreview()
                ->placeholder('Product nomi'),

            Markdown::make('Description')
                ->required()
                ->showOnPreview()
                ->placeholder('Product haqida'),

            Currency::make('Price')
                ->required()
                ->sortable()
                ->filterable()
                ->showOnPreview()
                ->textAlign('center')
                ->placeholder('Product narxi'),

            Number::make('Quantity')
                ->required()
                ->sortable()
                ->showOnPreview()
                ->textAlign('center')
                ->placeholder('Product miqdori'),

            BelongsTo::make('Brand')
                ->sortable()
                ->showOnPreview()
                ->textAlign('center')
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function cards(NovaRequest $request): array
    {
        return [
            new NewProducts()
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function filters(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function lenses(NovaRequest $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param NovaRequest $request
     * @return array
     */
    public function actions(NovaRequest $request): array
    {
        return [];
    }
}
