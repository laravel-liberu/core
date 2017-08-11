window.Laravel = { "csrfToken": document.head.querySelector("[name=csrf-token]").content };
window.eventHub = new Vue();


window.initBootstrapSelect = require('./vendor/laravel-enso/modules/initBootstrapSelect');

import VTooltip from 'v-tooltip';
Vue.use(VTooltip);

Vue.filter('numberFormat', value => {
    value += '';

    let x = value.split('.'),
        x1 = x[0],
        x2 = x.length > 1 ? '.' + x[1] : '',
        rgx = /(\d+)(\d{3})/;

    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }

    return x1 + x2;
});

Vue.filter('timeFromNow', value => {
    return moment(value).fromNow();
});

Vue.directive('select-on-focus', {
    inserted: function (el) {
        el.addEventListener('focus',function(el){
            this.select();
        });
    }
});

Vue.directive('focus', {
    inserted: function (el) {
        el.focus();
    }
});

Vue.mixin({
    methods: {
        reportEnsoException(error) {
            if (error.response && error.response.data.level) {
                return toastr[error.response.data.level](error.response.data.message);
            }

            throw error;
        }
    }
});

Array.prototype.unique = function() {
    return this.filter((value, index, self) => {
        return self.indexOf(value) === index;
    });
};

Array.prototype.pluck = function(key) {
    return this.map(object => {
        return object[key];
    });
};

Array.prototype.insert = function(index, item) {
  this.splice(index, 0, item);
};

String.prototype.capitalizeFirst = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

Vue.component('notifications', require('./vendor/laravel-enso/components/vueadminlte/Notifications.vue'));
Vue.component('userMenu', require('./vendor/laravel-enso/components/vueadminlte/UserMenu.vue'));
Vue.component('sidebar', require('./vendor/laravel-enso/components/vueadminlte/sidebar/Sidebar.vue'));
Vue.component('sidebarSettings', require('./vendor/laravel-enso/components/vueadminlte/sidebar/Settings.vue'));
Vue.component('languageSelector', require('./vendor/laravel-enso/components/vueadminlte/sidebar/LanguageSelector.vue'));
Vue.component('tutorial', require('./vendor/laravel-enso/components/vueadminlte/sidebar/Tutorial.vue'));
Vue.component('settingSwitch', require('./vendor/laravel-enso/components/vueadminlte/sidebar/Switch.vue'));
Vue.component('themeSelector', require('./vendor/laravel-enso/components/vueadminlte/sidebar/ThemeSelector.vue'));
Vue.component('box', require('./vendor/laravel-enso/components/vueadminlte/Box.vue'));
Vue.component('smallBox', require('./vendor/laravel-enso/components/vueadminlte/SmallBox.vue'));
Vue.component('infoBox', require('./vendor/laravel-enso/components/vueadminlte/InfoBox.vue'));
Vue.component('boxWidget', require('./vendor/laravel-enso/components/vueadminlte/BoxWidget.vue'));
Vue.component('userWidget', require('./vendor/laravel-enso/components/vueadminlte/UserWidget.vue'));

Vue.component('modal', require('./vendor/laravel-enso/components/enso/Modal.vue'));
Vue.component('vueFilter', require('./vendor/laravel-enso/components/enso/VueFilter.vue'));
Vue.component('dashboard', require('./vendor/laravel-enso/components/enso/Dashboard.vue'));
Vue.component('typeahead', require('./vendor/laravel-enso/components/enso/Typeahead.vue'));
Vue.component('inputClear', require('./vendor/laravel-enso/components/enso/InputClear.vue'));
Vue.component('datepicker', require('./vendor/laravel-enso/components/enso/Datepicker.vue'));
Vue.component('timepicker', require('./vendor/laravel-enso/components/enso/Timepicker.vue'));

Vue.component('chart', require('./vendor/laravel-enso/components/charts/Chart.vue'));

Vue.component('dataTable', require('./vendor/laravel-enso/components/datatable/DataTable.vue'));

Vue.component('vueSelect', require('./vendor/laravel-enso/components/select/VueSelect.vue'));

Vue.component('roleConfigurator', require('./vendor/laravel-enso/components/rolemanager/RoleConfigurator.vue'));
Vue.component('checkboxManager', require('./vendor/laravel-enso/components/rolemanager/CheckboxManager.vue'));

Vue.component('reorderableMenu', require('./vendor/laravel-enso/components/menumanager/ReorderableMenu.vue'));

Vue.component('fileUploader', require('./vendor/laravel-enso/components/filemanager/FileUploader.vue'));

Vue.component('draggable', require('vuedraggable'));