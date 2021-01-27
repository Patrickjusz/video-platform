/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./global */ \"./resources/js/global.js\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYXBwLmpzPzZkNDAiXSwibmFtZXMiOlsicmVxdWlyZSJdLCJtYXBwaW5ncyI6IkFBQUFBLG1CQUFPLENBQUMsMENBQUQsQ0FBUCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hcHAuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJyZXF1aXJlKCcuL2dsb2JhbCcpO1xyXG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/app.js\n");

/***/ }),

/***/ "./resources/js/global.js":
/*!********************************!*\
  !*** ./resources/js/global.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$sidebar = $(\"#sidebar\");\n$sidebarCollapse = $(\"#sidebarCollapse\");\n$mobileHeader = $(\"#mobile-header\");\nwindowWidth = $(window).width();\n$(function () {\n  $($sidebarCollapse).on(\"click\", function () {\n    if ($($sidebar).toggleClass(\"active\").hasClass(\"active\")) {\n      $($sidebarCollapse).addClass(\"rotate180\");\n      $($mobileHeader).fadeOut(250);\n    } else {\n      $($mobileHeader).fadeIn(250);\n      $($sidebarCollapse).removeClass(\"rotate180\");\n    }\n  });\n\n  if (typeof AOS !== \"undefined\") {\n    AOS.init();\n  }\n\n  $(window).on(\"load resize\", function () {\n    if ($(this).width() >= 768) {\n      $($mobileHeader).hide();\n      $($sidebar).addClass(\"active\");\n    } else {\n      $($mobileHeader).show();\n      $($sidebar).removeClass(\"active\");\n      $($sidebarCollapse).removeClass(\"rotate180\");\n    }\n  });\n});\n\nif (typeof videojs !== \"undefined\") {\n  videojs(\"main-video\", {\n    fluid: true,\n    controlBar: {\n      children: [\"playToggle\", \"volumeMenuButton\", \"durationDisplay\", \"timeDivider\", \"currentTimeDisplay\", \"progressControl\", \"remainingTimeDisplay\", \"fullscreenToggle\"]\n    }\n  });\n}//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZ2xvYmFsLmpzPzE2ZjgiXSwibmFtZXMiOlsiJHNpZGViYXIiLCIkIiwiJHNpZGViYXJDb2xsYXBzZSIsIiRtb2JpbGVIZWFkZXIiLCJ3aW5kb3dXaWR0aCIsIndpbmRvdyIsIndpZHRoIiwib24iLCJ0b2dnbGVDbGFzcyIsImhhc0NsYXNzIiwiYWRkQ2xhc3MiLCJmYWRlT3V0IiwiZmFkZUluIiwicmVtb3ZlQ2xhc3MiLCJBT1MiLCJpbml0IiwiaGlkZSIsInNob3ciLCJ2aWRlb2pzIiwiZmx1aWQiLCJjb250cm9sQmFyIiwiY2hpbGRyZW4iXSwibWFwcGluZ3MiOiJBQUFBQSxRQUFRLEdBQUdDLENBQUMsQ0FBQyxVQUFELENBQVo7QUFDQUMsZ0JBQWdCLEdBQUdELENBQUMsQ0FBQyxrQkFBRCxDQUFwQjtBQUNBRSxhQUFhLEdBQUdGLENBQUMsQ0FBQyxnQkFBRCxDQUFqQjtBQUNBRyxXQUFXLEdBQUdILENBQUMsQ0FBQ0ksTUFBRCxDQUFELENBQVVDLEtBQVYsRUFBZDtBQUVBTCxDQUFDLENBQUMsWUFBVztBQUNUQSxHQUFDLENBQUNDLGdCQUFELENBQUQsQ0FBb0JLLEVBQXBCLENBQXVCLE9BQXZCLEVBQWdDLFlBQVc7QUFDdkMsUUFDSU4sQ0FBQyxDQUFDRCxRQUFELENBQUQsQ0FDS1EsV0FETCxDQUNpQixRQURqQixFQUVLQyxRQUZMLENBRWMsUUFGZCxDQURKLEVBSUU7QUFDRVIsT0FBQyxDQUFDQyxnQkFBRCxDQUFELENBQW9CUSxRQUFwQixDQUE2QixXQUE3QjtBQUNBVCxPQUFDLENBQUNFLGFBQUQsQ0FBRCxDQUFpQlEsT0FBakIsQ0FBeUIsR0FBekI7QUFDSCxLQVBELE1BT087QUFDSFYsT0FBQyxDQUFDRSxhQUFELENBQUQsQ0FBaUJTLE1BQWpCLENBQXdCLEdBQXhCO0FBQ0FYLE9BQUMsQ0FBQ0MsZ0JBQUQsQ0FBRCxDQUFvQlcsV0FBcEIsQ0FBZ0MsV0FBaEM7QUFDSDtBQUNKLEdBWkQ7O0FBY0EsTUFBSSxPQUFPQyxHQUFQLEtBQWUsV0FBbkIsRUFBZ0M7QUFDNUJBLE9BQUcsQ0FBQ0MsSUFBSjtBQUNIOztBQUVEZCxHQUFDLENBQUNJLE1BQUQsQ0FBRCxDQUFVRSxFQUFWLENBQWEsYUFBYixFQUE0QixZQUFXO0FBQ25DLFFBQUlOLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUUssS0FBUixNQUFtQixHQUF2QixFQUE0QjtBQUN4QkwsT0FBQyxDQUFDRSxhQUFELENBQUQsQ0FBaUJhLElBQWpCO0FBQ0FmLE9BQUMsQ0FBQ0QsUUFBRCxDQUFELENBQVlVLFFBQVosQ0FBcUIsUUFBckI7QUFDSCxLQUhELE1BR087QUFDSFQsT0FBQyxDQUFDRSxhQUFELENBQUQsQ0FBaUJjLElBQWpCO0FBQ0FoQixPQUFDLENBQUNELFFBQUQsQ0FBRCxDQUFZYSxXQUFaLENBQXdCLFFBQXhCO0FBQ0FaLE9BQUMsQ0FBQ0MsZ0JBQUQsQ0FBRCxDQUFvQlcsV0FBcEIsQ0FBZ0MsV0FBaEM7QUFDSDtBQUNKLEdBVEQ7QUFVSCxDQTdCQSxDQUFEOztBQStCQSxJQUFJLE9BQU9LLE9BQVAsS0FBbUIsV0FBdkIsRUFBb0M7QUFDaENBLFNBQU8sQ0FBQyxZQUFELEVBQWU7QUFDbEJDLFNBQUssRUFBRSxJQURXO0FBRWxCQyxjQUFVLEVBQUU7QUFDUkMsY0FBUSxFQUFFLENBQ04sWUFETSxFQUVOLGtCQUZNLEVBR04saUJBSE0sRUFJTixhQUpNLEVBS04sb0JBTE0sRUFNTixpQkFOTSxFQU9OLHNCQVBNLEVBUU4sa0JBUk07QUFERjtBQUZNLEdBQWYsQ0FBUDtBQWVIIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2dsb2JhbC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiRzaWRlYmFyID0gJChcIiNzaWRlYmFyXCIpO1xyXG4kc2lkZWJhckNvbGxhcHNlID0gJChcIiNzaWRlYmFyQ29sbGFwc2VcIik7XHJcbiRtb2JpbGVIZWFkZXIgPSAkKFwiI21vYmlsZS1oZWFkZXJcIik7XHJcbndpbmRvd1dpZHRoID0gJCh3aW5kb3cpLndpZHRoKCk7XHJcblxyXG4kKGZ1bmN0aW9uKCkge1xyXG4gICAgJCgkc2lkZWJhckNvbGxhcHNlKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIGlmIChcclxuICAgICAgICAgICAgJCgkc2lkZWJhcilcclxuICAgICAgICAgICAgICAgIC50b2dnbGVDbGFzcyhcImFjdGl2ZVwiKVxyXG4gICAgICAgICAgICAgICAgLmhhc0NsYXNzKFwiYWN0aXZlXCIpXHJcbiAgICAgICAgKSB7XHJcbiAgICAgICAgICAgICQoJHNpZGViYXJDb2xsYXBzZSkuYWRkQ2xhc3MoXCJyb3RhdGUxODBcIik7XHJcbiAgICAgICAgICAgICQoJG1vYmlsZUhlYWRlcikuZmFkZU91dCgyNTApO1xyXG4gICAgICAgIH0gZWxzZSB7XHJcbiAgICAgICAgICAgICQoJG1vYmlsZUhlYWRlcikuZmFkZUluKDI1MCk7XHJcbiAgICAgICAgICAgICQoJHNpZGViYXJDb2xsYXBzZSkucmVtb3ZlQ2xhc3MoXCJyb3RhdGUxODBcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcblxyXG4gICAgaWYgKHR5cGVvZiBBT1MgIT09IFwidW5kZWZpbmVkXCIpIHtcclxuICAgICAgICBBT1MuaW5pdCgpO1xyXG4gICAgfVxyXG5cclxuICAgICQod2luZG93KS5vbihcImxvYWQgcmVzaXplXCIsIGZ1bmN0aW9uKCkge1xyXG4gICAgICAgIGlmICgkKHRoaXMpLndpZHRoKCkgPj0gNzY4KSB7XHJcbiAgICAgICAgICAgICQoJG1vYmlsZUhlYWRlcikuaGlkZSgpO1xyXG4gICAgICAgICAgICAkKCRzaWRlYmFyKS5hZGRDbGFzcyhcImFjdGl2ZVwiKTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICAkKCRtb2JpbGVIZWFkZXIpLnNob3coKTtcclxuICAgICAgICAgICAgJCgkc2lkZWJhcikucmVtb3ZlQ2xhc3MoXCJhY3RpdmVcIik7XHJcbiAgICAgICAgICAgICQoJHNpZGViYXJDb2xsYXBzZSkucmVtb3ZlQ2xhc3MoXCJyb3RhdGUxODBcIik7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pO1xyXG5cclxuaWYgKHR5cGVvZiB2aWRlb2pzICE9PSBcInVuZGVmaW5lZFwiKSB7XHJcbiAgICB2aWRlb2pzKFwibWFpbi12aWRlb1wiLCB7XHJcbiAgICAgICAgZmx1aWQ6IHRydWUsXHJcbiAgICAgICAgY29udHJvbEJhcjoge1xyXG4gICAgICAgICAgICBjaGlsZHJlbjogW1xyXG4gICAgICAgICAgICAgICAgXCJwbGF5VG9nZ2xlXCIsXHJcbiAgICAgICAgICAgICAgICBcInZvbHVtZU1lbnVCdXR0b25cIixcclxuICAgICAgICAgICAgICAgIFwiZHVyYXRpb25EaXNwbGF5XCIsXHJcbiAgICAgICAgICAgICAgICBcInRpbWVEaXZpZGVyXCIsXHJcbiAgICAgICAgICAgICAgICBcImN1cnJlbnRUaW1lRGlzcGxheVwiLFxyXG4gICAgICAgICAgICAgICAgXCJwcm9ncmVzc0NvbnRyb2xcIixcclxuICAgICAgICAgICAgICAgIFwicmVtYWluaW5nVGltZURpc3BsYXlcIixcclxuICAgICAgICAgICAgICAgIFwiZnVsbHNjcmVlblRvZ2dsZVwiXHJcbiAgICAgICAgICAgIF1cclxuICAgICAgICB9XHJcbiAgICB9KTtcclxufVxyXG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/global.js\n");

/***/ }),

/***/ "./resources/sass/admin/admin.app.scss":
/*!*********************************************!*\
  !*** ./resources/sass/admin/admin.app.scss ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hZG1pbi9hZG1pbi5hcHAuc2Nzcz9kNTE3Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3Nhc3MvYWRtaW4vYWRtaW4uYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/sass/admin/admin.app.scss\n");

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("// removed by extract-text-webpack-plugin//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvc2Fzcy9hcHAuc2Nzcz8wZTE1Il0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL3Nhc3MvYXBwLnNjc3MuanMiLCJzb3VyY2VzQ29udGVudCI6WyIvLyByZW1vdmVkIGJ5IGV4dHJhY3QtdGV4dC13ZWJwYWNrLXBsdWdpbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/sass/app.scss\n");

/***/ }),

/***/ 0:
/*!***************************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/admin/admin.app.scss ***!
  \***************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\haker-wideo\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\xampp\htdocs\haker-wideo\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\haker-wideo\resources\sass\admin\admin.app.scss */"./resources/sass/admin/admin.app.scss");


/***/ })

/******/ });