<?php
/*
 * CoubApi is a library for using the coub.com API
 * Version: 1.0.0
 * Author: Reimlex
 * 
 * GitHub: https://github.com/Reimlex/CoubApi
*/

define('RETURN_ARRAY', 0);
define('RETURN_OBJECT', 1);
define('RETURN_JSON', 2);

define('GET_FROM_API', 0);
define('GET_FROM_PAGE', 1);

define('ORDER_BY__DATE', 'date');
define('ORDER_BY__OLDEST', 'oldest');
define('ORDER_BY__RANDOM', 'random');
define('ORDER_BY__LIKES_COUNT', 'likes_count');
define('ORDER_BY__VIEWS_COUNT', 'views_count');
define('ORDER_BY__NEWEST', 'newest');
define('ORDER_BY__NEWEST_POPULAR', 'newest_popular');
define('ORDER_BY__DAILY', 'daily');
define('ORDER_BY__WEEKLY', 'weekly');
define('ORDER_BY__MONTHLY', 'monthly');
define('ORDER_BY__QUARTER', 'quarter');
define('ORDER_BY__HALF', 'half');
define('ORDER_BY__TOP', 'top');
define('ORDER_BY__TOP_OF_THE_MONTH', 'top_of_the_month');
define('ORDER_BY__UNDERVALUED', 'undervalued');


define('COUB', 'simples');
define('RECOUBS', 'recoubs');
define('STORIES', 'stories');

class CoubApi
{
    public function getCoub(string $PERMALINK, int $GET_FROM = GET_FROM_API, int $RETURN_MODE = RETURN_ARRAY)
    {
        switch ($GET_FROM) {
            case 0:
                return $this->returnType($this->sendRequest('http://coub.com/api/v2/coubs/' . $PERMALINK), $RETURN_MODE);
            case 1:
                preg_match_all('@<script id=\'coubPageCoubJson\' type=\'text/json\'>(.+?)</script>@ms', $this->sendRequest('https://coub.com/view/' . $PERMALINK), $json, PREG_SET_ORDER, 0);
                return $this->returnType($json[0][1], $RETURN_MODE);
            default:
                return null;
        }
    }

    public function getChannel(string $PERMALINK, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('http://coub.com/api/v2/channels/' . $PERMALINK), $RETURN_MODE);
    }

    public function getChannelFollowings(int $ID, int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/action_subjects_data/followings_list', [
            'id' => $ID,
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ]), $RETURN_MODE);
    }

    public function getChannelFollowers(int $ID, int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/action_subjects_data/followers_list', [
            'id' => $ID,
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ]), $RETURN_MODE);
    }


    public function getTimelineChannel(string $PERMALINK, string $TYPE, int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = ORDER_BY__NEWEST, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/channel/' . $PERMALINK, [
            'type' => $TYPE,
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => $ORDER_BY
        ]), $RETURN_MODE);
    }

    public function getFeaturedChannels(int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/channels/featured_channels', [
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
        ]), $RETURN_MODE);
    }

    public function getTimelineFeed(string $REMEMBER_TOKEN, int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline', [
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ], $REMEMBER_TOKEN), $RETURN_MODE);
    }

    public function getTimelineFeedStories(string $REMEMBER_TOKEN, int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/stories', [
            'type' => STORIES,
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ], $REMEMBER_TOKEN), $RETURN_MODE);
    }

    public function getTimelineLikes(string $REMEMBER_TOKEN, int $PAGE, int $PER_PAGE = 10, bool $ALL = true, string $ORDER_BY = ORDER_BY__DATE, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/likes', [
            'all' => $ALL,
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => $ORDER_BY
        ], $REMEMBER_TOKEN), $RETURN_MODE);
    }

    public function getTimelineBookmarks(string $REMEMBER_TOKEN, int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = ORDER_BY__DATE, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/favourites', [
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => $ORDER_BY
        ], $REMEMBER_TOKEN), $RETURN_MODE);
    }

    public function getTimelineHot(int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = ORDER_BY__DAILY, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest(
            'https://coub.com/api/v2/timeline/subscriptions/' . $ORDER_BY,
            [
                'page' => $PAGE,
                'per_page' => $PER_PAGE
            ]
        ), $RETURN_MODE);
    }

    public function getTimelineRising(int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/subscriptions/rising', [
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ]), $RETURN_MODE);
    }

    public function getTimelineFresh(int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/subscriptions/fresh', [
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ]), $RETURN_MODE);
    }

    public function getTimelineRandom(int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = null, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/timeline/explore/random', [
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => isset($ORDER_BY) ? $ORDER_BY : ''
        ]), $RETURN_MODE);
    }

    public function getTimelineCommunityHot(string $PERMALINK, int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = ORDER_BY__DAILY, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest(
            "https://coub.com/api/v2/timeline/community/$PERMALINK/$ORDER_BY",
            [
                'page' => $PAGE,
                'per_page' => $PER_PAGE
            ]
        ), $RETURN_MODE);
    }

    public function getTimelineCommunityRising(string $PERMALINK, int $PAGE, int $PER_PAGE = 10, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest("https://coub.com/api/v2/timeline/community/$PERMALINK/rising", [
            'page' => $PAGE,
            'per_page' => $PER_PAGE
        ]), $RETURN_MODE);
    }

    public function getTimelineCommunityFresh(string $PERMALINK, int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = null, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest("https://coub.com/api/v2/timeline/community/$PERMALINK/fresh", [
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => isset($ORDER_BY) ? $ORDER_BY : ''
        ]), $RETURN_MODE);
    }

    public function getTimelineCoubOfTheDay(int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = null, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest("https://coub.com/api/v2/timeline/explore/coub_of_the_day", [
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => isset($ORDER_BY) ? $ORDER_BY : ''
        ]), $RETURN_MODE);
    }

    public function getTimelineFeatured(int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = null, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest("https://coub.com/api/v2/timeline/explore", [
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => isset($ORDER_BY) ? $ORDER_BY : ''
        ]), $RETURN_MODE);
    }

    public function getTags(string $PERMALINK, int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = ORDER_BY__NEWEST_POPULAR, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest("https://coub.com/api/v2/timeline/tag/$PERMALINK", [
            'scope' => 'all',
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => $ORDER_BY
        ]), $RETURN_MODE);
    }


    public function getStories(int $PAGE, int $PER_PAGE = 10, string $ORDER_BY = null, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/stories/featured', [
            'scope' => 'all',
            'type' => STORIES,
            'page' => $PAGE,
            'per_page' => $PER_PAGE,
            'order_by' => isset($ORDER_BY) ? $ORDER_BY : ''
        ]), $RETURN_MODE);
    }


    public function getSearchLogs(string $REMEMBER_TOKEN, int $RETURN_MODE = RETURN_ARRAY)
    {
        return $this->returnType($this->sendRequest('https://coub.com/api/v2/search_logs', null, $REMEMBER_TOKEN), $RETURN_MODE);
    }

    protected function sendRequest($URL, $QUERY = null, $REMEMBER_TOKEN = null)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $URL . (isset($QUERY) ? '?' . http_build_query($QUERY) : ''));
        if (isset($REMEMBER_TOKEN)) curl_setopt($curl, CURLOPT_COOKIE, 'remember_token=' . $REMEMBER_TOKEN);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_TIMEOUT, 15);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    protected function returnType(string $value, int $RETURN_MODE)
    {
        switch ($RETURN_MODE) {
            case 0:
                return json_decode($value, true);
                break;
            case 1:
                return json_decode($value, false);
                break;
            case 2:
                return $value;
                break;
            default:
                return null;
        }
    }
}
