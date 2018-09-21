<?php

namespace App\Nova;

use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use Fourstacks\NovaRepeatableFields\Repeater;
use App\Smartpower as SmartpowerModel;


class Smartpower extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = SmartpowerModel::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Name'),
            Number::make('Pin Number'),
            Boolean::make('Pin Status'),
            Repeater::make('Conditions')->addField([
                'label'=> 'Power On At',
                'name'=>'power_on',
                'type'=>'text',
            ])->addField([
                'label'=>'Power Off At',
                'name'=>'power_off',
                'type'=>'text',
            ])->addField([
                'label'=>'Active',
                'name'=>'active',
                'type'=>'text'
            ])->summaryLabel('Conditions')->addButtonText('Add Conditions')->displayStackedForm(),
            DateTime::make('Updated At')->exceptOnForms(),
        ];
    }

    public static function label()
    {
        return "Smart Power";
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
