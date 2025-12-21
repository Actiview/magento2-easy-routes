# Actiview_EasyRoutes

**Create multi-language custom routes with ease, including layout handle for easy templating.**

## Installation

Install this package through Composer and then enable the module for Magento 2.

```sh
composer require actiview/magento2-easy-routes
bin/magento module:enable Actiview_EasyRoutes
```

## Usage

Adding a route involves a few easy steps, as explained below. Have a look at the sample module: [Actiview_EasyRoutesSample](https://github.com/Actiview/magento2-easy-routes-sample) for the complete setup.

A new route should be added to the routes pool through a `etc/frontend/di.xml` file. This file can be added in a custom module or one of you existing project modules. In this sample the ID for the route is `sample-page`.

```xml
    <type name="Actiview\EasyRoutes\Model\EasyRoutesPool">
        <arguments>
            <argument name="routes" xsi:type="array">
                <item name="sample-page" xsi:type="null" />
            </argument>
        </arguments>
    </type>
```

To add multiple (multi-language) paths for the same ID use this sample:

```xml
    <type name="Actiview\EasyRoutes\Model\EasyRoutesPool">
        <arguments>
            <argument name="routes" xsi:type="array">
                <item name="sample-page" xsi:type="array">
                    <item name="voorbeeldpagina" xsi:type="null"/>
                    <item name="page-d-exemple" xsi:type="null"/>
                    <item name="beispielseite" xsi:type="null"/>
                </item>
            </argument>
        </arguments>
    </type>
```

Now the new route is available for the router and the page can be visited:

* https://domain.tld/sample-page
* https://domain.tld/voorbeeldpagina
* https://domain.tld/page-d-exemple
* https://domain.tld/beispielseite

When one of these pages is visited an additional layout handle will be added: `easy_routes_id_sample-page`. This can be used to apply additional or custom templating. 

## Usage (advanced)

To be added.

## Bugs / feature requests

Please use the [GitHub Issue Tracker](https://github.com/Actiview/magento2-easy-routes/issues) to report bugs or feature requests. 

## Versions

### v.1.0.0

Initial release
