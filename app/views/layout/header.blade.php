    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    
        <link rel="stylesheet" href="{{URL::to('/packages/pnotify')}}/jquery.pnotify.default.css">
        <link rel="stylesheet" href="{{URL::to('/packages/ui')}}/metro.min.css">
        <!-- <link rel="stylesheet" href="{{URL::to('/packages/ui')}}/themes/metro/easyui.css"> -->
         <link rel="stylesheet" href="{{URL::to('/packages/datatables')}}/media/css/jquery.dataTables.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{URL::to('/')}}/packages/ui/jquery.min.js"><\/script>')</script>

        <script src="{{URL::to('/')}}/packages/ui/modernizr-2.6.2.min.js"></script>
          <script type="text/javascript" src="{{URL::to('/packages/js/main.js')}}"></script>
    <style type="text/css">
    .center {
     float: none;
     margin-left: auto;
     margin-right: auto;
    }
    .tabger {
        overflow: auto;
        max-height: 400px;
    }
    </style>
    </head>
    <body>