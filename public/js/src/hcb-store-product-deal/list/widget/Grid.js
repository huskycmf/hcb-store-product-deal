define([
    "dojo/_base/declare",
    "dojo/_base/lang",
    "hcb-store-product-deal/store/DealStore",
    "dgrid/OnDemandGrid",
    "dgrid/extensions/ColumnHider",
    "dgrid/extensions/ColumnResizer",
    "dgrid/extensions/DijitRegistry",
    "hc-backend/dgrid/_Selection",
    "hc-backend/dgrid/_Refresher",
    "hc-backend/dgrid/columns/timestamp",
    "hc-backend/dgrid/columns/editor",
    "dgrid/Keyboard",
    "dgrid/Selector",
    "dojo/i18n!../../nls/List"
], function(declare, lang, DealStore,
            OnDemandGrid, ColumnHider, ColumnResizer, DijitRegistry,
            _Selection, _Refresher, timestamp, editor, Keyboard,
            selector, translation) {
    
    return declare('hcb-store-product-deal.list.widget.Grid',
                   [ OnDemandGrid, ColumnHider, ColumnResizer,
                     Keyboard, _Selection, _Refresher, DijitRegistry ], {
        //  summary:
        //      Grid widget for displaying all available clients
        //      as list
        store: DealStore,

        columns: [
            selector({ label: "", width: 40, selectorType: "checkbox" }),
            {label: translation['idLabel'],
                hidden: true, field: 'id', sortable: false,
                resizable: false},
            editor({label: translation['titleLabel'],
                    hidden: false, field: 'title', sortable: false,
                    resizable: false, route: '/update/:id'}),
            {label: translation['startDateLabel'], field: 'startDate', hidden: false,
                sortable: false, resizable: false},
            {label: translation['endDateLabel'],
             field: 'endDate', hidden: false,
             sortable: false, resizable: false},
            {label: translation['activeLabel'], field: 'active', hidden: false,
                sortable: false, resizable: false}
        ],

        loadingMessage: translation['loadingMessage'],
        noDataMessage: translation['noDataMessage'],

        showHeader: true,
        allowTextSelection: true
    });
});
