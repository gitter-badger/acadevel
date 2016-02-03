<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">

    <base href="{{asset('')}}">

    <title>Academy of Light &middot; shopware AG</title>

    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="assets/css/bootstrap3.min.css" rel="stylesheet">
    <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    <link href="assets/css/application.css" rel="stylesheet">
    <link href="assets/css/attendee.css" rel="stylesheet">

    <style>
        /* note: this is a hack for ios iframe for bootstrap themes shopify page */
        /* this chunk of css is not part of the toolkit :) */
        body {
            width: 1px;
            min-width: 100%;
            *width: 100%;
        }
    </style>
</head>
<body>

<div>

    <div class="container">
        <div class="row">
            <div class="col-sm-1">

            </div>
            <div class="col-sm-10">

                {block name="content"}


                {/block}
            </div>
            <div class="col-sm-1 text-right">
                <img src="assets/img/logo.png" width="64" height="64" alt="shopware AG">

            </div>
        </div>
    </div>

</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/chart.js"></script>
<script src="assets/js/tablesorter.min.js"></script>
<script src="assets/js/toolkit.js"></script>
<script src="assets/js/application.js"></script>
{literal}
<script>
    // execute/clear BS loaders for docs
    $(function(){while(window.BS&&window.BS.loader&&window.BS.loader.length){(window.BS.loader.pop())()}})
</script>
{/literal}
</body>
</html>