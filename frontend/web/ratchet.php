<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ratchet template page</title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link href="ratchet/dist/css/ratchet.min.css" rel="stylesheet">
    <link href="ratchet/dist/css/ratchet-theme-ios.min.css" rel="stylesheet">

    <!-- Include the compiled Ratchet JS -->
    <script src="ratchet/dist/js/ratchet.min.js"></script>
    <style>
      .table-view-cell .icon {
            color: #007aff;
      }
      
      .bar-tab .tab-item .tab-label{
      }

    </style>
  </head>
  <body>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Ratchet</h1>
    </header>
    
    <nav class="bar bar-tab">
      <a class="tab-item" href="#home">
        <span class="icon icon-home"></span>
        <span class="tab-label">Home</span>
      </a>
      <a class="tab-item" href="#profile">
        <span class="icon icon-person"></span>
        <span class="tab-label">Profile</span>
      </a>
      <a class="tab-item" href="#favorites">
        <span class="icon icon-star-filled"></span>
        <span class="tab-label">Favorites</span>
      </a>
      <a class="tab-item" href="#search">
        <span class="icon icon-search"></span>
        <span class="tab-label">Search</span>
      </a>
      <a class="tab-item active" href="#settings">
        <span class="icon icon-gear"></span>
        <span class="tab-label">Settings</span>
      </a>
    </nav>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
        
      <p class="content-padded">Thanks for downloading Ratchet. </p>
      <div class="card">
        <ul class="table-view">
          <li class="table-view-cell media">
            <a class="navigate-right" data-transaction="slide-in" href="http://goratchet.com">
                <span class="media-object icon icon-list pull-left"></span>
                <div class="media-body">Ratchet documentation</div>
            </a>
          </li>
          
          <li class="table-view-cell media">
            <a class="navigate-right" data-transaction="slide-in" href="https://github.com/twbs/ratchet/">
                <span class="media-object icon icon-star pull-left"></span>
                <div class="media-body">Ratchet on Github</div>
            </a>
          </li>
          
          <li class="table-view-cell media">
            <a class="navigate-right" data-transaction="slide-in" href="https://groups.google.com/forum/#!forum/goratchet">
                <span class="media-object icon icon-gear pull-left"></span>
                <div class="media-body">Ratchet Google group</div>
            </a>
          </li>
          
          <li class="table-view-cell media">
            <a class="navigate-right" data-transaction="slide-in"  href="https://twitter.com/goratchet">
                <span class="media-object icon icon-info pull-left"></span>
                <div class="media-body">Ratchet on Twitter</div>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </body>
</html>
