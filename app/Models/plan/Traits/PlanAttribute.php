<?php

namespace App\Models\plan\Traits;

/**
 * Class PlanAttribute.
 */
trait PlanAttribute
{
    // Make your attributes functions here
    // Further, see the documentation : https://laravel.com/docs/5.4/eloquent-mutators#defining-an-accessor


    /**
     * Action Button Attribute to show in grid
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group action-btn">
                '.$this->getEditButtonAttribute("edit-plan", "admin.plans.edit").'
                '.$this->getDeleteButtonAttribute("delete-plan", "admin.plans.destroy").'
                </div>';
    }
}
