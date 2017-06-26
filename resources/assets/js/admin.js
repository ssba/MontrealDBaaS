
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./adminLTE.main');
import Pace from 'pace-progress';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('content-header', require('./components/ContentHeader.vue'));
Vue.component('create-db-form', require('./components/CreateDBForm.vue'));
Vue.component('edit-db-form', require('./components/EditDBForm.vue'));
Vue.component('create-table-form', require('./components/CreateTableForm.vue'));
Vue.component('edit-table-form', require('./components/EditTableForm.vue'));


const app = new Vue({
    el: '#app'
});

Pace.start()

$(function() {
    "use strict";

    function change_layout(cls) {
        $("body").toggleClass(cls);
        AdminLTE.layout.fixSidebar();
        //Fix the problem with right sidebar and layout boxed
        if (cls == "layout-boxed")
            AdminLTE.controlSidebar._fix($(".control-sidebar-bg"));
        if ($('body').hasClass('fixed') && cls == 'fixed') {
            AdminLTE.pushMenu.expandOnHover();
            AdminLTE.layout.activate();
        }
        AdminLTE.controlSidebar._fix($(".control-sidebar-bg"));
        AdminLTE.controlSidebar._fix($(".control-sidebar"));
    }

    function change_skin(cls) {

        let my_skins = [
            "skin-blue",
            "skin-black",
            "skin-red",
            "skin-yellow",
            "skin-purple",
            "skin-green",
            "skin-blue-light",
            "skin-black-light",
            "skin-red-light",
            "skin-yellow-light",
            "skin-purple-light",
            "skin-green-light"
        ];

        $.each(my_skins, function (i) {
            $("body").removeClass(my_skins[i]);
        });

        $("body").addClass(cls);
        store('skin', cls);
        return false;
    }

    function store(name, val) {
        if (typeof (Storage) !== "undefined") {
            localStorage.setItem(name, val);
        } else {
            window.alert('Please use a modern browser to properly view this template!');
        }
    }

    $("[data-controlsidebar]").on('click', function () {
        change_layout($(this).data('controlsidebar'));
        var slide = !AdminLTE.options.controlSidebarOptions.slide;
        AdminLTE.options.controlSidebarOptions.slide = slide;
        if (!slide)
            $('.control-sidebar').removeClass('control-sidebar-open');
    });


    $("[data-skin]").on('click', function (e) {
        if($(this).hasClass('knob'))
            return;
        e.preventDefault();

        let form = e.currentTarget.closest('form');

        console.log($(form));


        console.log(   );

        axios({
            method: form.method,
            url: form.action,
            data: {
                tpl_skin: $(e.currentTarget).data('skin')
            },
        })
        .then(function (response) {
            console.log(response);
        })
        .catch(function (error) {
            console.log(error);
        });

        change_skin($(this).data('skin'));
    });


    window.paceOptions = {
            // Configuration goes here. Example:
            elements: false,
            restartOnPushState: false,
            restartOnRequestAfter: false
        }



});

