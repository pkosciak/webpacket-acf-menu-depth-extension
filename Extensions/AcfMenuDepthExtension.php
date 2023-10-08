<?php

declare(strict_types=1);

namespace App\Extensions;
use App\Core\Abstracts\BaseExtension;

/**
 * Class AcfMenuDepthExtension
 * This extension enables you to set the depth of the menu field in ACF.
 * This is useful when you want to display some fields only on the first
 * level of the menu and other fields on the second level of the menu.
 */
class AcfMenuDepthExtension extends BaseExtension
{
    public string $version = '1.0.0';

    public array $dependencies = [
        'plugins' => [
            'Advanced Custom Fields Pro' => 'advanced-custom-fields-pro/acf.php',
        ],
    ];

    /**
     * How many levels of menu items do you want to support?
     * Starts from 0, so 1 means 2 levels of menu items.
     */
    private int $levels = 1;

    public function init(): void
    {
        add_filter('acf/location/rule_types', [$this, 'locationRulesTypes']);
        add_filter('acf/location/rule_values/menu_depth', [$this, 'locationRuleValues']);
        add_filter('acf/location/rule_match/menu_depth', [$this, 'locationRuleMatch'], 10, 4);
    }

    public function locationRulesTypes($choices): array
    {
        $choices['Menu']['menu_depth'] = 'Menu depth';

        return $choices;
    }

    /**
     * Feel free to add more levels here if needed.
     */
    public function locationRuleValues($choices): array
    {
        return range(0,$this->levels);
    }

    public function locationRuleMatch($match, $rule, $options, $field_group): bool
    {
        if ($rule['operator'] == "==") {
            $match = ($options['nav_menu_item_depth'] == $rule['value']);
        }

        return $match;
    }
}