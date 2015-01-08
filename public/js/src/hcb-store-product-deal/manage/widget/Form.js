define([
    "dojo/_base/declare",
    "dojo/_base/lang",
    "dojo/dom-attr",
    "put-selector/put",
    "dojo/aspect",
    "hc-backend/widget/ContentLocalization/widget/Form",
    "hc-backend/form/_HasPageFieldsMixin",
    "dijit/_WidgetsInTemplateMixin",
    "hc-backend/config",
    "dojo-common/store/JsonRest",
    "dojo/store/Cache",
    "dojo/store/Memory",
    "dojo-common/form/InputList",
    "dojo/DeferredList",
    "dijit/form/ComboBox",
    "dijit/form/FilteringSelect",
    "dojox/form/CheckedMultiSelect",
    "dojo/text!./templates/Form.html",
    "dojo/i18n!../../nls/Manage",
    "dijit/form/TextBox",
    "dijit/form/Textarea",
    "dijit/form/NumberTextBox",
    "dojo-common/form/BusyButton",
    "dijit/form/ValidationTextBox",
    "hc-backend/form/FileInputList",
    "dijit/form/Select",
    "dijit/form/CheckBox",
    "dijit/form/DateTextBox"
], function(declare, lang, domAttr, put, aspect, Form, _HasPageFieldsMixin,
            _WidgetsInTemplateMixin, config,
            JsonRest, Cache, Memory, InputList, DeferredList, ComboBox,
            FilteringSelect, CheckedMultiSelect,
            template, translate) {
    return declare([ Form, _HasPageFieldsMixin, _WidgetsInTemplateMixin ], {
        //  summary:
        //      Form widget for adding deals to the CMS database

        templateString: template,
        rawValues: [],

        // _t: [const] Object
        //      Contains dictionary with translations
        _t: translate,

        initProducts: function () {
            try {
                var store = new JsonRest({target: config.get('primaryRoute') + "/store/product"});

                var defList = new DeferredList([store.query()]);
                defList.then(lang.hitch(this, function (response) {
                    var fields = [{
                        w: FilteringSelect,
                        name: 'name',
                        args: {
                            searchAttr: 'name',
                            labelAttr: 'name',
                            maxLength: 250,
                            store: new Memory({data: response[0][1]})
                        }
                    }];

                    this.productInstance = new InputList({fields: fields,
                            name: 'products[]'},
                        this.productsWidget);
                    this.productInstance.attr('value',
                        this.rawValues['products[]']);
                    this.own(this.productInstance);
                }));
            } catch (e) {
                console.error(this.declaredClass, arguments, e);
                throw e;
            }
        },

        _setValueAttr: function (values) {
            try {
                this.inherited(arguments);

                if (this.productInstance) {
                    this.productInstance.attr('value', values['products[]']);
                }
            } catch (e) {
                console.error(this.declaredClass + " " + arguments.callee.nom, arguments, e);
                throw e;
            }
        },

        _getValueAttr: function () {
            try {
                var values = this.inherited(arguments);
                if (values['startDate']) {
                    values['startDate'] = dojo.date.locale.format(values['startDate'], {datePattern: "yyyy-MM-dd", selector: "date"});
                }

                if (values['endDate']) {
                    values['endDate'] = dojo.date.locale.format(values['endDate'], {datePattern: "yyyy-MM-dd", selector: "date"});
                }
                return values;
            } catch (e) {
                 console.error(this.declaredClass, arguments, e);
                 throw e;
            }
        },

        startup: function () {
            try {
                this.initProducts();
                this.inherited(arguments);
            } catch (e) {
                console.error(this.declaredClass, arguments, e);
                throw e;
            }
        }
    });
});
