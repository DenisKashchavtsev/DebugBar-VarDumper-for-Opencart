# DebugBar + VarDumper for Opencart

Tested on version 3.0.3.3

## Capabilities
- Using global functions ```dd()``` and ```dump()``` https://symfony.com/doc/current/components/var_dumper.html
- Clear cache theme, sass and modification ![image](https://user-images.githubusercontent.com/104227603/182028551-4671e850-57aa-4ff7-bf93-9f61684f2c05.png)

- Message output:
  * message output time
  * message type
  * display log messages
  * adding and displaying your own messages using the construct
  ```
  $this->debugBar->addMessage($data);
![image](https://user-images.githubusercontent.com/104227603/182028612-55d9ec4f-f942-4772-b11f-6388071424b6.png)

- Output Queries:
  * sql query execution time
  * display class, method where sql is called
  * path to file where sql was called
  * display sql query
  
![image](https://user-images.githubusercontent.com/104227603/182028662-bc929cbf-7610-411c-9757-f8edf582a49d.png)

- Output Actions :
  * class and method mapping
  * path to the file where the action was called
  * path to view file
  * the ability to search on the page of the current action (under development)![image](https://user-images.githubusercontent.com/104227603/182028711-6d7d5d46-9903-48ba-a344-0ecc526b2c8e.png)

  * in the source code, the action is highlighted with comments
  ```
  <!-- StartAction ControllerCommonHeader@index -->
  ...
  <!-- End Action ControllerCommonHeader@index -->
![image](https://user-images.githubusercontent.com/104227603/182028693-a604d5a5-5dfd-42ba-8551-4a37f8b978e0.png)

## Installation

1. from the upload folder move everything into the root of the project
2. in file /system/framework.php before:

    ```
   // Registry
   $registry = new Registry();
   ```
   insert:

   ```
   // Debug bar
   include_once(DIR_SYSTEM . 'library/debugBar/vendor/autoload.php');
   
   $registry->set('debugBar', \debugBar\Builder\DebugBarBuilder::getInstance());
    ```
3. clear modifications

Notice: the debugger will be displayed if you are authorized in the admin panel!

## Links

- [DKart](http://www.dkart.pro/)
 

