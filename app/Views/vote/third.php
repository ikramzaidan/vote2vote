<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

	<title>Section 2</title>

	<link href="<?=base_url($bootstrap)?>/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?=base_url($css)?>/sb-admin-2.css" rel="stylesheet" type="text/css">
    <link href="<?=base_url($css)?>/style-1.css" rel="stylesheet" type="text/css">

    <script type="text/javascript">
        //initial checkCount of zero
        var checkCount=0
        //maximum number of allowed checked boxes
        var maxChecks=3
        var minChecks=3
        function setChecks(obj){
        //increment/decrement checkCount
        if(obj.checked){
        checkCount=checkCount+1
        }else{
        checkCount=checkCount-1
        }
        //if they checked a 4th box, uncheck the box, then decrement checkcount and pop alert
        if (checkCount>maxChecks){
            obj.checked=false
            checkCount=checkCount-1
            alert('Anda hanya dapat memilih '+maxChecks+' kandidat.')
            }
        }
    </script>

</head>

<body class="bg-primary">
    <div class="container">
        <?php if(session()->getFlashdata('msg')):?>
        <div class="alert alert-danger mt-2"><?= session()->getFlashdata('msg') ?></div>
        <?php endif;?>
        <div class="justify-content-center">
            <div class="row my-5 justify-content-center">
                <?php
                    $db = \Config\Database::connect();

                    $data = $db->table('candidates')->getWhere(['type' => '2']);

                    foreach($data->getResult() as $item)
                    {
                    
                ?>
                <div class="col-xl-4 col-lg-4 col-sm-12">
                    <div class="card crd mb-5">
                    <div class="card-body text-center">
                            <img src="<?php echo base_url()."/uploads/photoCandidate/".$item->image; ?>" class="img-thumbnail" style="height:300px; width:220px;">
                            <h4><?php echo $item->name_1; ?></h4>
                            <form action="/vote/electd" method="post">
                                <input type="checkbox" id="candidate" name="id[]" value="<?php echo $item->id;?>" onclick="setChecks(this)">
                                <input type="hidden" name="idr" value="<?php echo $item->id;?>">
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                <button class="btn btn-success form-control" type="submit" name="submit">Vote</button>
                </form>
            </div>
        </div>
    </div>
</body>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $('input[type=checkbox]').on('change', function(evt) {
        var checkd = $('input[id=candidate]:checked');
        if(checkd.length < 3){
            $("button[name=submit]").prop("disabled", true);
            }else{
                $("button[name=submit]").prop("disabled", false);
            }
        });
    </script>
