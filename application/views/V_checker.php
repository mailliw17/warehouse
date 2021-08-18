<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Checker</title>

    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box">

        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <!-- <p>PT. Charoen Pokphand Indonesia</p> -->
                                <h6>FIFO Pallet Forklift</h6>
                                <!-- <h6><small>Feedmill Demak</small></h6> -->
                            </td>

                            <td>
                                <!-- Form FIFO <br>
                                Warehouse Systems <br> <br> -->
                                <b>Nomor DO :</b>
                                <?php echo $checker2->nomor_do; ?> <br>
                                <b>Dicetak :</b>
                                <?php date_default_timezone_set("Asia/Jakarta");
                                echo date("d-M-Y H:i:s");  ?>
                            </td>
                            <!-- rencana mau generate QRcode untuk nomor DO -->
                            <!-- <td>
                                <img src=" <?php echo base_url('kodeqr/generateqrfifo/' . $checker2->nomor_do); ?>" alt="">
                            </td> -->
                        </tr>
                        <hr>
                    </table>
                </td>
            </tr>

            <!-- <tr class="information">
                <td colspan="6">
                    <table>
                        <tr>
                            <td>
                                <b>Nomor DO :</b>
                                <?php echo $checker2->nomor_do; ?>
                                <br>
                                <b>Dicetak :</b>
                                <?php date_default_timezone_set("Asia/Jakarta");
                                echo date("d-M-Y H:i:s");  ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr> -->

            <tr class="heading">
                <td>
                    No
                </td>

                <td>
                    Kode Pakan
                </td>

                <td>
                    Qty (Bag)
                </td>

                <td>
                    Lokasi Gudang
                </td>

                <td>
                    Tanggal Produksi
                </td>

            </tr>
            <?php
            $no = 1;
            foreach ($checker1 as $c) :
            ?>
                <tr class="">
                    <td>
                        <?php echo $no; ?>
                    </td>

                    <td>
                        <?php echo $c['kode_pakan']; ?>
                    </td>

                    <td>
                        <?php echo $c['qty_checker']; ?>
                    </td>

                    <td>
                        <?php echo $c['lokasi_gudang']; ?>
                    </td>

                    <td>
                        <!-- <?php echo $c['waktu_pembuatan']; ?> -->
                        <?php echo date("d/M/Y", strtotime($c['waktu_pembuatan'])); ?>
                    </td>

                </tr>
            <?php $no++;
            endforeach; ?>


            <tr class="total">
                <td></td>
                <hr>
                <td>

                </td>
            </tr>

            <tr class="">
                <!-- <td></td> -->
                <!-- <br> -->
                <td>
                    Dicetak oleh : <?= $this->session->userdata('nama'); ?>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>