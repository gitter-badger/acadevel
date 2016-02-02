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
    <link href="assets/css/toolkit-inverse.css" rel="stylesheet">
    <link href="assets/css/application.css" rel="stylesheet">

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
<div class="bw">
    <div class="fu">
        <div class="ge aom">
            <nav class="aot">
                <div class="aon">
                    <button class="amy amz aoo" type="button" data-toggle="collapse" data-target="#nav-toggleable-sm">
                        <span class="ct">Toggle nav</span>
                    </button>
                    <a href="/">
                        <img src="assets/img/logo.png" width="64" height="64" alt="shopware AG">
                    </a>
                </div>

                <div class="collapse and" id="nav-toggleable-sm">
                    <form class="aor">
                        <input class="form-control" type="text" placeholder="Suche...">
                        <button type="submit" class="fm">
                            <span class="bv adn"></span>
                        </button>
                    </form>
                    <ul class="nav of nav-stacked">

                        {foreach $menu as $item}

                            {if $item.type == "link"}
                                <li{if $item.active} class="active"{/if}>
                                    <a href="{$item.url}">{$item.label}</a>
                                </li>
                            {elseif $item.type == "category"}
                                <li class="tq">{$item.label}</li>
                            {/if}

                        {/foreach}

                    </ul>
                    <hr class="rw aky">
                </div>
            </nav>
        </div>
        <div class="hc aps">

            {block name="content"}

            <div class="apa">
                <div class="apb">
                    <h6 class="apd">Dashboards</h6>
                    <h2 class="apc">Dashboard</h2>
                </div>

                <div class="ob ape">
                    <div class="tn aol">
                        <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                        <span class="bv wt"></span>
                    </div>
                </div>
            </div>

            <hr class="aky">

            <div class="fu db aln">
                <div class="gi ali">
                    <div class="ako ale">
                        <canvas
                                class="ant"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-value="[{ value: 230, color: '#1ca8dd', label: 'Returning' }, { value: 130, color: '#1bc98e', label: 'New' }]"
                                data-segment-stroke-color="#252830">
                        </canvas>
                    </div>
                    <strong class="dh">Traffic</strong>
                    <h3>New vs Returning</h3>
                </div>
                <div class="gi ali">
                    <div class="ako ale">
                        <canvas
                                class="ant"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-value="[{ value: 330, color: '#1ca8dd', label: 'Recurring' }, { value: 30, color: '#1bc98e', label: 'New' }]"
                                data-segment-stroke-color="#252830">
                        </canvas>
                    </div>
                    <strong class="dh">Revenue</strong>
                    <h3>New vs Recurring</h3>
                </div>
                <div class="gi ali">
                    <div class="ako ale">
                        <canvas
                                class="ant"
                                width="200" height="200"
                                data-chart="doughnut"
                                data-value="[{ value: 100, color: '#1ca8dd', label: 'Referrals' }, { value: 260, color: '#1bc98e', label: 'Direct' }]"
                                data-segment-stroke-color="#252830">
                        </canvas>
                    </div>
                    <strong class="dh">Traffic</strong>
                    <h3>Direct vs Referrals</h3>
                </div>
            </div>

            <div class="anv alg ala">
                <h3 class="anw anx">Quick stats</h3>
            </div>

            <div class="fu apt">
                <div class="gq gg ala">
                    <div class="apu ano">
                        <div class="alz">
                            <span class="anj">Page views</span>
                            <h2 class="ani">
                                12,938
                                <small class="ank anl">5%</small>
                            </h2>
                            <hr class="ans akt">
                        </div>
                        {literal}
                        <canvas id="sparkline1" width="378" height="94" class="apv" data-chart="spark-line" data-value="[{data:[28,68,41,43,96,45,100]}]" data-labels="['a','b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                        {/literal}
                    </div>
                </div>
                <div class="gq gg ala">
                    <div class="apu anr">
                        <div class="alz">
                            <span class="anj">Downloads</span>
                            <h2 class="ani">
                                758
                                <small class="ank anm">1.3%</small>
                            </h2>
                            <hr class="ans akt">
                        </div>
                        {literal}
                        <canvas id="sparkline1" width="378" height="94" class="apv" data-chart="spark-line" data-value="[{data:[4,34,64,27,96,50,80]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                        {/literal}
                    </div>
                </div>
                <div class="gq gg ala">
                    <div class="apu anp">
                        <div class="alz">
                            <span class="anj">Sign-ups</span>
                            <h2 class="ani">
                                1,293
                                <small class="ank anl">6.75%</small>
                            </h2>
                            <hr class="ans akt">
                        </div>
                        {literal}
                            <canvas id="sparkline1" width="378" height="94" class="apv" data-chart="spark-line" data-value="[{data:[12,38,32,60,36,54,68]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                        {/literal}
                    </div>
                </div>
                <div class="gq gg ala">
                    <div class="apu anq">
                        <div class="alz">
                            <span class="anj">Downloads</span>
                            <h2 class="ani">
                                758
                                <small class="ank anm">1.3%</small>
                            </h2>
                            <hr class="ans akt">
                        </div>
                        {literal}
                        <canvas id="sparkline1" width="378" height="94" class="apv" data-chart="spark-line" data-value="[{data:[43,48,52,58,50,95,100]}]" data-labels="['a', 'b','c','d','e','f','g']" style="width: 189px; height: 47px;"></canvas>
                        {/literal}
                    </div>
                </div>
            </div>

            <hr class="aky">

            <div class="fu">
                <div class="gr ali">
                    <div class="by">
                        <h4 class="ty">
                            Countries
                        </h4>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 62.4%;"></span>
                            <span class="dy dh">62.4%</span>
                            United States
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 15.0%;"></span>
                            <span class="dy dh">15.0%</span>
                            India
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 5.0%;"></span>
                            <span class="dy dh">5.0%</span>
                            United Kingdom
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 5.0%;"></span>
                            <span class="dy dh">5.0%</span>
                            Canada
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 4.5%;"></span>
                            <span class="dy dh">4.5%</span>
                            Russia
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 2.3%;"></span>
                            <span class="dy dh">2.3%</span>
                            Mexico
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 1.7%;"></span>
                            <span class="dy dh">1.7%</span>
                            Spain
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 1.5%;"></span>
                            <span class="dy dh">1.5%</span>
                            France
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 1.4%;"></span>
                            <span class="dy dh">1.4%</span>
                            South Africa
                        </a>

                        <a class="ph" href="#">
                            <span class="tz" style="width: 1.2%;"></span>
                            <span class="dy dh">1.2%</span>
                            Japan
                        </a>

                    </div>
                    <a href="#" class="ce apn ame">All countries</a>
                </div>
                <div class="gr ali">
                    <div class="by">
                        <h4 class="ty">
                            Most visited pages
                        </h4>

                        <a class="ph" href="#">
                            <span class="dy dh">3,929,481</span>
                            / (Logged out)
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">1,143,393</span>
                            / (Logged in)
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">938,287</span>
                            /tour
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">749,393</span>
                            /features/something
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">695,912</span>
                            /features/another-thing
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">501,938</span>
                            /users/username
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">392,842</span>
                            /page-title
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">298,183</span>
                            /some/page-slug
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">193,129</span>
                            /another/directory/and/page-title
                        </a>

                        <a class="ph" href="#">
                            <span class="dy dh">93,382</span>
                            /one-more/page/directory/file-name
                        </a>

                    </div>
                    <a href="#" class="ce apn ame">View all pages</a>
                </div>
            </div>

            <div class="by">
                <h4 class="ty">
                    Devices and resolutions
                </h4>

                <a class="ph" href="#">
                    <span class="dy dh">3,929,481</span>
                    Desktop (1920x1080)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">1,143,393</span>
                    Desktop (1366x768)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">938,287</span>
                    Desktop (1440x900)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">749,393</span>
                    Desktop (1280x800)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">695,912</span>
                    Tablet (1024x768)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">501,938</span>
                    Tablet (768x1024)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">392,842</span>
                    Phone (320x480)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">298,183</span>
                    Phone (720x450)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">193,129</span>
                    Desktop (2560x1080)
                </a>

                <a class="ph" href="#">
                    <span class="dy dh">93,382</span>
                    Desktop (2560x1600)
                </a>

            </div>
            <a href="#" class="ce apn ame">View all devices</a>


            {/block}

        </div>
    </div>
</div>

<div id="docsModal" class="cb fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="ri">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Example modal</h4>
            </div>
            <div class="modal-body">
                <p>You're looking at an example modal in the dashboard theme.</p>
            </div>
            <div class="rj">
                <button type="button" class="ce fh" data-dismiss="modal">Cool, got it!</button>
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