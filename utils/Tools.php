<?php


class Tools {


    /**
     * @param $usage
     * @return string
     */
    public static function usageToString($usage) {


        if ($usage->typeFeature === 'Consumption') {

            // Set current quantity.
            $current = (is_null($usage->quantityCurrent))
                ? '<em>Unlimited</em>'
                : $usage->quantityCurrent;

            // If feature is unlimited.
            if ($usage->quantityIncluded == null) {
                return $current;
            }

            return $current . ' / ' . $usage->quantityIncluded;
        }

        if ($usage->typeFeature === 'Limitation') {

            // Set current quantity.
            $current = (is_null($usage->quantityCurrent))
                ? '<em>Unlimited</em>'
                : $usage->quantityCurrent;

            // If feature is unlimited.
            if ($usage->quantityIncluded == null) {
                return $current;
            }

            return $current . ' / ' . $usage->quantityIncluded;

        }

        if ($usage->typeFeature === 'OnOff') {

            return ($usage->is_enabled)
                ? '<em>Enabled</em>'
                : '<em>Disabled</em>';

        }
        return 'Unmanaged Usage type';
    }

}
