define([], function() {
    return {
        "route": "/store/product/deal",
        "prio": 7,
        "modules": [{
            "route": "",
            "module": "list/Container"
        }, {
            "route": "/create",
            "subRoutes": {
                "/:lang": function (evt) { this.getInstance().selectLanguageTab(evt.params.lang); },
                "": function () { this.getInstance().selectLanguageTab(); }},
            "module": "create/Container"
        }, {
            "route": "/update/:id",
            "subRoutes": {"/:lang": function (evt) { this.getInstance().selectLanguageTab(evt.params.lang); },
                "": function () { this.getInstance().selectLanguageTab(); }},
            "module": "update/Container"
        }]
    }
});
