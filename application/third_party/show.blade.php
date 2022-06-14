@extends('layouts.app')

@section('title', 'Analytic')

@section('content')
    <div class="page-breadcrumb">
        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ __('Project Analisis Data: ') }}
            {{ $key }}</h3>
    </div>
    <div class="d-none" id="key">{{ $key }}</div>
    <div class="container-fluid">
        {{-- <div class="custom-tab-2">
            <ul class="nav nav-tabs nav-bordered border-0 mb-3 pt-3 ml-4 mr-3" role="tablist">
                <li class="nav-item ">
                    <a class="nav-link active pl-1 pb-3 mr-3" href="#socialMedia" role="tab" data-toggle="tab">
                        <h6>{{ __('Twitter') }}</h6>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link pl-1 pb-3 mr-3" href="#agendaSetting" role="tab" data-toggle="tab">
                        <h6>{{ __('Instagram') }}</h6>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link pl-1 pb-3 mr-3" href="#strategiKomunikasi" role="tab" data-toggle="tab">
                        <h6>{{ __('Facebook') }}</h6>
                    </a>
                </li>
            </ul>
        </div> --}}
        <div class="card mt-3 rounded-m filter">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6 class="font-weight-bold">{{ __('Filter') }}</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                        <label for="date_from"><small>Date Start</small></label>
                        <input class="form-control" type="date" name="date_from" id="date_from">
                    </div>
                    <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                        <label for="date_until"><small>Date End</small></label>
                        <input class="form-control" type="date" name="date_until" id="date_until">
                    </div>
                    <div class="col-6 col-lg-3 col-md-4 col-sm-6">
                        <div class="ml-0" style="position: static">
                            <button id="btn_filter" class="btn btn-secondary btn-block"
                                style="position: absolute; bottom:0">Filter</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="search-result">
            <div class="summary-box card mt-3 rounded-m">
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <div>
                            <h4 class="font-weight-bold">Summary</h4>
                        </div>
                        <div>
                            <i class="fas fa-ellipsis-v"></i>
                        </div>
                    </div>
                    <div class="text-center loader"><img src="{{ asset('assets/img/ajax-loader2.gif') }}" alt="spinner">
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="card ">
                                    <div class="card-body d-flex">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                            <i class="fa-stack-1x far fa-comments text-white" style="font-size: 1.5rem"></i>
                                        </span>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_reaction"></h5>
                                            <small>Total Reaction</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="card ">
                                    <div class="card-body d-flex">
                                        <div class="card-icon rounded-circle bg-blue my-auto">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                                <i class="fa-stack-1x  fas fa-comment text-white"
                                                    style="font-size: 1.5rem"></i>
                                            </span>
                                        </div>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_tweet"></h5>
                                            <small>Total Tweet</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-lg-3 col-md-4 col-sm-6">
                                <div class="card ">
                                    <div class="card-body d-flex">
                                        <div class="card-icon rounded-circle  my-auto">
                                            <span class="fa-stack fa-2x">
                                                <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                                <i class="fa-stack-1x far fa-thumbs-up text-white"
                                                    style="font-size: 1.5rem"></i>
                                            </span>
                                        </div>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_like"></h5>
                                            <small>Like</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-3 col-lg-3 col-sm-4">
                                <div class="card ">
                                    <div class="card-body p-3 d-flex">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                            <i class="fa-stack-1x fas fa-retweet text-white" style="font-size: 1rem"></i>
                                        </span>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_retweet"></h5>
                                            <small>Retweet</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-4">
                                <div class="card ">
                                    <div class="card-body p-3 d-flex">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                            <i class="fa-stack-1x fas fa-at text-white" style="font-size: 1rem"></i>
                                        </span>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_mention"></h5>
                                            <small>Mentions</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-4">
                                <div class="card ">
                                    <div class="card-body p-3 d-flex">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                            <i class="fa-stack-1x fas fa-users text-white" style="font-size: 1rem"></i>
                                        </span>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="total_public"></h5>
                                            <small>Public</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-lg-3 col-sm-4">
                                <div class="card ">
                                    <div class="card-body p-3 d-flex">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x text-secondary"></i>
                                            <i class="fa-stack-1x fas fa-users text-white" style="font-size: 1rem"></i>
                                        </span>
                                        <div class="ml-3 card-text mt-2">
                                            <h5 class="font-weight-bold text-dark mb-1" id="profile"></h5>
                                            <small>Profile</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-md-3 col-lg-3 col-sm-4">
                            <div class="card ">
                                <div class="card-body p-3 d-flex">
                                    <div class="card-icon rounded-circle bg-blue my-auto">
                                        <i class="fas fa-globe text-white p-2"
                                            style="font-size: 1rem; line-height:1rem"></i>
                                    </div>
                                    <div class="ml-3 card-text mt-2">
                                        <h5 class="font-weight-bold text-dark mb-1" id="sites"></h5>
                                        <small>Sites</small>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card mt-3 rounded-m" id="sentimentCard">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-0">
                            <div>
                                <h4 class="font-weight-bold mb-0">Trend Social Media</h4>
                            </div>
                            <div>
                                <i class="fas fa-ellipsis-v"></i>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <small>by Tweet, Mention, Retweet, Like, Reaction</small>
                                <button type="button" class="btn" data-toggle="popover" data-placement="bottom"
                                    title="Informations!"
                                    data-content="this diagram illustrates the number of tweets, mentions , likes, retweets , and reactions calculated by date">
                                    <i class="fas fa-info-circle"></i></button>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown ml-3">
                                    <button class="btn btn-outline-light text-dark dropdown-toggle p-1 font-10"
                                        type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">March 2020<i class="far fa-calendar ml-1"></i>
                                    </button>
                                    {{-- <div class="dropdown-menu" aria-labelledby="filterDropdown">
                                        <a class="dropdown-item" href="#">Media Sosial</a>
                                        <a class="dropdown-item" href="#">Tier</a>
                                    </div> --}}
                                </div>
                                <div class="border rounded ml-3 pl-1 pr-1">
                                    <div class="dropdown dropleft">
                                        <button class="btn text-dark dropdown-toggle p-1 font-10" type="button"
                                            id="varDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="0"
                                                    id="sentimentTweet" name="sentimentFilter" checked>&nbsp;
                                                <label class="form-check-label" for="sentimentTweet">Tweet</label></a>
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="1" checked
                                                    id="sentimentLike" name="sentimentFilter">&nbsp;
                                                <label class="form-check-label" for="sentimentLike">Like</label></a>
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="2" checked
                                                    id="sentimentRetweet" name="sentimentFilter">&nbsp;
                                                <label class="form-check-label" for="sentimentRetweet">Retweet</label></a>
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="3"
                                                    id="sentimentMention" name="sentimentFilter">&nbsp;
                                                <label class="form-check-label" for="sentimentMention">Mention</label>
                                            </a>
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="4"
                                                    id="sentimentReaction" name="sentimentFilter">&nbsp;
                                                <label class="form-check-label" for="sentimentReaction">Reaction</label></a>
                                            <a class="dropdown-item" href="#"><input type="checkbox" value="5"
                                                    id="sentimentHastag" name="sentimentFilter">&nbsp;
                                                <label class="form-check-label" for="sentimentHastag">Hastag</label></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="body"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12 col-12">
                    <div class="card mt-3 rounded-m " id="trendSentimentCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-0">
                                <div>
                                    <h4 class="font-weight-bold mb-0">Trend Sentiment Analysis</h4>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>

                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div>
                                    <small>by Sentiment Negatif, Positif and Netral</small>
                                    <button type="button" class="btn" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="this diagram illustrates the number of sentiment negative , positive and neutral calculated by date">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <div class="d-flex">
                                    <div class="dropdown ml-3">
                                        <button class="btn btn-outline-light text-dark dropdown-toggle p-1 font-10"
                                            type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">March 2020<i class="far fa-calendar ml-1"></i>
                                        </button>
                                        {{-- <div class="dropdown-menu" aria-labelledby="filterDropdown">
                                            <a class="dropdown-item" href="#">Media Sosial</a>
                                            <a class="dropdown-item" href="#">Tier</a>
                                        </div> --}}
                                    </div>
                                    <div class="border rounded ml-3 pl-1 pr-1">
                                        <div class="dropdown dropleft">
                                            <button class="btn text-dark dropdown-toggle p-1 font-10" type="button"
                                                id="varDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false"><i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                                <a class="dropdown-item" href="#"><input type="checkbox" value="0" checked
                                                        id="tsaPositif" name="tsaFilter">&nbsp;
                                                    <label class="form-check-label" for="tsaPositif">Positif</label></a>
                                                <a class="dropdown-item" href="#"><input type="checkbox" value="1" checked
                                                        id="tsaNetral" name="tsaFilter">&nbsp;
                                                    <label class="form-check-label" for="tsaNetral">Netral</label></a>
                                                <a class="dropdown-item" href="#"><input type="checkbox" value="2" checked
                                                        id="tsaNegatif" name="tsaFilter">&nbsp;
                                                    <label class="form-check-label" for="tsaNegatif">Negatif</label></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pl-3">
                <div class="col-lg-8 card rounded-m">
                    <div class="card-body" id="activityDayCard">
                        <div class="d-flex justify-content-between mb-0">
                            <div>
                                <h4 class="font-weight-bold mb-0">Chart Social Media in Day</h4>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <small>by Tweet, Mention, Retweet, Like, Reaction</small>
                                <button type="button" class="btn" data-toggle="popover" data-placement="bottom"
                                    title="Informations!"
                                    data-content="This diagram illustrates the number of tweets, mentions, likes, retweets, reactions that are calculated by day">
                                    <i class="fas fa-info-circle"></i></button>
                            </div>
                            <div class="dropdown dropleft">
                                <button class="btn text-dark dropdown-toggle p-1 font-10" type="button" id="varDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                        class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                    <a class="dropdown-item" href="#"><input type="checkbox" value="0" checked
                                            id="cadTweet" name="cadFilter">&nbsp;
                                        <label class="form-check-label" for="cadTweet">Tweet</label></a>
                                    <a class="dropdown-item" href="#"><input type="checkbox" value="1" id="cadLike"
                                            name="cadFilter">&nbsp;
                                        <label class="form-check-label" for="cadLike">Like</label></a>
                                    <a class="dropdown-item" href="#"><input type="checkbox" value="2" id="cadRetweet"
                                            name="cadFilter">&nbsp;
                                        <label class="form-check-label" for="cadRetweet">Retweet</label></a>
                                    <a class="dropdown-item" href="#"><input type="checkbox" value="3" id="cadMention"
                                            name="cadFilter">&nbsp;
                                        <label class="form-check-label" for="cadMention">Mention</label></a>
                                    <a class="dropdown-item" href="#"><input type="checkbox" value="4" id="cadReaction"
                                            name="cadFilter">&nbsp;
                                        <label class="form-check-label" for="cadReaction">Reaction</label></a>
                                </div>
                            </div>

                        </div>
                        <div class="body"></div>

                    </div>
                </div>
                <div class=" col-lg-4">
                    <div class="col-lg-12">
                        <div class="card rounded-m " id="activityPieCard">
                            <div class="card-body">
                                <div class="mb-3">
                                    <button type="button" class="btn" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="Represent the percentage between negative, positive and neutral sentiments.">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <canvas id="activityPieChart" height="250"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 d-flex">
                        <div class="col-4 p-0 m-1">
                            <div class="bg-white rounded-m shadow-sm text-center p-2 mb-2">
                                <small>Positif</small>
                                <h5 id="total_positif"></h5>
                            </div>
                        </div>
                        <div class="col-4 p-0 m-1">
                            <div class="bg-white rounded-m shadow-sm text-center p-2 mb-2">
                                <small>Netral</small>
                                <h5 id="total_netral"></h5>
                            </div>
                        </div>
                        <div class="col-4 p-0 m-1">
                            <div class="bg-white rounded-m shadow-sm text-center p-2 mb-2">
                                <small>Negatif</small>
                                <h5 id="total_negatif"></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card mt-3 rounded-m " id="trendAnalysisCard">
                    <div class="card-body ">
                        <div class="d-flex justify-content-between mb-0">
                            <div>
                                <h4 class="font-weight-bold mb-0">Comparison Trend Social Media</h4>
                            </div>
                            <div>
                                <div class="dropdown dropleft">
                                    <button class="btn text-dark dropdown-toggle p-1 font-10" type="button"
                                        id="varDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                        <a class="dropdown-item" href="#"><input type="radio" value="0" checked
                                                id="tauTweet" name="tauFilter">&nbsp;
                                            <label class="form-check-label" for="tauTweet">Tweet</label></a>
                                        <a class="dropdown-item" href="#"><input type="radio" value="1" id="tauLike"
                                                name="tauFilter">&nbsp;
                                            <label class="form-check-label" for="tauLike">Like</label></a>
                                        <a class="dropdown-item" href="#"><input type="radio" value="2" id="tauRetweet"
                                                name="tauFilter">&nbsp;
                                            <label class="form-check-label" for="tauRetweet">Retweet</label></a>
                                        <a class="dropdown-item" href="#"><input type="radio" value="3" id="tauMention"
                                                name="tauFilter">&nbsp;
                                            <label class="form-check-label" for="tauMention">Mention</label></a>
                                        <a class="dropdown-item" href="#"><input type="radio" value="4" id="tauReaction"
                                                name="tauFilter">&nbsp;
                                            <label class="form-check-label" for="tauReaction">Reaction</label></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <small>by Tweet, Mention, Retweet, Like, Reacton, Negative, Neutral, and
                                    Positive</small>
                                <button type="button" class="btn" data-toggle="popover" data-placement="bottom"
                                    title="Informations!"
                                    data-content="This diagram compares the trend on each topic based on tweets, retweets, likes, reactions, mentions, neutral sentiments, positive sentiments, or negative sentiments.">
                                    <i class="fas fa-info-circle"></i></button>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown ml-3">
                                    <button class="btn btn-outline-light text-dark dropdown-toggle p-1 font-10"
                                        type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">March 2020<i class="far fa-calendar ml-1"></i>
                                    </button>
                                    {{-- <div class="dropdown-menu" aria-labelledby="filterDropdown">
                                        <a class="dropdown-item" href="#">Media Sosial</a>
                                        <a class="dropdown-item" href="#">Tier</a>
                                    </div> --}}
                                </div>
                                {{-- <div class="border rounded ml-3 pl-1 pr-1">
                                    <i class="fas fa-ellipsis-h"></i>
                                </div> --}}
                            </div>
                        </div>
                        <div class="body">

                        </div>

                    </div>
                </div>
            </div>
            <div>
                <div class="card mt-3 rounded-m" id="analysisiCompareCard">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-0">
                            <div>
                                <h4 class="font-weight-bold mb-0">Comparison Chart Analysis User</h4>
                            </div>
                            <div>
                                <div class="dropdown dropleft">
                                    <button class="btn text-dark dropdown-toggle p-1 font-10" type="button"
                                        id="varDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Tweet</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Mention</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Like</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Retweet</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Reaction</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Positif</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Neutral</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Negatif</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-1">
                            <div>
                                <small>by Tweet , Mention , Retweet, Like , Reacton, Negative, Neutral ,
                                    Positive</small>
                                <button type="button" class="btn" data-toggle="popover" data-placement="bottom"
                                    title="Informations!"
                                    data-content="This chart compares the totals for each topic by tweet, mention, like, retweet or reactiontweet.">
                                    <i class="fas fa-info-circle"></i></button>
                            </div>
                            <div class="d-flex">
                                <div class="dropdown ml-3">
                                    <button class="btn btn-outline-light text-dark dropdown-toggle p-1 font-10"
                                        type="button" id="filterDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">March 2020<i class="far fa-calendar ml-1"></i>
                                    </button>
                                    {{-- <div class="dropdown-menu" aria-labelledby="filterDropdown">
                                        <a class="dropdown-item" href="#">Media Sosial</a>
                                        <a class="dropdown-item" href="#">Tier</a>
                                    </div> --}}
                                </div>
                                {{-- <div class="border rounded ml-3 pl-1 pr-1">
                                    <i class="fas fa-ellipsis-h"></i>
                                </div> --}}
                            </div>
                        </div>
                        <div class="body"></div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3 rounded-m">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="font-weight-bold">Topic Cloud</h4>
                                <button type="button" class="btn ml-2 p-0" data-toggle="popover" data-placement="bottom"
                                    title="Informations!"
                                    data-content="This chart compares the totals for each topic by tweet, mention, like, retweet or reactiontweet.">
                                    <i class="fas fa-info-circle"></i></button>
                            </div>
                            <div class="word-cloud mx-auto"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="card mt-3 rounded-m" id="topPublicSosmedCard">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <h4 class="font-weight-bold">Table Social Media</h4>
                            </div>
                            <div>
                                <div class="dropdown dropleft">
                                    <button class="btn text-dark dropdown-toggle p-1 font-10" type="button"
                                        id="varDropdown" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"><i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown">
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Tweet</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Mention</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Like</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Retweet</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Reaction</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Following</a>
                                        <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp;
                                            Follower Count</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div id="topPublicSosmedCardLoad"></div>
                        <div id="topPublicSosmedCard" style="max-height:500px; overflow:scroll"></div>
                        <div id="topPublicSosmedPag" class="d-flex justify-content-end mt-2"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="topHasatagCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit;">Top Hastag
                                        Indonesia</h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="Is a trending hashtag in Indonesia, get data when scrapping">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">#</th>
                                        <th style="width: 55%">Hastag</th>
                                        {{-- <th style="width: 30%">Total Post</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="body-top-hastag">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="topHasatagCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="topSearchCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit;">Top Hastag By
                                        Search</h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="Is a trending hashtag on the topic you are looking for, by calculating the highest number of hashtags in the topic data">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">#</th>
                                        <th style="width: 55%">Hastag</th>
                                        <th style="width: 30%">Total Post</th>
                                    </tr>
                                </thead>
                                <tbody id="body-top-hastag-search">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="topSearchCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="mostInfluentialCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit">Most Influential
                                        Sites</h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="is a site that is often shared on tweets"><i
                                            class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 15%">#</th>
                                        <th style="width: 55%">Hastag</th>
                                        <th style="width: 30%">Total Post</th>
                                    </tr>
                                </thead>
                                <tbody id="body-influential-sites">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="mostInfluentialCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="mostActiveCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit">Most Active User
                                        Profile</h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="Is a User Profile that has the highest number of tweets (tweets), Note: User Profile is a user who has less than 3000 followers">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Pic</th>
                                        <th style="width: 35%">Username</th>
                                        <th style="width: 25%">Followers</th>
                                        <th style="width: 30%">Tweets</th>
                                    </tr>
                                </thead>
                                <tbody id="body-most-active-profile">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="mostActiveCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="mostActivePublicCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3" style="table-layout: fixed; width: 100%;">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit">Most Active
                                        Public
                                        Profile</h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="popover"
                                        data-placement="bottom" title="Informations!"
                                        data-content="Is a Public Profile that has the highest number of tweets (most active), note: Public Profile is a user who has followers more than or equal to 3000">
                                        <i class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Pic</th>
                                        <th style="width: 35%">Username</th>
                                        <th style="width: 25%">Total</th>
                                        <th style="width: 30%">Followers</th>
                                    </tr>
                                </thead>
                                <tbody id="body-most-active-public">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="mostActivePublicCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="card mt-3 rounded-m" id="topPublicProfileCard">
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-3">
                                <div class="d-flex">
                                    <h4 class="font-weight-bold mb-0 pb-0" style="line-height: inherit">Top Public
                                        Profile
                                    </h4>
                                    <button type="button" class="btn ml-2 p-0" data-toggle="tooltip"
                                        data-placement="bottom" title="Is a profile that has high followers"
                                        data-content="Is a profile that has high followers"><i
                                            class="fas fa-info-circle"></i></button>
                                </div>
                                <div>
                                    <i class="fas fa-ellipsis-v"></i>
                                </div>
                            </div>
                            <table class="table table-striped table-custom3" style="table-layout: fixed; width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">Pic</th>
                                        <th style="width: 60%">Username</th>
                                        <th style="width: 30%">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="body-top-public-profile">

                                </tbody>
                            </table>
                            <div class="body"></div>
                            <div id="topPublicProfileCardPag" class="d-flex justify-content-end mt-2"></div>
                        </div>
                    </div>
                </div>

            </div>
            {{-- <div> --}}
            {{-- <div class="card mt-3 rounded-m"> --}}
            {{-- <div class="card-body"> --}}
            {{-- <div class="d-flex justify-content-between mb-3"> --}}
            {{-- <div> --}}
            {{-- <h4 class="font-weight-bold">Ranger Buzer</h4> --}}
            {{-- </div> --}}
            {{-- <div> --}}
            {{-- <div class="dropdown dropleft"> --}}
            {{-- <button class="btn text-dark dropdown-toggle p-1 font-10" type="button" --}}
            {{-- id="varDropdown" --}}
            {{-- data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i --}}
            {{-- class="fas fa-ellipsis-v"></i> --}}
            {{-- </button> --}}
            {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="varDropdown"> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Followers</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total Tweet</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total User Likes </a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total User Friends</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Created User</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total Negative</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total Netral</a> --}}
            {{-- <a class="dropdown-item" href="#"><input type="checkbox" name="checkbox">&nbsp; --}}
            {{-- Total Positive</a> --}}
            {{-- </div> --}}
            {{-- </div> --}}

            {{-- </div> --}}
            {{-- </div> --}}
            {{-- <table class="table table-striped table-custom3"> --}}
            {{-- <thead> --}}
            {{-- <tr> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- <th class="border-0"></th> --}}
            {{-- </tr> --}}
            {{-- </thead> --}}
            {{-- <tbody> --}}
            {{-- <tr> --}}
            {{-- <td><img class="m-auto rounded-circle" src="{{ asset('assets/images/users/1.jpg') }}" --}}
            {{-- alt="icon"> --}}
            {{-- </td> --}}
            {{-- <td> --}}
            {{-- <p> --}}
            {{-- Profile --}}
            {{-- </p> --}}
            {{-- </td> --}}
            {{-- <td> --}}
            {{-- <div> --}}
            {{-- <p>50.50%</p> --}}
            {{-- <small>Date</small> --}}
            {{-- </div> --}}
            {{-- </td> --}}
            {{-- <td> --}}
            {{-- <div> --}}
            {{-- <p>#oke, #sipp, #hastagg, #dicoba, #aja, #bumn, #testing</p> --}}
            {{-- <small>Hastag</small> --}}
            {{-- </div> --}}
            {{-- </td> --}}
            {{-- <td> --}}
            {{-- <div> --}}
            {{-- <p>50.50%</p> --}}
            {{-- <small>Followers</small> --}}
            {{-- </div> --}}
            {{-- </td> --}}
            {{-- <td> --}}
            {{-- <div> --}}
            {{-- <p>100.000</p> --}}
            {{-- <small>Total Tweet</small> --}}
            {{-- </div> --}}
            {{-- </td> --}}
            {{-- </tr> --}}
            {{-- </tbody> --}}
            {{-- </table> --}}
            {{-- </div> --}}
            {{-- </div> --}}
            {{-- </div> --}}
        </div>

    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.css"
        integrity="sha512-QmxybGIvkSI8+CGxkt5JAcGOKIzHDqBMs/hdemwisj4EeGLMXxCm9h8YgoCwIvndnuN1NdZxT4pdsesLXSaKaA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('js')
    {{-- <script src="{{ asset('/assets/libs/chart.js/dist/Chart.min.js') }}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Resources -->
    <script src="https://d3js.org/d3.v3.min.js"></script>
    <script src="https://rawgit.com/jasondavies/d3-cloud/master/build/d3.layout.cloud.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js"
        integrity="sha512-1zzZ0ynR2KXnFskJ1C2s+7TIEewmkB2y+5o/+ahF7mwNj9n3PnzARpqalvtjSbUETwx6yuxP5AJXZCpnjEJkQw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('/assets/libs/moment/min/moment.min.js') }}"></script>
    {{-- searching --}}
    <script>
        // window.location.href = "{{ route('maintenance') }}";
        let ip = 'http://103.15.226.105:4000/api/v1/';
        let loader =
            '<div class="text-center loader"><img src="{{ asset('assets/img/ajax-loader2.gif') }}" alt="spinner"></div>';
        // var keyword = encodeURIComponent($('#key').text());
        var keyword = $('#key').text();

        var option = {
            plugins: {
                legend: {
                    display: true,
                    position: "bottom",
                    // verticalAlign: "left",
                    labels: {
                        fontColor: "black",
                        boxWidth: 20,
                        padding: 20
                    }
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    type: 'linear',
                    grace: '10%'
                }
            },
            title: {
                display: false,
            }
        }

        // $.ajax({
        //     type: 'get',
        //     url: ip + '/twitter/scrap?keyword=' + keyword,
        // });

        let today = moment().format('YYYY-MM-DD');
        let onemonthago = moment().subtract(1, 'month').format('YYYY-MM-DD');

        $.ajax({
            type: 'post',
            url: ip + 'project/summary',
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            success: function(data) {
                // console.log(data.data[0]);
                // console.log(data.result[0].hashtag_count);
                $(".summary-box .loader").addClass('d-none');
                $(".summary-box .body").removeClass('d-none');
                $('.summary-box #total_reaction').html(Number(data.data[0].total_reaction)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_tweet').html(Number(data.data[0].total_tweet)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_like').html(Number(data.data[0].total_favorite)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_retweet').html(Number(data.data[0].total_retweet)
                    .toLocaleString("id-ID"))
                $('.summary-box #profile').html(Number(data.data[0].total_profile)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_mention').html(Number(data.data[0].total_mention)
                    .toLocaleString("id-ID"))
                $('#total_public').html(Number(data.data[0].total_public)
                    .toLocaleString("id-ID"))
            },
        });

        // Add Dataset
        function addData(chart, label, color, data, border) {
            chart.data.datasets.push({
                label: label,
                backgroundColor: color,
                data: data,
                borderColor: border,
                fill: false,
                pointRadius: 5,
                pointHitRadius: 4,
                pointHoverRadius: 10
            });
            chart.update();
        }

        // let labels = ['Tweet', 'Like', 'Retweet', 'Mention', 'Reaction', 'Hastag']
        var color1 = ['#00B6CB', '#FFA800', '#EAAF81', '#2A82E2', '#994579', '#5E35B1']
        // ['Positif', 'Netral', 'Negatif']
        var color2 = ['#C2F092', '#109CF1', '#FF5555']

        function removeData(chart, label, data) {
            chart.data.datasets.pop();
            chart.update();
        }


        $.ajax({
            type: 'post',
            url: ip + 'project/sentiment-count',
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            success: function(data) {
                let netral, positif, negatif
                $.each(data.data, function(index, value) {
                    if (value.sentiment == 0) {
                        $('#total_netral').html(Number(value.total_tweet)
                            .toLocaleString("id-ID"))
                        netral = value.total_tweet
                    } else if (value.sentiment == 1) {
                        $('#total_positif').html(Number(value.total_tweet)
                            .toLocaleString("id-ID"))
                        positif = value.total_tweet
                    } else {
                        $('#total_negatif').html(Number(value.total_tweet)
                            .toLocaleString("id-ID"))
                        negatif = value.total_tweet
                    }
                })




                var activityPieChart = new Chart(document.getElementById("activityPieChart"), {
                    type: 'pie',
                    data: {
                        labels: ['Positif', 'Netral', 'Negatif'],
                        datasets: [{
                            fill: true,
                            backgroundColor: [
                                "#C2F092",
                                "#109CF1",
                                "#FF5555",
                            ],
                            pointBorderColor: "#fff",
                            pointBackgroundColor: "rgba(116, 96, 238,1)",
                            data: [positif, netral, negatif]
                        }, ]
                    },
                    options: option,
                });
            }
        });
        // Trend Social Media
        $.ajax({
            type: 'post',
            url: ip + "project/count-daily",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#sentimentCard .body').html(loader)
                $('#activityPieCard .card-body').append(loader)
                $('#activityPieCard #activityPieChart').addClass('d-none')
            },
            success: function(data) {
                $('#sentimentCard .body').html(
                    '<canvas id="sentimentStatistic" height="120"></canvas>')
                $('#activityPieCard .loader').addClass('d-none')
                $('#activityPieCard #activityPieChart').removeClass('d-none')
                var tanggal = [],
                    tweet = [],
                    likes = [],
                    retweet = [],
                    hashtag = [],
                    mention = [],
                    reaction = []
                $.each(data.data, function(index, value) {
                    // var date = value.date.replace(/\-/g, "/");
                    // var d = new Date(date.split("/").reverse().join("-"));
                    // tanggal[index] = d.getDate() + " " + d.toLocaleString('id-ID', {
                    //     month: 'long'
                    // });
                    tanggal[index] = value.date
                    tweet[index] = value.total_tweet
                    likes[index] = value.total_favorite
                    retweet[index] = value.total_retweet
                    hashtag[index] = value.daily_hashtag
                    mention[index] = value.total_mention
                    reaction[index] = value.total_reaction
                });
                var sentimentStatistic = document.getElementById('sentimentStatistic')
                    .getContext(
                        '2d');
                var gradientFill1 = sentimentStatistic.createLinearGradient(500, 0, 100, 0);
                gradientFill1.addColorStop(0, 'rgba(248, 170, 186, 0.29)');
                gradientFill1.addColorStop(1, 'rgba(248, 170, 186, 0)');

                var gradientFill2 = sentimentStatistic.createLinearGradient(500, 0, 100, 0);
                gradientFill2.addColorStop(0, 'rgba(102, 211, 224, 0.24)');
                gradientFill2.addColorStop(1, 'rgba(196, 196, 196, 0)');

                var gradientFill3 = sentimentStatistic.createLinearGradient(500, 100, 0, 0);
                gradientFill3.addColorStop(0, 'rgba(128, 158, 199, 0.23)');
                gradientFill3.addColorStop(1, 'rgba(196, 196, 196, 0)');
                var sentimentStatistic = new Chart(sentimentStatistic, {
                    type: 'line',
                    data: {
                        labels: tanggal,
                        datasets: [{
                                label: 'Tweet',
                                fill: false,
                                backgroundColor: "#00B6CB",
                                borderColor: "#00B6CB",
                                data: tweet,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10
                            },
                            {
                                label: 'Like',
                                fill: false,
                                backgroundColor: "#FFA800",
                                borderColor: "#FFA800",
                                data: likes,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10
                            },
                            {
                                label: 'Retweet',
                                fill: false,
                                backgroundColor: "#EAAF81",
                                borderColor: "#EAAF81",
                                data: retweet,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10
                            },
                            // {
                            //     label: 'Hashtag',
                            //     fill: true,
                            //     backgroundColor: gradientFill1,
                            //     pointBorderColor: "#fff",
                            //     borderColor: 'purple',
                            //     data: hashtag,
                            //     tension: 0.1
                            // },
                            // {
                            //     label: 'Mention',
                            //     fill: true,
                            //     backgroundColor: gradientFill2,
                            //     pointBorderColor: "#fff",
                            //     borderColor: "#3C6AA9",
                            //     data: mention,
                            //     tension: 0.1
                            // },
                            // {
                            //     label: 'Reaction',
                            //     fill: true,
                            //     backgroundColor: gradientFill3,
                            //     pointBorderColor: "#fff",
                            //     borderColor: "#3C6AA9",
                            //     data: reaction,
                            //     tension: 0.1
                            // },
                        ]
                    },
                    options: option
                });
                $('input[name="sentimentFilter"]').on('change', function() {
                    let data = [tweet, likes, retweet, mention, reaction, hashtag]
                    let labels = ['Tweet', 'Like', 'Retweet', 'Mention', 'Reaction', 'Hastag']
                    let color = [gradientFill1, gradientFill2, gradientFill3, gradientFill1,
                        gradientFill2, gradientFill3
                    ]
                    let border = ['pink', 'blue', 'grey', 'red', 'black', 'salmon']
                    if ($(this).is(':checked')) {
                        let val = $(this).val();
                        addData(sentimentStatistic, labels[val], color1[val], data[val], color1[val]);
                    } else {
                        let valnot = $(this).val();
                        removeData(sentimentStatistic, labels[valnot], data[valnot]);
                    }
                })
            },
            complete: function() { // Set our complete callback, adding the .hidden class and hiding the spinner.
                $('#sentimentCard .loader').addClass('d-none')
            },
        })

        // Trend Sentiment Statistic
        $.ajax({
            type: 'post',
            url: ip + "project/count-daily-sentiment",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#trendSentimentCard .body').html(loader)
            },
            success: function(data) {
                // console.log(data);
                $('#trendSentimentCard .body').html(
                    '<canvas id="trendSentimentStatistic" height="120"></canvas>')
                var tanggal = [],
                    netral = [],
                    positif = [],
                    negatif = []
                $.each(data, function(index, value) {
                    // var date = value.tweet_date.replace(/\-/g, "/");
                    // var d = new Date(date.split("/").reverse().join("-"));
                    // tanggal[index] = d.getDate() + " " + d.toLocaleString('id-ID', {
                    //     month: 'long'
                    // });
                    tanggal[index] = value.date_str;
                    $.each(value.sentiment, function(index, result) {
                        if (result.sentiment == 0) {
                            netral.push(result.Total_Tweet)
                        } else if (result.sentiment == 1) {
                            positif.push(result.Total_Tweet)
                        } else {
                            negatif.push(result.Total_Tweet)
                        }
                    });
                });
                var trendSentiment = document.getElementById('trendSentimentStatistic')
                    .getContext(
                        '2d');
                var gradientFill1 = trendSentiment.createLinearGradient(500, 0, 100, 0);
                gradientFill1.addColorStop(0, 'rgba(248, 170, 186, 0.29)');
                gradientFill1.addColorStop(1, 'rgba(248, 170, 186, 0)');

                var gradientFill2 = trendSentiment.createLinearGradient(500, 0, 100, 0);
                gradientFill2.addColorStop(0, 'rgba(102, 211, 224, 0.24)');
                gradientFill2.addColorStop(1, 'rgba(196, 196, 196, 0)');

                var gradientFill3 = trendSentiment.createLinearGradient(500, 100, 0, 0);
                gradientFill3.addColorStop(0, 'rgba(128, 158, 199, 0.23)');
                gradientFill3.addColorStop(1, 'rgba(196, 196, 196, 0)');

                var trendSentiment = new Chart(trendSentiment, {
                    type: 'line',
                    data: {
                        labels: tanggal,
                        datasets: [{
                                label: 'Positive',
                                fill: false,
                                backgroundColor: '#C2F092',
                                borderColor: "#C2F092",
                                data: positif,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10
                            }, {
                                label: 'Neutral',
                                fill: false,
                                backgroundColor: '#109CF1',
                                borderColor: "#109CF1",
                                data: netral,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10
                            },
                            {
                                label: 'Negatif',
                                fill: false,
                                backgroundColor: '#FF5555',
                                borderColor: "#FF5555",
                                data: negatif,
                                pointRadius: 5,
                                pointHitRadius: 4,
                                pointHoverRadius: 10

                            },
                        ]
                    },
                    options: option
                });
                $('input[name="tsaFilter"]').on('change', function() {
                    let data = [positif, netral, negatif]
                    let labels = ['Positif', 'Netral', 'Negatif']
                    let color = [gradientFill1, gradientFill2, gradientFill3]
                    let border = ['pink', 'blue', 'grey']
                    if ($(this).is(':checked')) {
                        let val = $(this).val();
                        addData(trendSentiment, labels[val], color2[val], data[val], color2[val]);
                    } else {
                        let valnot = $(this).val();
                        removeData(trendSentiment, labels[valnot], data[valnot]);
                    }
                })
            }
        })

        // Activity by Day
        $.ajax({
            type: 'post',
            url: ip + "project/count-day",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#activityDayCard .body').html(loader)
            },
            success: function(data) {
                // console.log(data);
                $('#activityDayCard .body').html(
                    '<canvas id="activityDayStatistic" height="150"></canvas>')
                var day = [],
                    tweet = [],
                    likes = [],
                    retweet = [],
                    hashtag = [],
                    mention = [],
                    reaction = []
                $.each(data.data, function(index, value) {
                    day[index] = value.week_day
                    tweet[index] = value.total_tweet
                    likes[index] = value.total_favorite
                    retweet[index] = value.total_retweet
                    hashtag[index] = value.hashtag
                    mention[index] = value.total_mention
                    reaction[index] = value.total_reaction
                });
                var activityDayStatistic = new Chart(document.getElementById(
                    "activityDayStatistic"), {
                    type: 'bar',
                    data: {
                        labels: day,
                        datasets: [{
                                label: 'Tweet',
                                fill: true,
                                backgroundColor: '#00B6CB',
                                pointBorderColor: "#fff",
                                pointBackgroundColor: "rgba(116, 96, 238,1)",
                                data: tweet,
                            },
                            // {
                            //     label: 'Retweet',
                            //     fill: true,
                            //     backgroundColor: '#66D3E0',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: retweet,
                            // },
                            // {
                            //     label: 'Reaction',
                            //     fill: true,
                            //     backgroundColor: 'salmon',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: reaction,
                            // },
                            // {
                            //     label: 'Like',
                            //     fill: true,
                            //     backgroundColor: 'green',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: likes,
                            // },
                            // {
                            //     label: 'Mention',
                            //     fill: true,
                            //     backgroundColor: 'blue',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: mention,
                            // },
                        ]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom',
                            },
                            title: {
                                display: false,
                            }
                        }
                    },
                });
                $('input[name="cadFilter"]').on('change', function() {
                    let data = [tweet, likes, retweet, mention, reaction, hashtag]
                    let labels = ['Tweet', 'Like', 'Retweet', 'Mention', 'Reaction', 'Hastag']
                    if ($(this).is(':checked')) {
                        let val = $(this).val();
                        addData(activityDayStatistic, labels[val], color1[val], data[val], color1[
                            val]);
                    } else {
                        let valnot = $(this).val();
                        removeData(activityDayStatistic, labels[valnot], data[valnot]);
                    }
                })
            }
        });

        // Comparison Chart Analysis User
        $.ajax({
            type: 'post',
            url: ip + "project/compare",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#analysisiCompareCard .body').html(loader)
            },
            success: function(data) {
                // console.log(data);
                $('#analysisiCompareCard .body').html(
                    '<canvas id="chartAnalysisUser" height="120"></canvas>')
                var id = [],
                    tweet = [],
                    likes = [],
                    retweet = [],
                    hashtag = [],
                    mention = [],
                    reaction = []
                $.each(data.data, function(index, value) {
                    id[index] = value.keyword
                    tweet[index] = value.total_tweet
                    likes[index] = value.total_favorite
                    retweet[index] = value.total_retweet
                    hashtag[index] = value.hashtag_count
                    mention[index] = value.total_mention
                    reaction[index] = value.total_reaction
                });
                var chartAnalysisUser = new Chart(document.getElementById(
                    "chartAnalysisUser"), {
                    type: 'bar',
                    data: {
                        labels: id,
                        datasets: [{
                                label: 'Tweet',
                                fill: true,
                                backgroundColor: '#00B6CB',
                                pointBorderColor: "#fff",
                                pointBackgroundColor: "rgba(116, 96, 238,1)",
                                data: tweet
                            },
                            // {
                            //     label: 'Tweet',
                            //     fill: true,
                            //     backgroundColor: '#66D3E0',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: tweet
                            // },
                            // {
                            //     label: 'Mention',
                            //     fill: true,
                            //     backgroundColor: 'orange',
                            //     pointBorderColor: "#fff",
                            //     pointBackgroundColor: "rgba(116, 96, 238,1)",
                            //     data: mention
                            // },
                        ]
                    },
                    options: option
                });
                // Ini belum
                // $('input[name="tauFilter"]').on('change', function() {
                //     let data = [tweet, likes, retweet, mention, reaction, hashtag]
                //     let labels = ['Tweet', 'Like', 'Retweet', 'Mention', 'Reaction', 'Hastag']
                //     let color = ['pink', 'blue', 'grey', 'purple', 'salmon', 'green']
                //     let border = ['pink', 'blue', 'grey', 'purple', 'salmon', 'green']
                //     if ($(this).is(':checked')) {
                //         let val = $(this).val();
                //         addData(chartAnalysisUser, labels[val], color[val], data[val], border[val]);
                //     } else {
                //         let valnot = $(this).val();
                //         removeData(chartAnalysisUser, labels[valnot], data[valnot]);
                //     }
                // })
            }
        });

        // Top Hastag Indonesia
        $.ajax({
            type: 'post',
            url: ip + "project/trending-topic",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#topHasatagCard .body').html(loader)
            },
            success: function(data) {
                $('#topHasatagCard .body').addClass('d-none')
                var box = $('#topHasatagCardPag');

                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result += '<tr><td scope="row"><p>' + (index + 1) +
                                '</p></td>' +
                                '<td><p>' + value.name + '</p></td>' +
                                '</p></div></tr>'
                        });

                        $('#body-top-hastag').html(result)
                    }
                })
            }
        })

        // Top Hastag Search
        $.ajax({
            type: 'post',
            url: ip + "project/top-hashtag",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#topSearchCard .body').html(loader)
            },
            success: function(data) {
                $('#topSearchCard .body').addClass('d-none')

                var box = $('#topSearchCardPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result += '<tr><td scope="row"><p>' + (index + 1) +
                                '</p></td>' +
                                '<td><p>' + value.lower + '</p></td>' +
                                '<td><div><p>' + value.sum +
                                '</p></div></tr>';
                        });

                        $('#body-top-hastag-search').html(result)
                    }
                })
            }
        })

        // Influentieal Sites
        $.ajax({
            type: 'post',
            url: ip + "project/top-site",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#mostInfluentialCard .body').html(loader)
            },
            success: function(data) {
                $('#mostInfluentialCard .body').addClass('d-none')
                var box = $('#mostInfluentialCardPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result += '<tr><td scope="row"><p>' + (index + 1) +
                                '</p></td>' +
                                '<td><p>' + value['Total Sites'] + '</p></td>' +
                                '<td><div><p>' + value.sum + '</p></div></tr>';
                        });
                        $('#body-influential-sites').html(result)
                    }
                })

            }
        })

        // Most Active Profile
        $.ajax({
            type: 'post',
            url: ip + "project/top-profile-active",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#mostActiveCard .body').html(loader)
            },
            success: function(data) {
                $('#mostActiveCard .body').addClass('d-none')
                var box = $('#mostActiveCardPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result +=
                                '<tr><td scope="row"><img class="rounded-circle" src="' +
                                value.profile_image +
                                '" alt="avatar" width="40"></td>' +
                                '<td><p>' + value['User Profile'] + '</p></td>' +
                                '<td><div><p>' + value['Total Followers'] +
                                '</p></div></td><td><div><p>' + value['Total Tweet'] +
                                '</p></div></td></tr>';
                        });
                        $('#body-most-active-profile').html(result)
                    }
                })

            }
        })

        // Most Active Public Profile
        $.ajax({
            type: 'post',
            url: ip + "project/top-public-active",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#mostActivePublicCard .body').html(loader)
            },
            success: function(data) {
                $('#mostActivePublicCard .body').addClass('d-none')
                var box = $('#mostActivePublicCardPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result +=
                                '<tr><td scope="row"><img class="rounded-circle" src="' +
                                value.profile_image +
                                '" alt="avatar" width="40"></td>' +
                                '<td><p>' + value['User Public'] + '</p></td>' +
                                '<td><div><p>' + value['Total Tweet'] +
                                '</p></div></td><td><div><p>' + value['Total Followers'] +
                                '</p></div></td></tr>';
                        });
                        $('#body-most-active-public').html(result)
                    }
                })
            }
        })

        // Top public Profile
        $.ajax({
            type: 'post',
            url: ip + "project/top-public-profile",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#topPublicProfileCard .body').html(loader)
            },

            success: function(data) {
                $('#topPublicProfileCard .body').addClass('d-none')
                var box = $('#topPublicProfileCardPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 10,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result +=
                                '<tr><td scope="row"><img class="rounded-circle" src="' +
                                value.profile_image +
                                '" alt="avatar" width="40"></td>' +
                                '<td><p>' + value.user_screen_name + '</p></td>' +
                                '</td><td><div><p>' + value.user_followers_count +
                                '</p></div></td></tr>';
                        });
                        $('#body-top-public-profile').html(result)
                    }
                })
            }
        })

        //Table Social Media Analysis 
        $.ajax({
            type: 'post',
            url: ip + "project/tweet-daily",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#topPublicSosmedCardLoad').html(loader)
            },
            success: function(data) {
                $('#topPublicSosmedCardLoad').addClass('d-none')
                var box = $('#topPublicSosmedPag');
                box.pagination({
                    dataSource: data.data,
                    locator: 'items',
                    totalNumber: 10,
                    pageSize: 5,
                    showPageNumbers: false,
                    showNavigator: true,
                    showFirstOnEllipsisShow: true,
                    showLastOnEllipsisShow: true,
                    ajax: {
                        beforeSend: function() {
                            box.prev().html('Loading...');
                        }
                    },
                    callback: function(response, pagination) {
                        var result = '';

                        $.each(response, function(index, value) {
                            result += `<a  href="../top_profile/${value.profile}">
                                                <div class="card gedf-card rounded-m border">
                                                    <div class="card-header bg-transparent">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="mr-2">
                                                                    <img class="rounded-circle" width="45" src="${value.image_url}" alt="avatar">
                                                                </div>
                                                                <div class="ml-2">
                                                                    <div class="m-0 text-dark">${value.profile}</div>
                                                                    <div class="sentiment_post"></div>`

                            if (value.sentiment == 1 || value.sentiment == '1') {
                                result +=
                                    `<small class="card-link badge-pill badge-success">Positive</small>`

                            } else if (value.sentiment == '2' || value.sentiment == 2) {
                                result +=
                                    ' <small class="card-link badge-pill badge-danger">Negative</small>'
                            } else {
                                result +=
                                    '<small class="card-link badge-pill badge-secondary"> Netral </small>'
                            }
                            result += `</div>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted mb-2"> <i class="fas fa-clock mr-1"></i>${value.date}</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body font-14">
                                                    <p class="card-text">
                                                    ${value.text}
                                                    </p>
                                                </div>
                                                <div class="card-footer rounded-m">
                                                    <a href="#" class="card-link text-danger"><i class="fas fa-heart"></i> ${value.likes}</a>
                                                    <a href="#" class="card-link text-info"><i class="fas fa-retweet"></i> ${value.retweet}</a>
                                                </div>
                                            </div></a>`
                        });

                        box.prev().html(result);
                    }
                })
            }
        })

        // wordcloud
        $.ajax({
            type: 'post',
            url: ip + "project/wordcloud",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('.word-cloud').html(loader)
            },
            success: function(data) {
                console.log(data);
                $('.word-cloud .loader').addClass('d-none')
                var myWords = data.data
                var sizeWord = []
                $.each(data.data, function(index, value) {
                    sizeWord[index] = value.sum
                })
                var max = Math.max(...sizeWord)
                // console.log(max);
                var fixSize = []
                $.each(sizeWord, function(index, value) {
                    fixSize[index] = value / max * 100
                })

                var fill = d3.scale.category20();
                // set the dimensions and margins of the graph

                var margin = {
                        top: 10,
                        right: 10,
                        bottom: 10,
                        left: 10
                    },
                    width = 800 - margin.left - margin.right,
                    height = 450 - margin.top - margin.bottom;

                // append the svg object to the body of the page
                var svg = d3.select(".word-cloud").append("svg")
                    .attr("width", width + margin.left + margin.right)
                    .attr("height", height + margin.top + margin.bottom)
                    .attr('class', 'mx-auto d-block')
                    .append("g")
                    .attr("transform",
                        "translate(" + margin.left + "," + margin.top + ")");

                var layout = d3.layout.cloud()
                    .size([width, height])
                    .words(myWords.map(function(d) {
                        size = d.sum * 100 / max
                        console.log(size);
                        return {
                            text: d.wordcloud,
                            size: size
                        };
                    }))
                    .padding(5) //space between words
                    .rotate(function() {
                        return ~~(Math.random() * 2) * 90;
                    })
                    .fontSize(function(d) {
                        // console.log(d.size);
                        return d.size;
                    }) // font size of words
                    .on("end", draw);
                layout.start();

                function draw(words) {
                    svg
                        .append("g")
                        .attr("transform", "translate(" + layout.size()[0] / 2 + "," + layout
                            .size()[1] / 2 + ")")
                        .selectAll("text")
                        .data(words)
                        .enter().append("text")
                        .style("font-size", function(d) {
                            return (d.size) + "px";
                            // return fontSizeScale(d.size / max)
                        })
                        .style("fill", function(d, i) {
                            return fill(i);
                        })
                        .attr("text-anchor", "middle")
                        .style("font-family", "sans-serif")
                        .attr("transform", function(d) {
                            return "translate(" + [d.x, d.y] + ")rotate(" + d.rotate + ")";
                        })
                        .text(function(d) {
                            return d.text;
                        });
                }
            }
        })

        // Trend Analysis User
        $.ajax({
            type: 'post',
            url: ip + "project/count-compare",
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": onemonthago,
                "end_date": today,
                "sentiment": "0,1,2"
            }),
            beforeSend: function() {
                $('#trendAnalysisCard .body').html(loader)
            },
            success: function(data) {
                $('#trendAnalysisCard .body').html(
                    '<canvas id="trendAnalysisUserStatistic" height="120"></canvas>')
                let tanggal = [],
                    tweet = [],
                    likes = [],
                    mention = [],
                    retweet = [],
                    reaction = [],
                    hashtag = [];
                    // console.log(data[0].keyword);
                $.each(data, function(index, value) {
                    // var date = value.replace(/\-/g, "/");
                    // var d = new Date(date.split("/").reverse().join("-"));
                    // tanggal[index] = d.getDate() + " " + d.toLocaleString('id-ID', {
                    //     month: 'long'
                    // });
                    tanggal[index] = value.date_str
                    tweet[index] = value.total_tweet;
                    likes[index] = value.total_favorite;
                    mention[index] = value.total_mention;
                    retweet[index] = value.total_retweet;
                    reaction[index] = value.total_reaction;
                    hashtag[index] = value.hashtag;

                })
                var trendAnalysis = document.getElementById('trendAnalysisUserStatistic')
                    .getContext(
                        '2d');
                var gradientFill1 = trendAnalysis.createLinearGradient(500, 0, 100, 0);
                gradientFill1.addColorStop(0, 'rgba(248, 170, 186, 0.29)');
                gradientFill1.addColorStop(1, 'rgba(248, 170, 186, 0)');

                var gradientFill2 = trendAnalysis.createLinearGradient(500, 0, 100, 0);
                gradientFill2.addColorStop(0, 'rgba(102, 211, 224, 0.24)');
                gradientFill2.addColorStop(1, 'rgba(196, 196, 196, 0)');

                var gradientFill3 = trendAnalysis.createLinearGradient(500, 100, 0, 0);
                gradientFill3.addColorStop(0, 'rgba(128, 158, 199, 0.23)');
                gradientFill3.addColorStop(1, 'rgba(196, 196, 196, 0)');

                var trendAnalysis = new Chart(trendAnalysis, {
                    type: 'line',
                    data: {
                        labels: tanggal,
                        // datasets: [{
                        //         label: data.data[0].key,
                        //         fill: true,
                        //         backgroundColor: gradientFill1,
                        //         pointBorderColor: "#fff",
                        //         borderColor: "#FFB1C1",
                        //         data: data.data[0].tweet,
                        //         tension: 0.1
                        //     },
                        //     // {
                        //     //     label: 'BUMN',
                        //     //     fill: true,
                        //     //     backgroundColor: gradientFill2,
                        //     //     pointBorderColor: "#fff",
                        //     //     borderColor: "#00B6CB",
                        //     //     data: [60, 20, 30, 40, 10],
                        //     //     tension: 0.1
                        //     // },
                        //     // {
                        //     //     label: 'Pemerintah',
                        //     //     fill: true,
                        //     //     backgroundColor: gradientFill3,
                        //     //     pointBorderColor: "#fff",
                        //     //     borderColor: "#3C6AA9",
                        //     //     data: [40, 30, 50, 90, 10],
                        //     //     tension: 0.1
                        //     // },
                        // ]
                    },
                    options: option
                });
                // var tweet[], likes, retweet, mention, reaction, hashtag;
                $.each(data[0].keyword, function(index, value) {
                    $.each(value.keyword, function(index, result) {
                        tweet.push(result.Total_Tweet)
                    })
                    // tweet = value.Total_Tweet;
                    // likes = value.total_favorite;
                    // mention = value.total_mention;
                    // retweet = value.total_retweet;
                    // reaction = value.total_reaction;
                    // hashtag = value.hashtag;
                    addData(trendAnalysis, value.keyword, color1[index], tweet, color1[index]);
                })
                // console.log(tweet);

                // Filternya belum
                // $('input[name="tauFilter"]').on('change', function() {
                //     let val = $(this).val();
                //     $.each(data.data, function(index, value) {
                //         console.log(value.tweet);
                //         changeData(trendAnalysis, value.retweet);
                //     })

                // })
            }

        });
    </script>
    
    {{-- Filter --}}
    <script>
        $('#btn_filter').on('click', function () {
            let start = $('#date_from').val();
            let end = $('#date_until').val();
            $('.summary-box .body').addClass('d-none')
            $('.summary-box .loader').removeClass('d-none')

            $.ajax({
            type: 'post',
            url: ip + 'project/summary',
            data: JSON.stringify({
                "keyword": keyword + ',',
                "start_date": start,
                "end_date": end,
                "sentiment": "0,1,2"
            }),
            success: function(data) {
                $(".summary-box .loader").addClass('d-none');
                $(".summary-box .body").removeClass('d-none');
                $('.summary-box #total_reaction').html(Number(data.data[0].total_reaction)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_tweet').html(Number(data.data[0].total_tweet)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_like').html(Number(data.data[0].total_favorite)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_retweet').html(Number(data.data[0].total_retweet)
                    .toLocaleString("id-ID"))
                $('.summary-box #profile').html(Number(data.data[0].total_profile)
                    .toLocaleString("id-ID"))
                $('.summary-box #total_mention').html(Number(data.data[0].total_mention)
                    .toLocaleString("id-ID"))
                $('#total_public').html(Number(data.data[0].total_public)
                    .toLocaleString("id-ID"))
            },
        });
        })

    </script>
@endsection
