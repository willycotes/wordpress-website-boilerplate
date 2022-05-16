/*global wpcotestheme_sticky_add_to_cart_params */
(function () {
  // eslint-disable-next-line @wordpress/no-global-event-listener
  document.addEventListener('DOMContentLoaded', function () {
    const stickyAddToCart = document.getElementsByClassName(
      'wpcotestheme-sticky-add-to-cart',
    );

    if (!stickyAddToCart.length) {
      return;
    }

    // eslint-disable-next-line camelcase
    if (typeof wpcotestheme_sticky_add_to_cart_params === 'undefined') {
      return;
    }

    const trigger = document.getElementsByClassName(
      wpcotestheme_sticky_add_to_cart_params.trigger_class,
    );

    if (trigger.length > 0) {
      const stickyAddToCartToggle = function () {
        if (
          trigger[0].getBoundingClientRect().top + trigger[0].scrollHeight <
          0
        ) {
          stickyAddToCart[0].classList.add(
            'wpcotestheme-sticky-add-to-cart--slideInDown',
          );
          stickyAddToCart[0].classList.remove(
            'wpcotestheme-sticky-add-to-cart--slideOutUp',
          );
        } else if (
          stickyAddToCart[0].classList.contains(
            'wpcotestheme-sticky-add-to-cart--slideInDown',
          )
        ) {
          stickyAddToCart[0].classList.add(
            'wpcotestheme-sticky-add-to-cart--slideOutUp',
          );
          stickyAddToCart[0].classList.remove(
            'wpcotestheme-sticky-add-to-cart--slideInDown',
          );
        }
      };

      stickyAddToCartToggle();

      // eslint-disable-next-line @wordpress/no-global-event-listener
      window.addEventListener('scroll', function () {
        stickyAddToCartToggle();
      });

      // Get product id
      let productId = null;

      document.body.classList.forEach(function (item) {
        if (item.substring(0, 7) === 'postid-') {
          productId = item.replace(/[^0-9]/g, '');
        }
      });

      if (productId) {
        const product = document.getElementById('product-' + productId);

        if (product) {
          if (
            !product.classList.contains('product-type-simple') &&
            !product.classList.contains('product-type-external')
          ) {
            const selectOptions = document.getElementsByClassName(
              'wpcotestheme-sticky-add-to-cart__content-button',
            );

            selectOptions[0].addEventListener('click', function (event) {
              event.preventDefault();
              document.getElementById('product-' + productId).scrollIntoView();
            });
          }
        }
      }
    }
  });
})();
