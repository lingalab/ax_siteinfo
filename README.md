1. All the task has been incorporated
2. Downlod and Enable the module(ax_siteinfo) and follow the steps for testing as below.
  a. Enable the module
  b. Goto `/admin/config/system/site-information` update site api 
  3. Add new page content
  4. Goto http://localhost/page_json/{siteapi}/{node_id} 
     localhost: your site URL, siteapi: Previous saved data, node_id: page node id
  5. If everything is fine you can see the JSON data
  6. if we access the URL with node_id which is not created alredy, Page will genearte "The website encountered an unexpected error. Please try again later." message.
  
Referred below URLs

https://www.drupal.org/docs/8/creating-custom-modules

https://drupal.stackexchange.com/questions/245990/add-config-forms-to-existing-admin-page

https://www.drupal.org/docs/8/api/routing-system/using-parameters-in-routes

https://www.drupal.org/docs/8/api/form-api

Tried to implement thru REST
https://www.drupal.org/docs/8/api/restful-web-services-api

http://zoubi.me/blog/variable-get-and-variable-set-drupal-8

Drupal contributed 'Examples' module
