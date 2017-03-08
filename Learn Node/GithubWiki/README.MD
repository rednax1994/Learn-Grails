Run the indexer:

node indexer.js 'https://wiki-url-prefix.com/' > 'whatever.json'


To test some queries (it uses the 'whatever.json' file as database):

node search.js 'keyword'