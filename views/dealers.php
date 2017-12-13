<?php
/**
 * Created by PhpStorm.
 * User: flori
 * Date: 11-12-2017
 * Time: 10:20
 */
// De stylesheet voor de cards
?>

<style>
    .card {
        position: relative;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -webkit-flex-direction: column;
        -ms-flex-direction: column;
        flex-direction: column;
        background-color: #fff;
        border: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .card-block {
        -webkit-box-flex: 1;
        -webkit-flex: 1 1 auto;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        padding: 1.25rem;
    }

    .card-title {
        margin-bottom: 0.75rem;
    }

    .card-subtitle {
        margin-top: -0.375rem;
        margin-bottom: 0;
    }

    .card-text:last-child {
        margin-bottom: 0;
    }

    .card-link:hover {
        text-decoration: none;
    }

    .card-link + .card-link {
        margin-left: 1.25rem;
    }

    .card > .list-group:first-child .list-group-item:first-child {
        border-top-right-radius: 0.25rem;
        border-top-left-radius: 0.25rem;
    }

    .card > .list-group:last-child .list-group-item:last-child {
        border-bottom-right-radius: 0.25rem;
        border-bottom-left-radius: 0.25rem;
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #f7f7f9;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-header:first-child {
        border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
    }

    .card-footer {
        padding: 0.75rem 1.25rem;
        background-color: #f7f7f9;
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }

    .card-footer:last-child {
        border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
    }

    .card-header-tabs {
        margin-right: -0.625rem;
        margin-bottom: -0.75rem;
        margin-left: -0.625rem;
        border-bottom: 0;
    }

    .card-header-pills {
        margin-right: -0.625rem;
        margin-left: -0.625rem;
    }

    .card-primary {
        background-color: #0275d8;
        border-color: #0275d8;
    }

    .card-primary .card-header,
    .card-primary .card-footer {
        background-color: transparent;
    }

    .card-success {
        background-color: #5cb85c;
        border-color: #5cb85c;
    }

    .card-success .card-header,
    .card-success .card-footer {
        background-color: transparent;
    }

    .card-info {
        background-color: #5bc0de;
        border-color: #5bc0de;
    }

    .card-info .card-header,
    .card-info .card-footer {
        background-color: transparent;
    }

    .card-warning {
        background-color: #f0ad4e;
        border-color: #f0ad4e;
    }

    .card-warning .card-header,
    .card-warning .card-footer {
        background-color: transparent;
    }

    .card-danger {
        background-color: #d9534f;
        border-color: #d9534f;
    }

    .card-danger .card-header,
    .card-danger .card-footer {
        background-color: transparent;
    }

    .card-outline-primary {
        background-color: transparent;
        border-color: #0275d8;
    }

    .card-outline-secondary {
        background-color: transparent;
        border-color: #ccc;
    }

    .card-outline-info {
        background-color: transparent;
        border-color: #5bc0de;
    }

    .card-outline-success {
        background-color: transparent;
        border-color: #5cb85c;
    }

    .card-outline-warning {
        background-color: transparent;
        border-color: #f0ad4e;
    }

    .card-outline-danger {
        background-color: transparent;
        border-color: #d9534f;
    }

    .card-inverse {
        color: rgba(255, 255, 255, 0.65);
    }

    .card-inverse .card-header,
    .card-inverse .card-footer {
        background-color: transparent;
        border-color: rgba(255, 255, 255, 0.2);
    }

    .card-inverse .card-header,
    .card-inverse .card-footer,
    .card-inverse .card-title,
    .card-inverse .card-blockquote {
        color: #fff;
    }

    .card-inverse .card-link,
    .card-inverse .card-text,
    .card-inverse .card-subtitle,
    .card-inverse .card-blockquote .blockquote-footer {
        color: rgba(255, 255, 255, 0.65);
    }

    .card-inverse .card-link:focus, .card-inverse .card-link:hover {
        color: #fff;
    }

    .card-blockquote {
        padding: 0;
        margin-bottom: 0;
        border-left: 0;
    }

    .card-img {
        border-radius: calc(0.25rem - 1px);
    }

    .card-img-overlay {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
    }

    .card-img-top {
        border-top-right-radius: calc(0.25rem - 1px);
        border-top-left-radius: calc(0.25rem - 1px);
    }

    .card-img-bottom {
        border-bottom-right-radius: calc(0.25rem - 1px);
        border-bottom-left-radius: calc(0.25rem - 1px);
    }

    @media (min-width: 576px) {
        .card-deck {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        .card-deck .card {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 0%;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
        }
        .card-deck .card:not(:first-child) {
            margin-left: 15px;
        }
        .card-deck .card:not(:last-child) {
            margin-right: 15px;
        }
    }
    @media (min-width: 576px) {
        .card-group {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-flow: row wrap;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap;
        }
        .card-group .card {
            -webkit-box-flex: 1;
            -webkit-flex: 1 0 0%;
            -ms-flex: 1 0 0%;
            flex: 1 0 0%;
        }
        .card-group .card + .card {
            margin-left: 0;
            border-left: 0;
        }
        .card-group .card:first-child {
            border-bottom-right-radius: 0;
            border-top-right-radius: 0;
        }
        .card-group .card:first-child .card-img-top {
            border-top-right-radius: 0;
        }
        .card-group .card:first-child .card-img-bottom {
            border-bottom-right-radius: 0;
        }
        .card-group .card:last-child {
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }
        .card-group .card:last-child .card-img-top {
            border-top-left-radius: 0;
        }
        .card-group .card:last-child .card-img-bottom {
            border-bottom-left-radius: 0;
        }
        .card-group .card:not(:first-child):not(:last-child) {
            border-radius: 0;
        }
        .card-group .card:not(:first-child):not(:last-child) .card-img-top,
        .card-group .card:not(:first-child):not(:last-child) .card-img-bottom {
            border-radius: 0;
        }
    }

    @media (min-width: 576px) {
        .card-columns {
            -webkit-column-count: 3;
            -moz-column-count: 3;
            column-count: 3;
            -webkit-column-gap: 1.25rem;
            -moz-column-gap: 1.25rem;
            column-gap: 1.25rem;
        }

        .card-columns .card {
            display: inline-block;
            width: 100%;
            margin-bottom: 0.75rem;
        }
    }
</style>
<!--HTML code voor de cards -->
<div style="padding-top:150px"></div>

<link rel="stylesheet" href="" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

<div class="container">
<div class="row">
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style= "width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Patmar Marknesse</h3>
                <p class="card-text">Hoge Sluiswal 47<br>
                    8316 AA Marknesse<br>
                    tel. 0527-612277, fax: 0527-620955<br>
                    info@patmar.nl --
                    www.patmar.nl<br>
                    Openingstijden:<br>
                    Maandag t/m Vrijdag: 10:00 tot 17:00<br>
                    Zaterdag: 09:00 tot 13:00
               </p>
                <a href="http://www.patmar.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style="width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Habridon Barneveld</h3>
                <p class="card-text">Pascalstraat 26<br>
                    3771 RT Barneveld<br>
                    tel. 0342-451352, fax: 0342-492463<br>
                    barneveld@a5deco.nl --
                    www.a5decobarneveld.nl<br>
                    Openingstijden:<br>
                    Maandag t/m Vrijdag: 9:00 tot 17:00<br>
                    Zaterdag: 9:00 tot 12:30</p>
                <a href="http://www.a5decobarneveld.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style="width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Deco Middelbeers </h3>
                <p class="card-text">Industrieweg 8<br>
                    5091 BG Middelbeers<br>
                    tel. 013-5141514, fax:013-514 39 29<br>
                    middelbeers@a5deco.nl --
                    www.a5decomiddelbeers.nl<br>
                    Openingstijden:<br>
                    Maandag: gesloten<br>
                    Dinsdag t/m Vrijdag: 13:00 tot 18:00<br>
                    Zaterdag: 10:00 tot 13:00</p>
                <a href="http://www.a5decomiddelbeers.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style="width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Patmar Meppel  </h3>
                <p class="card-text">Johan van Oldebarneveldstraat 3<br>
                    7942 GZ Meppel<br>
                    tel. 0522-244888 fax: 0522-243377<br>
                    oosterhout@a5deco.nl --
                    www.a5decooosterhout.nl<br>
                    Openingstijden:<br>
                    Maandag en Dinsdag: gesloten<br>
                    Woensdag t/m Vrijdag: 10:00 tot 18:00<br>
                    Zaterdag: 10:00 tot 16:00</p>
                <a href="http://www.patmar.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style="width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Deco Zwolle   </h3>
                <p class="card-text">Amperestraat 8<br>
                    8013PV te Zwolle<br>
                    tel. 0162-425777, fax: 0162-429023<br>
                    zwolle@a5deco.nl --
                    www.a5decozwolle.nl<br>
                    Openingstijden:<br>
                    Maandag: gesloten<br>
                    Dinsdag t/m Vrijdag van 10:00 tot 17:00<br>
                    Zaterdag van 10:00 tot 16:00</p>
                <a href="http://www.a5decozwolle.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 text-center dealer">
        <div class="card card-inverse card-info mb-3" style="width: 30rem;">
            <div class="card-block">
                <h3 class="card-title">A5 Deco Oosterhout</h3>
                <p class="card-text">De Boedingen 9/A<br>
                    4906 BA Oosterhout<br>
                    tel. 0162-425777, fax: 0162-429023<br>
                    oosterhout@a5deco.nl --
                    www.a5decooosterhout.nl<br>
                    Openingstijden:<br>
                    Maandag en Dinsdag: gesloten<br>
                    Woensdag t/m Vrijdag: 10:00 tot 18:00<br>
                    Zaterdag van 10:00 tot 16:00</p>
                <a href="http://www.a5decooosterhout.nl/" class="btn btn-primary">website</a>
            </div>
        </div>
    </div>
</div>
</div>
