## Coub

```php
getCoub(
  string $PERMALINK,
  int $GET_FROM = GET_FROM_API,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to video.
-   `$GET_FROM` - pull data from API (`GET_FROM_API`) or video page (`GET_FROM_PAGE`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getCoub('32h6cs', GET_FROM_API, RETURN_ARRAY);
var_dump($result);
```


## Coub Segments

```php
getCoubSegments(
  string $PERMALINK,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to video.
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getCoubSegments('32h6cs', GET_FROM_API, RETURN_ARRAY);
vr_dump($result);
````


## Channel data

```php
getChannel(
  string $PERMALINK,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to the channel.
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getChannel('coubassistant', RETURN_ARRAY);
var_dump($result);
```


## Feed

```php
getFeed(
  string $REMEMBER_TOKEN,
  int $PAGE,
  int $PER_PAGE = 10,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$REMEMBER_TOKEN` - coub.com account token.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).



### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getFeed('remember_token', 1, 10, RETURN_ARRAY);
var_dump($result);
```
