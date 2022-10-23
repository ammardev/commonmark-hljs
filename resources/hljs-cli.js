let hljs = require('../vendor/npm-asset/highlight.js/lib/index');

console.log(hljs.highlightAuto(process.argv[2]).value);
