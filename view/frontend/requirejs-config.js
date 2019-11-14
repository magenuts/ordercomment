var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/place-order': {
                'Magenuts_FrontOrderComment/js/place-order-with-comments-mixin': true
            }
        }
    },
	"map": {
    "*": {
      "Magento_Sales/email/order_new.html": 
          "Magenuts_FrontOrderComment/email/order_new.html"
    }
  }
};
