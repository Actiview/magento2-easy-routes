# Easy Routes module for Magento 2

**Create multi-language custom routes with ease, including layout handle for easy templating.**

## Installation

Install this package through Composer and then enable the module for Magento 2.

```sh
composer require actiview/magento2-easy-routes
bin/magento module:enable Actiview_EasyRoutes
```

## Usage

Adding a route involves a few easy steps, these steps are explained below. Have a look at the sample module: [Actiview_EasyRoutesSample](https://github.com/Actiview/magento2-easy-routes-sample) for the complete setup.

A new route is added to the routes pool through a `etc/frontend/di.xml` file. This file can be added in a custom module or one of you existing project modules. 

### Virtual Type

First create a `virtualType`:

```xml
    <virtualType name="SamplePageEasyRoute" type="Actiview\EasyRoutes\Model\AbstractEasyRoute">
        <arguments>
            <argument name="routeId" xsi:type="string">sample-page</argument>
            <argument name="storePaths" xsi:type="array">
                <item name="" xsi:type="string">sample-page</item>
            </argument>
        </arguments>
    </virtualType>
```

To add multiple (multi-language) paths for the same ID use the next sample. The default route can be named `default` or the name can be empty. For the other paths use the relevant store code as name. 

```xml
    <virtualType name="SamplePageEasyRoute" type="Actiview\EasyRoutes\Model\AbstractEasyRoute">
        <arguments>
            <argument name="routeId" xsi:type="string">sample-page</argument>
            <argument name="storePaths" xsi:type="array">
                <item name="" xsi:type="string">sample-page</item>
                <item name="nl" xsi:type="string">voorbeeldpagina</item>
                <item name="de" xsi:type="string">beispielseite</item>
                <item name="fr" xsi:type="string">page-d-exemple</item>
                <item name="es" xsi:type="string">pagina-de-muestra</item>
            </argument>
        </arguments>
    </virtualType>
```

### Paths

Now the new route is available for the router and the page can be visited:

* https://domain.tld/sample-page
* https://domain.tld/voorbeeldpagina
* https://domain.tld/page-d-exemple
* https://domain.tld/beispielseite
* https://domain.tld/pagina-de-muestra

When one of these pages is visited an additional layout handle will be added: `easy_routes_sample-page`. This can be used to apply additional or custom templating. 

## Usage (advanced)

You can provide your own CustomRoute object that implements `EasyRouteInterface`. Now you can provide your own logic, for exampling enableing/disabling a route for a store view.  

## Bugs / feature requests

Please use the [GitHub Issue Tracker](https://github.com/Actiview/magento2-easy-routes/issues) to report bugs or feature requests. 

## Versions

### v.1.0.0

Initial release
