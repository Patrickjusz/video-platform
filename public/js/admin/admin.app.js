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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/admin.app.js":
/*!*****************************************!*\
  !*** ./resources/js/admin/admin.app.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./dashboard */ \"./resources/js/admin/dashboard.js\");//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vYWRtaW4uYXBwLmpzP2M4NWIiXSwibmFtZXMiOlsicmVxdWlyZSJdLCJtYXBwaW5ncyI6IkFBQUFBLG1CQUFPLENBQUMsc0RBQUQsQ0FBUCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hZG1pbi9hZG1pbi5hcHAuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyJyZXF1aXJlKCcuL2Rhc2hib2FyZCcpO1xyXG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/admin/admin.app.js\n");

/***/ }),

/***/ "./resources/js/admin/dashboard.js":
/*!*****************************************!*\
  !*** ./resources/js/admin/dashboard.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("var ADMIN_PATH = \"admin\";\n$(function () {\n  var table = $(\".data-table-video\").DataTable({\n    processing: true,\n    serverSide: true,\n    ajax: ADMIN_PATH,\n    oLanguage: {\n      sUrl: \"lang/datatable-polish.json\"\n    },\n    columns: [{\n      data: \"thumb_html\",\n      name: \"thumb_html\"\n    }, {\n      data: \"name\",\n      name: \"name\"\n    }, {\n      data: \"description_short\",\n      name: \"description_short\"\n    }, {\n      data: \"slug\",\n      name: \"slug\"\n    }, {\n      data: \"created_at_format\",\n      name: \"created_at_format\"\n    }, {\n      data: \"state\",\n      name: \"state\"\n    }, {\n      data: \"action\",\n      name: \"action\",\n      orderable: false,\n      searchable: false\n    }]\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vZGFzaGJvYXJkLmpzP2ZjZGIiXSwibmFtZXMiOlsiQURNSU5fUEFUSCIsIiQiLCJ0YWJsZSIsIkRhdGFUYWJsZSIsInByb2Nlc3NpbmciLCJzZXJ2ZXJTaWRlIiwiYWpheCIsIm9MYW5ndWFnZSIsInNVcmwiLCJjb2x1bW5zIiwiZGF0YSIsIm5hbWUiLCJvcmRlcmFibGUiLCJzZWFyY2hhYmxlIl0sIm1hcHBpbmdzIjoiQUFBQSxJQUFNQSxVQUFVLEdBQUcsT0FBbkI7QUFFQUMsQ0FBQyxDQUFDLFlBQVc7QUFDVCxNQUFJQyxLQUFLLEdBQUdELENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCRSxTQUF2QixDQUFpQztBQUN6Q0MsY0FBVSxFQUFFLElBRDZCO0FBRXpDQyxjQUFVLEVBQUUsSUFGNkI7QUFHekNDLFFBQUksRUFBRU4sVUFIbUM7QUFJekNPLGFBQVMsRUFBRTtBQUNQQyxVQUFJLEVBQUU7QUFEQyxLQUo4QjtBQU96Q0MsV0FBTyxFQUFFLENBQ0w7QUFBRUMsVUFBSSxFQUFFLFlBQVI7QUFBc0JDLFVBQUksRUFBRTtBQUE1QixLQURLLEVBRUw7QUFBRUQsVUFBSSxFQUFFLE1BQVI7QUFBZ0JDLFVBQUksRUFBRTtBQUF0QixLQUZLLEVBR0w7QUFBRUQsVUFBSSxFQUFFLG1CQUFSO0FBQTZCQyxVQUFJLEVBQUU7QUFBbkMsS0FISyxFQUlMO0FBQUVELFVBQUksRUFBRSxNQUFSO0FBQWdCQyxVQUFJLEVBQUU7QUFBdEIsS0FKSyxFQUtMO0FBQUVELFVBQUksRUFBRSxtQkFBUjtBQUE2QkMsVUFBSSxFQUFFO0FBQW5DLEtBTEssRUFNTDtBQUFFRCxVQUFJLEVBQUUsT0FBUjtBQUFpQkMsVUFBSSxFQUFFO0FBQXZCLEtBTkssRUFPTDtBQUNJRCxVQUFJLEVBQUUsUUFEVjtBQUVJQyxVQUFJLEVBQUUsUUFGVjtBQUdJQyxlQUFTLEVBQUUsS0FIZjtBQUlJQyxnQkFBVSxFQUFFO0FBSmhCLEtBUEs7QUFQZ0MsR0FBakMsQ0FBWjtBQXNCSCxDQXZCQSxDQUFEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FkbWluL2Rhc2hib2FyZC5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IEFETUlOX1BBVEggPSBcImFkbWluXCI7XHJcblxyXG4kKGZ1bmN0aW9uKCkge1xyXG4gICAgdmFyIHRhYmxlID0gJChcIi5kYXRhLXRhYmxlLXZpZGVvXCIpLkRhdGFUYWJsZSh7XHJcbiAgICAgICAgcHJvY2Vzc2luZzogdHJ1ZSxcclxuICAgICAgICBzZXJ2ZXJTaWRlOiB0cnVlLFxyXG4gICAgICAgIGFqYXg6IEFETUlOX1BBVEgsXHJcbiAgICAgICAgb0xhbmd1YWdlOiB7XHJcbiAgICAgICAgICAgIHNVcmw6IFwibGFuZy9kYXRhdGFibGUtcG9saXNoLmpzb25cIlxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgY29sdW1uczogW1xyXG4gICAgICAgICAgICB7IGRhdGE6IFwidGh1bWJfaHRtbFwiLCBuYW1lOiBcInRodW1iX2h0bWxcIiB9LFxyXG4gICAgICAgICAgICB7IGRhdGE6IFwibmFtZVwiLCBuYW1lOiBcIm5hbWVcIiB9LFxyXG4gICAgICAgICAgICB7IGRhdGE6IFwiZGVzY3JpcHRpb25fc2hvcnRcIiwgbmFtZTogXCJkZXNjcmlwdGlvbl9zaG9ydFwiIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogXCJzbHVnXCIsIG5hbWU6IFwic2x1Z1wiIH0sXHJcbiAgICAgICAgICAgIHsgZGF0YTogXCJjcmVhdGVkX2F0X2Zvcm1hdFwiLCBuYW1lOiBcImNyZWF0ZWRfYXRfZm9ybWF0XCIgfSxcclxuICAgICAgICAgICAgeyBkYXRhOiBcInN0YXRlXCIsIG5hbWU6IFwic3RhdGVcIiB9LFxyXG4gICAgICAgICAgICB7XHJcbiAgICAgICAgICAgICAgICBkYXRhOiBcImFjdGlvblwiLFxyXG4gICAgICAgICAgICAgICAgbmFtZTogXCJhY3Rpb25cIixcclxuICAgICAgICAgICAgICAgIG9yZGVyYWJsZTogZmFsc2UsXHJcbiAgICAgICAgICAgICAgICBzZWFyY2hhYmxlOiBmYWxzZVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgXVxyXG4gICAgfSk7XHJcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/admin/dashboard.js\n");

/***/ }),

/***/ 1:
/*!***********************************************!*\
  !*** multi ./resources/js/admin/admin.app.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\haker-wideo\resources\js\admin\admin.app.js */"./resources/js/admin/admin.app.js");


/***/ })

/******/ });