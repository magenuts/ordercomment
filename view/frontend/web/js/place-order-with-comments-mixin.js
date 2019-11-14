define([
    'jquery',
    'mage/utils/wrapper'
], function ($, wrapper) {
    'use strict';

    return function (placeOrderAction) {
        /** Override default place order action and add agreement_ids to request */
        return wrapper.wrap(placeOrderAction, function(originalAction, paymentData, redirectOnSuccess, messageContainer) {
			// adding order comments
			var orderCommentConfig = window.checkoutConfig.show_hide_custom_block;
			if(orderCommentConfig) // true
			{
				var order_comments=jQuery('[name="comment-code"]').val();
				paymentData.additional_data = {comments:order_comments};
			}
            return originalAction(paymentData, redirectOnSuccess, messageContainer);
        });
    };
});