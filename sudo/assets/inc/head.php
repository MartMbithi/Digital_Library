<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="assets/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="assets/img/favicon-32x32.png" sizes="32x32">

    <title>iLibray An Automated Digital Library Management System</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel='stylesheet' type='text/css'>

    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css"/>

    <!-- altair admin login page -->
    <link rel="stylesheet" href="assets/css/login_page.min.css" />
    <!-- additional styles for plugins -->
    <!-- weather icons -->
    <link rel="stylesheet" href="bower_components/weather-icons/css/weather-icons.min.css" media="all">
    <!-- metrics graphics (charts) -->
    <link rel="stylesheet" href="bower_components/metrics-graphics/dist/metricsgraphics.css">
    <!-- chartist -->
    <link rel="stylesheet" href="bower_components/chartist/dist/chartist.min.css">
    
    <!-- uikit -->
    <link rel="stylesheet" href="bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="assets/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="assets/css/style_switcher.min.css" media="all">
    
    <!-- altair admin -->
    <link rel="stylesheet" href="assets/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="assets/css/themes/themes_combined.min.css" media="all">
    <!--load swal js -->

    <script src="assets/js/swal.js"></script>
       
       <!--Inject SWAL-->
       <?php if(isset($success)) {?>
       <!--This code for injecting success alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Success","<?php echo $success;?>","success");
                           },
                               100);
                          
               </script>

       <?php } ?>

       <?php if(isset($err)) {?>
       <!--This code for injecting error alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Failed","<?php echo $err;?>","error");
                           },
                               100);
               </script>

       <?php } ?>
       <?php if(isset($info)) {?>
       <!--This code for injecting info alert-->
               <script>
                           setTimeout(function () 
                           { 
                               swal("Success","<?php echo $info;?>","warning");
                           },
                               100);
               </script>

       <?php } ?>
       <script>
       function getBookId(val)
            
             {
                    $.ajax
                    ({
                        //get book ID
                    type: "POST",
                    url: "ajax.php",
                    data:'bookCategoryName='+val,
                    success: function(data){
                    //alert(data);
                    $('#BookCategoryID').val(data);
                    }
                });

             }

    </script> 
      

</head>