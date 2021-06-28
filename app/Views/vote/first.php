<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Section 1</title>

	<link href="<?=$bootstrap?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=$css?>/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="<?=$css?>/style-1.css" rel="stylesheet" type="text/css">

</head>

<body class="bg-primary">
    <section id="main">
        <div class="container">
            <div class="justify-content-center">
                <div class="row my-5 justify-content-center">
                <?php
                    $db = \Config\Database::connect();

                    $data = $db->table('candidates')->getWhere(['type' => '1']);

                    foreach($data->getResult() as $item)
                    {
                    
                ?>
                    <div class="col-xl-4 col-lg-4 col-sm-12">
                        <div class="card crd mb-5">
                            <div class="card-body text-center">
                                <img src="<?php echo base_url()."/uploads/photoCandidate/".$item->image; ?>" class="img-thumbnail">
                                <h2><?php echo $item->name_1; ?></h2>
                                <h2><?php echo $item->name_2; ?></h2>
                                <form action="/vote/elect" method="post">
                                    <input type="hidden" name="id" value="<?php echo $item->id;?>">
                                    <button type="submit" class="form-control btn btn-primary">Vote</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
                </div>
            </div>
        </div>
    </section>