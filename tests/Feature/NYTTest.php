<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class NYTTest extends TestCase
{
    /**
     * A basic feature test example.
     * @return void
     */
    public function test_it_can_fetch_book_reviews()
    {

        Http::fake([
            'api/1/nyt/best-sellers' => Http::response($this->response_data(), 200),
        ]);
        $response = Http::get(url('api/1/nyt/best-sellers'));
        $this->assertJson($response);
        $data = json_decode($response, true);
        $this->assertArrayHasKey('status', $data);
    }

    /**
     * @return array
     */
    public function response_data(): array
    {
        return json_decode('{"status":"OK","copyright":"FAKE Copyright (c) 2022 The New York Times Company.  All Rights Reserved.","num_results":5,"results":[{"title":"#ASKGARYVEE","description":"The entrepreneur expands on subjects addressed on his Internet show, like marketing, management and social media.","contributor":"by Gary Vaynerchuk","author":"Gary Vaynerchuk","contributor_note":"","price":"0.00","age_group":"","publisher":"HarperCollins","isbns":[{"isbn10":"0062273124","isbn13":"9780062273123"},{"isbn10":"0062273132","isbn13":"9780062273130"}],"ranks_history":[{"primary_isbn10":"0062273124","primary_isbn13":"9780062273123","rank":5,"list_name":"Business Books","display_name":"Business","published_date":"2016-04-10","bestsellers_date":"2016-03-26","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":1},{"primary_isbn10":"0062273124","primary_isbn13":"9780062273123","rank":6,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2016-03-27","bestsellers_date":"2016-03-12","weeks_on_list":1,"rank_last_week":0,"asterisk":0,"dagger":1}],"reviews":[{"book_review_link":"","first_chapter_link":"","sunday_review_link":"","article_chapter_link":""}]},{"title":"CRUSH IT!","description":"How the Web can help turn your passion into a business.","contributor":"by Gary Vaynerchuk","author":"Gary Vaynerchuk","contributor_note":"","price":"19.99","age_group":"","publisher":"HarperStudio/HarperCollins","isbns":[],"ranks_history":[{"primary_isbn10":"0061914177","primary_isbn13":"9780061914171","rank":15,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2009-12-06","bestsellers_date":"2009-11-21","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":0},{"primary_isbn10":"0061914177","primary_isbn13":"9780061914171","rank":13,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2009-11-22","bestsellers_date":"2009-11-07","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":0},{"primary_isbn10":"0061914177","primary_isbn13":"9780061914171","rank":8,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2009-11-15","bestsellers_date":"2009-10-31","weeks_on_list":3,"rank_last_week":7,"asterisk":0,"dagger":1},{"primary_isbn10":"0061914177","primary_isbn13":"9780061914171","rank":7,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2009-11-08","bestsellers_date":"2009-10-24","weeks_on_list":2,"rank_last_week":2,"asterisk":0,"dagger":1}],"reviews":[{"book_review_link":"","first_chapter_link":"","sunday_review_link":"","article_chapter_link":""}]},{"title":"CRUSHING IT!","description":"","contributor":"by Gary Vaynerchuk","author":"Gary Vaynerchuk","contributor_note":"","price":"0.00","age_group":"","publisher":"HarperBusiness","isbns":[{"isbn10":"0062674676","isbn13":"9780062674678"},{"isbn10":"0062674692","isbn13":"9780062674692"}],"ranks_history":[{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":4,"list_name":"Business Books","display_name":"Business","published_date":"2018-04-15","bestsellers_date":"2018-03-31","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":9,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2018-03-18","bestsellers_date":"2018-03-03","weeks_on_list":5,"rank_last_week":6,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":1,"list_name":"Business Books","display_name":"Business","published_date":"2018-03-11","bestsellers_date":"2018-02-24","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":6,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2018-03-11","bestsellers_date":"2018-02-24","weeks_on_list":4,"rank_last_week":4,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":4,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2018-03-04","bestsellers_date":"2018-02-17","weeks_on_list":3,"rank_last_week":4,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":4,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2018-02-25","bestsellers_date":"2018-02-10","weeks_on_list":2,"rank_last_week":1,"asterisk":0,"dagger":1},{"primary_isbn10":"0062674676","primary_isbn13":"9780062674678","rank":1,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2018-02-18","bestsellers_date":"2018-02-03","weeks_on_list":1,"rank_last_week":0,"asterisk":0,"dagger":1}],"reviews":[{"book_review_link":"","first_chapter_link":"","sunday_review_link":"","article_chapter_link":""}]},{"title":"JAB, JAB, JAB, RIGHT HOOK","description":"Business tips on optimizing social media strategies.","contributor":"by Gary Vaynerchuk","author":"Gary Vaynerchuk","contributor_note":"","price":"0.00","age_group":"","publisher":"Harper Business","isbns":[{"isbn10":"006227306X","isbn13":"9780062273062"},{"isbn10":"0062273078","isbn13":"9780062273079"}],"ranks_history":[{"primary_isbn10":"006227306X","primary_isbn13":"9780062273062","rank":5,"list_name":"Business Books","display_name":"Business","published_date":"2014-01-12","bestsellers_date":"2013-12-28","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":1},{"primary_isbn10":"006227306X","primary_isbn13":"9780062273062","rank":4,"list_name":"Advice How-To and Miscellaneous","display_name":"Advice, How-To & Miscellaneous","published_date":"2013-12-15","bestsellers_date":"2013-11-30","weeks_on_list":1,"rank_last_week":0,"asterisk":0,"dagger":1}],"reviews":[{"book_review_link":"","first_chapter_link":"","sunday_review_link":"","article_chapter_link":""}]},{"title":"THANK YOU ECONOMY","description":"Tips on using social media tools to connect to customers.","contributor":"by Gary Vaynerchuk","author":"Gary Vaynerchuk","contributor_note":"","price":"24.99","age_group":"","publisher":"Harper Business/HarperCollins","isbns":[{"isbn10":"0061914185","isbn13":"9780061914188"}],"ranks_history":[{"primary_isbn10":"0061914185","primary_isbn13":"9780061914188","rank":15,"list_name":"Hardcover Business Books","display_name":"Hardcover Business Books","published_date":"2011-08-14","bestsellers_date":"2011-07-30","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":1},{"primary_isbn10":"0061914185","primary_isbn13":"9780061914188","rank":14,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2011-05-29","bestsellers_date":"2011-05-14","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":0},{"primary_isbn10":"0061914185","primary_isbn13":"9780061914188","rank":15,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2011-05-15","bestsellers_date":"2011-04-30","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":0},{"primary_isbn10":"0061914185","primary_isbn13":"9780061914188","rank":13,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2011-04-03","bestsellers_date":"2011-03-19","weeks_on_list":0,"rank_last_week":0,"asterisk":0,"dagger":0},{"primary_isbn10":"0061914185","primary_isbn13":"9780061914188","rank":2,"list_name":"Hardcover Advice","display_name":"Hardcover Advice & Misc.","published_date":"2011-03-27","bestsellers_date":"2011-03-12","weeks_on_list":1,"rank_last_week":0,"asterisk":0,"dagger":1}],"reviews":[{"book_review_link":"","first_chapter_link":"","sunday_review_link":"","article_chapter_link":""}]}]}', true);
    }
}
