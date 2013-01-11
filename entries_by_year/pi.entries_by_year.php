<?php
class Plugin_entries_by_year extends Plugin
{
    var $meta = array(
        'name'       => 'Entries By Year',
        'version'    => '0.1',
        'author'     => 'Dan Perrera',
        'author_url' => 'http://perrera.com'
    );

    function nav_list()
    {
        $app = \Slim\Slim::getInstance();

        $output = "";
        $template = '
        {{ if !no_results }}
            {{ if first }}
                <div class="year">

                    <h2>{{if eby_header_text }}{{ eby_header_text }} {{ endif }}{{ datestamp format="Y" }}</h2>

                    <ul>
            {{ endif }}

                        <li><a href="{{ url }}">{{ title }}</a></li>

            {{ if last }}
                    </ul>
                </div>
            {{ endif }}

        {{ endif }}
        ';

        $start_year = $this->fetch_param('start_year', 2001) - 1;
        $end_year = $this->fetch_param('end_year', date("Y"));

        // Grab each year between the end year and the start year
        // If no end year is declared, grab the current year
        // If no start year is declared, we'll go back to 2000
        for ($year = $end_year; $year > $start_year; $year--) {
            require_once('_app/statamic/core/entries/pi.entries.php');
            $entries = new Plugin_entries();
            $entries->attributes = array(
              'folder' => $this->fetch_param('folder', null),
              'since' => "January 1, " . $year . "00:00:00",
              'until' => "December 31, " . $year . "23:59:59",
              'show_future' => $this->fetch_param('show_future', 'no')
            );
            $entries->content = $template;

            $year_content = $entries->listing();

            if (!is_array($year_content)) {
                $output .= $entries->listing();
            }
        }

        return $output;
    }
}