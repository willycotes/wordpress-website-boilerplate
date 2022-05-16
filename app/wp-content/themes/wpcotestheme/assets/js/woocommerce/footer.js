/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**********************************!*\
  !*** ./js/woocommerce/footer.js ***!
  \**********************************/
/**
 * footer.js
 *
 * Adds a class required to reveal the search in the handheld footer bar.
 * Also hides the handheld footer bar when an input is focused.
 */
(function () {
  // Wait for DOM to be ready.
  // eslint-disable-next-line @wordpress/no-global-event-listener
  document.addEventListener('DOMContentLoaded', function () {
    if (document.getElementsByClassName('wpcotestheme-handheld-footer-bar').length === 0) {
      return;
    } // Add class to footer search when clicked.


    [].forEach.call(document.querySelectorAll('.wpcotestheme-handheld-footer-bar .search > a'), function (anchor) {
      anchor.addEventListener('click', function (event) {
        anchor.parentElement.classList.toggle('active');
        event.preventDefault();
      });
    }); // Add focus class to body when an input field is focused.
    // This is used to hide the Handheld Footer Bar when an input is focused.

    var footerBar = document.getElementsByClassName('wpcotestheme-handheld-footer-bar');
    var forms = document.forms;

    var isFocused = function isFocused(focused) {
      return function (event) {
        if (!!focused && event.target.tabIndex !== -1) {
          document.body.classList.add('sf-input-focused');
        } else {
          document.body.classList.remove('sf-input-focused');
        }
      };
    };

    if (footerBar.length && forms.length) {
      for (var i = 0; i < forms.length; i++) {
        if (footerBar[0].contains(forms[i])) {
          continue;
        }

        forms[i].addEventListener('focus', isFocused(true), true);
        forms[i].addEventListener('blur', isFocused(false), true);
      }
    }
  });
})();
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvd29vY29tbWVyY2UvZm9vdGVyLmpzIiwibWFwcGluZ3MiOiI7Ozs7O0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBQyxZQUFZO0FBQ1g7QUFDQTtBQUNBQSxFQUFBQSxRQUFRLENBQUNDLGdCQUFULENBQTBCLGtCQUExQixFQUE4QyxZQUFZO0FBQ3hELFFBQ0VELFFBQVEsQ0FBQ0Usc0JBQVQsQ0FBZ0MsbUNBQWhDLEVBQ0dDLE1BREgsS0FDYyxDQUZoQixFQUdFO0FBQ0E7QUFDRCxLQU51RCxDQVF4RDs7O0FBQ0EsT0FBR0MsT0FBSCxDQUFXQyxJQUFYLENBQ0VMLFFBQVEsQ0FBQ00sZ0JBQVQsQ0FDRSxnREFERixDQURGLEVBSUUsVUFBVUMsTUFBVixFQUFrQjtBQUNoQkEsTUFBQUEsTUFBTSxDQUFDTixnQkFBUCxDQUF3QixPQUF4QixFQUFpQyxVQUFVTyxLQUFWLEVBQWlCO0FBQ2hERCxRQUFBQSxNQUFNLENBQUNFLGFBQVAsQ0FBcUJDLFNBQXJCLENBQStCQyxNQUEvQixDQUFzQyxRQUF0QztBQUNBSCxRQUFBQSxLQUFLLENBQUNJLGNBQU47QUFDRCxPQUhEO0FBSUQsS0FUSCxFQVR3RCxDQXFCeEQ7QUFDQTs7QUFDQSxRQUFNQyxTQUFTLEdBQUdiLFFBQVEsQ0FBQ0Usc0JBQVQsQ0FDaEIsbUNBRGdCLENBQWxCO0FBR0EsUUFBTVksS0FBSyxHQUFHZCxRQUFRLENBQUNjLEtBQXZCOztBQUNBLFFBQU1DLFNBQVMsR0FBRyxTQUFaQSxTQUFZLENBQVVDLE9BQVYsRUFBbUI7QUFDbkMsYUFBTyxVQUFVUixLQUFWLEVBQWlCO0FBQ3RCLFlBQUksQ0FBQyxDQUFDUSxPQUFGLElBQWFSLEtBQUssQ0FBQ1MsTUFBTixDQUFhQyxRQUFiLEtBQTBCLENBQUMsQ0FBNUMsRUFBK0M7QUFDN0NsQixVQUFBQSxRQUFRLENBQUNtQixJQUFULENBQWNULFNBQWQsQ0FBd0JVLEdBQXhCLENBQTRCLGtCQUE1QjtBQUNELFNBRkQsTUFFTztBQUNMcEIsVUFBQUEsUUFBUSxDQUFDbUIsSUFBVCxDQUFjVCxTQUFkLENBQXdCVyxNQUF4QixDQUErQixrQkFBL0I7QUFDRDtBQUNGLE9BTkQ7QUFPRCxLQVJEOztBQVVBLFFBQUlSLFNBQVMsQ0FBQ1YsTUFBVixJQUFvQlcsS0FBSyxDQUFDWCxNQUE5QixFQUFzQztBQUNwQyxXQUFLLElBQUltQixDQUFDLEdBQUcsQ0FBYixFQUFnQkEsQ0FBQyxHQUFHUixLQUFLLENBQUNYLE1BQTFCLEVBQWtDbUIsQ0FBQyxFQUFuQyxFQUF1QztBQUNyQyxZQUFJVCxTQUFTLENBQUMsQ0FBRCxDQUFULENBQWFVLFFBQWIsQ0FBc0JULEtBQUssQ0FBQ1EsQ0FBRCxDQUEzQixDQUFKLEVBQXFDO0FBQ25DO0FBQ0Q7O0FBRURSLFFBQUFBLEtBQUssQ0FBQ1EsQ0FBRCxDQUFMLENBQVNyQixnQkFBVCxDQUEwQixPQUExQixFQUFtQ2MsU0FBUyxDQUFDLElBQUQsQ0FBNUMsRUFBb0QsSUFBcEQ7QUFDQUQsUUFBQUEsS0FBSyxDQUFDUSxDQUFELENBQUwsQ0FBU3JCLGdCQUFULENBQTBCLE1BQTFCLEVBQWtDYyxTQUFTLENBQUMsS0FBRCxDQUEzQyxFQUFvRCxJQUFwRDtBQUNEO0FBQ0Y7QUFDRixHQS9DRDtBQWdERCxDQW5ERCxJIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vanMvd29vY29tbWVyY2UvZm9vdGVyLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIi8qKlxyXG4gKiBmb290ZXIuanNcclxuICpcclxuICogQWRkcyBhIGNsYXNzIHJlcXVpcmVkIHRvIHJldmVhbCB0aGUgc2VhcmNoIGluIHRoZSBoYW5kaGVsZCBmb290ZXIgYmFyLlxyXG4gKiBBbHNvIGhpZGVzIHRoZSBoYW5kaGVsZCBmb290ZXIgYmFyIHdoZW4gYW4gaW5wdXQgaXMgZm9jdXNlZC5cclxuICovXHJcbihmdW5jdGlvbiAoKSB7XHJcbiAgLy8gV2FpdCBmb3IgRE9NIHRvIGJlIHJlYWR5LlxyXG4gIC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBAd29yZHByZXNzL25vLWdsb2JhbC1ldmVudC1saXN0ZW5lclxyXG4gIGRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICBpZiAoXHJcbiAgICAgIGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoJ3dpbGx5ZGV2dGhlbWUtaGFuZGhlbGQtZm9vdGVyLWJhcicpXHJcbiAgICAgICAgLmxlbmd0aCA9PT0gMFxyXG4gICAgKSB7XHJcbiAgICAgIHJldHVybjtcclxuICAgIH1cclxuXHJcbiAgICAvLyBBZGQgY2xhc3MgdG8gZm9vdGVyIHNlYXJjaCB3aGVuIGNsaWNrZWQuXHJcbiAgICBbXS5mb3JFYWNoLmNhbGwoXHJcbiAgICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXHJcbiAgICAgICAgJy53aWxseWRldnRoZW1lLWhhbmRoZWxkLWZvb3Rlci1iYXIgLnNlYXJjaCA+IGEnLFxyXG4gICAgICApLFxyXG4gICAgICBmdW5jdGlvbiAoYW5jaG9yKSB7XHJcbiAgICAgICAgYW5jaG9yLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgICBhbmNob3IucGFyZW50RWxlbWVudC5jbGFzc0xpc3QudG9nZ2xlKCdhY3RpdmUnKTtcclxuICAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgfSk7XHJcbiAgICAgIH0sXHJcbiAgICApO1xyXG5cclxuICAgIC8vIEFkZCBmb2N1cyBjbGFzcyB0byBib2R5IHdoZW4gYW4gaW5wdXQgZmllbGQgaXMgZm9jdXNlZC5cclxuICAgIC8vIFRoaXMgaXMgdXNlZCB0byBoaWRlIHRoZSBIYW5kaGVsZCBGb290ZXIgQmFyIHdoZW4gYW4gaW5wdXQgaXMgZm9jdXNlZC5cclxuICAgIGNvbnN0IGZvb3RlckJhciA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlDbGFzc05hbWUoXHJcbiAgICAgICd3aWxseWRldnRoZW1lLWhhbmRoZWxkLWZvb3Rlci1iYXInLFxyXG4gICAgKTtcclxuICAgIGNvbnN0IGZvcm1zID0gZG9jdW1lbnQuZm9ybXM7XHJcbiAgICBjb25zdCBpc0ZvY3VzZWQgPSBmdW5jdGlvbiAoZm9jdXNlZCkge1xyXG4gICAgICByZXR1cm4gZnVuY3Rpb24gKGV2ZW50KSB7XHJcbiAgICAgICAgaWYgKCEhZm9jdXNlZCAmJiBldmVudC50YXJnZXQudGFiSW5kZXggIT09IC0xKSB7XHJcbiAgICAgICAgICBkb2N1bWVudC5ib2R5LmNsYXNzTGlzdC5hZGQoJ3NmLWlucHV0LWZvY3VzZWQnKTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QucmVtb3ZlKCdzZi1pbnB1dC1mb2N1c2VkJyk7XHJcbiAgICAgICAgfVxyXG4gICAgICB9O1xyXG4gICAgfTtcclxuXHJcbiAgICBpZiAoZm9vdGVyQmFyLmxlbmd0aCAmJiBmb3Jtcy5sZW5ndGgpIHtcclxuICAgICAgZm9yIChsZXQgaSA9IDA7IGkgPCBmb3Jtcy5sZW5ndGg7IGkrKykge1xyXG4gICAgICAgIGlmIChmb290ZXJCYXJbMF0uY29udGFpbnMoZm9ybXNbaV0pKSB7XHJcbiAgICAgICAgICBjb250aW51ZTtcclxuICAgICAgICB9XHJcblxyXG4gICAgICAgIGZvcm1zW2ldLmFkZEV2ZW50TGlzdGVuZXIoJ2ZvY3VzJywgaXNGb2N1c2VkKHRydWUpLCB0cnVlKTtcclxuICAgICAgICBmb3Jtc1tpXS5hZGRFdmVudExpc3RlbmVyKCdibHVyJywgaXNGb2N1c2VkKGZhbHNlKSwgdHJ1ZSk7XHJcbiAgICAgIH1cclxuICAgIH1cclxuICB9KTtcclxufSkoKTtcclxuIl0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImdldEVsZW1lbnRzQnlDbGFzc05hbWUiLCJsZW5ndGgiLCJmb3JFYWNoIiwiY2FsbCIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJhbmNob3IiLCJldmVudCIsInBhcmVudEVsZW1lbnQiLCJjbGFzc0xpc3QiLCJ0b2dnbGUiLCJwcmV2ZW50RGVmYXVsdCIsImZvb3RlckJhciIsImZvcm1zIiwiaXNGb2N1c2VkIiwiZm9jdXNlZCIsInRhcmdldCIsInRhYkluZGV4IiwiYm9keSIsImFkZCIsInJlbW92ZSIsImkiLCJjb250YWlucyJdLCJzb3VyY2VSb290IjoiIn0=