"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); Object.defineProperty(Constructor, "prototype", { writable: false }); return Constructor; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); Object.defineProperty(subClass, "prototype", { writable: false }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf ? Object.setPrototypeOf.bind() : function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _createSuper(Derived) { var hasNativeReflectConstruct = _isNativeReflectConstruct(); return function _createSuperInternal() { var Super = _getPrototypeOf(Derived), result; if (hasNativeReflectConstruct) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } else if (call !== void 0) { throw new TypeError("Derived constructors may only return object or undefined"); } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Boolean.prototype.valueOf.call(Reflect.construct(Boolean, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf.bind() : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

/**
 * Editor Wrapper
 */
function csEditorWrapper() {
  var Component = wp.element.Component;
  var registerPlugin = wp.plugins.registerPlugin;
  var _wp$data = wp.data,
      select = _wp$data.select,
      subscribe = _wp$data.subscribe;
  var cscoGutenberg = {};

  (function () {
    var $this;
    cscoGutenberg = {
      /*
      * Variables
      */
      wrapper: false,
      content: false,
      template: null,
      singularLayout: null,

      /*
      * Initialize
      */
      init: function init(e) {
        $this = cscoGutenberg; // Find wrapper and content elements.

        $this.content = document.querySelector('.block-editor-editor-skeleton__content, .interface-interface-skeleton__content');
        $this.wrapper = document.querySelector('.editor-styles-wrapper'); // Init events.

        if ('undefined' === typeof window.cscoGutenbergInit) {
          $this.events(e);
          window.cscoGutenbergInit = true;
        }
      },

      /*
      * Events
      */
      events: function events(e) {
        // Update singular layout.
        subscribe(function () {
          var meta = select('core/editor').getEditedPostAttribute('meta');

          if ('object' === _typeof(meta) && meta['mbf_singular_sidebar']) {
            var newSingularLayout = meta['mbf_singular_sidebar'];

            if (newSingularLayout !== $this.singularLayout) {
              $this.singularLayout = newSingularLayout;
              $this.changeLayout();
            }
          }
        }); // Update template.

        subscribe(function () {
          var newTemplate = select('core/editor').getEditedPostAttribute('template');

          if (newTemplate !== $this.template) {
            $this.template = newTemplate;
            $this.changeLayout();
          }
        }); // Update Breakpoints during resize.

        window.addEventListener('resize', function (e) {
          $this.initBreakpoints();
          $this.initChanges();
        }); // Update Breakpoints.

        var observer = new MutationObserver(function (mutations) {
          mutations.forEach(function (mutation) {
            if (mutation.oldValue !== mutation.target.classList.value) {
              $this.initBreakpoints();
              $this.initChanges();
            }
          });
        });
        observer.observe(document.getElementsByTagName('body')[0], {
          attributes: true,
          subtree: false,
          attributeOldValue: true,
          attributeFilter: ["class"]
        });
        observer.observe(document.getElementsByClassName('edit-post-layout')[0], {
          attributes: true,
          subtree: false,
          attributeOldValue: true,
          attributeFilter: ["class"]
        });
      },

      /*
      * Get page template
      */
      getPageTemplate: function getPageTemplate() {
        return select('core/editor').getEditedPostAttribute('template');
      },

      /*
      * Initialize changes
      */
      initChanges: function initChanges() {
        setTimeout(function () {
          document.body.dispatchEvent(new Event('editor-render'));
        }, 200);
      },

      /*
      * Initialize the breakpoints system
      */
      initBreakpoints: function initBreakpoints() {
        if ('undefined' === typeof $this) {
          return;
        }

        if (!$this.wrapper || !$this.content) {
          return;
        } // Default breakpoints that should apply to all observed
        // elements that don't define their own custom breakpoints.


        var breakpoints = {
          'mbf-breakpoint-up-576px': 576,
          'mbf-breakpoint-up-768px': 768,
          'mbf-breakpoint-up-992px': 992,
          'mbf-breakpoint-up-1200px': 1200,
          'mbf-breakpoint-up-1336px': 1336,
          'mbf-breakpoint-up-1920px': 1920
        }; // Update the matching breakpoints on the observed element.

        Object.keys(breakpoints).forEach(function (breakpoint) {
          var minWidth = breakpoints[breakpoint];

          if ($this.wrapper.clientWidth >= minWidth) {
            $this.content.classList.add(breakpoint);
          } else {
            $this.content.classList.remove(breakpoint);
          }
        });
      },

      /**
       * Init page layout.
       */
      initLayout: function initLayout() {
        if ('undefined' === typeof $this || !$this.wrapper) {
          return;
        }

        $this.wrapper.classList.add('mbf-editor-styles-wrapper');

        if ('template-with-sidebar.php' === $this.getPageTemplate()) {
          $this.wrapper.classList.add(cscoGWrapper.page_layout);
        } else {
          $this.wrapper.classList.add('mbf-sidebar-disabled');
        }

        $this.wrapper.classList.add(cscoGWrapper.post_type);
      },

      /**
       * Get new page layout.
       */
      newLayout: function newLayout(layout) {
        if ('right' === layout || 'left' === layout) {
          return 'mbf-sidebar-enabled';
        } else if ('disabled' === layout) {
          return 'mbf-sidebar-disabled';
        } else {
          return cscoGWrapper.default_layout;
        }
      },

      /**
       * Update when page layout has changed.
       */
      changeLayout: function changeLayout() {
        if ('undefined' === typeof $this || !$this.wrapper) {
          return;
        }

        var layout = 'disabled';

        if ('template-with-sidebar.php' === $this.getPageTemplate()) {
          layout = $this.singularLayout;
        }

        if ($this.newLayout(layout) === cscoGWrapper.page_layout) {
          return;
        }

        $this.wrapper.classList.remove('mbf-sidebar-enabled');
        $this.wrapper.classList.remove('mbf-sidebar-disabled');

        if ('right' === layout || 'left' === layout) {
          cscoGWrapper.page_layout = 'mbf-sidebar-enabled';
          $this.wrapper.classList.add('mbf-sidebar-enabled');
        } else if ('disabled' === layout) {
          cscoGWrapper.page_layout = 'mbf-sidebar-disabled';
          $this.wrapper.classList.add('mbf-sidebar-disabled');
        } else {
          cscoGWrapper.page_layout = cscoGWrapper.default_layout;
          $this.wrapper.classList.add(cscoGWrapper.default_layout);
        }

        $this.initChanges();
      }
    };
  })();

  var cscoGutenbergComponent = /*#__PURE__*/function (_Component) {
    _inherits(cscoGutenbergComponent, _Component);

    var _super = _createSuper(cscoGutenbergComponent);

    function cscoGutenbergComponent() {
      _classCallCheck(this, cscoGutenbergComponent);

      return _super.apply(this, arguments);
    }

    _createClass(cscoGutenbergComponent, [{
      key: "componentDidMount",
      value:
      /**
       * Add initial class.
       */
      function componentDidMount() {
        // Initialize.
        cscoGutenberg.init(); // Initialize Page Layout.

        cscoGutenberg.initLayout(); // Initialize Breakpoints

        cscoGutenberg.initBreakpoints();
      }
    }, {
      key: "componentDidUpdate",
      value: function componentDidUpdate() {
        // Initialize.
        cscoGutenberg.init(); // Update Page Layout.

        cscoGutenberg.initLayout(); // Update Breakpoints

        cscoGutenberg.initBreakpoints();
      }
    }, {
      key: "render",
      value: function render() {
        return null;
      }
    }]);

    return cscoGutenbergComponent;
  }(Component);

  registerPlugin('mbf-editor-wrapper', {
    render: cscoGutenbergComponent
  });
}

csEditorWrapper();