/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */

define([
    'Magento_Ui/js/grid/paging/sizes'
], function (Sizes) {
    'use strict';

    return Sizes.extend({
        defaults: {
            options: {
                '500': {
                    value: 500,
                    label: 500
                },
                '1000': {
                    value: 1000,
                    label: 1000
                }
            }
        }
    });
});
