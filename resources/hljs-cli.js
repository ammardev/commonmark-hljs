let hljs = require('highlight.js');

console.log(hljs.highlight(process.argv[2], {language: 'php'}).value);
