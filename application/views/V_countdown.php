<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <title>Line Countdown</title>
</head>

<body id="body" class="mt-5" style="background-color: green; ">
    <center>
        <h1>Pallet berhasil di barcode</h1>
    </center>
    <center id="center" style="font-size: 200px;">
        <span class="min">1</span> :
        <span class="sec">30</span> <br>
    </center>
    <center style="font-size: 25px; color: red;">
        <button>
            <a href="<?= base_url() ?>inputpo/handheld">SELESAI</a>
        </button>
    </center>
</body>

</html>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Countdown JQuery -->
<!-- <script src="<?= base_url() ?>vendor/jquerytimer/timer.js"></script>  -->

<script>
    function dec_min() {
        min = parseInt($('.min').html());
        if (min !== 0) {
            $('.min').html(min - 1);
            $('.sec').html(59);
        } else {
            window.location.href = "<?= base_url('inputpo/handheld') ?>"
        }
    }

    $(document).ready(function() {
        var Update = function() {
            $('.sec').each(function() {
                var count = parseInt($(this).html());
                if (count !== 0) {
                    $(this).html(count - 1);
                } else {
                    dec_min();
                }

            })
        };

        setInterval(Update, 1000)
    });
</script>