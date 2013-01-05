# Statamic Plugin: Entries by Year

A Statamic plugin that sorts entries by year and lists them from most recent to oldest.

## Installation

Drop the `entries_by_year` folder into `_addons`.

## Usage
	
	{{ entries_by_year:nav_list }}
	
By default, the plugin will grab the current year and go back through the year 2000. You can use the `start_year` and `end_year` parameters. 


### Parameters
- `folder`
- `start_year`
- `end_year`

## Example

	{{ entries_by_year:nav_list folder="blog" start_year="2010" end_year="2012" }}
	
Will produce:
	
	<h2>2012</h2>
	<ul>
		<li><a href="/blog/most-recent-entry">Most Recent Entry</a></li>
		<li><a href="/blog/entry-five">Entry Eight</a></li>
		<li><a href="/blog/entry-seven">Entry Seven</a></li>
	</ul>
	
	<h2>2011</h2>
	<ul>
		<li><a href="/blog/entry-six">Entry Six</a></li>
		<li><a href="/blog/entry-five">Entry Five</a></li>
		<li><a href="/blog/entry-four">Entry Four</a></li>
	</ul>
	
	<h2>2010</h2>
	<ul>
		<li><a href="/blog/entry-three">Entry Three</a></li>
		<li><a href="/blog/entry-two">Entry Two</a></li>
		<li><a href="/blog/entry-one">Entry One</a></li>
	</ul>
	
## Say more

If you want to be a little bit more articulate than just spitting out the year before each `ul` you can include the variable `eby_header_text` in your `theme.yaml` file. For example: 
	
	eby_header_text: "Articles from"
	
Will produce:

	<h2>Articles from 2012</h2>
	<ul>
		...
	</ul>
	
Big thanks to Mr. [Statamicist](http://statamicist.com) himself, [Fred LeBlanc](http://fredhq.com) for all his help.
	
		



