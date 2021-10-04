<html>
  <head>
    <meta charset="UTF-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>wadididaw</title>
    <link rel="stylesheet" href="<?= base_url('public/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.common.min.css'); ?>" >
    <link rel="stylesheet" href="<?= base_url('public/kendoStyle/kendo.default.min.css'); ?>" >
    <script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
    <script src="https://kendo.cdn.telerik.com/2021.1.119/js/jquery.min.js"></script>
    <script>
        if (typeof jQuery == "undefined") {
            // Fallback to local jQuery.
            document.write(decodeURIComponent('%3Cscript src="/path/to/local/jquery.min.js" %3E%3C/script%3E'));
        }
    </script>

    <script src="https://kendo.cdn.telerik.com/2021.1.119/js/kendo.all.min.js"></script>
    <script>
        if (typeof kendo == "undefined") {
            // Checking for loaded CSS files is cumbersome,
            // therefore assume that if the scripts have failed, so have the stylesheets.

            // Fallback to local Kendo UI stylesheets.
            document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.common.min.css" %3C/%3E'));
            document.write(decodeURIComponent('%3Clink rel="stylesheet" href="/path/to/local/kendo.blueopal.min.css" %3C/%3E'));

            // Fallback to local Kendo UI scripts.
            document.write(decodeURIComponent('%3Cscript src="/path/to/local/kendo.all.min.js" %3E%3C/script%3E'));
            // Also add kendo.aspnetmvc.min.js or kendo.timezones.min.js if needed.
        }
    </script>
  </head>
  <body>

    <h2>Square CSS</h2>
    <div id="square" style="height:200px;background-color:#555">
      <div class="p-5"> KOTAK BROO</div>
      <span class="border">haihai</span>
      <div style="padding-left:200px">
        <img src="<?= base_url('public/gambar/search.png') ?>" style="height:200px;weight:100px">
      </div>

      <div id="example">
                <div class="demo-section k-content">
                    <div>
                        <h4>Basic Button</h4>
                        <p>
                            <button id="primaryTextButton" class="k-primary">Primary Button</button>
                            <button id="textButton">Button</button>
                        </p>
                    </div>

                     <div>
                        <h4>Disabled buttons</h4>
                        <p>
                             <a id="primaryDisabledButton" class="k-primary">Disabled Primary Button</a>
                             <a id="disabledButton">Disabled Button</a>
                        </p>
                    </div>

                    <div>
                       <h4>Buttons with icons</h4>
                        <p>
                            <a id="iconTextButton">Filter</a>
                            <a id="kendoIconTextButton">Clear Filter</a>
                            <em id="iconButton"></em>
                        </p>
                    </div>
                </div>

                <script>
                    $(document).ready(function () {
                        $("#primaryTextButton").kendoButton();

                        $("#textButton").kendoButton();

                        $("#primaryDisabledButton").kendoButton({
                            enable: false
                        });

                        $("#disabledButton").kendoButton({
                            enable: false
                        });

                        $("#iconTextButton").kendoButton({
                            icon: "filter"
                        });

                        $("#kendoIconTextButton").kendoButton({
                            icon: "filter-clear"
                        });

                        $("#iconButton").kendoButton({
                            icon: "refresh"
                        });
                    });
                </script>

                <style>
                    .demo-section p {
                        margin: 0 0 30px;
                        line-height: 50px;
                    }
                    .demo-section p .k-button {
                        margin: 0 10px 0 0;
                    }
                    .k-primary {
                        min-width: 150px;
                    }
                </style>
            </div>




  </body>
</html>
