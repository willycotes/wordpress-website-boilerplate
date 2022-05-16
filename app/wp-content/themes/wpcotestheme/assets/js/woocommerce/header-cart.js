/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./js/woocommerce/header-cart.js ***!
  \***************************************/
/**
 * Makes the header cart content scrollable if the height of the dropdown exceeds the window height.
 * Mouseover is used as items can be added to the cart via ajax and we'll need to recheck.
 */
(function () {
  if (document.body.classList.contains('woocommerce-cart') || document.body.classList.contains('woocommerce-checkout') || window.innerWidth < 768 || !document.getElementById('site-header-cart')) {
    return;
  } // eslint-disable-next-line @wordpress/no-global-event-listener


  window.addEventListener('load', function () {
    var cart = document.querySelector('.site-header-cart');
    cart.addEventListener('mouseover', function () {
      var windowHeight = window.outerHeight,
          cartBottomPos = this.querySelector('.widget_shopping_cart_content').getBoundingClientRect().bottom + this.offsetHeight,
          cartList = this.querySelector('.cart_list');

      if (cartBottomPos > windowHeight) {
        cartList.style.maxHeight = '15em';
        cartList.style.overflowY = 'auto';
      }
    });
  });
})();
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvd29vY29tbWVyY2UvaGVhZGVyLWNhcnQuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUUsWUFBWTtBQUNiLE1BQ0NBLFFBQVEsQ0FBQ0MsSUFBVCxDQUFjQyxTQUFkLENBQXdCQyxRQUF4QixDQUFrQyxrQkFBbEMsS0FDQUgsUUFBUSxDQUFDQyxJQUFULENBQWNDLFNBQWQsQ0FBd0JDLFFBQXhCLENBQWtDLHNCQUFsQyxDQURBLElBRUFDLE1BQU0sQ0FBQ0MsVUFBUCxHQUFvQixHQUZwQixJQUdBLENBQUVMLFFBQVEsQ0FBQ00sY0FBVCxDQUF5QixrQkFBekIsQ0FKSCxFQUtFO0FBQ0Q7QUFDQSxHQVJZLENBVWI7OztBQUNBRixFQUFBQSxNQUFNLENBQUNHLGdCQUFQLENBQXlCLE1BQXpCLEVBQWlDLFlBQVk7QUFDNUMsUUFBTUMsSUFBSSxHQUFHUixRQUFRLENBQUNTLGFBQVQsQ0FBd0IsbUJBQXhCLENBQWI7QUFFQUQsSUFBQUEsSUFBSSxDQUFDRCxnQkFBTCxDQUF1QixXQUF2QixFQUFvQyxZQUFZO0FBQy9DLFVBQU1HLFlBQVksR0FBR04sTUFBTSxDQUFDTyxXQUE1QjtBQUFBLFVBQ0NDLGFBQWEsR0FDWixLQUFLSCxhQUFMLENBQ0MsK0JBREQsRUFFRUkscUJBRkYsR0FFMEJDLE1BRjFCLEdBRW1DLEtBQUtDLFlBSjFDO0FBQUEsVUFLQ0MsUUFBUSxHQUFHLEtBQUtQLGFBQUwsQ0FBb0IsWUFBcEIsQ0FMWjs7QUFPQSxVQUFLRyxhQUFhLEdBQUdGLFlBQXJCLEVBQW9DO0FBQ25DTSxRQUFBQSxRQUFRLENBQUNDLEtBQVQsQ0FBZUMsU0FBZixHQUEyQixNQUEzQjtBQUNBRixRQUFBQSxRQUFRLENBQUNDLEtBQVQsQ0FBZUUsU0FBZixHQUEyQixNQUEzQjtBQUNBO0FBQ0QsS0FaRDtBQWFBLEdBaEJEO0FBaUJBLENBNUJELEkiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9qcy93b29jb21tZXJjZS9oZWFkZXItY2FydC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIvKipcclxuICogTWFrZXMgdGhlIGhlYWRlciBjYXJ0IGNvbnRlbnQgc2Nyb2xsYWJsZSBpZiB0aGUgaGVpZ2h0IG9mIHRoZSBkcm9wZG93biBleGNlZWRzIHRoZSB3aW5kb3cgaGVpZ2h0LlxyXG4gKiBNb3VzZW92ZXIgaXMgdXNlZCBhcyBpdGVtcyBjYW4gYmUgYWRkZWQgdG8gdGhlIGNhcnQgdmlhIGFqYXggYW5kIHdlJ2xsIG5lZWQgdG8gcmVjaGVjay5cclxuICovXHJcbiggZnVuY3Rpb24gKCkge1xyXG5cdGlmIChcclxuXHRcdGRvY3VtZW50LmJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCAnd29vY29tbWVyY2UtY2FydCcgKSB8fFxyXG5cdFx0ZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuY29udGFpbnMoICd3b29jb21tZXJjZS1jaGVja291dCcgKSB8fFxyXG5cdFx0d2luZG93LmlubmVyV2lkdGggPCA3NjggfHxcclxuXHRcdCEgZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoICdzaXRlLWhlYWRlci1jYXJ0JyApXHJcblx0KSB7XHJcblx0XHRyZXR1cm47XHJcblx0fVxyXG5cclxuXHQvLyBlc2xpbnQtZGlzYWJsZS1uZXh0LWxpbmUgQHdvcmRwcmVzcy9uby1nbG9iYWwtZXZlbnQtbGlzdGVuZXJcclxuXHR3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lciggJ2xvYWQnLCBmdW5jdGlvbiAoKSB7XHJcblx0XHRjb25zdCBjYXJ0ID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvciggJy5zaXRlLWhlYWRlci1jYXJ0JyApO1xyXG5cclxuXHRcdGNhcnQuYWRkRXZlbnRMaXN0ZW5lciggJ21vdXNlb3ZlcicsIGZ1bmN0aW9uICgpIHtcclxuXHRcdFx0Y29uc3Qgd2luZG93SGVpZ2h0ID0gd2luZG93Lm91dGVySGVpZ2h0LFxyXG5cdFx0XHRcdGNhcnRCb3R0b21Qb3MgPVxyXG5cdFx0XHRcdFx0dGhpcy5xdWVyeVNlbGVjdG9yKFxyXG5cdFx0XHRcdFx0XHQnLndpZGdldF9zaG9wcGluZ19jYXJ0X2NvbnRlbnQnXHJcblx0XHRcdFx0XHQpLmdldEJvdW5kaW5nQ2xpZW50UmVjdCgpLmJvdHRvbSArIHRoaXMub2Zmc2V0SGVpZ2h0LFxyXG5cdFx0XHRcdGNhcnRMaXN0ID0gdGhpcy5xdWVyeVNlbGVjdG9yKCAnLmNhcnRfbGlzdCcgKTtcclxuXHJcblx0XHRcdGlmICggY2FydEJvdHRvbVBvcyA+IHdpbmRvd0hlaWdodCApIHtcclxuXHRcdFx0XHRjYXJ0TGlzdC5zdHlsZS5tYXhIZWlnaHQgPSAnMTVlbSc7XHJcblx0XHRcdFx0Y2FydExpc3Quc3R5bGUub3ZlcmZsb3dZID0gJ2F1dG8nO1xyXG5cdFx0XHR9XHJcblx0XHR9ICk7XHJcblx0fSApO1xyXG59ICkoKTtcclxuIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYm9keSIsImNsYXNzTGlzdCIsImNvbnRhaW5zIiwid2luZG93IiwiaW5uZXJXaWR0aCIsImdldEVsZW1lbnRCeUlkIiwiYWRkRXZlbnRMaXN0ZW5lciIsImNhcnQiLCJxdWVyeVNlbGVjdG9yIiwid2luZG93SGVpZ2h0Iiwib3V0ZXJIZWlnaHQiLCJjYXJ0Qm90dG9tUG9zIiwiZ2V0Qm91bmRpbmdDbGllbnRSZWN0IiwiYm90dG9tIiwib2Zmc2V0SGVpZ2h0IiwiY2FydExpc3QiLCJzdHlsZSIsIm1heEhlaWdodCIsIm92ZXJmbG93WSJdLCJzb3VyY2VSb290IjoiIn0=