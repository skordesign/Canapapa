/*!
 * WooCommerce Variation Swatches v1.0.17 
 * 
 * Author: Emran Ahmed ( emran.bd.08@gmail.com ) 
 * Date: 2018-3-30 14:41:58
 * Released under the GPLv3 license.
 */
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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 7);
/******/ })
/************************************************************************/
/******/ ({

/***/ 7:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(8);


/***/ }),

/***/ 8:
/***/ (function(module, exports, __webpack_require__) {

jQuery(function ($) {
    Promise.resolve().then(function () {
        return __webpack_require__(9);
    }).then(function () {
        // Init on Ajax Popup :)
        $(document).on('wc_variation_form', '.variations_form', function () {
            $(this).WooVariationSwatches();
        });

        // Support for Jetpack's Infinite Scroll,
        $(document.body).on('post-load', function () {
            $('.variations_form').wc_variation_form();
        });
    });
}); // end of jquery main wrapper

/***/ }),

/***/ 9:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// ================================================================
// WooCommerce Variation Change
// ================================================================

var WooVariationSwatches = function ($) {

    var Default = {};

    var WooVariationSwatches = function () {
        function WooVariationSwatches(element, config) {
            _classCallCheck(this, WooVariationSwatches);

            // Assign
            this._element = $(element);
            this._config = $.extend({}, Default, config);
            this._generated = {};
            this.product_variations = this._element.data('product_variations');
            this.is_ajax_variation = !this.product_variations;

            // Call
            this.init(this.is_ajax_variation);
            this.loaded(this.is_ajax_variation);
            this.update(this.is_ajax_variation);
            this.reset(this.is_ajax_variation);

            // Trigger
            $(document).trigger('woo_variation_swatches', [this._element]);
        }

        _createClass(WooVariationSwatches, [{
            key: 'init',
            value: function init(is_ajax) {
                var _this2 = this;

                this._element.find('ul.variable-items-wrapper').each(function (i, el) {

                    var select = $(this).siblings('select.woo-variation-raw-select');
                    var li = $(this).find('li');
                    var reselect_clear = $(this).hasClass('reselect-clear');

                    // For Avada FIX
                    if (select.length < 1) {
                        select = $(this).parent().find('select.woo-variation-raw-select');
                    }

                    if (reselect_clear) {
                        $(this).on('click', 'li:not(.selected):not(.radio-variable-item)', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var value = $(this).data('value');
                            select.val(value).trigger('change');
                            select.trigger('click');
                            select.trigger('focusin');
                            select.trigger('touchstart');
                        });

                        $(this).on('click', 'li.selected:not(.radio-variable-item)', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            select.val('').trigger('change');
                            select.trigger('click');
                            select.trigger('focusin');
                            select.trigger('touchstart');
                        });

                        // RADIO
                        $(this).on('click', 'input.wvs-radio-variable-item:radio', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            $(this).trigger('change');
                        });

                        $(this).on('change', 'input.wvs-radio-variable-item:radio', function (e) {
                            var _this = this;

                            e.preventDefault();
                            e.stopPropagation();

                            var value = $(this).val();

                            if ($(this).parent('.radio-variable-item').hasClass('selected')) {
                                select.val('').trigger('change');
                                _.delay(function () {
                                    $(_this).prop('checked', false);
                                }, 1);
                            } else {
                                select.val(value).trigger('change');
                            }

                            select.trigger('click');
                            select.trigger('focusin');
                            select.trigger('touchstart');
                        });
                    } else {
                        $(this).on('click', 'li:not(.radio-variable-item)', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var value = $(this).data('value');
                            select.val(value).trigger('change');
                            select.trigger('click');
                            select.trigger('focusin');
                            select.trigger('touchstart');
                        });

                        // Radio
                        $(this).on('change', 'input.wvs-radio-variable-item:radio', function (e) {
                            e.preventDefault();
                            e.stopPropagation();
                            var value = $(this).val();

                            select.val(value).trigger('change');
                            select.trigger('click');
                            select.trigger('focusin');
                            select.trigger('touchstart');

                            // Radio
                            $(this).parent('li.radio-variable-item').removeClass('selected disabled').addClass('selected');
                        });
                    }
                });

                _.delay(function () {
                    _this2._element.trigger('woo_variation_swatches_init', [_this2, _this2.product_variations]);
                    $(document).trigger('woo_variation_swatches_loaded', [_this2._element, _this2.product_variations]);
                }, 1);
            }
        }, {
            key: 'loaded',
            value: function loaded(is_ajax) {
                if (!is_ajax) {
                    this._element.on('woo_variation_swatches_init', function (event, object, product_variations) {

                        object._generated = product_variations.reduce(function (obj, variation) {
                            Object.keys(variation.attributes).map(function (attribute_name) {

                                if (!obj[attribute_name]) {
                                    obj[attribute_name] = [];
                                }

                                if (variation.attributes[attribute_name]) {
                                    obj[attribute_name].push(variation.attributes[attribute_name]);
                                }
                            });

                            return obj;
                        }, {});

                        $(this).find('ul.variable-items-wrapper').each(function () {
                            var li = $(this).find('li');
                            var attribute = $(this).data('attribute_name');
                            var attribute_values = object._generated[attribute];

                            li.each(function () {
                                var attribute_value = $(this).attr('data-value');

                                if (!_.isEmpty(attribute_values) && !attribute_values.includes(attribute_value)) {
                                    $(this).removeClass('selected');
                                    $(this).addClass('disabled');
                                    if ($(this).hasClass('radio-variable-item')) {
                                        $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
                                    }
                                }
                            });
                        });
                    });
                }
            }
        }, {
            key: 'reset',
            value: function reset(is_ajax) {
                this._element.on('reset_data', function (event) {
                    $(this).find('ul.variable-items-wrapper').each(function () {
                        var li = $(this).find('li');
                        li.each(function () {
                            if (!is_ajax) {
                                $(this).removeClass('selected disabled');
                                if ($(this).hasClass('radio-variable-item')) {
                                    $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false).prop('checked', false);
                                }
                            }
                        });
                    });
                });
            }
        }, {
            key: 'update',
            value: function update(is_ajax) {
                this._element.on('woocommerce_variation_has_changed', function (event) {
                    if (is_ajax) {
                        $(this).find('ul.variable-items-wrapper').each(function () {
                            var selected = '',
                                options = $(this).siblings('select.woo-variation-raw-select').find('option'),
                                current = $(this).siblings('select.woo-variation-raw-select').find('option:selected'),
                                eq = $(this).siblings('select.woo-variation-raw-select').find('option').eq(1),
                                li = $(this).find('li'),
                                selects = [];

                            // For Avada FIX
                            if (options.length < 1) {
                                options = $(this).parent().find('select.woo-variation-raw-select').find('option');
                                current = $(this).parent().find('select.woo-variation-raw-select').find('option:selected');
                                eq = $(this).parent().find('select.woo-variation-raw-select').find('option').eq(1);
                            }

                            options.each(function () {
                                if ($(this).val() !== '') {
                                    selects.push($(this).val());
                                    selected = current ? current.val() : eq.val();
                                }
                            });

                            _.delay(function () {
                                li.each(function () {
                                    var value = $(this).attr('data-value');
                                    $(this).removeClass('selected disabled');
                                    if (value === selected) {
                                        $(this).addClass('selected');
                                        if ($(this).hasClass('radio-variable-item')) {
                                            $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false).prop('checked', true);
                                        }
                                    }
                                });
                            }, 1);
                        });
                    }
                });

                // WithOut Ajax Update
                this._element.on('woocommerce_update_variation_values', function (event) {
                    $(this).find('ul.variable-items-wrapper').each(function () {

                        var selected = '',
                            options = $(this).siblings('select.woo-variation-raw-select').find('option'),
                            current = $(this).siblings('select.woo-variation-raw-select').find('option:selected'),
                            eq = $(this).siblings('select.woo-variation-raw-select').find('option').eq(1),
                            li = $(this).find('li'),
                            selects = [];

                        // For Avada FIX
                        if (options.length < 1) {
                            options = $(this).parent().find('select.woo-variation-raw-select').find('option');
                            current = $(this).parent().find('select.woo-variation-raw-select').find('option:selected');
                            eq = $(this).parent().find('select.woo-variation-raw-select').find('option').eq(1);
                        }

                        options.each(function () {
                            if ($(this).val() !== '') {
                                selects.push($(this).val());
                                selected = current ? current.val() : eq.val();
                            }
                        });

                        _.delay(function () {
                            li.each(function () {
                                var value = $(this).attr('data-value');
                                $(this).removeClass('selected disabled');
                                if (_.contains(selects, value)) {
                                    $(this).removeClass('disabled');
                                    if (value === selected) {
                                        $(this).addClass('selected');
                                        if ($(this).hasClass('radio-variable-item')) {
                                            $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', false).prop('checked', true);
                                        }
                                    }
                                } else {
                                    $(this).addClass('disabled');
                                    if ($(this).hasClass('radio-variable-item')) {
                                        $(this).find('input.wvs-radio-variable-item:radio').prop('disabled', true).prop('checked', false);
                                    }
                                }
                            });
                        }, 1);
                    });
                });
            }
        }], [{
            key: '_jQueryInterface',
            value: function _jQueryInterface(config) {
                return this.each(function () {
                    new WooVariationSwatches(this, config);
                });
            }
        }]);

        return WooVariationSwatches;
    }();

    /**
     * ------------------------------------------------------------------------
     * jQuery
     * ------------------------------------------------------------------------
     */

    $.fn['WooVariationSwatches'] = WooVariationSwatches._jQueryInterface;
    $.fn['WooVariationSwatches'].Constructor = WooVariationSwatches;
    $.fn['WooVariationSwatches'].noConflict = function () {
        $.fn['WooVariationSwatches'] = $.fn['WooVariationSwatches'];
        return WooVariationSwatches._jQueryInterface;
    };

    return WooVariationSwatches;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (WooVariationSwatches);

/***/ })

/******/ });
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXNzZXRzL2pzL2Zyb250ZW5kLmpzIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vL3dlYnBhY2svYm9vdHN0cmFwIDQ4NmZjNjZjNGExYTBiOGFiNWVlIiwid2VicGFjazovLy9zcmMvanMvZnJvbnRlbmQuanMiLCJ3ZWJwYWNrOi8vL3NyYy9qcy9Xb29WYXJpYXRpb25Td2F0Y2hlcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyIgXHQvLyBUaGUgbW9kdWxlIGNhY2hlXG4gXHR2YXIgaW5zdGFsbGVkTW9kdWxlcyA9IHt9O1xuXG4gXHQvLyBUaGUgcmVxdWlyZSBmdW5jdGlvblxuIFx0ZnVuY3Rpb24gX193ZWJwYWNrX3JlcXVpcmVfXyhtb2R1bGVJZCkge1xuXG4gXHRcdC8vIENoZWNrIGlmIG1vZHVsZSBpcyBpbiBjYWNoZVxuIFx0XHRpZihpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSkge1xuIFx0XHRcdHJldHVybiBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXS5leHBvcnRzO1xuIFx0XHR9XG4gXHRcdC8vIENyZWF0ZSBhIG5ldyBtb2R1bGUgKGFuZCBwdXQgaXQgaW50byB0aGUgY2FjaGUpXG4gXHRcdHZhciBtb2R1bGUgPSBpbnN0YWxsZWRNb2R1bGVzW21vZHVsZUlkXSA9IHtcbiBcdFx0XHRpOiBtb2R1bGVJZCxcbiBcdFx0XHRsOiBmYWxzZSxcbiBcdFx0XHRleHBvcnRzOiB7fVxuIFx0XHR9O1xuXG4gXHRcdC8vIEV4ZWN1dGUgdGhlIG1vZHVsZSBmdW5jdGlvblxuIFx0XHRtb2R1bGVzW21vZHVsZUlkXS5jYWxsKG1vZHVsZS5leHBvcnRzLCBtb2R1bGUsIG1vZHVsZS5leHBvcnRzLCBfX3dlYnBhY2tfcmVxdWlyZV9fKTtcblxuIFx0XHQvLyBGbGFnIHRoZSBtb2R1bGUgYXMgbG9hZGVkXG4gXHRcdG1vZHVsZS5sID0gdHJ1ZTtcblxuIFx0XHQvLyBSZXR1cm4gdGhlIGV4cG9ydHMgb2YgdGhlIG1vZHVsZVxuIFx0XHRyZXR1cm4gbW9kdWxlLmV4cG9ydHM7XG4gXHR9XG5cblxuIFx0Ly8gZXhwb3NlIHRoZSBtb2R1bGVzIG9iamVjdCAoX193ZWJwYWNrX21vZHVsZXNfXylcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubSA9IG1vZHVsZXM7XG5cbiBcdC8vIGV4cG9zZSB0aGUgbW9kdWxlIGNhY2hlXG4gXHRfX3dlYnBhY2tfcmVxdWlyZV9fLmMgPSBpbnN0YWxsZWRNb2R1bGVzO1xuXG4gXHQvLyBkZWZpbmUgZ2V0dGVyIGZ1bmN0aW9uIGZvciBoYXJtb255IGV4cG9ydHNcbiBcdF9fd2VicGFja19yZXF1aXJlX18uZCA9IGZ1bmN0aW9uKGV4cG9ydHMsIG5hbWUsIGdldHRlcikge1xuIFx0XHRpZighX193ZWJwYWNrX3JlcXVpcmVfXy5vKGV4cG9ydHMsIG5hbWUpKSB7XG4gXHRcdFx0T2JqZWN0LmRlZmluZVByb3BlcnR5KGV4cG9ydHMsIG5hbWUsIHtcbiBcdFx0XHRcdGNvbmZpZ3VyYWJsZTogZmFsc2UsXG4gXHRcdFx0XHRlbnVtZXJhYmxlOiB0cnVlLFxuIFx0XHRcdFx0Z2V0OiBnZXR0ZXJcbiBcdFx0XHR9KTtcbiBcdFx0fVxuIFx0fTtcblxuIFx0Ly8gZ2V0RGVmYXVsdEV4cG9ydCBmdW5jdGlvbiBmb3IgY29tcGF0aWJpbGl0eSB3aXRoIG5vbi1oYXJtb255IG1vZHVsZXNcbiBcdF9fd2VicGFja19yZXF1aXJlX18ubiA9IGZ1bmN0aW9uKG1vZHVsZSkge1xuIFx0XHR2YXIgZ2V0dGVyID0gbW9kdWxlICYmIG1vZHVsZS5fX2VzTW9kdWxlID9cbiBcdFx0XHRmdW5jdGlvbiBnZXREZWZhdWx0KCkgeyByZXR1cm4gbW9kdWxlWydkZWZhdWx0J107IH0gOlxuIFx0XHRcdGZ1bmN0aW9uIGdldE1vZHVsZUV4cG9ydHMoKSB7IHJldHVybiBtb2R1bGU7IH07XG4gXHRcdF9fd2VicGFja19yZXF1aXJlX18uZChnZXR0ZXIsICdhJywgZ2V0dGVyKTtcbiBcdFx0cmV0dXJuIGdldHRlcjtcbiBcdH07XG5cbiBcdC8vIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbFxuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5vID0gZnVuY3Rpb24ob2JqZWN0LCBwcm9wZXJ0eSkgeyByZXR1cm4gT2JqZWN0LnByb3RvdHlwZS5oYXNPd25Qcm9wZXJ0eS5jYWxsKG9iamVjdCwgcHJvcGVydHkpOyB9O1xuXG4gXHQvLyBfX3dlYnBhY2tfcHVibGljX3BhdGhfX1xuIFx0X193ZWJwYWNrX3JlcXVpcmVfXy5wID0gXCJcIjtcblxuIFx0Ly8gTG9hZCBlbnRyeSBtb2R1bGUgYW5kIHJldHVybiBleHBvcnRzXG4gXHRyZXR1cm4gX193ZWJwYWNrX3JlcXVpcmVfXyhfX3dlYnBhY2tfcmVxdWlyZV9fLnMgPSA3KTtcblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyB3ZWJwYWNrL2Jvb3RzdHJhcCA0ODZmYzY2YzRhMWEwYjhhYjVlZSIsImpRdWVyeSgkID0+IHtcbiAgICBpbXBvcnQoJy4vV29vVmFyaWF0aW9uU3dhdGNoZXMnKS50aGVuKCgpID0+IHtcbiAgICAgICAgLy8gSW5pdCBvbiBBamF4IFBvcHVwIDopXG4gICAgICAgICQoZG9jdW1lbnQpLm9uKCd3Y192YXJpYXRpb25fZm9ybScsICcudmFyaWF0aW9uc19mb3JtJywgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgJCh0aGlzKS5Xb29WYXJpYXRpb25Td2F0Y2hlcygpO1xuICAgICAgICB9KTtcblxuICAgICAgICAvLyBTdXBwb3J0IGZvciBKZXRwYWNrJ3MgSW5maW5pdGUgU2Nyb2xsLFxuICAgICAgICAkKGRvY3VtZW50LmJvZHkpLm9uKCdwb3N0LWxvYWQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAkKCcudmFyaWF0aW9uc19mb3JtJykud2NfdmFyaWF0aW9uX2Zvcm0oKTtcbiAgICAgICAgfSk7XG5cbiAgICB9KTtcbn0pOyAgLy8gZW5kIG9mIGpxdWVyeSBtYWluIHdyYXBwZXJcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gc3JjL2pzL2Zyb250ZW5kLmpzIiwiLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuLy8gV29vQ29tbWVyY2UgVmFyaWF0aW9uIENoYW5nZVxuLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuXG5jb25zdCBXb29WYXJpYXRpb25Td2F0Y2hlcyA9ICgoJCkgPT4ge1xuXG4gICAgY29uc3QgRGVmYXVsdCA9IHt9O1xuXG4gICAgY2xhc3MgV29vVmFyaWF0aW9uU3dhdGNoZXMge1xuXG4gICAgICAgIGNvbnN0cnVjdG9yKGVsZW1lbnQsIGNvbmZpZykge1xuXG4gICAgICAgICAgICAvLyBBc3NpZ25cbiAgICAgICAgICAgIHRoaXMuX2VsZW1lbnQgICAgICAgICAgID0gJChlbGVtZW50KTtcbiAgICAgICAgICAgIHRoaXMuX2NvbmZpZyAgICAgICAgICAgID0gJC5leHRlbmQoe30sIERlZmF1bHQsIGNvbmZpZyk7XG4gICAgICAgICAgICB0aGlzLl9nZW5lcmF0ZWQgICAgICAgICA9IHt9O1xuICAgICAgICAgICAgdGhpcy5wcm9kdWN0X3ZhcmlhdGlvbnMgPSB0aGlzLl9lbGVtZW50LmRhdGEoJ3Byb2R1Y3RfdmFyaWF0aW9ucycpO1xuICAgICAgICAgICAgdGhpcy5pc19hamF4X3ZhcmlhdGlvbiAgPSAhdGhpcy5wcm9kdWN0X3ZhcmlhdGlvbnM7XG5cbiAgICAgICAgICAgIC8vIENhbGxcbiAgICAgICAgICAgIHRoaXMuaW5pdCh0aGlzLmlzX2FqYXhfdmFyaWF0aW9uKTtcbiAgICAgICAgICAgIHRoaXMubG9hZGVkKHRoaXMuaXNfYWpheF92YXJpYXRpb24pO1xuICAgICAgICAgICAgdGhpcy51cGRhdGUodGhpcy5pc19hamF4X3ZhcmlhdGlvbik7XG4gICAgICAgICAgICB0aGlzLnJlc2V0KHRoaXMuaXNfYWpheF92YXJpYXRpb24pO1xuXG4gICAgICAgICAgICAvLyBUcmlnZ2VyXG4gICAgICAgICAgICAkKGRvY3VtZW50KS50cmlnZ2VyKCd3b29fdmFyaWF0aW9uX3N3YXRjaGVzJywgW3RoaXMuX2VsZW1lbnRdKTtcbiAgICAgICAgfVxuXG4gICAgICAgIHN0YXRpYyBfalF1ZXJ5SW50ZXJmYWNlKGNvbmZpZykge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgbmV3IFdvb1ZhcmlhdGlvblN3YXRjaGVzKHRoaXMsIGNvbmZpZylcbiAgICAgICAgICAgIH0pXG4gICAgICAgIH1cblxuICAgICAgICBpbml0KGlzX2FqYXgpIHtcblxuICAgICAgICAgICAgdGhpcy5fZWxlbWVudC5maW5kKCd1bC52YXJpYWJsZS1pdGVtcy13cmFwcGVyJykuZWFjaChmdW5jdGlvbiAoaSwgZWwpIHtcblxuICAgICAgICAgICAgICAgIGxldCBzZWxlY3QgICAgICAgICA9ICQodGhpcykuc2libGluZ3MoJ3NlbGVjdC53b28tdmFyaWF0aW9uLXJhdy1zZWxlY3QnKTtcbiAgICAgICAgICAgICAgICBsZXQgbGkgICAgICAgICAgICAgPSAkKHRoaXMpLmZpbmQoJ2xpJyk7XG4gICAgICAgICAgICAgICAgbGV0IHJlc2VsZWN0X2NsZWFyID0gJCh0aGlzKS5oYXNDbGFzcygncmVzZWxlY3QtY2xlYXInKTtcblxuICAgICAgICAgICAgICAgIC8vIEZvciBBdmFkYSBGSVhcbiAgICAgICAgICAgICAgICBpZiAoc2VsZWN0Lmxlbmd0aCA8IDEpIHtcbiAgICAgICAgICAgICAgICAgICAgc2VsZWN0ID0gJCh0aGlzKS5wYXJlbnQoKS5maW5kKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0Jyk7XG4gICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgaWYgKHJlc2VsZWN0X2NsZWFyKSB7XG4gICAgICAgICAgICAgICAgICAgICQodGhpcykub24oJ2NsaWNrJywgJ2xpOm5vdCguc2VsZWN0ZWQpOm5vdCgucmFkaW8tdmFyaWFibGUtaXRlbSknLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCB2YWx1ZSA9ICQodGhpcykuZGF0YSgndmFsdWUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC52YWwodmFsdWUpLnRyaWdnZXIoJ2NoYW5nZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnRyaWdnZXIoJ2NsaWNrJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcignZm9jdXNpbicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnRyaWdnZXIoJ3RvdWNoc3RhcnQnKTtcbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5vbignY2xpY2snLCAnbGkuc2VsZWN0ZWQ6bm90KC5yYWRpby12YXJpYWJsZS1pdGVtKScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnZhbCgnJykudHJpZ2dlcignY2hhbmdlJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcignY2xpY2snKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC50cmlnZ2VyKCdmb2N1c2luJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcigndG91Y2hzdGFydCcpO1xuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICAvLyBSQURJT1xuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLm9uKCdjbGljaycsICdpbnB1dC53dnMtcmFkaW8tdmFyaWFibGUtaXRlbTpyYWRpbycsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS50cmlnZ2VyKCdjaGFuZ2UnKTtcbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5vbignY2hhbmdlJywgJ2lucHV0Lnd2cy1yYWRpby12YXJpYWJsZS1pdGVtOnJhZGlvJywgZnVuY3Rpb24gKGUpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCB2YWx1ZSA9ICQodGhpcykudmFsKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIGlmICgkKHRoaXMpLnBhcmVudCgnLnJhZGlvLXZhcmlhYmxlLWl0ZW0nKS5oYXNDbGFzcygnc2VsZWN0ZWQnKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC52YWwoJycpLnRyaWdnZXIoJ2NoYW5nZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIF8uZGVsYXkoKCkgPT4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSlcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9LCAxKVxuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnZhbCh2YWx1ZSkudHJpZ2dlcignY2hhbmdlJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC50cmlnZ2VyKCdjbGljaycpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnRyaWdnZXIoJ2ZvY3VzaW4nKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC50cmlnZ2VyKCd0b3VjaHN0YXJ0Jyk7XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5vbignY2xpY2snLCAnbGk6bm90KC5yYWRpby12YXJpYWJsZS1pdGVtKScsIGZ1bmN0aW9uIChlKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICAgICAgICAgICAgICAgICAgICBlLnN0b3BQcm9wYWdhdGlvbigpO1xuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IHZhbHVlID0gJCh0aGlzKS5kYXRhKCd2YWx1ZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnZhbCh2YWx1ZSkudHJpZ2dlcignY2hhbmdlJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcignY2xpY2snKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC50cmlnZ2VyKCdmb2N1c2luJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcigndG91Y2hzdGFydCcpO1xuICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICAvLyBSYWRpb1xuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLm9uKCdjaGFuZ2UnLCAnaW5wdXQud3ZzLXJhZGlvLXZhcmlhYmxlLWl0ZW06cmFkaW8nLCBmdW5jdGlvbiAoZSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgZS5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgZS5zdG9wUHJvcGFnYXRpb24oKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCB2YWx1ZSA9ICQodGhpcykudmFsKCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdC52YWwodmFsdWUpLnRyaWdnZXIoJ2NoYW5nZScpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnRyaWdnZXIoJ2NsaWNrJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3QudHJpZ2dlcignZm9jdXNpbicpO1xuICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0LnRyaWdnZXIoJ3RvdWNoc3RhcnQnKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgLy8gUmFkaW9cbiAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucGFyZW50KCdsaS5yYWRpby12YXJpYWJsZS1pdGVtJykucmVtb3ZlQ2xhc3MoJ3NlbGVjdGVkIGRpc2FibGVkJykuYWRkQ2xhc3MoJ3NlbGVjdGVkJylcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIF8uZGVsYXkoKCkgPT4ge1xuICAgICAgICAgICAgICAgIHRoaXMuX2VsZW1lbnQudHJpZ2dlcignd29vX3ZhcmlhdGlvbl9zd2F0Y2hlc19pbml0JywgW3RoaXMsIHRoaXMucHJvZHVjdF92YXJpYXRpb25zXSlcbiAgICAgICAgICAgICAgICAkKGRvY3VtZW50KS50cmlnZ2VyKCd3b29fdmFyaWF0aW9uX3N3YXRjaGVzX2xvYWRlZCcsIFt0aGlzLl9lbGVtZW50LCB0aGlzLnByb2R1Y3RfdmFyaWF0aW9uc10pXG4gICAgICAgICAgICB9LCAxKVxuICAgICAgICB9XG5cbiAgICAgICAgbG9hZGVkKGlzX2FqYXgpIHtcbiAgICAgICAgICAgIGlmICghaXNfYWpheCkge1xuICAgICAgICAgICAgICAgIHRoaXMuX2VsZW1lbnQub24oJ3dvb192YXJpYXRpb25fc3dhdGNoZXNfaW5pdCcsIGZ1bmN0aW9uIChldmVudCwgb2JqZWN0LCBwcm9kdWN0X3ZhcmlhdGlvbnMpIHtcblxuICAgICAgICAgICAgICAgICAgICBvYmplY3QuX2dlbmVyYXRlZCA9IHByb2R1Y3RfdmFyaWF0aW9ucy5yZWR1Y2UoKG9iaiwgdmFyaWF0aW9uKSA9PiB7XG4gICAgICAgICAgICAgICAgICAgICAgICBPYmplY3Qua2V5cyh2YXJpYXRpb24uYXR0cmlidXRlcykubWFwKChhdHRyaWJ1dGVfbmFtZSkgPT4ge1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCFvYmpbYXR0cmlidXRlX25hbWVdKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9ialthdHRyaWJ1dGVfbmFtZV0gPSBbXVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICh2YXJpYXRpb24uYXR0cmlidXRlc1thdHRyaWJ1dGVfbmFtZV0pIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgb2JqW2F0dHJpYnV0ZV9uYW1lXS5wdXNoKHZhcmlhdGlvbi5hdHRyaWJ1dGVzW2F0dHJpYnV0ZV9uYW1lXSlcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIG9iajtcbiAgICAgICAgICAgICAgICAgICAgfSwge30pO1xuXG4gICAgICAgICAgICAgICAgICAgICQodGhpcykuZmluZCgndWwudmFyaWFibGUtaXRlbXMtd3JhcHBlcicpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGxpICAgICAgICAgICAgICAgPSAkKHRoaXMpLmZpbmQoJ2xpJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBsZXQgYXR0cmlidXRlICAgICAgICA9ICQodGhpcykuZGF0YSgnYXR0cmlidXRlX25hbWUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBhdHRyaWJ1dGVfdmFsdWVzID0gb2JqZWN0Ll9nZW5lcmF0ZWRbYXR0cmlidXRlXTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgbGkuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbGV0IGF0dHJpYnV0ZV92YWx1ZSA9ICQodGhpcykuYXR0cignZGF0YS12YWx1ZScpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCFfLmlzRW1wdHkoYXR0cmlidXRlX3ZhbHVlcykgJiYgIWF0dHJpYnV0ZV92YWx1ZXMuaW5jbHVkZXMoYXR0cmlidXRlX3ZhbHVlKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdzZWxlY3RlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoJCh0aGlzKS5oYXNDbGFzcygncmFkaW8tdmFyaWFibGUtaXRlbScpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmZpbmQoJ2lucHV0Lnd2cy1yYWRpby12YXJpYWJsZS1pdGVtOnJhZGlvJykucHJvcCgnZGlzYWJsZWQnLCB0cnVlKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG5cbiAgICAgICAgcmVzZXQoaXNfYWpheCkge1xuICAgICAgICAgICAgdGhpcy5fZWxlbWVudC5vbigncmVzZXRfZGF0YScsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICAgICAgICAgICQodGhpcykuZmluZCgndWwudmFyaWFibGUtaXRlbXMtd3JhcHBlcicpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICBsZXQgbGkgPSAkKHRoaXMpLmZpbmQoJ2xpJyk7XG4gICAgICAgICAgICAgICAgICAgIGxpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCFpc19hamF4KSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcygnc2VsZWN0ZWQgZGlzYWJsZWQnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoJCh0aGlzKS5oYXNDbGFzcygncmFkaW8tdmFyaWFibGUtaXRlbScpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykuZmluZCgnaW5wdXQud3ZzLXJhZGlvLXZhcmlhYmxlLWl0ZW06cmFkaW8nKS5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKS5wcm9wKCdjaGVja2VkJywgZmFsc2UpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuXG4gICAgICAgIHVwZGF0ZShpc19hamF4KSB7XG4gICAgICAgICAgICB0aGlzLl9lbGVtZW50Lm9uKCd3b29jb21tZXJjZV92YXJpYXRpb25faGFzX2NoYW5nZWQnLCBmdW5jdGlvbiAoZXZlbnQpIHtcbiAgICAgICAgICAgICAgICBpZiAoaXNfYWpheCkge1xuICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmZpbmQoJ3VsLnZhcmlhYmxlLWl0ZW1zLXdyYXBwZXInKS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxldCBzZWxlY3RlZCA9ICcnLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIG9wdGlvbnMgID0gJCh0aGlzKS5zaWJsaW5ncygnc2VsZWN0Lndvby12YXJpYXRpb24tcmF3LXNlbGVjdCcpLmZpbmQoJ29wdGlvbicpLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGN1cnJlbnQgID0gJCh0aGlzKS5zaWJsaW5ncygnc2VsZWN0Lndvby12YXJpYXRpb24tcmF3LXNlbGVjdCcpLmZpbmQoJ29wdGlvbjpzZWxlY3RlZCcpLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVxICAgICAgID0gJCh0aGlzKS5zaWJsaW5ncygnc2VsZWN0Lndvby12YXJpYXRpb24tcmF3LXNlbGVjdCcpLmZpbmQoJ29wdGlvbicpLmVxKDEpLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxpICAgICAgID0gJCh0aGlzKS5maW5kKCdsaScpLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdHMgID0gW107XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIC8vIEZvciBBdmFkYSBGSVhcbiAgICAgICAgICAgICAgICAgICAgICAgIGlmIChvcHRpb25zLmxlbmd0aCA8IDEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBvcHRpb25zID0gJCh0aGlzKS5wYXJlbnQoKS5maW5kKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0JykuZmluZCgnb3B0aW9uJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgY3VycmVudCA9ICQodGhpcykucGFyZW50KCkuZmluZCgnc2VsZWN0Lndvby12YXJpYXRpb24tcmF3LXNlbGVjdCcpLmZpbmQoJ29wdGlvbjpzZWxlY3RlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGVxICAgICAgPSAkKHRoaXMpLnBhcmVudCgpLmZpbmQoJ3NlbGVjdC53b28tdmFyaWF0aW9uLXJhdy1zZWxlY3QnKS5maW5kKCdvcHRpb24nKS5lcSgxKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICAgICAgb3B0aW9ucy5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoJCh0aGlzKS52YWwoKSAhPT0gJycpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0cy5wdXNoKCQodGhpcykudmFsKCkpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzZWxlY3RlZCA9IGN1cnJlbnQgPyBjdXJyZW50LnZhbCgpIDogZXEudmFsKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIF8uZGVsYXkoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGxpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgdmFsdWUgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtdmFsdWUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmVDbGFzcygnc2VsZWN0ZWQgZGlzYWJsZWQnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKHZhbHVlID09PSBzZWxlY3RlZCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5hZGRDbGFzcygnc2VsZWN0ZWQnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICgkKHRoaXMpLmhhc0NsYXNzKCdyYWRpby12YXJpYWJsZS1pdGVtJykpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmZpbmQoJ2lucHV0Lnd2cy1yYWRpby12YXJpYWJsZS1pdGVtOnJhZGlvJykucHJvcCgnZGlzYWJsZWQnLCBmYWxzZSkucHJvcCgnY2hlY2tlZCcsIHRydWUpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCAxKTtcbiAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgIC8vIFdpdGhPdXQgQWpheCBVcGRhdGVcbiAgICAgICAgICAgIHRoaXMuX2VsZW1lbnQub24oJ3dvb2NvbW1lcmNlX3VwZGF0ZV92YXJpYXRpb25fdmFsdWVzJywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgICAgICAgICAgJCh0aGlzKS5maW5kKCd1bC52YXJpYWJsZS1pdGVtcy13cmFwcGVyJykuZWFjaChmdW5jdGlvbiAoKSB7XG5cbiAgICAgICAgICAgICAgICAgICAgbGV0IHNlbGVjdGVkID0gJycsXG4gICAgICAgICAgICAgICAgICAgICAgICBvcHRpb25zICA9ICQodGhpcykuc2libGluZ3MoJ3NlbGVjdC53b28tdmFyaWF0aW9uLXJhdy1zZWxlY3QnKS5maW5kKCdvcHRpb24nKSxcbiAgICAgICAgICAgICAgICAgICAgICAgIGN1cnJlbnQgID0gJCh0aGlzKS5zaWJsaW5ncygnc2VsZWN0Lndvby12YXJpYXRpb24tcmF3LXNlbGVjdCcpLmZpbmQoJ29wdGlvbjpzZWxlY3RlZCcpLFxuICAgICAgICAgICAgICAgICAgICAgICAgZXEgICAgICAgPSAkKHRoaXMpLnNpYmxpbmdzKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0JykuZmluZCgnb3B0aW9uJykuZXEoMSksXG4gICAgICAgICAgICAgICAgICAgICAgICBsaSAgICAgICA9ICQodGhpcykuZmluZCgnbGknKSxcbiAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdHMgID0gW107XG5cbiAgICAgICAgICAgICAgICAgICAgLy8gRm9yIEF2YWRhIEZJWFxuICAgICAgICAgICAgICAgICAgICBpZiAob3B0aW9ucy5sZW5ndGggPCAxKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBvcHRpb25zID0gJCh0aGlzKS5wYXJlbnQoKS5maW5kKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0JykuZmluZCgnb3B0aW9uJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBjdXJyZW50ID0gJCh0aGlzKS5wYXJlbnQoKS5maW5kKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0JykuZmluZCgnb3B0aW9uOnNlbGVjdGVkJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICBlcSAgICAgID0gJCh0aGlzKS5wYXJlbnQoKS5maW5kKCdzZWxlY3Qud29vLXZhcmlhdGlvbi1yYXctc2VsZWN0JykuZmluZCgnb3B0aW9uJykuZXEoMSk7XG4gICAgICAgICAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgICAgICAgICBvcHRpb25zLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCQodGhpcykudmFsKCkgIT09ICcnKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgc2VsZWN0cy5wdXNoKCQodGhpcykudmFsKCkpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHNlbGVjdGVkID0gY3VycmVudCA/IGN1cnJlbnQudmFsKCkgOiBlcS52YWwoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgfSk7XG5cbiAgICAgICAgICAgICAgICAgICAgXy5kZWxheShmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBsaS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsZXQgdmFsdWUgPSAkKHRoaXMpLmF0dHIoJ2RhdGEtdmFsdWUnKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdzZWxlY3RlZCBkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmIChfLmNvbnRhaW5zKHNlbGVjdHMsIHZhbHVlKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZUNsYXNzKCdkaXNhYmxlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAodmFsdWUgPT09IHNlbGVjdGVkKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLmFkZENsYXNzKCdzZWxlY3RlZCcpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgaWYgKCQodGhpcykuaGFzQ2xhc3MoJ3JhZGlvLXZhcmlhYmxlLWl0ZW0nKSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykuZmluZCgnaW5wdXQud3ZzLXJhZGlvLXZhcmlhYmxlLWl0ZW06cmFkaW8nKS5wcm9wKCdkaXNhYmxlZCcsIGZhbHNlKS5wcm9wKCdjaGVja2VkJywgdHJ1ZSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykuYWRkQ2xhc3MoJ2Rpc2FibGVkJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIGlmICgkKHRoaXMpLmhhc0NsYXNzKCdyYWRpby12YXJpYWJsZS1pdGVtJykpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykuZmluZCgnaW5wdXQud3ZzLXJhZGlvLXZhcmlhYmxlLWl0ZW06cmFkaW8nKS5wcm9wKCdkaXNhYmxlZCcsIHRydWUpLnByb3AoJ2NoZWNrZWQnLCBmYWxzZSk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgfSwgMSk7XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH1cblxuICAgIC8qKlxuICAgICAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICAgICAqIGpRdWVyeVxuICAgICAqIC0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLVxuICAgICAqL1xuXG4gICAgJC5mblsnV29vVmFyaWF0aW9uU3dhdGNoZXMnXSA9IFdvb1ZhcmlhdGlvblN3YXRjaGVzLl9qUXVlcnlJbnRlcmZhY2U7XG4gICAgJC5mblsnV29vVmFyaWF0aW9uU3dhdGNoZXMnXS5Db25zdHJ1Y3RvciA9IFdvb1ZhcmlhdGlvblN3YXRjaGVzO1xuICAgICQuZm5bJ1dvb1ZhcmlhdGlvblN3YXRjaGVzJ10ubm9Db25mbGljdCAgPSBmdW5jdGlvbiAoKSB7XG4gICAgICAgICQuZm5bJ1dvb1ZhcmlhdGlvblN3YXRjaGVzJ10gPSAkLmZuWydXb29WYXJpYXRpb25Td2F0Y2hlcyddO1xuICAgICAgICByZXR1cm4gV29vVmFyaWF0aW9uU3dhdGNoZXMuX2pRdWVyeUludGVyZmFjZVxuICAgIH1cblxuICAgIHJldHVybiBXb29WYXJpYXRpb25Td2F0Y2hlcztcblxufSkoalF1ZXJ5KTtcblxuZXhwb3J0IGRlZmF1bHQgV29vVmFyaWF0aW9uU3dhdGNoZXNcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gc3JjL2pzL1dvb1ZhcmlhdGlvblN3YXRjaGVzLmpzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7Ozs7Ozs7Ozs7Ozs7Ozs7QUM3REE7QUFDQTtBQUFBO0FBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQUNBOzs7Ozs7Ozs7Ozs7O0FDYkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUhBO0FBTUE7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQXhCQTtBQUFBO0FBQUE7QUErQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQ0E7QUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUE1SEE7QUFBQTtBQUFBO0FBK0hBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFwS0E7QUFBQTtBQUFBO0FBdUtBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFwTEE7QUFBQTtBQUFBO0FBdUxBO0FBQ0E7QUFDQTtBQUNBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUNBO0FBTUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFDQTtBQU1BO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBL1FBO0FBQUE7QUFBQTtBQTBCQTtBQUNBO0FBQ0E7QUFDQTtBQTdCQTtBQUNBO0FBREE7QUFBQTtBQUNBO0FBaVJBOzs7Ozs7QUFNQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBOzs7O0EiLCJzb3VyY2VSb290IjoiIn0=