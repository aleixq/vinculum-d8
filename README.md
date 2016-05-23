# linkback-d8
Linkback rebuilt to work with Drupal 8.
This module is the backend to store received linkbacks and to fire Events to be used by Rules or by handler modules.
So without these modules it's not very useful. You can see a working handler module in linkback-d8-pingback ( https://github.com/aleixq/vinculum-d8_pingback ).
#Install
Install and go to Configure > services > linkbacks. From there you can configure how sending linkbacks must work: if using cron or if using manual process. There is also lso you can see there the list of received linkbacks.
# Changes over linkback-d7
Some substancial changes over how linkback in drupal 7 worked:
Changes:
  - Received linkbacks are now an Entity, so it is using base interfaces such as the EntiyListBuilder, the EntityViewsData to create custom views, and generally all the Entity Api.
  - Linkback availability on each content is enabled via Entity Field. So it can be configured generally via default field settings or on each bundle.
  - Trackbacks not implemented.
  - Validation of received ref-backs done in entity scope, so using new validation api (using Symfony constraints).
  - Crawling jobs using in-drupal8-core Symphony DomCrawler.
  - Web spider curling jobs using in-drupal8-core guzzle library.
  - Using Symfony EventDispatcher / EventSubcriber instead of hooks.
  
  What it's not developed:
  - Allow altering source url and target when sending refbacks ( hook_linkback_link_send ).
  - Check if linkback has been sent previously (always sends refback if sending is enabled).
  - Handler modules are not configured via general settings, simply enabling linkback handling modules. (Maybe it's better to plan enabled handlers to be configured in field settings).
  
  
