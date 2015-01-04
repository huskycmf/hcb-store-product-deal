define([
    "dojo/_base/declare",
    "dojo/_base/array",
    "dojo/_base/lang",
    "dojo/on",
    'hc-backend/layout/main/content/_ContentMixin',
    "dijit/_TemplatedMixin",
    "dojo/text!./templates/Container.html",
    "dojo/i18n!../nls/List",
    "dojo/request",
    "hc-backend/router",
    "hcb-store-product-deal/list/widget/Grid",
    "dijit/form/Button",
    "hc-backend/dgrid/form/DeleteSelectedButton"
], function(declare, array, lang, on, _ContentMixin, _TemplatedMixin,
            template, translation, request, router, Grid, Button, DeleteSelectedButton) {
    return declare('hcb-store-product-deal.list.Container', [ _ContentMixin, _TemplatedMixin ], {
        //  summary:
        //      List container. Contains widgets who responsible for
        //      displaying list of clients.
        templateString: template,

        baseClass: 'storeDealList',
        
        postCreate: function () {
            try {
                this._gridWidget = new Grid({'class': this.baseClass+'Grid'});
                this._addWidget = new Button({'label': translation['addButtonLabel'],
                                              'class': this.baseClass+'Add',
                    'onClick': lang.hitch(this, function (){
                        router.go(router.assemble('/create', {}, true));
                    })});

                this._deleteWidget = new DeleteSelectedButton({'label': translation['deleteSelectedButtonLabel'],
                    'target': router.assemble('/delete', {}, true),
                    'name': 'deals',
                    'class': this.baseClass+'Delete',
                    'grid': this._gridWidget});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        startup: function () {
            try {
                this.addChild(this._addWidget);
                this.addChild(this._deleteWidget);
                this.addChild(this._gridWidget);
                this.inherited(arguments);
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        refresh: function () {
            try {
                this._gridWidget.refresh({keepScrollPosition: true});
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        }
    });
});
