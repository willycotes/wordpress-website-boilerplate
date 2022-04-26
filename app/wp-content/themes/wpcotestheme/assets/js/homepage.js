/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************!*\
  !*** ./js/homepage.js ***!
  \************************/
/**
 * homepage.js
 *
 * Handles behaviour of the homepage featured image
 */
(function () {
  /**
   * Set hero content dimensions / layout
   * Run adaptive backgrounds and set colors
   */
  // eslint-disable-next-line @wordpress/no-global-event-listener
  document.addEventListener('DOMContentLoaded', function () {
    var homepageContent = document.querySelector('.page-template-template-homepage .type-page.has-post-thumbnail');

    if (!homepageContent) {
      // Only apply layout to the homepage content component if it exists on the page
      return;
    }

    var entries = homepageContent.querySelectorAll('.entry-title, .entry-content');

    for (var i = 0; i < entries.length; i++) {
      entries[i].classList.add('loaded');
    }

    var siteMain = document.querySelector('.site-main');
    var htmlDirValue = document.documentElement.getAttribute('dir');

    var updateDimensions = function updateDimensions() {
      if (updateDimensions._tick) {
        window.cancelAnimationFrame(updateDimensions._tick);
      }

      updateDimensions._tick = window.requestAnimationFrame(function () {
        updateDimensions._tick = null; // Make the homepage content full width and centrally aligned.
        // eslint-disable-next-line @wordpress/no-global-event-listener

        homepageContent.style.width = window.innerWidth + 'px';

        if (htmlDirValue !== 'rtl') {
          homepageContent.style.marginLeft = -siteMain.getBoundingClientRect().left + 'px';
        } else {
          homepageContent.style.marginRight = -siteMain.getBoundingClientRect().left + 'px';
        }
      });
    }; // On window resize, set hero content dimensions / layout.
    // eslint-disable-next-line @wordpress/no-global-event-listener


    window.addEventListener('resize', updateDimensions);
    updateDimensions();
  });
})();
/******/ })()
;
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoianMvaG9tZXBhZ2UuanMiLCJtYXBwaW5ncyI6Ijs7Ozs7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsQ0FBRSxZQUFZO0FBQ2I7QUFDRDtBQUNBO0FBQ0E7QUFDQztBQUNBQSxFQUFBQSxRQUFRLENBQUNDLGdCQUFULENBQTJCLGtCQUEzQixFQUErQyxZQUFZO0FBQzFELFFBQU1DLGVBQWUsR0FBR0YsUUFBUSxDQUFDRyxhQUFULENBQ3ZCLGdFQUR1QixDQUF4Qjs7QUFJQSxRQUFLLENBQUVELGVBQVAsRUFBeUI7QUFDeEI7QUFDQTtBQUNBOztBQUVELFFBQU1FLE9BQU8sR0FBR0YsZUFBZSxDQUFDRyxnQkFBaEIsQ0FDZiw4QkFEZSxDQUFoQjs7QUFHQSxTQUFNLElBQUlDLENBQUMsR0FBRyxDQUFkLEVBQWlCQSxDQUFDLEdBQUdGLE9BQU8sQ0FBQ0csTUFBN0IsRUFBcUNELENBQUMsRUFBdEMsRUFBMkM7QUFDMUNGLE1BQUFBLE9BQU8sQ0FBRUUsQ0FBRixDQUFQLENBQWFFLFNBQWIsQ0FBdUJDLEdBQXZCLENBQTRCLFFBQTVCO0FBQ0E7O0FBRUQsUUFBTUMsUUFBUSxHQUFHVixRQUFRLENBQUNHLGFBQVQsQ0FBd0IsWUFBeEIsQ0FBakI7QUFDQSxRQUFNUSxZQUFZLEdBQUdYLFFBQVEsQ0FBQ1ksZUFBVCxDQUF5QkMsWUFBekIsQ0FBdUMsS0FBdkMsQ0FBckI7O0FBRUEsUUFBTUMsZ0JBQWdCLEdBQUcsU0FBbkJBLGdCQUFtQixHQUFZO0FBQ3BDLFVBQUtBLGdCQUFnQixDQUFDQyxLQUF0QixFQUE4QjtBQUM3QkMsUUFBQUEsTUFBTSxDQUFDQyxvQkFBUCxDQUE2QkgsZ0JBQWdCLENBQUNDLEtBQTlDO0FBQ0E7O0FBRURELE1BQUFBLGdCQUFnQixDQUFDQyxLQUFqQixHQUF5QkMsTUFBTSxDQUFDRSxxQkFBUCxDQUE4QixZQUFZO0FBQ2xFSixRQUFBQSxnQkFBZ0IsQ0FBQ0MsS0FBakIsR0FBeUIsSUFBekIsQ0FEa0UsQ0FHbEU7QUFDQTs7QUFDQWIsUUFBQUEsZUFBZSxDQUFDaUIsS0FBaEIsQ0FBc0JDLEtBQXRCLEdBQThCSixNQUFNLENBQUNLLFVBQVAsR0FBb0IsSUFBbEQ7O0FBRUEsWUFBS1YsWUFBWSxLQUFLLEtBQXRCLEVBQThCO0FBQzdCVCxVQUFBQSxlQUFlLENBQUNpQixLQUFoQixDQUFzQkcsVUFBdEIsR0FDQyxDQUFDWixRQUFRLENBQUNhLHFCQUFULEdBQWlDQyxJQUFsQyxHQUF5QyxJQUQxQztBQUVBLFNBSEQsTUFHTztBQUNOdEIsVUFBQUEsZUFBZSxDQUFDaUIsS0FBaEIsQ0FBc0JNLFdBQXRCLEdBQ0MsQ0FBQ2YsUUFBUSxDQUFDYSxxQkFBVCxHQUFpQ0MsSUFBbEMsR0FBeUMsSUFEMUM7QUFFQTtBQUNELE9BZHdCLENBQXpCO0FBZUEsS0FwQkQsQ0FwQjBELENBMEMxRDtBQUNBOzs7QUFDQVIsSUFBQUEsTUFBTSxDQUFDZixnQkFBUCxDQUF5QixRQUF6QixFQUFtQ2EsZ0JBQW5DO0FBQ0FBLElBQUFBLGdCQUFnQjtBQUNoQixHQTlDRDtBQStDQSxDQXJERCxJIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vanMvaG9tZXBhZ2UuanMiXSwic291cmNlc0NvbnRlbnQiOlsiLyoqXHJcbiAqIGhvbWVwYWdlLmpzXHJcbiAqXHJcbiAqIEhhbmRsZXMgYmVoYXZpb3VyIG9mIHRoZSBob21lcGFnZSBmZWF0dXJlZCBpbWFnZVxyXG4gKi9cclxuKCBmdW5jdGlvbiAoKSB7XHJcblx0LyoqXHJcblx0ICogU2V0IGhlcm8gY29udGVudCBkaW1lbnNpb25zIC8gbGF5b3V0XHJcblx0ICogUnVuIGFkYXB0aXZlIGJhY2tncm91bmRzIGFuZCBzZXQgY29sb3JzXHJcblx0ICovXHJcblx0Ly8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIEB3b3JkcHJlc3Mvbm8tZ2xvYmFsLWV2ZW50LWxpc3RlbmVyXHJcblx0ZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lciggJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbiAoKSB7XHJcblx0XHRjb25zdCBob21lcGFnZUNvbnRlbnQgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKFxyXG5cdFx0XHQnLnBhZ2UtdGVtcGxhdGUtdGVtcGxhdGUtaG9tZXBhZ2UgLnR5cGUtcGFnZS5oYXMtcG9zdC10aHVtYm5haWwnXHJcblx0XHQpO1xyXG5cclxuXHRcdGlmICggISBob21lcGFnZUNvbnRlbnQgKSB7XHJcblx0XHRcdC8vIE9ubHkgYXBwbHkgbGF5b3V0IHRvIHRoZSBob21lcGFnZSBjb250ZW50IGNvbXBvbmVudCBpZiBpdCBleGlzdHMgb24gdGhlIHBhZ2VcclxuXHRcdFx0cmV0dXJuO1xyXG5cdFx0fVxyXG5cclxuXHRcdGNvbnN0IGVudHJpZXMgPSBob21lcGFnZUNvbnRlbnQucXVlcnlTZWxlY3RvckFsbChcclxuXHRcdFx0Jy5lbnRyeS10aXRsZSwgLmVudHJ5LWNvbnRlbnQnXHJcblx0XHQpO1xyXG5cdFx0Zm9yICggbGV0IGkgPSAwOyBpIDwgZW50cmllcy5sZW5ndGg7IGkrKyApIHtcclxuXHRcdFx0ZW50cmllc1sgaSBdLmNsYXNzTGlzdC5hZGQoICdsb2FkZWQnICk7XHJcblx0XHR9XHJcblxyXG5cdFx0Y29uc3Qgc2l0ZU1haW4gPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCAnLnNpdGUtbWFpbicgKTtcclxuXHRcdGNvbnN0IGh0bWxEaXJWYWx1ZSA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5nZXRBdHRyaWJ1dGUoICdkaXInICk7XHJcblxyXG5cdFx0Y29uc3QgdXBkYXRlRGltZW5zaW9ucyA9IGZ1bmN0aW9uICgpIHtcclxuXHRcdFx0aWYgKCB1cGRhdGVEaW1lbnNpb25zLl90aWNrICkge1xyXG5cdFx0XHRcdHdpbmRvdy5jYW5jZWxBbmltYXRpb25GcmFtZSggdXBkYXRlRGltZW5zaW9ucy5fdGljayApO1xyXG5cdFx0XHR9XHJcblxyXG5cdFx0XHR1cGRhdGVEaW1lbnNpb25zLl90aWNrID0gd2luZG93LnJlcXVlc3RBbmltYXRpb25GcmFtZSggZnVuY3Rpb24gKCkge1xyXG5cdFx0XHRcdHVwZGF0ZURpbWVuc2lvbnMuX3RpY2sgPSBudWxsO1xyXG5cclxuXHRcdFx0XHQvLyBNYWtlIHRoZSBob21lcGFnZSBjb250ZW50IGZ1bGwgd2lkdGggYW5kIGNlbnRyYWxseSBhbGlnbmVkLlxyXG5cdFx0XHRcdC8vIGVzbGludC1kaXNhYmxlLW5leHQtbGluZSBAd29yZHByZXNzL25vLWdsb2JhbC1ldmVudC1saXN0ZW5lclxyXG5cdFx0XHRcdGhvbWVwYWdlQ29udGVudC5zdHlsZS53aWR0aCA9IHdpbmRvdy5pbm5lcldpZHRoICsgJ3B4JztcclxuXHJcblx0XHRcdFx0aWYgKCBodG1sRGlyVmFsdWUgIT09ICdydGwnICkge1xyXG5cdFx0XHRcdFx0aG9tZXBhZ2VDb250ZW50LnN0eWxlLm1hcmdpbkxlZnQgPVxyXG5cdFx0XHRcdFx0XHQtc2l0ZU1haW4uZ2V0Qm91bmRpbmdDbGllbnRSZWN0KCkubGVmdCArICdweCc7XHJcblx0XHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRcdGhvbWVwYWdlQ29udGVudC5zdHlsZS5tYXJnaW5SaWdodCA9XHJcblx0XHRcdFx0XHRcdC1zaXRlTWFpbi5nZXRCb3VuZGluZ0NsaWVudFJlY3QoKS5sZWZ0ICsgJ3B4JztcclxuXHRcdFx0XHR9XHJcblx0XHRcdH0gKTtcclxuXHRcdH07XHJcblxyXG5cdFx0Ly8gT24gd2luZG93IHJlc2l6ZSwgc2V0IGhlcm8gY29udGVudCBkaW1lbnNpb25zIC8gbGF5b3V0LlxyXG5cdFx0Ly8gZXNsaW50LWRpc2FibGUtbmV4dC1saW5lIEB3b3JkcHJlc3Mvbm8tZ2xvYmFsLWV2ZW50LWxpc3RlbmVyXHJcblx0XHR3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lciggJ3Jlc2l6ZScsIHVwZGF0ZURpbWVuc2lvbnMgKTtcclxuXHRcdHVwZGF0ZURpbWVuc2lvbnMoKTtcclxuXHR9ICk7XHJcbn0gKSgpO1xyXG4iXSwibmFtZXMiOlsiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwiaG9tZXBhZ2VDb250ZW50IiwicXVlcnlTZWxlY3RvciIsImVudHJpZXMiLCJxdWVyeVNlbGVjdG9yQWxsIiwiaSIsImxlbmd0aCIsImNsYXNzTGlzdCIsImFkZCIsInNpdGVNYWluIiwiaHRtbERpclZhbHVlIiwiZG9jdW1lbnRFbGVtZW50IiwiZ2V0QXR0cmlidXRlIiwidXBkYXRlRGltZW5zaW9ucyIsIl90aWNrIiwid2luZG93IiwiY2FuY2VsQW5pbWF0aW9uRnJhbWUiLCJyZXF1ZXN0QW5pbWF0aW9uRnJhbWUiLCJzdHlsZSIsIndpZHRoIiwiaW5uZXJXaWR0aCIsIm1hcmdpbkxlZnQiLCJnZXRCb3VuZGluZ0NsaWVudFJlY3QiLCJsZWZ0IiwibWFyZ2luUmlnaHQiXSwic291cmNlUm9vdCI6IiJ9