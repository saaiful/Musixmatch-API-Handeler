Musixmatch API Handeler (php)
===============
This is a simple php class for handling Musixmatch api request.

DEPENDENCIES
------------
php 5.4 or higher

Avaiable Methods
-----------------------

- `param("name","value")` , for passing parameter to musixmatch api
- `status()` , for api status codes explanation based on api response
- `find("method_name","return_data_type")` , for getting result from api

Use
===
```php
<?php
require_once 'musixmatch.php';
$music = new musiXmatch("YOUR_API_KEY");
$music->param("track_id", "15445219");
var_dump($music->find("TRACK.GET"));
var_dump($music->status()); // 
```

1. For JSON response use `$music->find("TRACK.GET","json")` or `$music->find("TRACK.GET")`.
2. For XML response use `$music->find("TRACK.GET","xml")`.

All API Methods are Avaiable in https://developer.musixmatch.com/documentation/api-methods. Just use method name as first argument in `find` method. 
