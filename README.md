# DebugBar + VarDumper for Opencart

Tested on version 3.0.3.3

## Installation

1. from the upload folder move everything into the root of the project
2. install debugger.ocmod.xml
3. in file /system/startup.php insert:

    ```
    // Register for debugging
    include_once(modification(DIR_SYSTEM . 'library/varDumper/autoload.php'));
    
    // Debug bar
    if (DEBUG) {
        $_SERVER['arrayDEBUG'] = array();
    }

## Links

- [DKart](http://www.dkart.pro/)
