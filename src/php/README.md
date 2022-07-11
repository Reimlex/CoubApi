## Coub
###### Page link: https://coub.com/view/32h6cs.

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
###### Page link: https://coub.com/cinemagraphs.

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
$result = $CoubApi->getChannel('cinemagraphs', RETURN_ARRAY);
var_dump($result);
```


## Channel followers
```php
getChannelFollowers(
  int $ID,
  int $PAGE,
  int $PER_PAGE = 10,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$ID` - сhannel ID.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getChannelFollowers(2227934, 1, 10, RETURN_ARRAY);
var_dump($result);
```


## Channel Coubs
###### Page link: https://coub.com/cinemagraphs.

```php
getTimelineChannel(
  string $PERMALINK,
  string $TYPE,
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = ORDER_BY__NEWEST,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to the channel.
-   `$TYPE` - Coubs (`COUB`), Reposts (`RECOUBS`) or Stories (`STORIES`).
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ALL` - all channels.
-   `$ORDER_BY` - most recent (`ORDER_BY__NEWEST`), most liked (`ORDER_BY__LIKES_COUNT`), most viewed (`ORDER_BY__VIEWS_COUNT`), oldest (`ORDER_BY__OLDEST`) or random (`ORDER_BY__RANDOM`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineChannel('cinemagraphs', COUB, 1, 10, ORDER_BY__DATE, RETURN_ARRAY);
var_dump($result);
```


## Feed
###### Page link: https://coub.com/feed.

```php
getTimelineFeed(
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
$result = $CoubApi->getTimelineFeed('remember_token', 1, 10, RETURN_ARRAY);
var_dump($result);
```

## Story feed
###### Page link: https://coub.com/stories.

```php
getTimelineFeedStories(
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
$result = $CoubApi->getTimelineFeedStories('remember_token', 1, 10, RETURN_ARRAY);
var_dump($result);
```


## Likes
###### Page link: https://coub.com/likes.

```php
getTimelineLikes(
  string $REMEMBER_TOKEN,
  int $PAGE,
  int $PER_PAGE = 10,
  bool $ALL = true,
  string $ORDER_BY = ORDER_BY__DATE,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$REMEMBER_TOKEN` - coub.com account token.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ALL` - all channels.
-   `$ORDER_BY` - recent (`ORDER_BY__DATE`), top (`ORDER_BY__LIKES_COUNT`), views count (`ORDER_BY__VIEWS_COUNT`), oldest (`ORDER_BY__OLDEST`) or random (`ORDER_BY__RANDOM`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineLikes('remember_token', 1, 10, true, ORDER_BY__DATE, RETURN_ARRAY);
var_dump($result);
```

## Bookmarks
###### Page link: https://coub.com/bookmarks.

```php
getTimelineBookmarks(
  string $REMEMBER_TOKEN,
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = ORDER_BY__DATE,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$REMEMBER_TOKEN` - coub.com account token.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ALL` - all channels.
-   `$ORDER_BY` - recent (`ORDER_BY__DATE`), top (`ORDER_BY__LIKES_COUNT`), views count (`ORDER_BY__VIEWS_COUNT`), oldest (`ORDER_BY__OLDEST`) or random (`ORDER_BY__RANDOM`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineBookmarks('remember_token', 1, 10, true, ORDER_BY__DATE, RETURN_ARRAY);
var_dump($result);
```

## Hot
###### Page link: https://coub.com/hot.

```php
getTimelineHot(
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = ORDER_BY__DAILY,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ORDER_BY` - daily (`ORDER_BY__DAILY`), weekly (`ORDER_BY__WEEKLY`), monthly (`ORDER_BY__MONTHLY`), quarterly (`ORDER_BY__QUARTER`) or six months (`ORDER_BY__HALF`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineHot(1, 10, ORDER_BY__DATE, RETURN_ARRAY);
var_dump($result);
```

## Rising
###### Page link: https://coub.com/rising.

```php
getTimelineRising(
  int $PAGE,
  int $PER_PAGE = 10,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineRising(1, 10, RETURN_ARRAY);
var_dump($result);
```


## Fresh
###### Page link: https://coub.com/fresh.

```php
getTimelineFresh(
  int $PAGE,
  int $PER_PAGE = 10,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineFresh(1, 10, RETURN_ARRAY);
var_dump($result);
```

## Random
###### Page link: https://coub.com/random, https://coub.com/random/top.

```php
getTimelineRandom(
  int $PAGE, 
  int $PER_PAGE = 10,
  string $ORDER_BY = null,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   -   `$ORDER_BY` - popular (`null`) or top (`ORDER_BY__TOP`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).

### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineRandom(1, 10, null, RETURN_ARRAY);
var_dump($result);
```


## Community – Hot
###### Page link: https://coub.com/community/animals-pets.

```php
getTimelineCommunityHot(
  string $PERMALINK,
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = ORDER_BY__DAILY,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to сommunity.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ORDER_BY` - daily (`ORDER_BY__DAILY`), weekly (`ORDER_BY__WEEKLY`), monthly (`ORDER_BY__MONTHLY`), quarterly (`ORDER_BY__QUARTER`) or six months (`ORDER_BY__HALF`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineCommunityHot('animals-pets', 1, 10, ORDER_BY__DAILY, RETURN_ARRAY);
var_dump($result);
```


## Community – Rising
###### Page link: https://coub.com/community/animals-pets/rising.

```php
getTimelineCommunityRising(
  string $PERMALINK,
  int $PAGE,
  int $PER_PAGE = 10,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to сommunity.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineCommunityRising('animals-pets', 1, 10, RETURN_ARRAY);
var_dump($result);
```


## Community – Fresh
###### Page link: https://coub.com/community/animals-pets/fresh, https://coub.com/community/animals-pets/top, https://coub.com/community/animals-pets/views.

```php
getTimelineCommunityFresh(
  string $PERMALINK,
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = null,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PERMALINK` - short link to сommunity.
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ORDER_BY` - fresh (`null`), top (`ORDER_BY__TOP`) or views count (`ORDER_BY__VIEWS_COUNT`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getTimelineCommunityFresh('animals-pets', 1, 10, null, RETURN_ARRAY);
var_dump($result);
```


## Stories
###### Page link: https://coub.com/featured/stories, https://coub.com/featured/stories/likes.

```php
getStories(
  int $PAGE,
  int $PER_PAGE = 10,
  string $ORDER_BY = null,
  int $RETURN_MODE = RETURN_ARRAY
)
```

### Parameters
-   `$PAGE` - page number.
-   `$PER_PAGE` - number of coubs per page (from 1 to 25).
-   `$ORDER_BY` - recent (`null`) or views count (`ORDER_BY__LIKES_COUNT`).
-   `$RETURN_MODE` - returns the query result in an array (`RETURN_ARRAY`), object (`RETURN_OBJECT`) or json (`RETURN_JSON`).


### Example
```php
<?php
require 'CoubApi.php';
$CoubApi = new CoubApi();
$result = $CoubApi->getStories(1, 10, null, RETURN_ARRAY);
var_dump($result);
```
