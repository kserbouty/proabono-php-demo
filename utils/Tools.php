<?php


class Tools {


    /**
     * Return a string with the current information of an usage
     *
     * @param $usage
     * @return string
     */
    public static function usageToString($usage) {


        ///////////// CONSUMPTION /////////////
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
        ///////////////////////////////////////


        ///////////// LIMITATION /////////////
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
        //////////////////////////////////////


        /////////////// ON OFF ///////////////
        if ($usage->typeFeature === 'OnOff') {

            return ($usage->is_enabled)
                ? '<em>Enabled</em>'
                : '<em>Disabled</em>';

        }
        //////////////////////////////////////


        return 'Unmanaged Usage type';
    }

}
