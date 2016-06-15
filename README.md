Musixmatch api handeler (php)
===========================
Avaiable Method
===============
param() , for passing parameter to musixmatch api
status() , for getting api status codes explanation
find() , for getting result from api

Use
===
```php
<?php
require_once 'musixmatch.php';
$music = new musiXmatch("YOUR_API_KEY");
$music->param("track_id", "15445219");
var_dump($music->find("TRACK.GET"));
var_dump($music->status());
```

1. For JSON response use `$music->find("TRACK.GET","json")` or `$music->find("TRACK.GET")`.
2. For XML response use `$music->find("TRACK.GET","xml")`.

All API Methods are Avaiable in https://developer.musixmatch.com/documentation/api-methods. Just use method name as first argument in `find`. 
