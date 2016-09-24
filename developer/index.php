<!DOCTYPE html>
<html>
  <head>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
    <script src="https://cdn.rawgit.com/google/code-prettify/master/src/prettify.js"></script>
    <link rel="stylesheet" href="https://cdn.rawgit.com/google/code-prettify/master/src/prettify.css" />
    <script src="https://anitklib.ml/js/jquery2.2.0.js"></script>
    <link rel="stylesheet" href="desert.css" />
    <link rel="icon" href="https://hostmystuff.ml/hosting/81403/Arrayshty.png" />
    <meta charset="utf-8">
    <title>Shty Developer</title>
  </head>
  <body>

    <h1>Shty API</h1>

    <p>jQuery</p>
    <h3>Short URL API</h3>
    <pre class="showcode prettyprint lang-js linenums:0" style="width:80%;height:auto;">
$.post('https://shty.ml/API/api',{ //Passing the url you want to be short by jQuery AJAX
  "url":"https://google.com", //Here you will put your user input here
  "method": "makeURL" //Short URL method is "makeURL"
},function(shtyoverview){
  console.log(shtyoverview); //There you will get back you shorted URL
});
    </pre>

    <h3>Overview API</h3>
    <pre class="showcode prettyprint lang-js linenums:0" style="width:80%;height:auto;">
$.post('https://shty.ml/API/api',{ //Passing the url you want to be short by jQuery AJAX
  "url":"https://shty.ml/?ftMiLrWfED", //Here you will put shty URL
  "method": "overview" //Short URL method is "overview"
},function(shtyoverview){
  console.log('My Shty URL Is: ' + shtyoverview.newURL); //Your new Shty URL
  console.log('My Old URL Is: ' + shtyoverview.orgURL); //Your old url like http://google.com
  console.log('Time to create this URL: ' + shtyoverview.create_time); //What is the create time
  console.log('How many clicks: ' + shtyoverview.clicks); //Show you how many clicks of this URL
  console.log('How many request: ' + shtyoverview.rqTime); //Show you how many request like &lt;img src=&quot;request by other site&quot;/&gt;
});
    </pre>


  </body>
</html>

<style>
*{
  padding: 0;
  margin: 0;
}

html{
  text-align: center;
}

pre{
  text-align: left;
  width: 50vw;
  margin: 0 auto;
}

</style>
