<?php

$txt_phones = @$_POST["sms_phones"];
$txt_message = @$_POST["sms_message"];
$phone_data = array();
if ($txt_phones != null) {
    $phone_data = preg_split('/[\s]+/', $txt_phones);
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Send SMS at once</title>
    <meta name="viewport" content="width=device-width">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" media="all" href="./css/style.css"/>
    <link rel="stylesheet" media="all" href="./css/jquery.dynatable"/>
    <link rel="stylesheet" media="all" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

    <script type='text/javascript' src='./js/jquery-1.7.2.min.js'></script>
    <script type='text/javascript' src='./js/jquery.dynatable.js'></script>

    <script type='text/javascript' src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

    <script>

        $(function () {
            $trs = $('#phone_table tbody tr');
            count = $trs.length;

            function send_sms(index) {
                console.log($trs[index]);
                $item = $trs[index];
                txt_phone = $('td.phone', $item).text();
                txt_status = $('td.phone', $item).text();
                txt_message = $('#sms_message').val();
                $.post('api.php', {phone: txt_phone, message: txt_message}, function (data) {

                }).done(function () {
                    //alert("second success");
                }).fail(function () {
                    // alert("error");
                })
                .always(function () {
                    index++;
                    width = index / $trs.length * 100;

                    console.log(width);
                    $('.progress-bar').css('width', width+'%').attr('aria-valuenow', width);
                    $('.progress-bar').text("Sent message " + index + "/" + count + " (" + width + "%)");

                    if (index >= count) {
                        alert("Completed sending message");
                    } else {
                        send_sms(index);
                    }
                });
            }

            if ($trs.length == 0)
                return;

            send_sms(0);
        });
    </script>
</head>
<body>
<div class=" text-center">
    <h1>Send bulk SMS in here!</h1>
    <p>You will experience great things in here</p>
</div>

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">Phone List</div>
        <div class="panel-body">
            <div class="col-sm-12">
                <form class="form-horizontal" action="index.php" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Status</label>
                        <div class="col-sm-10">
                            <div class="progress" id="progress">

                                <div class="progress-bar progress-bar-striped active" style="font-weight: bold" role="progressbar"
                                     aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Phones:</label>
                        <div class="col-sm-10">
                            <table class="table table-bordered" id="phone_table">
                                <thead>
                                <th>No</th>
                                <th>Phone number</th>
                                <th>Sent?</th>
                                </thead>
                                <tbody>
                                <?php
                                $index = 0;
                                foreach ($phone_data as $phone_number) {
                                    $phone_number = trim($phone_number);
                                    if ($phone_number == "")
                                        continue;
                                    $index++;
                                    ?>
                                    <tr>
                                        <td><?php echo $index ?></td>
                                        <td class="phone"><?php echo $phone_number ?></td>
                                        <td class="status">----</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">SMS Phones:</label>
                        <div class="col-sm-10">
                            <textarea style="height: 200px;" class="form-control" name="sms_phones" id="sms_phones"
                                      placeholder="Enter your phone numbers..."><?php echo $txt_phones; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Message:</label>
                        <div class="col-sm-10">
                            <textarea style="height: 100px;" class="form-control" name="sms_message" id="sms_message"
                                      placeholder="Enter your message..."><?php echo $txt_message; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
